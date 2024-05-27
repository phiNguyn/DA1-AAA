<?php
    $html_option_dm='';
    foreach($option_dm as $item){
       
        $html_option_dm.='
        <option  value="'.$item['id'].'">'.$item['name'].'</option>
        ';

    }

    $html_option_loaidm='';
    foreach($option_loaidanhuc as $ldm){
        $html_option_loaidm.='
        <option name=""  value="'.$ldm['id'].'">'.$ldm['name_LDM'].'</option>
        ';
    }

    
    // == Phần show dung lương ==//
    $all_dungluong=check_all_dungluong();
    $html_check_dungluong='';
    foreach($all_dungluong as $item){
        extract($item);
        $html_check_dungluong.='
        <div class="flex mt-2 pl-1 items-center ">
                            <input  id="'.$dungluong.'" class="peer/'.$dungluong.' w-5 " type="checkbox" name="dungluong[]" value="'.$dungluong.'" />
                            <label for="'.$dungluong.'" class="peer-checked/'.$dungluong.':text-sky-500 text-lg">'.$dungluong.'</label>
                        </div>
        ';
    }

    $all_color=check_all_color();
    $html_check_color='';
    foreach($all_color as $color){
       
        $html_check_color.='
        <div class="flex pl-1 items-center ">
                            <input  id="'.$color['color'].'" class="peer/'.$color['color'].' w-5 " type="checkbox" name="color[]" value="'.$color['color'].'" />
                            <label for="'.$color['color'].'" class="peer-checked/'.$color['color'].':text-sky-500 text-lg">'.$color['color'].'</label>
                        </div>
        ';
    }
    
?>
<!-- thông báo -->
<?php if(isset($success)) : ?>
<div
    class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-white font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
    <i class='text-white bx bx-md bx-check rounded-full bg-green-500'></i>
    <span><?=$success?></span>
</div>
<?php endif; unset($success);?>
<!-- Thông báo -->

<?php if(isset($eror)) : ?>
<div
    class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-red-300 font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
    <i class='text-white bx bx-md bx-error-circle rounded-full bg-red-500'></i>
    <span><?=$eror?></span>
</div>
<?php endif; unset($eror);?>

<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee]">
    <header class="flex items-center justify-between gap-4 flex-wrap">
        <div>

            <h1 class="text-4xl font-semibold mb-2.5">Dashboard</h1>
            <ul class="flex items-center gap-4 ">
                <li><a href="">Thêm sản phẩm</a></li> / <a href="index.php?page=sanpham">Quay lại</a>
            </ul>
        </div>
        <div></div>
    </header>




    <!-- Table -->
    <section class="w-full mt-12 bg-white rounded-lg py-5">
        <form action="index.php?page=add_pro" method="post" enctype="multipart/form-data">
            <div class="px-5 py-5 w-full flex gap-x-10">
                <div class="w-[70%]  py-5 px-12   rounded-md   shadow-sm  shadow-gray-500">
                    <div class="w-full font-semibold   ">
                        <label class="text-lg " for="name">Nhập tên sản phẩm</label>

                        <input required
                            class=" w-full mt-2.5 px-5 py-3 border border-blue-700 text-base  rounded-md  bg-gray-200"
                            type="text" placeholder="Ipad mini" name="name" id="">
                    </div>

                    <div class="flex mt-[30px] gap-x-5">
                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Giá</label>

                            <input required
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                type="text" placeholder="Ipad mini" name="price" id="">
                        </div>

                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Giá giảm (Nếu có)</label>

                            <input
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                type="text" placeholder="Ipad mini" name="price_sale" id="">
                        </div>

                    </div>

                    

                    <div class="flex mt-[30px] gap-x-5">
                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Lượt xem</label>

                            <input
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                type="text" placeholder="Ipad mini" name="view" id="">
                        </div>

                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Danh mục</label>
                            <select
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                name="iddm" id="">
                                <?=$html_option_dm?>
                            </select>

                        </div>

                    </div>
                    
                    <!-- Phần dung lượng -->
                

                <div class="mt-[30px]">
                <h1 class="font-bold text-lg">Chọn màu</h1>
               
                    <div class="w-full grid grid-cols-3 p-2   gap-5  bg-gray-200 rounded-md">
                       
                        <?=$html_check_dungluong?>
                    </div>

                    </div>    

              
                    <div class="mt-[30px]">
                <h1 class="font-bold text-lg">Chọn màu</h1>
                <div class="w-full grid grid-cols-3 p-2  gap-5  bg-gray-200 rounded-md">
                    <?=$html_check_color?>
                </div>
                    </div>

                <div class="w-full font-semibold mt-[30px]  ">
                            <label class="text-lg " for="name">Loại danh mục</label>
                            <select
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                name="id_LoaiDanhMuc" id="">
                               <?=$html_option_loaidm?>
                            </select>

                        </div>


                    <button class="mt-[30px] rounded-md bg-blue-300 px-3 py-3 border border-black font-bold text-xl"
                        type="submit" name="btn-add-pro">Hoàn tất</button>
                </div>
                <!-- hết ô 1 -->

                <!-- bắt đầu ô sản phẩm -->
                <div class="w-[calc(30%-40px)] rounded-lg shadow-md shadow-gray-700  bg-yellow-200 px-5 py-5">
                    <div class="w-full">
                        <label class="text-lg font-bold">Chọn ảnh gốc</label>
                        <input name="img" type="file" required
                            class=" mt-2.5 border border-black bg-gray-200  rounded-md px-2 py-2 w-full border-stroke file:mr-3">
                    </div>

                    <div class="w-full mt-5 ">
                        <label class="text-lg font-bold">Ảnh thư viện</label>
                        <input type="file"
                            class=" mt-2.5 border border-black bg-gray-200  rounded-md px-2 py-2 w-full border-stroke file:mr-3">
                    </div>
                </div>
            </div>
<input type="hidden" name="img" value="<?$img?>">
        </form>
    </section>


</main>