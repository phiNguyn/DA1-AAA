<?php
ob_start();
 if(isset($_SESSION['admin'])&&(count($_SESSION['admin'])>0)){
  extract($_SESSION['admin']);
  $html_name_admin='<div class="user_name_admin"><b>Hello '.$name.'</b></div>';
  
 }else{
  $html_name_admin='';
 }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/css/output.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>

    <div class="w-full h-full font-roboto ">
        <div class="fixed top-0 left-0 w-[230px] h-full z-50 transition-all ">
            <a class="text-2xl font-bold h-14  flex  items-center pl-2 pb-5 pt-5 box-content" href="index.php">
                <img src="../view/img/logo.png" alt="">
            </a>
            <ul class="w-full mt-12 px-2 font-bold flex flex-col gap-y-2">
                <li
                    class="h-12 ml-[6px] px-2 py-2  rounded-xl  hover:bg-blue-400 hover:text-white shadow-sm shadow-gray-500 ">
                    <a class="w-full h-full flex items-center gap-2 text-lg " href="index.php">
                        <i class='bx bx-sm bx-home'></i>
                        Trang chủ</a>
                </li>
                <li class="collapsible h-12 ml-[6px]  p-2 rounded-xl  hover:bg-blue-500 hover:text-white cursor-pointer">
                    <span class=" w-full h-full flex items-center justify-between rounded-[48px]  text-base transition-all"
                        >
                        <i class='bx bx-sm bx-category'></i>
                        Quản lý danh mục <i class='bx bx-sm bx-chevron-right'></i></span>
                         

                </li>

                <li class="content overflow-hidden max-h-0 duration-300  ml-[6px]   rounded-xl  ">
                    <a class=" w-full h-full flex items-center py-2 pl-5 rounded-xl gap-2 text-lg hover:bg-blue-500 hover:text-white "
                        href="index.php?page=danhmuc">
                        
                      -  Danh mục</a>
                         
                        <a class=" w-full h-full flex items-center py-2 pl-5 rounded-xl gap-2 text-lg hover:bg-blue-500 hover:text-white "
                        href="index.php?page=loai_danh_muc">
                        
                      - Loại Danh mục</a>
                </li>





                

                <li class="h-12 ml-[6px] px-2 py-2 rounded-xl  hover:bg-blue-500 hover:text-white">
                    <a class="w-full h-full flex items-center rounded-[48px] gap-2 text-lg transition-all"
                        href="index.php?page=user">
                        <i class='bx bx-sm bx-user'></i>
                        Tài khoản</a>
                </li>
                <li class="h-12 ml-[6px] px-2 py-2 rounded-xl  hover:bg-blue-500 hover:text-white">
                    <a class="w-full h-full flex items-center rounded-[48px] gap-2 text-lg transition-all"
                        href="index.php?page=sanpham">
                        <i class='bx bx-sm bx-package'></i>
                        Sản Phẩm</a>
                </li>

                <li class="h-12 ml-[6px] px-2 py-2 rounded-xl  hover:bg-blue-500 hover:text-white">
                    <a class="w-full h-full flex items-center rounded-[48px] gap-2 text-lg transition-all" href="index.php?page=donhang">
                        <img class=" flex justify-center" src="../view/icon/truck.svg" alt="">
                        Đơn hàng</a>
                </li>

                <li class="h-12 ml-[6px] px-2 py-2 rounded-xl  hover:bg-blue-500 hover:text-white">
                    <a class="w-full h-full flex items-center rounded-[48px] gap-2 text-lg transition-all" href="index.php?page=comment">
                        <i class='bx bx-sm bx-chat'></i>
                        Bình luận</a>
                </li>
                <li class="h-12 ml-[6px] px-2 py-2 rounded-xl  hover:bg-blue-500 hover:text-white">
                    <a class="w-full h-full flex items-center rounded-[48px] gap-2 text-lg transition-all" href="index.php?page=doanhthu">
                    <i class='bx bx-sm bx-analyse'></i>
                        Thống kê </a>
                </li>
            </ul>
            <ul class="w-full px-2 mt-12 text-red-500 font-bold text-lg">
                <li class="h-12 ml-[6px] px-1 py-1">
                    <a class="w-full h-full flex items-center rounded-[48px] gap-2 text-lg transition-all" href="index.php?page=logout">
                        <img class="rotate-180 flex justify-center" src="../view/icon/logout.svg" alt="">
                        Logout</a>
                </li>
            </ul>

            
            
        </div>

        <div class="relative w-[calc(100%-230px)] left-[230px] transition-all">
            <!-- nav nè -->
            <nav class="h-14 bg-white pr-6 flex items-center gap-6 sticky top-0 left-0 z-50">
                <img src="../view/icon/menu-burger.svg" alt="">
                <form class="w-full max-w-[400px] mr-auto" action="">
                    <div class="h-9 flex items-center">
                        <input class="w-full h-full px-4 border border-blue-300 focus:border-red-40 text-black"
                            placeholder="gõ vào" type="text">
                        <button class="w-20 h-full flex items-center justify-center rounded-r-[32px] bg-blue-400"><img
                                src="../view/icon/search.svg" alt=""></button>
                    </div>

                </form>
                <div>
                    <h1 class="text-xl"><?=$html_name_admin?></h1>
                </div>
            </nav>
            <!-- hết nav rồi -->

            <!-- content ở đây -->

            