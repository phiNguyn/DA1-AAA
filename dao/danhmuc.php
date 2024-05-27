<?php
require_once 'pdo.php';



function admin_dm(){
    $sql="SELECT * FROM danhmuc ORDER BY id_LoaiDanhMuc";
    return pdo_query($sql);
}

function loai_dm(){
    $sql="SELECT * FROM loaidanhmuc" ;
    return pdo_query($sql);
}

function getOne_loai_dm($id){
    $sql="SELECT * FROM loaidanhmuc where id=?";
    return pdo_query_one($sql,$id);
}

function inser_dm($name,$content,$home,$id_LoaiDanhMuc){
    $sql="INSERT INTO danhmuc(name,content,home,id_LoaiDanhMuc) VALUES(?,?,?,?)";
    pdo_execute($sql,$name,$content,$home,$id_LoaiDanhMuc);
}


function loai_danh_muc(){
    $sql="SELECT * FROM loaidanhmuc where home=1 ORDER BY id  limit 3";
    return pdo_query($sql);
}

function ten_dannhmuc($id){
    $sql="SELECT name from danhmuc where id=?";
    return pdo_query_value($sql,$id);
}

function ten_LoaiDanhMuc($id){
    $sql ="SELECT name_LDM FROM loaidanhmuc where id=?";
    return pdo_query_value($sql,$id);
}



// lấy ra danh mục
function dm_all($id){
    $sql="SELECT * FROM danhmuc where id=?";
    return pdo_query_one($sql,$id);
}

//  check tên sản phẩm
function check_name_danhmuc($name){
    $sql="SELECT * FROM danhmuc where name=?";
    return pdo_query_one($sql,$name);
  }

  function check_name_ldm($name_LDM){
  $sql="SELECT * FROM loaidanhmuc where name_LDM=?";
    return pdo_query_one($sql,$name_LDM);
 }


//  xóa loại danh mục
// xóa ảnh loại danh mục
function get_img_ldm($id){
    $sql="SELECT img FROM loaidanhmuc where id=?";
    $get_img=pdo_query_one($sql,$id);
    return $get_img['img'];
  }

  




//   update danh muc
function update_dm($name,$content,$home,$id_LoaiDanhMuc,$id){
    $sql="UPDATE danhmuc SET name=?,content=?, home=?,id_LoaiDanhMuc=? where id=?";
    pdo_execute($sql,$name,$content,$home,$id_LoaiDanhMuc,$id);
}

function delete_dm($id){
    if(quanhe($id)){
      echo '
      <div
    class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-red-300 font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
    <i class="text-white bx bx-md bx-error-circle rounded-full bg-red-500"></i>
    <span>Danh mục có sản phẩm không thể xóa</span>
</div>';
     
    } else {
     
      $sql="DELETE FROM danhmuc WHERE id=?";
      pdo_execute($sql,$id);
    
    }
  
  }

function quanhe($iddm){ 
    $sql=" SELECT * FROM sanpham where iddm=".$iddm;
    $productlist= pdo_query($sql);
    return count($productlist);
  }


//   menu
function menu_dm($id_LoaiDanhMuc){
    $sql="SELECT * FROM danhmuc where id_LoaiDanhMuc=? AND home=1 order by id_LoaiDanhMuc ";
   
    return pdo_query($sql,$id_LoaiDanhMuc);
}


// /**
//  * Thêm loại mới
//  * @param String $ten_loai là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function loai_insert($ten_loai){
//     $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
//     pdo_execute($sql, $ten_loai);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_loai là mã loại cần cập nhật
//  * @param String $ten_loai là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function loai_update($ma_loai, $ten_loai){
//     $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
//     pdo_execute($sql, $ten_loai, $ma_loai);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_loai là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function loai_delete($ma_loai){
//     $sql = "DELETE FROM loai WHERE ma_loai=?";
//     if(is_array($ma_loai)){
//         foreach ($ma_loai as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_loai);
//     }
// }
// /**
//  * Truy vấn tất cả các loại
//  * @return array mảng loại truy vấn được
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_select_all(){
//     $sql = "SELECT * FROM loai";
//     return pdo_query($sql);
// }
// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_loai là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_select_by_id($ma_loai){
//     $sql = "SELECT * FROM loai WHERE ma_loai=?";
//     return pdo_query_one($sql, $ma_loai);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_loai là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_exist($ma_loai){
//     $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
//     return pdo_query_value($sql, $ma_loai) > 0;
// }