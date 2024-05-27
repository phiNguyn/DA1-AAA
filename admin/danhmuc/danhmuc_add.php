<?php
    $html_option_loai_dm='';
    foreach($admin_loai_dm as $item){
       
        $html_option_loai_dm.='
        <option  value="'.$item['id'].'">'.$item['name_LDM'].'</option>
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
<!-- Thông báo -->

<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee]">
    <header class="flex items-center justify-between gap-4 flex-wrap">
        <div>

            <h1 class="text-4xl font-semibold mb-2.5">Dashboard</h1>
            <ul class="flex items-center gap-4 ">
                <li><a href="">Thêm sản phẩm</a></li> / <a href="index.php?page=danhmuc">Quay lại danh mục</a>
            </ul>
        </div>
        <div></div>
    </header>




    <!-- Table -->
    <section class="w-full mt-12 bg-white rounded-lg py-5">
        <form action="index.php?page=danhmuc_add" method="post" enctype="multipart/form-data">
            <div class="px-5 py-5 w-full flex gap-x-10">
                <div class="w-[70%]  py-5 px-12   rounded-md   shadow-sm  shadow-gray-500">
                    <div class="w-full font-semibold   ">
                        <label class="text-lg " for="name">Tên danh mục</label>

                        <input required
                            class=" w-full mt-2.5 px-5 py-3 border border-blue-700 text-base  rounded-md  bg-gray-200"
                            type="text" placeholder="Ipad mini" name="name" id="">
                    </div>

                    <div class=" mt-[30px] gap-x-5">
                        <div class="w-full font-semibold   ">
                            <label class="text-lg " for="name">Nội dung</label>

                            <textarea 
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                type="text" placeholder="Ipad mini" name="content" id=""></textarea>

                        </div>



                    </div>



                    <div class="flex mt-[30px] gap-x-5">
                        <div class="w-1/2 font-semibold  flex flex-col ">
                            <label class="text-lg " for="name">Xuất hiện trang chủ</label>

                            <!-- <input
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                type="text" placeholder="Ipad mini" name="home" id=""> -->
                            <select name="home" id=""
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200">
                                <option name="home" value="0">Có</option>
                                <option name="home" value="1">Không</option>
                            </select>
                        </div>

                        <div class="w-1/2 font-semibold   ">
                            <label class="text-lg " for="name">Danh mục</label>
                            <select
                                class="w-full mt-2.5 px-5 py-3 border border-gray text-base    rounded-md     bg-gray-200"
                                name="id_LoaiDanhMuc" id="">
                                <?=$html_option_loai_dm?>
                            </select>

                        </div>

                    </div>

                    <button class="mt-[30px] rounded-md bg-blue-300 px-3 py-3 border border-black font-bold text-xl"
                        type="submit" name="btn-add-dm">Hoàn tất</button>
                </div>
                <!-- hết ô 1 -->

                <!-- bắt đầu ô sản phẩm -->
                
            </div>

        </form>
    </section>


</main>