<?php

extract($sp_edit_func);

$html_option_dm = '';
foreach ($option_dm as $item) {
    $selected = ($iddm == $item['id']) ? "selected" : "";
    $html_option_dm .= '
        <option ' . $selected . '  value="' . $item['id'] . '">' . $item['name'] . '</option>
        ';
}


$html_option_loaidm = '';
foreach($option_loaidanhuc as $ldm){
    $selected = ($id_LoaiDanhMuc == $ldm['id']) ? "selected" : "";
    $html_option_loaidm .= '
    <option '.$selected .' value="'.$ldm['id'].'">'.$ldm['name_LDM'].'</option>
    ';
}






?>
<!-- thông báo -->
<?php if (isset($success)) : ?>
    <div class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-white font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
        <i class='text-white bx bx-md bx-check rounded-full bg-green-500'></i>
        <span><?= $success ?></span>
    </div>
<?php endif;
unset($success); ?>
<!-- Thông báo -->

<?php if(isset($eror)) : ?>
<div
    class="fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-red-300 font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
    <i class='text-white bx bx-md bx-error-circle rounded-full bg-red-500'></i>
    <span><?=$eror?></span>
</div>
<?php endif; unset($eror);?>


<input type="text">
<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee]">
    <header class="flex items-center justify-between gap-4 flex-wrap">
        <div>

            <h1 class="text-4xl font-semibold mb-2.5">Dashboard</h1>
            <ul class="flex items-center gap-4 ">
                <li><span>Sửa sản phẩm</span></li> / <span class="text-blue-300"><?=$name?></span>
            </ul>
        </div>
        <div></div>
    </header>




    <!-- Table -->
    <section class="w-full mt-12 bg-white rounded-lg py-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="px-5 py-5 w-full flex gap-x-10">
                <div class="w-[70%]  py-5 px-12   rounded-md   shadow-sm  shadow-gray-500">

                <div class="flex mt-[30px] gap-x-5">
                    <div class="w-1/2 font-semibold   ">
                        <label class="text-lg " for="name">Nhập tên sản phẩm</label>

                        <input type="text" placeholder="Ipad mini" name="name" id="" value="<?= $name ?>" required class=" w-full mt-2.5 px-5 py-3 border border-blue-700 text-base  rounded-md  bg-gray-200">
                    </div>
                    <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Lượt xem</label>

                            <input value="<?= $view ?>" class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200" type="text" placeholder="Ipad mini" name="view" id="">
                        </div>
                </div>
                    <div class="flex mt-[30px] gap-x-5">
                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Giá</label>

                            <input value="<?= $price ?>" required class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200" type="text" placeholder="Ipad mini" name="price" id="">
                        </div>



                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Giá giảm (Nếu có)</label>

                            <input value="<?= $price_sale ?>" class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200" type="text" placeholder="Ipad mini" name="price_sale" id="">
                        </div>

                    </div>

                    <!-- Phần dung lượng -->
                    <div class="mt-[30px] font-bold text-xl">
                    <h1>Chọn Dung lượng</h1>
                        <div class="w-full grid grid-cols-3 p-2 mt-2 gap-x-5  bg-gray-200 rounded-md">
                            <?php
                            $dungluongs = check_all_dungluong();

                            foreach ($dungluongs as $dungluong) {
                                $dungluongExists = get_dungluong_theo_masp_ctsp($sp_edit_func['id'],$dungluong['dungluong']);
                                $isChecked = count($dungluongExists) > 0 ? "checked" : "";
                            ?>
                                <div class="flex p-2 items-center ">
                                    <input id="<?php echo $dungluong['dungluong']; ?>" class="peer/<?php echo $dungluong['dungluong']; ?> w-5 " type="checkbox" name="dungluong[]" value="<?php echo $dungluong['dungluong']; ?>" <?php echo $isChecked; ?> />
                                    <label for="<?php echo $dungluong['dungluong']; ?>" class="peer-checked/<?php echo $dungluong['dungluong']; ?>:text-sky-500 text-lg"><?php echo $dungluong['dungluong']; ?></label>
                                </div>
                            <?php
                            }
                            ?>




                        </div> <!-- Phần dung lượng -->
                    </div>

                        <!-- Phần màu sắc -->
                        <div class="mt-[30px] font-bold text-xl">
                            <h1>Chọn Màu</h1>
                        <div class="w-full p-2 grid grid-cols-3 mt-2  gap-x-5  bg-gray-200 rounded-md">

                            <?php
                            $colors = check_all_color();

                            foreach ($colors as $color) {
                                $colorExists = get_color_theo_masp_ctsp($sp_edit_func['id'],$color['color']);
                                $isChecked = count($colorExists) > 0 ? "checked" : "";
                            ?>
                                <div class="flex p-2  items-center ">
                                    <input id="<?php echo $color['color']; ?>" class="peer/<?php echo $color['color']; ?> w-5 " type="checkbox" name="color[]" value="<?php echo $color['color']; ?>" <?php echo $isChecked; ?> />
                                    <label for="<?php echo $color['color']; ?>" class="peer-checked/<?php echo $color['color']; ?>:text-sky-500 text-lg"><?php echo $color['color']; ?></label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        </div>

                    

                    <div class="flex mt-[30px] gap-x-5">
                        

                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Danh mục</label>
                            <select class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200" name="iddm" id="">
                                <?= $html_option_dm ?>
                            </select>

                        </div>

                        <div class=" font-semibold  w-1/2 ">
                            <label class="text-lg " for="id_LoaiDanhMuc">Loại Danh mục</label>
                            <select class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200" name="id_LoaiDanhMuc" id="">
                                <?=$html_option_loaidm ?>
                            </select>

                        </div>

                    </div>

                   
<div class="flex justify-between mt-[30px]">

    <button class="mt-[30px] rounded-md bg-blue-300 px-3 py-3 border border-black font-bold text-xl" type="submit" name="btn-update-pro">Hoàn tất</button>
    
</div>
                </div>
                <!-- hết ô 1 -->

                <!-- bắt đầu ô sản phẩm -->
                <div class="w-[calc(30%-40px)] rounded-lg shadow-md shadow-gray-700  bg-yellow-200 px-5 py-5">
                    <div class="w-full ">
                        <label class="text-lg font-bold">Chọn ảnh gốc</label>
                        <input name="img" type="file" class=" mt-2.5 border border-black bg-gray-200  rounded-md px-2 py-2 w-full border-stroke file:mr-3">
                        <img class="" src="../view/img/<?= $img ?>" alt="">
                    </div>

                    <div class="w-full mt-5 ">
                        <label class="text-lg font-bold">Ảnh thư viện</label>
                        <input type="file" class=" mt-2.5 border border-black bg-gray-200  rounded-md px-2 py-2 w-full border-stroke file:mr-3">
                            <div class=" grid grid-cols-3 gap-2">
                                
                                <?php
                                $all_img_gallery=get_all_gallery($id);
                                foreach($all_img_gallery as $pro_img){
                                    echo ' <img class="w-full h-full" src="../view/img/'.$pro_img['img'].'" alt="">';
                                }
                                
                                ?>
                            </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="img" value="<?= $img ?> ">
            <input type="hidden" name="id" value="<?= $id ?>">
        </form>
    </section>




</main>