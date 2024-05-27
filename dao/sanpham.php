<?php
require_once 'pdo.php';

// function admin_getAllPro(){
//     $sql="SELECT * FROM sanpham";
//     return pdo_query($sql);
// }

function admin_getAllPro($iddm,$id_LoaiDanhMuc,$keyword,$limi){
  $sql = "SELECT * FROM sanpham where  1";
  
  if($iddm>0){
      $sql .=" AND iddm=".$iddm;
  }
  if($id_LoaiDanhMuc>0){
    $sql.=" AND id_LoaiDanhMuc=".$id_LoaiDanhMuc;
  }
  if($keyword!=''){
    $sql.=" AND name like '%".$keyword."%' ";
  }
  
  $sql .= " ORDER BY iddm  limit ".$limi;

  return pdo_query($sql);
}

function sp_insert($name,$img,$price,$price_sale,$view,$iddm,$id_LoaiDanhMuc){
    $sql="INSERT INTO sanpham(name,img,price,price_sale,view,iddm,id_LoaiDanhMuc) VALUES (?,?,?,?,?,?,?)";
   return pdo_execute_id($sql,$name,$img,$price,$price_sale,$view,$iddm,$id_LoaiDanhMuc);
}

function get_sp_chitiet($id){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql,$id);
}

function update_sp($name,$img,$price,$price_sale,$view,$iddm,$id_LoaiDanhMuc,$id){
    $sql="UPDATE sanpham SET name=?,img=?,price=?,price_sale=?,view=?,iddm=?,id_LoaiDanhMuc=? WHERE id=?";
    pdo_execute($sql,$name,$img,$price,$price_sale,$view,$iddm,$id_LoaiDanhMuc,$id);
}

function get_ctsp($MaSP){
  $sql="SELECT * FROM ctsanpham WHERE MaSP=?";
  return pdo_query($sql,$MaSP);
}

// lấy màu trong chi tiết sản phẩm với cái id của sản phẩm
function get_color_detail($Ma_Mau){
  $sql="SELECT DISTINCT Ma_Mau FROM ctsanpham where MaSP=?";
  return pdo_query($sql,$Ma_Mau);
}

// Lấy dung lượng trong chi tiết sản phẩm với cái id của sản phẩm
function get_dungluong_detail($Ma_Mau){
  $sql="SELECT DISTINCT Ma_DungLuong FROM ctsanpham where MaSP=?";
  return pdo_query($sql,$Ma_Mau);
}

function get_dungluong($dungluong){
  $sql="SELECT * FROM tbl_dungluong where dungluong=?";
  return pdo_query($sql,$dungluong);
}

// thêm dung lượng cùng lúc với sản phẩm admin
function check_all_dungluong(){
  $sql="SELECT * FROM tbl_dungluong";
  return pdo_query($sql);
}

// function ở phần cập nhật sản phẩm lấy ra dung lượng theo mã sản phẩm chi tiết của trang admin
function get_dungluong_theo_masp_ctsp($MaSP,$Ma_DungLuong){
  $sql="SELECT DISTINCT Ma_DungLuong FROM ctsanpham where MaSP=? and Ma_DungLuong=?";
  return pdo_query($sql,$MaSP,$Ma_DungLuong);
}

function check_all_color(){
  $sql="SELECT * FROM tbl_color";
  return pdo_query($sql);
}
// function ở phần cập nhật sản phẩm lấy ra dung lượng theo mã sản phẩm chi tiết của trang admin
function get_color_theo_masp_ctsp($MaSP,$Ma_Mau){
  $sql="SELECT DISTINCT Ma_Mau FROM ctsanpham where MaSP=? and Ma_Mau=?";
  return pdo_query($sql,$MaSP,$Ma_Mau);
}

// thêm vào bằng chi tiết
function insert_ctsp($MaSP,$Ma_DungLuong,$Ma_Mau){
  $sql="INSERT INTO ctsanpham(MaSP,Ma_DungLuong,Ma_Mau) VALUES(?,?,?)";
  pdo_execute($sql,$MaSP,$Ma_DungLuong,$Ma_Mau);
}

function insert_ctsp_dungluong($MaSP,$Ma_DungLuong){
  $sql ="INSERT INTO ctsanpham(MaSP,Ma_DungLuong) VALUES(?,?)";
  pdo_execute($sql,$MaSP,$Ma_DungLuong);
}

function insert_ctsp_color($MaSP,$Ma_Mau){
  $sql="INSERT INTO ctsanpham(MaSP,Ma_Mau) VALUES(?,?)";
  pdo_execute($sql,$MaSP,$Ma_Mau);
}


// =============================================================================================================
    // trang người dùng
    function get_dssp_view_iphone($limi){
        $sql = "SELECT * FROM sanpham where iddm=1  ORDER BY view desc  limit ".$limi;
        return pdo_query($sql);
    }

    // lấy ra sản phẩm có theo danh muc
    function all_sp_dm($iddm){
      $sql="SELECT * FROM sanpham where iddm=?";
      return pdo_query($sql,$iddm);
    }


    function get_dssp_view_pk($limi){
        $sql = "SELECT * FROM sanpham where id_LoaiDanhMuc=5  ORDER BY view desc  limit ".$limi;
        return pdo_query($sql);
    }
    function get_detail($id){
        $sql="SELECT * FROM sanpham WHERE id=?";
        return pdo_query_one($sql,$id);
    }

    function get_dssp($iddm,$id_LoaiDanhMuc,$keyword,$limi){
      $sql = "SELECT * FROM sanpham where  1";
      
      if($iddm>0){
          $sql .=" AND iddm=".$iddm;
      }
      if($id_LoaiDanhMuc>0){
        $sql.=" AND id_LoaiDanhMuc=".$id_LoaiDanhMuc;
      }
      if($keyword!=''){
        $sql.=" AND name like '%".$keyword."%' ";
      }
      
      $sql .= " ORDER BY iddm  limit ".$limi;
  
      return pdo_query($sql);
  }
// =========================================================================================
// Phần dung lượng màu user

    function get_dl_one($idsp){
        $sql="SELECT * FROM tbl_dl idsp=?";
        return pdo_query_one($sql,$idsp);
    }

    function get_color($idsp){
        $sql="SELECT * FROM tbl_color WHERE idsp=?";
        return pdo_query($sql,$idsp);

    }
    

    // dung lượng thêm 
    function inserT_dungluong($dl_name,$idsp){
        $sql="INSERT INTO tbl_dungluong(dl_name,idsp) VALUES(?,?) ";
        pdo_execute($sql,$dl_name,$idsp);
    }
// dung lượng sửa
  function update_dl($dl_name,$dl_id){
    $sql="UPDATE tbl_dungluong SET dl_name=? where dl_id=?";
    pdo_execute($sql,$dl_name,$dl_id);
  }
  function get_one_dungluong($dl_id){
    $sql="SELECT * FROM tbl_dungluong WHERE dl_id=?";
    return pdo_query_one($sql,$dl_id);

  }

  // Thêm màu
  function color_add($color_name,$idsp){
   $sql="INSERT INTO tbl_color(color_name,idsp) VALUES(?,?) ";
    pdo_execute($sql,$color_name,$idsp);
  }

//   sửa màu
  function update_color($color_name,$color_id){
    $sql="UPDATE tbl_dungluong SET color_name=? where color_id=?";
    pdo_execute($sql,$color_name,$color_id);
  }
  function get_one_color($color_id){
    $sql="SELECT * FROM tbl_color WHERE color_id=?";
    return pdo_query_one($sql,$color_id);

  }

// +++++++++++++++++++++++++++++++++
//  hàm cập nhật sản phẩm case update
  // xóa chi tiết sản phẩm
  function del_ctsp($MaSP){
    $sql="DELETE FROM ctsanpham WHERE MaSP=?";
    pdo_execute($sql,$MaSP);
  }

  

  function get_ctsp_one($MaSP){
    $sql="SELECT * FROM ctsanpham where MaSP=?";
    return pdo_query_one($sql,$MaSP);
  }


  // lay ra san pham khac danh muc
  function get_dssp_lien_quan($id_LoaiDanhMuc,$id,$limi){
    $sql = "SELECT * FROM sanpham where id_LoaiDanhMuc<>? and id<>? ORDER BY id desc limit ".$limi;
    return pdo_query($sql,$id_LoaiDanhMuc,$id);
}

// Lấy ra tất cả ảnh của sản phẩm
function get_all_img($idsp){
  $sql="SELECT * FROM gallery where idsp=?";
  return pdo_query($sql,$idsp);
}
  


function get_img($id){
  $sql="SELECT img FROM sanpham where id=?";
  $get_img=pdo_query_one($sql,$id);
  return $get_img['img'];
}




// trang sản phẩm kiểm tra có trùng tên hay không
function check_name_sp($name){
  $sql="SELECT * FROM sanpham where name=?";
  return pdo_query_value($sql,$name);
}

function get_all_gallery($idsp){
  $sql="SELECT * FROM gallery where idsp=?";
  return pdo_query($sql,$idsp);
}


function count_sp(){
  $sql="SELECT count(*) from sanpham";
 return pdo_query_value($sql);
}








// =========================================================================================

// =============================================================================================================

// function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }

// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

// function hang_hoa_select_all(){
//     $sql = "SELECT * FROM hang_hoa";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_id($ma_hh){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_one($sql, $ma_hh);
// }

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }