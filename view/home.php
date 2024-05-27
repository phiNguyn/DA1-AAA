<?php
    $html_dssp_best='';
    foreach($dssp_best as $item){
        extract($item);
        $html_dssp_best.='
        <div
                class="mt-5 relative group w-[21%] text-center gap-y-3 rounded-[20px] py-2.5 px-2.5 flex flex-col shadow-item transition duration-700 hover:scale-[1.02] hover:shadow-itemHover max-lg:w-full">
                <div class="flex justify-center">
                    <img class="w-[222px]" src="view/img/'.$img.'" alt="" />
                </div>
                <div class="text-base font-semibold">'.$name.'</div>
                <div class="text-base font-semibold">'.number_format($price, 0, ",", ".").' ₫</div>
                <div class="flex justify-evenly">
                    <img src="view/img/natural.png" alt="" />
                    <img src="view/img/black.png" alt="" />
                    <img src="view/img/white.png" alt="" />
                    <img src="view/img/black.png  " alt="" />
                </div>
                <a href="index.php?page=detail_pro&id='.$id.'"
                    class="absolute bottom-0 left-1/2 -translate-x-1/2 opacity-0 group-hover:absolute group-hover:bottom-[30%] group-hover:left-1/2 group-hover:-translate-x-1/2 duration-700 group-hover:opacity-100 hover:bg-black hover:text-white font-extrabold border-2 text-lg border-black text-black bg-white py-2.5 px-5 rounded-full">
                    Xem ngay
                </a>
            </div>
        ';
        
    }

    $html_dssp_pk='';
    foreach($dssp_pk as $item){
        extract($item);
        if($dungluong=''){
            $dungluong='';
        }
        
        $html_dssp_pk.='
        <div
                class="relative group w-[270px] text-center gap-y-3 rounded-[20px] py-2.5 px-2.5 flex flex-col shadow-item transition duration-700 hover:scale-[1.02] hover:shadow-itemHover">
                <div class="flex justify-center">
                    <img class="w-[222px]" src="view/img/'.$img.'" alt="" />
                </div>
                <div class="text-base font-semibold">'.$name.'</div>
                <div class="text-base font-semibold">'.number_format($price, 0, ",", ".").' ₫</div>
                
                <a href="index.php?page=detail_pro&id='.$id.'"
                    class="absolute bottom-0 left-1/2 -translate-x-1/2 opacity-0 group-hover:absolute group-hover:bottom-[30%] group-hover:left-1/2 group-hover:-translate-x-1/2 duration-700 group-hover:opacity-100 hover:bg-black hover:text-white font-extrabold border-2 text-lg border-black text-black bg-white py-2.5 px-5 rounded-full">
                    Xem ngay
                </a>
            </div>
        ';
        
        
    }

    $html_loai_dm_home='';
    foreach($loai_dm_home as $item){
        extract($item);
        $html_loai_dm_home.='
        <div class="py-5 px-5 shadow-sm shadow-black rounded-md ">
                    <img class="w-full" src="view/img/'.$img.'" alt="" />
                    <p class="mt-8   text-[20px]">'.$name_LDM.':
                  '.$content.'</p>
                    <a href="index.php?page=list_product&id_LoaiDanhMuc='.$id.'"
                        class="w-fit flex items-center mt-8 rounded-full bg-black font-semibold text-white py-2.5 px-6 text-lg transition duration-300 group hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><span
                           >Xem Ngay</span>
                        <span class="ml-2 group-hover:-rotate-45 duration-500"><i
                                class="bx bx-md bx-right-arrow-alt"></i></span>
                    </a>
                </div>
        ';
    }
?>

    <div class="swiper w-[1200px] h-auto mx-auto mySwiper max-lg:w-full">
        <div class="swiper-wrapper">
            <!-- slide -->

            <?php
        $slider=get_slider();
        foreach ($slider as $sl){
            echo '
            <div class="swiper-slide w-full">
                <div class="w-full h-auto">
                    <div class="w-full">
                        <img class="w-full" src="view/img/'.$sl['img'].'" alt="" />
                    </div>
                </div>


                <div class="text-center">
                    <h1 class="text-5xl font-extrabold mt-6">
                      '.$sl['title'].'
                    </h1>
                    <p class="mt-3">'.$sl['subtitle'].'</p>
                    <button
                        class="mt-6 text-xl font-bold text-white bg-black rounded-full py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
                        <a href="">Shop Now</a>
                    </button>
                </div>
            </div>
            ';
        }
        
        ?>
           
           



        </div>
        <div
            class="swiper-button-next !top-[40%] !bg-[rbg(255,255,255,0.9)] hover:!bg-black duration-300  !w-[70px] !h-[70px] !text-white !text-5xl  !rounded-full !p-[5px] !border !border-black">
        </div>
        <div class="swiper-button-prev !top-[40%] !bg-[rbg(255,255,255,0.9)] hover:!bg-black !w-[70px] !h-[70px] !text-white !text-xl  !rounded-full !p-[5px] !border !border-black">
        </div>
    </div>

    <!-- bộ sưu tập -->
    <section class="w-full py-10">
        <div>
            <h3 class="text-2xl font-bold">Bộ sưu tập mới</h3>
            <div class="mt-7 grid grid-cols-3 gap-5 max-lg:grid-cols-2 max-md:grid-cols-1  ">
               <?=$html_loai_dm_home?>
                
            </div>
        </div>
    </section>

    <!-- Sản phẩm nổi bật -->
    <section class="w-[1240px] mx-auto h-auto py-10 max-lg:w-full">
        <div class="flex justify-between items-center ">
            <h3 class="font-bold text-2xl">Sản phẩm nổi bật</h3>
            <a href="index.php?page=list_product&id_LoaiDanhMuc=1"
                class="w-fit flex items-center mt-8 rounded-full bg-black font-semibold text-white px-5 py-2.5  text-lg transition duration-300 group hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><span
                 >Xem tất cả</span>
                <span class="ml-2 group-hover:-rotate-45 duration-500"><i
                        class="bx bx-md bx-right-arrow-alt"></i></span>
            </a>
        </div>

        <div class="w-full   mx-auto flex justify-between mt-8 max-lg:grid max-lg:grid-cols-3 gap-x-5 max-md:grid-cols-2">
            
            <?=$html_dssp_best?>
        </div>
    </section>

    <!-- Phụ kiện -->
    <section class="w-[1240px] mx-auto h-auto py-10 max-lg:w-full">
        <div class="flex justify-between items-center">
            <h3 class="font-bold text-2xl">Phụ kiện</h3>
            <a href="index.php?page=list_product&id_LoaiDanhMuc=5"
                class="w-fit flex items-center mt-8 rounded-full bg-black font-semibold text-white px-5 py-2.5  text-lg transition duration-300 group hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><span
                 >Xem tất cả</span>
                <span class="ml-2 group-hover:-rotate-45 duration-500"><i
                        class="bx bx-md bx-right-arrow-alt"></i></span>
            </a>
        </div>

        <div class="w-full   mx-auto flex justify-between mt-8">
            
            <?=$html_dssp_pk?>
        </div>
    </section>
