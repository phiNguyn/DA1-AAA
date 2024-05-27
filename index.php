<?php
session_start();
ob_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

include 'dao/pdo.php';
include 'dao/danhmuc.php';
include 'dao/sanpham.php';
include 'dao/user.php';
include 'dao/giohang.php';
include 'dao/donhang.php';
include 'dao/binh-luan.php';

include 'dao/slider.php';
include 'view/header.php';

$dssp_best = get_dssp_view_iphone(4);
$dssp_pk = get_dssp_view_pk(4);
$all_dm = admin_dm(10);
$loai_dm_home = loai_danh_muc();
if (!isset($_GET['page'])) {
    include 'view/home.php';
} else {
    switch ($_GET['page']) {

        case 'list_product':
            $keyword='';
            $tittle='Tất cả sản phẩm';
          if(!isset($_GET['iddm'])){
            $iddm=0;
           
          }else{
            $iddm=$_GET['iddm'];
           $ten_dm= ten_dannhmuc($iddm);
            $tittle=$ten_dm;
          }

          if(!isset($_GET['id_LoaiDanhMuc'])){
            $id_LoaiDanhMuc=0;
          }else{
            $id_LoaiDanhMuc = $_GET['id_LoaiDanhMuc'];
            $ten_Ldm=ten_LoaiDanhMuc($id_LoaiDanhMuc);
            $tittle=$ten_Ldm; 
          }
           
            
            if(isset($_POST['keyword'])){
                $keyword=$_POST['keyword'];
                $tittle='Kết quả tìm kiếm cho ' .$keyword;
            }
            
            $get_all_pro = get_dssp($iddm, $id_LoaiDanhMuc,$keyword, 12);
            include 'view/list-product.php';
            break;

        case 'detail_pro':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $detail = get_detail($id);
                $id_LoaiDanhMuc=$detail['id_LoaiDanhMuc'];
                $sp_lien_quan = get_dssp_lien_quan($id_LoaiDanhMuc, $id, 4);
                $product_img=get_all_img($id);
            }

            include 'view/detail.php';
            break;

        case 'cart':
           if($_SESSION['cart']== []){
            $btn_check_cart='<a href="index.php?page=list_product">Bạn chưa có sản phẩm nào</a>';
           }
           else {
            $btn_check_cart='<a class="uppercase" href="index.php?page=checkout">Tiếp tục thanh toán  </a> ';
           }
            if (isset($_GET['del']) && ($_GET['del'] == 1)) {
                unset($_SESSION['cart']);
                header('location: index.php?page=cart');
            }
            include 'view/cart.php';
            break;

        case 'add-cart':
            if (isset($_POST['btn-add-cart'])) {
                $idpro = $_POST['idpro'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $dungluong = $_POST['dungluong'];
                $color = $_POST['color'];
                $soluong = $_POST['soluong'];
                $thanhtien = (int)$price * (int)$soluong;
                $kt_soluong = 0;
                $i = 0;
                foreach ($_SESSION['cart'] as $item) {
                    if ($item['idpro'] === $idpro && $item['dungluong'] === $dungluong && $item['color'] === $color) {



                        $soluongNew = $soluong + $item['soluong'];
                        $_SESSION['cart'][$i]['soluong'] = $soluongNew;
                        $kt_soluong = 1;
                        break;
                    }
                    $i++;
                }
                if ($kt_soluong == 0) {
                    $sp = array("idpro" => $idpro, "name" => $name, "img" => $img, "price" => $price, "dungluong" => $dungluong, "color" => $color, "soluong" => $soluong, "thanhtien" => $thanhtien);
                    array_push($_SESSION['cart'], $sp);
                }
                header('location:index.php?page=detail_pro&id=' . $idpro . '');
                // header('location:index.php?page=cart');
            }

            break;

        case 'del':
            if (isset($_GET['idsp']) && ($_GET['idsp'] >= 0)) {
                array_splice($_SESSION['cart'], $_GET['idsp'], 1);
                header('location:index.php?page=cart');
            }

            break;

        case 'checkout':

            include 'view/checkout.php';
            break;

// đặt hàng
        case 'donhang':

            if (isset($_SESSION['user'])) {
                $iduser = $_SESSION['user']['id'];


                if (isset($_POST['btn-dathang'])) {
                    $username = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $receiver_name = $_POST['receiver_name'];
                    $receiver_phone = $_POST['receiver_phone'];
                    $receiver_address = $_POST['receiver_address'];
                    $pttt = $_POST['pttt'];
                    $ngaymua = date('Y-m-d');
                    $ship =$_POST['ship'];
                    // Tạo đơn hàng
                    $madonhang = "AAA" . $iduser . "-" . date("His-dmY");
                    $total = getTongDonHang();
                    
                    $voucher = 0;
                    $trang_thai = 1;
                    $tong_thanhtoan = (int)$total + (int)$ship - (int)$voucher;
                    $idbill = bill_insert_id($iduser, $madonhang, $username, $email, $phone, $address, $receiver_name, $receiver_phone, $receiver_address, $total, $ship, $voucher, $tong_thanhtoan, $pttt, $ngaymua, $trang_thai);

                    foreach ($_SESSION['cart'] as $item) {
                        extract($item);
                        cart_insert($name, $img, $price, $dungluong, $color, $soluong, $thanhtien, $idbill, $iduser, $idpro);
                    }
                    $_SESSION['cart'] = [];
                   header('location:index.php?page=order-complete');
                // header('location:index.php?page=donhang-one&iddh='.$idbill.' ');
                }
            } else {
                header('location:index.php');
            }

            break;

        case 'order-complete':
            include 'view/order_thanhcong.php';
            break;

        case 'list-donhang':
            if(isset($_SESSION['user'])){

                $list_Bill= get_all_donhang($_SESSION['user']['id']);
                include 'view/list_donhang.php';
            } else{

                header('location:index.php?page=home');
            }
           
            break;

        case 'donhang-one':
            if(isset($_GET['iddh'])&& ($_GET['iddh']) >0){
                $id=$_GET['iddh'];
                $my_dh_detail=get_all_donhang_id($id);
                    include 'view/donhang-one.php';
               
            }else {
                header('location: index.php?page=list-donhang');
            }
            break;

        case 'dang-ky':

            include 'view/resign.php';
            break;


        case 'resign':
            if (isset($_POST['btn-register'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $kt_signUp_email = check_taikhoan_email($email);
                $kt_signUp_phone = check_taikhoan_phone($phone);
                if ($kt_signUp_phone) {
                    $eror = "Số điện đã tồn tại";
                } else if ($kt_signUp_email) {
                    $eror = "Email đã tồn tại";
                } else {
                    user_insert($name, $email, $phone, $password);
                    header('location:index.php?page=login');
                }
            }

            include 'view/resign.php';
            break;

        case 'dang-nhap':
            include 'view/login.php';
            break;

        case 'login':
            if (isset($_POST['btn-login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $kt = check_user($email, $password);
                if ($kt && $kt['role'] != 1) {
                    $_SESSION['user'] = $kt;
                    
                        header('location:index.php?page=home');
                    
                } else {
                    $eror = 'Thông tin đăng nhập không chính xác vui lòng kiểm tra lại';
                }
            }

            include 'view/login.php';
            break;

        

        case 'myaccount':
            if(isset($_SESSION['user']) && count($_SESSION['user'])>1){
                include 'view/myaccount.php';

            }
            else header('location:index.php?page=dang-nhap');
            break;

           case 'user_info':
            include 'view/myaccount_confirm.php';
            break; 

            case 'update-user':
                if (isset($_POST['btn-update'])) {
                    $name = $_POST['name'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                  $address=$_POST['address'];
                    $role=0;
                    $id=$_POST['id'];
                    // so sánh dữ liệu trong database nếu trùng bắt đăng ký lại
                    // lấy thông tin
                    user_update($name,$email,$phone,$address,$role,$id);
                }
                header('location: index.php?page=myaccount');
                break;

        case 'logout':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
            }
            header('location:index.php?page=login');
            break;


        case 'cmt':
            if(isset($_POST['btn-cmt'])){
                $idsp=$_POST['idsp'];
                $iduser=$_POST['iduser'];
                $noidung=$_POST['noidung'];
                $ngaybinhluan= date('Y-m-d');
                insert_cmt($noidung,$ngaybinhluan,$iduser,$idsp);
                header('location:index.php?page=detail_pro&id='.$idsp.'');
            }
            
            break;

            case 'fogotPass':

                include 'view/fogotPass.php';
                break;

        case 'resetPass':

                    include 'view/resetPass.php';
                    break;

        case 'home':
            include 'view/home.php';
            break;


        default:
            include 'view/home.php';
            break;
    }
}
include 'view/footer.php';
