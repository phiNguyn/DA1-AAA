<?php

extract($dm_all);


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
<div
    class=" fixed right-12 mt-5  px-3 py-3 rounded-lg text-black text-lg bg-white font-bold flex items-center gap-x-2 shadow-md shadow-gray-300">
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
<!-- Thông báo -->


<input type="text">
<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee]">
    <header class="flex items-center justify-between gap-4 flex-wrap">
        <div>

            <h1 class="text-4xl font-semibold mb-2.5">Dashboard</h1>
            <ul class="flex items-center gap-4 ">
                <li><span>Danh Mục</span></li> /
                <span>Sửa danh mục </span><span class="ml-2 text-xl text-blue-500 font-bold"><?=$name?></span>
            </ul>
        </div>
        <div></div>
    </header>




    <!-- Table -->
    <section class="w-full mt-12 bg-white rounded-lg py-5">
        <form action="" method="post" >
            <div class="px-5 py-5 w-full flex gap-x-10">
                <div class="w-[70%]  py-5 px-12   rounded-md   shadow-sm  shadow-gray-500">
                    <div class="w-full font-semibold   ">
                        <label class="text-lg " for="name">Nhập tên sản phẩm</label>

                        <input type="text" placeholder="Ipad mini" name="name" id="" value="<?= $name ?>" required
                            class=" w-full mt-2.5 px-5 py-3 border border-blue-700 text-base  rounded-md  bg-gray-200">
                    </div>

                    <div class="flex justify-between gap-5 mt-[30px]">
                        <div class=" font-semibold  w-1/2 ">
                            <label class="text-lg " >Nội dung</label>
                           <input type="text" name="content" value="<?=$content?>" class="w-full mt-2.5 px-5 py-3 border border-blue-700 text-base  rounded-md  bg-gray-200">

                        </div>

                        <div class=" font-semibold  w-auto ">
                            <label class="text-lg " for="id_LoaiDanhMuc">Trang chủ</label>
                            <select
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                name="home" id="">
                                <option name="home"  value="0" <?=($home==0)?'selected': ''?> >Không</option>
                                <option name="home"  value="1" <?=($home==1)?'selected': ''?>>Có</option>
                            </select>

                        </div>

                    <div class=" font-semibold  w-1/2 ">
                            <label class="text-lg " for="id_LoaiDanhMuc">Loại Danh mục</label>
                            <select
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                name="id_LoaiDanhMuc" id="">
                                <?=$html_option_loaidm ?>
                            </select>

                        </div>
                    </div>

                    






                    <div class="flex justify-between mt-[30px]">

                        <button class="mt-[30px] rounded-md bg-blue-300 px-3 py-3 border border-black font-bold text-xl"
                            type="submit" name="btn-update-dm">Hoàn tất</button>
                        
                    </div>
                </div>
                <!-- hết ô 1 -->

                <!-- bắt đầu ô sản phẩm -->
                
            </div>

           
            <input type="hidden" name="id" value="<?= $id ?>">
        </form>
    </section>




</main>