<?php
session_start();
if (isset($_SESSION['admin']) && ($_SESSION['admin']['role']) == 1) {

    include '../dao/pdo.php';
    include '../dao/danhmuc.php';

    include '../dao/sanpham.php';
    include '../dao/user.php';
    include '../dao/donhang.php';
    include '../dao/giohang.php';
    include '../dao/binh-luan.php';
    include '../dao/thong-ke.php';
    include '../view/global.php';
    
    include 'header.php';
    if (!isset($_GET['page'])) {
        include 'home.php';
    } else {
        switch ($_GET['page']) {
            case 'danhmuc':
                $admin_dm = admin_dm();

                include 'danhmuc/danhmuc.php';
                break;

            case 'danhmuc_add';
                if (isset($_POST['btn-add-dm'])) {
                    $name = $_POST['name'];
                    $content = $_POST['content'];
                    $home = $_POST['home'];
                    $id_LoaiDanhMuc = $_POST['id_LoaiDanhMuc'];
                    $kt_name_danhmuc = check_name_danhmuc($name);
                    if ($kt_name_danhmuc) {
                        $eror = 'Tên danh mục đã bị trùng vui lòng điền tên khác';
                    } else {
                        inser_dm($name, $content, $home, $id_LoaiDanhMuc);
                        $success = "Đã thêm danh mục thành công";
                    }
                }
                $admin_loai_dm = loai_dm();
                include 'danhmuc/danhmuc_add.php';
                break;


            case 'update-dm':
                $id = $_GET['id'];
                if (isset($_POST['btn-update-dm'])) {
                    $name = $_POST['name'];
                    $content = $_POST['content'];
                    $home = $_POST['home'];
                    $id_LoaiDanhMuc = $_POST['id_LoaiDanhMuc'];

                    $kt_name_danhmuc = check_name_danhmuc($name);

                    if ($kt_name_danhmuc && $kt_name_danhmuc['id'] != $id) {
                        $eror = 'Tên danh mục đã bị trùng vui lòng điền tên khác';
                    } else {
                        update_dm($name, $content, $home, $id_LoaiDanhMuc, $id);
                        $success = 'Cập nhật thành công ';
                    }
                }
                $option_loaidanhuc = loai_dm();
                $dm_all = dm_all($id);
                include 'danhmuc/danhmuc_update.php';
                break;


            case 'delete-dm':
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $id = $_GET['id'];

                    delete_dm($id);
                }
                // header('location:index.php?page=danhmuc');
                break;

            case 'sanpham':

                $keyword = '';
                $iddm = $_GET['iddm'] ?? 0;
                $id_LoaiDanhMuc = $_GET['id_LoaiDanhMuc'] ?? 0;
                if (isset($_POST['keyword'])) {
                    $keyword = $_POST['keyword'];
                }
                $allPro = admin_getAllPro($iddm, $id_LoaiDanhMuc, $keyword, 50);
                include 'sanpham/product.php';
                break;

            case 'add_pro':
                if (isset($_POST['btn-add-pro'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $price_sale = $_POST['price_sale'];
                    $view = $_POST['view'];
                    $iddm = $_POST['iddm'];
                    $dungluong = isset($_POST['dungluong']) ? $_POST['dungluong'] : '';
                    $color = isset($_POST['color']) ? $_POST['color'] : '';

                   
                    $id_LoaiDanhMuc = $_POST['id_LoaiDanhMuc'];
                    $img = $_POST['img'];
                    $kt_name_sp=check_name_sp($name);
                    if($kt_name_sp){
                        $eror='Tên sản phẩm bị trung vui lòng kiểm tra lại';

                    }else{

                        if (!empty($_FILES['img']['name'])) {
                            $target_file = "../" . PATH_IMG . basename($_FILES['img']['name']);
                            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                            $img = basename($_FILES['img']['name']);
                        }
                        $id = sp_insert($name, $img, $price, $price_sale, $view, $iddm, $id_LoaiDanhMuc);
                    }
                    if($dungluong=='' && $color==''){
                           
                            
                    }else if($dungluong=='' || $color==''){
                      
                    }else{

                        foreach ($dungluong as $value) {
                            foreach ($color as $value1) {
                                insert_ctsp($id, $value, $value1);
                            }
                        }
                    }


                    

                    $success = 'Đã thêm sản phẩm thành công';
                }


                $option_dm = admin_dm();
                $option_loaidanhuc = loai_dm();
                include 'sanpham/product_add.php';
                break;





            case 'update-sp':
                $id = $_GET['idsp'];
                if (isset($_POST['btn-update-pro'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $price_sale = $_POST['price_sale'];
                    $view = $_POST['view'];
                    $iddm = $_POST['iddm'];
                    $img = $_POST['img'];
                    $dungluong = isset($_POST['dungluong']) ? $_POST['dungluong'] : '';
                    $color = isset($_POST['color']) ? $_POST['color'] : '';
                    
                   
                    $id_LoaiDanhMuc = $_POST['id_LoaiDanhMuc'];
                    
                        if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
    
                            if (file_exists($img)) {
                                unlink($img);
                            }
    
    
                            $target_file = "../" . PATH_IMG . basename($_FILES['img']['name']);
                            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                            $img = basename($_FILES['img']['name']);
                        }


                        $sql_update =  "UPDATE `sanpham` SET `name`='$name',`img`='$img',`price`='$price',`price_sale`='$price_sale',`view`='$view',`iddm`='$iddm',`id_LoaiDanhMuc`='$id_LoaiDanhMuc' WHERE `id`='$id'";
                        pdo_execute($sql_update);
                    
                    

                    
                    // Cập nhật sản phẩm
                    // update_sp($name, $img, $price, $price_sale, $view, $iddm, $id_LoaiDanhMuc, $id);
                    $sql_delete = "DELETE  FROM `ctsanpham` where MaSP=$id ";
                    pdo_execute($sql_delete);
                    // del_ctsp($id);
                    $sql_select = "SELECT id FROM sanpham where name='$name' ORDER BY id DESC";
                    $row = pdo_query_one($sql_select);
                    if (isset($row)) {
                        $so = (int)$row['id'];
                        if($dungluong=='' && $color==''){
                           
                            
                        }else if($dungluong=='' || $color==''){
                          
                        }else{
                            foreach ($dungluong as $value_dungluong) {
                                foreach ($color as $value_color) {
                                    $sql_insert = "INSERT INTO ctsanpham(MaSP,Ma_DungLuong,Ma_Mau)
                                VALUES('$so','$value_dungluong','$value_color')";
                                    pdo_execute($sql_insert);
                                }
                            }

                        }
                        }

                    $success = 'Đã cập sản phẩm thành công';
                }
                $option_dm = admin_dm();
                $option_loaidanhuc = loai_dm();
                $sp_edit_func = get_sp_chitiet($id);
                include 'sanpham/product_update.php';
                break;


                // xóa sản phẩm
            case 'delete-pro':
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $id = $_GET['id'];
                    $img = PATH_IMG . get_img($id);
                    if (is_file($img)) {
                        unlink($img);
                    }
                    // Kiểm tra xem sản phẩm có được sử dụng trong ct_donhang hay không
                    $result = pdo_query("SELECT * FROM ct_donhang WHERE id_pro = ?", $id);

                    if (count($result) > 0) {
                        // Nếu sản phẩm được sử dụng trong ct_donhang, in ra thông báo và không xóa sản phẩm
                        echo '<div
                        class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-red-300 font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
                        <i class="text-white bx bx-md bx-error-circle rounded-full bg-red-500"></i>
                        <span>Không thể xóa sản phẩm vì sản phẩm đã được đặt hàng</span>
                    </div>';
                    } else {
                        // Nếu sản phẩm không được sử dụng trong ct_donhang, xóa sản phẩm và chi tiết sản phẩm

                        // Xóa các bản ghi từ bảng ctsanpham liên quan đến sản phẩm
                        pdo_execute("DELETE FROM ctsanpham WHERE MaSP = ?", $id);
                        pdo_execute("DELETE FROM gallery WHERE idsp = ?", $id);
                        // Xóa sản phẩm từ bảng sanpham
                        pdo_execute("DELETE FROM sanpham WHERE id = ?", $id);

                        echo '
                        <?php if (isset($success)) : ?>
                            <div class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-white font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
                                <i class="text-white bx bx-md bx-check rounded-full bg-green-500"></i>
                                <span>Xóa sản phẩm thành công</span>
                            </div>
                        <?php endif;
                        unset($success); ?>
                       ';
                    }
                }

                break;








            case 'donhang':
                $admin_allDH = admin_getAll_DH();
                include 'donhang/donhang.php';
                break;

            case 'ctdonhang':
                $id = $_GET['iddh'];

                $my_dh_detail = get_all_donhang_id($id);
                include 'donhang/ctdonhang.php';
                break;



            case 'ctdonhang-update':
                $id = $_GET['iddh'];

                $my_dh_detail = get_all_donhang_id($id);
                include 'donhang/ct-donhang-update.php';
                break;



                // cập nhật trang thái đơn hàng sang đang giao hàng
            case 'duyet':
                $id = $_GET['iddh'];
                $sql = "UPDATE donhang SET trang_thai=2  WHERE id=$id";
                pdo_execute($sql);
                header('location:index.php?page=donhang');
                break;




                // cập nhật trang thái đơn hàng sang giao thành công

                case 'dh-complete':
                    $id=$_GET['iddh'];
                    $sql = "UPDATE donhang SET trang_thai=3  WHERE id=$id";
                pdo_execute($sql);
                header('location:index.php?page=donhang');
                break;


                // trang giao hàng thành công
                case 'dh-thanhcong':
                    $dh_complete=admin_dh_complete();
                    include 'donhang/dh-thanhcong.php';
                    break;

            case 'cho-xyly':
                $admin_allDH = admin_dh_new();
                include 'donhang/cho-xuly.php';
                break;

            case 'dh-da-xuly':
                $admin_allDH =  admin_dh_old();
                include 'donhang/da-xuly.php';
                break;



            case 'add_dl':
                $id = $_GET['id'];
                if (isset($_POST['btn-add-dl'])) {
                    $dl_name = $_POST['dl_name'];
                    inserT_dungluong($dl_name, $id);
                    $success = 'Đã thêm dung lượng  thành công';
                }
                include 'add_dungluong.php';
                break;

            case 'update-dl':
                $id = $_GET['id'];
                if (isset($_POST['btn-update-dl'])) {

                    $dl_name = $_POST['dl_name'];
                    update_dl($dl_name, $id);
                    $success = 'Đã cập nhật dung lượng thành công';
                }
                $get_one_dl = get_one_dungluong($id);
                include 'update_dungluong.php';
                break;


            case 'color-add':
                $id = $_GET['id'];
                if (isset($_POST['btn-add-color'])) {
                    $color_name = $_POST['color_name'];

                    color_add($color_name, $id);
                    $success = 'Đã thêm màu thành công';
                }
                include 'color_add.php';
                break;

            case 'update-color':
                $id = $_GET['id'];
                if (isset($_POST['btn-update-color'])) {
                    $color_name = $_POST['color_name'];
                    update_color($color_name, $id);
                    $success = "Cập nhật màu thành công";
                }
                $get_one_color = get_one_color($id);
                include 'color_update.php';

                break;




            case 'user':
                $aLL_users = get_All_users();
                include 'user/user.php';
                break;
            default:
                include 'home.php';
                break;

            case 'userlist-dh':
                $id = $_GET['iduser'];
                $list_Bill = get_all_donhang($id);
                include 'user/user-list-dh.php';
                break;

            case 'user-dh-one':
                $id = $_GET['iddh'];
                $my_dh_detail = get_all_donhang_id($id);
                include 'user/user-dh-one.php';
                break;

                // loại danh mục

            case 'loai_danh_muc':
                $loai_dm = loai_dm();
                include 'loai_danh_muc/loai_danh_muc.php';
                break;

            case 'update-ldm':
                $id=$_GET['id'];
                if(isset($_POST['btn-update-ldm'])){
                    $name_LDM=$_POST['name_LDM'];
                    $img = $_POST['img'];
                    $content=$_POST['content'];
                    $home=$_POST['home'];
                    $check_name=check_name_ldm($name_LDM);
                    if($check_name && $check_name['id']!=$id){
                        $eror="Trùng tên loại danh mục vui lòng kiểm tra lại";
                    }else{
                        if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
         
                             if (file_exists($img)) {
                                 unlink($img);
                             }
     
     
                             $target_file = "../" . PATH_IMG . basename($_FILES['img']['name']);
                             move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                             $img = basename($_FILES['img']['name']);
                         }
                         $sql_update="UPDATE loaidanhmuc set name_LDM='$name_LDM',img='$img',content='$content',home='$home' where id='$id'";
                         pdo_execute($sql_update);
                         $success="Cập nhật thành công";

                    }


                }
                $edit_loai_dm=getOne_loai_dm($id);
                include 'loai_danh_muc/ldm_update.php';
                break;

                case 'ldm_add':
                    if(isset($_POST['btn-ldm-add'])){
                        $name_LDM=$_POST['name_LDM'];
                        $img=$_POST['img'];
                        $content=$_POST['content'];
                        $home=$_POST['home'];

                        $check_name=check_name_ldm($name_LDM);
                    if($check_name){
                        $eror="Trùng tên loại danh mục vui lòng kiểm tra lại";
                    }else{
                        if (!empty($_FILES['img']['name'])) {
                            $target_file = "../" . PATH_IMG . basename($_FILES['img']['name']);
                            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                            $img = basename($_FILES['img']['name']);
                        }
                         $sql_insert="INSERT INTO loaidanhmuc(name_LDM,img,content,home) VALUES('$name_LDM','$img','$content',$home) ";
                         pdo_execute($sql_insert);
                         $success="Đã thêm sản phẩm";

                    }
                        
                    }
                    include 'loai_danh_muc/ldm_add.php';
                    break;

                    // xóa loại danh mục

            case 'delete_ldm':
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $id = $_GET['id'];
                    $img = PATH_IMG . get_img_ldm($id);
                   
                    $result_dm = pdo_query("SELECT * FROM danhmuc WHERE id_LoaiDanhMuc = ?", $id);
                    $result_sp = pdo_query("SELECT * FROM sanpham WHERE id_LoaiDanhMuc = ?", $id);
                    if (count($result_dm) > 0) {
                        // Nếu loại danh mục có chưa danh mục
                        echo '<div
                        class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-red-300 font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
                        <i class="text-white bx bx-md bx-error-circle rounded-full bg-red-500"></i>
                        <span>Không thể xóa Loại danh mục vì chứa danh mục con</span>
                    </div>';

                    }
                    // nếu có sản phẩm tì không được xóa
                     else if(count($result_sp)>0){
                        echo '
                        <div
                        class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-red-300 font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
                        <i class="text-white bx bx-md bx-error-circle rounded-full bg-red-500"></i>
                        <span>Không thể xóa Loại danh mục vì chứa sản phẩm</span>
                    </div>
                       ';
                    }
                    // Thỏa điều kiện xóa
                    else{
                    $sql_delete_ldm="DELETE FROM loaidanhmuc where id= '$id'";
                        pdo_execute($sql_delete_ldm);
                    if (is_file($img)) {
                        unlink($img);
                    }
                    echo 'Xóa thành công';
                    }
                }
                
                break;

            case 'logout':
                if (isset($_SESSION['admin']) && (count($_SESSION['admin']) > 0)) {
                    unset($_SESSION['admin']);
                }
                header('location:login.php');

                break;

             case 'comment':
                $all_bl=get_all_cmt();
                include 'comment/comment.php';
                break; 
                
                case 'doanhthu':

                    include 'doanhthu/dt.php';
                    break;


    
        }
    }
    include 'footer.php';
} else {
    include 'login.php';
}
