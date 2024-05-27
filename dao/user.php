<?php
require_once 'pdo.php';

// function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
//     $sql = "INSERT INTO khach_hang(ma_kh, mat_khau, ho_ten, email, hinh, kich_hoat, vai_tro) VALUES (?, ?, ?, ?, ?, ?, ?)";
//     pdo_execute($sql, $ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1);
// }

// function khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
//     $sql = "UPDATE khach_hang SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
// }

// function khach_hang_delete($ma_kh){
//     $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function khach_hang_select_all(){
//     $sql = "SELECT * FROM khach_hang";
//     return pdo_query($sql);
// }

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function khach_hang_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }

// ======================================
function get_All_users(){
    $sql="SELECT * FROM user where role= 0 ";
    return pdo_query($sql);
}
// ===========================


// ===========================
// phàn user
function check_taikhoan_email($email){
    $sql="SELECT * FROM user where email=?   ";
    return pdo_query_one($sql,$email);
}

function check_taikhoan_phone($phone){
    $sql="SELECT * FROM user where phone=?   ";
    return pdo_query_one($sql,$phone);
}

function user_insert($name,$email,$phone,$password){

    $sql="INSERT INTO user(name,email,phone,password) VALUES(?,?,?,?)";
    pdo_execute($sql,$name,$email,$phone,$password);
}

function  check_user($email,$password){
    $sql="SELECT * FROM user where email=? and password=?";
  return  pdo_query_one($sql,$email, $password);
}

function cmt_name_idsp($id){
    $sql="SELECT name from user where id=?";
    return pdo_query_value($sql,$id);
}

function get_user($id){
    $sql="SELECT * FROM user where id=?";
    return pdo_query($sql,$id);
}


// đếm tài khoản
function count_user(){
    $sql="SELECT COUNT(*) FROM user where role=0 ";
    return pdo_query_value($sql);
}


function user_update($name,$email,$phone,$address,$role,$id){
    $sql = "UPDATE user SET name=?,email=?,phone=?,address=?,role=?, where id=?";
    pdo_execute($sql,$name,$email,$phone,$address,$role,$id);
}
