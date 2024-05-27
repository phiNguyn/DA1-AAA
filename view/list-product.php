<?php
    $html_all_pro='';
    foreach($get_all_pro as $item){
        extract($item);
        $html_all_pro.='
        
        <div
                class="relative group mt-8 w-[270px] text-center gap-y-3 rounded-[20px] py-2.5 px-2.5 flex flex-col shadow-item transition duration-700 hover:scale-[1.02] hover:shadow-itemHover max-lg:w-[calc(100%-25px)]">
                <div class="flex justify-center">
                    <img class="w-[222px]" src="view/img/'.$img.'" alt="" />
                </div>
                <div class="text-base font-semibold">'.$name.'</div>
                <div class="text-base font-semibold">'.number_format($price, 0, ",", ".").' đ</div>
                <div class="flex justify-evenly">
                    <img src="view/img/natural.png" alt="" />
                    <img src="view/img/black.png" alt="" />
                    <img src="view/img/white.png" alt="" />
                    <img src="view/img/black.png  " alt="" />
                </div>
                <a href="index.php?page=detail_pro&id='.$id.'"
                    class="absolute bottom-0 left-1/2 -translate-x-1/2 opacity-0 group-hover:absolute group-hover:bottom-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 duration-700 group-hover:opacity-100 hover:bg-black hover:text-white font-extrabold border-2 text-lg border-black text-black bg-white py-2.5 px-5 rounded-full">
                    Xem ngay
                </a>
            </div> 
        
        ';
    }

?>

    <div class="w-fit font-bold text-2xl"><?=$tittle?></div>
    <div class="w-full mt-12 p-5 bg-white rounded-[20px] shadow-sm shadow-black flex justify-between items-center ">
        <div class="w-[calc(100%-200px)] h-full  flex justify-between  font-semibold text-lg gap-x-5 max-md:grid max-md:grid-cols-3 "><?php
       if($tittle ==='Tất cả sản phẩm') {
        $all_dm=admin_dm();
        foreach($all_dm as $catelogy_all){
            echo '
           
            <a href="index.php?page=list_product&iddm='.$catelogy_all['id'].'">'.$catelogy_all['name'].'</a>
            
            ';
        }
       
       }
     else {
        $menu_danhmuc=menu_dm($id_LoaiDanhMuc);
        foreach($menu_danhmuc as $catelogy){
            echo '<a href="index.php?page=list_product&iddm='.$catelogy['id'].'">'.$catelogy['name'].'</a>';
        }
       }
       ?></div>
        <select class="w-fit p-2.5 border border-black rounded-md font-bold" name="" id="">
            <option class="w-full h-12 p-2.5" value="">Sắp xếp theo</option>
            <option value=""><a href="index.php?page=price=1">Giá thấp nhất</a></option>
        </select>
    </div>

    <section class="w-full h-auto py-10">


        <div class="w-[1240px] mx-auto grid grid-cols-4 max-lg:w-full  max-lg:grid-cols-3 max-md:grid-cols-2">
            <!--list  -->
            
            <?=$html_all_pro?>

            

            
            


        </div>
        <!--list  -->





    </section>
