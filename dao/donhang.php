<?php
require_once 'pdo.php';

function bill_insert_id($iduser,$madonhang,$nguoidat_ten,$nguoidat_email,$nguoidat_phone,$nguoidat_diachi,$nguoinhan_ten,$nguoinhan_phone,$nguoinhan_diachi,$total,$ship,$voucher,$tong_thanhtoan,$pttt,$ngaymua,$trang_thai){
    $sql = "INSERT INTO donhang(iduser,madonhang,nguoidat_ten,nguoidat_email,nguoidat_phone,nguoidat_diachi,nguoinhan_ten,nguoinhan_phone,nguoinhan_diachi,total,ship,voucher,tong_thanhtoan,pttt,ngaymua,trang_thai) VALUES ( ?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,? )";
   return pdo_execute_id($sql,$iduser, $madonhang,$nguoidat_ten,$nguoidat_email,$nguoidat_phone,$nguoidat_diachi,$nguoinhan_ten,$nguoinhan_phone,$nguoinhan_diachi,$total,$ship,$voucher,$tong_thanhtoan,$pttt,$ngaymua,$trang_thai);
}

// lấy hết đơn đơn hàng cua nguoi dung
function get_all_donhang($iduser){
    $sql="SELECT * FROM donhang where iduser=?";
   return pdo_query($sql,$iduser);
}
// lay thong tin cua don hang theo id
function get_all_donhang_id($id){
    $sql="SELECT * FROM donhang where id=? order by id desc";
    return pdo_query_one($sql,$id);
}

// Lấy trang thái
function trangthai(){
    $sql="SELECT * FROM trangthai ";
    return pdo_query($sql);
}

function payment(){
    $sql="SELECT * FROM payment ";
    return pdo_query($sql);
}

function payment_id($payment_id){
    $sql="SELECT * FROM payment where payment_id=? ";
    return pdo_query_one($sql,$payment_id);
}
function trangthai_id($trangthai_id){
    $sql="SELECT * FROM trangthai where trangthai_id=? ";
    return pdo_query_one($sql,$trangthai_id);
}

// =================================== phần admin
// lấy hết tất cả đơn hàng
function admin_getAll_DH(){
    $sql="SELECT * FROM donhang order by trang_thai ";
    return pdo_query($sql);
}

function admin_dh_new(){
    $sql="SELECT * FROM donhang where trang_thai=1 order by id desc";
    return pdo_query($sql);
}
function admin_dh_old(){
    $sql="SELECT * FROM donhang where trang_thai=2 order by id desc";
    return pdo_query($sql);


}

// trang đơn hàng thành công
function admin_dh_complete(){
    $sql="SELECT * FROM donhang where trang_thai=3 order by id desc";
    return pdo_query($sql);
}

// cạp nhật tình trang đơn hang
function update_donhang($id,$trang_thai){
    $sql="UPDATE donhang SET trang_thai=? where id=?  ";
    pdo_execute($sql,$id,$trang_thai);
}

function count_dh_new(){
    $sql="SELECT count(*) from donhang where trang_thai=1";
    return pdo_query_value($sql);
}


// lấy ra số lượng đơn chưa xử lý
