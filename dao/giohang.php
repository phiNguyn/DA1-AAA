<?php
require_once 'pdo.php';

function cart_insert($name,$img,$price,$dungluong,$color,$soluong,$thanhtien,$idbill,$iduser,$id_pro){
    $sql = "INSERT INTO ct_donhang(name,img,price,dungluong,color,soluong,thanhtien,idbill,iduser,id_pro) VALUES (?,?,?, ?, ?, ?, ?, ?, ?,?)";
 return   pdo_execute($sql,$name,$img,$price,$dungluong,$color,$soluong,$thanhtien,$idbill,$iduser,$id_pro);
}

function getTongDonHang(){
    $tong=0;
     foreach($_SESSION['cart'] as $sp){ 
        extract($sp);
        $tien_1sp=(INT)$price*(INT)$soluong;
        $tong+= $tien_1sp;
     } 
     return $tong;
 }


 function tongSoSanPhamTrongGio(){
    $tongSanPham=0;
    foreach($_SESSION['cart'] as $sp){
        extract($sp);
        $tongSanPham+=$soluong;
    }
    return $tongSanPham;
}

function get_all_sp_iddh($idbill){
    $sql="SELECT * FROM ct_donhang where idbill=?";
    return pdo_query($sql,$idbill);
}