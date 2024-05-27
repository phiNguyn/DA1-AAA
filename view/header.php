<?php
    if(isset($_SESSION['user'])&&(count($_SESSION['user'])>0)){
        extract($_SESSION['user']);
        $html_acc='<a class="" href="index.php?page=myaccount">'.$name.'</a>';
    }
    else{
        $html_acc=' <a href="index.php?page=login"><img src="view/img/human.svg" alt="" />'; 
    }
   

    

    
    $html_count_cart=tongSoSanPhamTrongGio();
  
    $menu_ldm=loai_dm();
   
$html_menu='';

    foreach($menu_ldm as $item){
        $menu_danhmuc=menu_dm($item['id']);
        if(count($menu_danhmuc)>0){
            $group='group';
        }else{
            $group='';
        }
        $html_menuDM='';
        foreach($menu_danhmuc as $menuDM){

            $all_sp_iddm=all_sp_dm($menuDM['id']);
            $html_sp_iddm='';
            foreach($all_sp_iddm as $sp){
                $html_sp_iddm.='
                <li><a href="index.php?page=detail_pro&id='.$sp['id'].'" class="mega-sub-item">'.$sp['name'].'</a></li>
                ';
            }
                $html_menuDM.='
                <ul class="p-2">
                        <li><a href="index.php?page=list_product&iddm='.$menuDM['id'].'" class="mega-sub-item-title">'.$menuDM['name'].'</a></li>
                        '.$html_sp_iddm.'
                        
                       </ul>
                ';

              
           
        }
        $html_menu.='

        <div
                        class="'.$group.' flex h-full  justify-center items-center   text-lg font-semibold rounded-lg p-2.5 cursor-pointer ">
                   <a href="index.php?page=list_product&id_LoaiDanhMuc='.$item['id'].' " >'.$item['name_LDM'].'</a>
                   <div class=" flex justify-evenly gap-x-5 w-full py-5  absolute z-50 top-full left-0 bg-white text-black  opacity-0 invisible  group-hover:opacity-100 group-hover:visible group-hover:mt-0  border-t border-gray-500 ">
                    '.$html_menuDM.'
                  </div>
        
                  </div>
        ';
    }
    
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="view/css/output.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Home</title>
</head>

<body>
    <div class="w-[1480px] max-md:w-full  px-5 my-0 mx-auto font-roboto max-lg:w-full lg:mx-auto ">
        <header class="w-full  pt-5 ">
            <nav class="w-full h-20 flex  justify-between relative">
                <div class="w-1/4 h-full ">
                    <div class=" h-full relative">
                        <a href="index.php"><img class="w-auto h-full px-5 absolute top-0 left-0 "
                                src="view/img/logo.png" alt="" /></a>
                    </div>

                </div>
                
                <div class="max-lg:hidden w-full h-full flex px-4 justify-center  items-center">
                    <?=$html_menu?>
                    <div class="text-lg font-semibold"><a href="index.php?page=list_product">All Product</a></div> 
                    
                </div>
        
                <div class="w-1/4 flex ml-auto mr-10   justify-end items-center gap-x-2">
                    <div class="text-left max-lg:text-xs">
                        <?=$html_acc?>
                    </div>
                    <button class="collapsible"><a href=""></a><img src="view/img/search.svg" alt="" /></button>
                    <div class="relative"><a href="index.php?page=cart"><img src="view/img/cart.svg" alt="" /></a> <span class="w-6 h-6 text-white bg-black text-center rounded-full  absolute -top-3 -right-5"><?=$html_count_cart?></span></div>
                </div>

                <div class="hidden w-fit max-lg:flex justify-center items-center"><i class='bx bx-lg bx-menu'></i></div>
            </nav>
            <div  class="content  overflow-hidden max-h-0  w-[450px] ml-auto duration-500">
        
            
                <form class="search w-96  relative" action="index.php?page=list_product" method="post">
                    <input class="w-full border border-black p-2 rounded-lg" type="text" name="keyword" value="" placeholder="Tìm kiếm ... ">
                    
                </form>
            </div>
          
        </header>
       

      
<script>

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = document.getElementsByClassName("content")[0];

    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<main class="w-full h-auto py-10">