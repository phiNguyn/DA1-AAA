<?php
   extract($get_one_dl);
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
<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee]">
    <header class="flex items-center justify-between gap-4 flex-wrap">
        <div>

            <h1 class="text-4xl font-semibold mb-2.5">Dashboard</h1>
            <ul class="flex items-center gap-4 ">
                <li><span >Sửa sản phẩm</span></li> / <span>Dung lượng</span>
            </ul>
        </div>
        <div></div>
    </header>




    <!-- Table -->
    <section class="w-full mt-12 bg-white rounded-lg py-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="px-5 py-5 w-full flex gap-x-10">
                <div class="w-[70%]  py-5 px-12   rounded-md   shadow-sm  shadow-gray-500">
                    <div class="w-full font-semibold   ">
                        <label class="text-lg " for="name">Nhập dung lượng</label>

                        <input value="<?=$dl_name?>" type="text" placeholder="256GB" name="dl_name" id=""  required
                            class=" w-full mt-2.5 px-5 py-3 border border-blue-700 text-base  rounded-md  bg-gray-200">
                    </div>

                    

                    

                    

                    <button class="mt-[30px] rounded-md bg-blue-300 px-3 py-3 border border-black font-bold text-xl"
                        type="submit" name="btn-update-dl">Hoàn tất</button>
                </div>
                <!-- hết ô 1 -->

                <!-- bắt đầu ô sản phẩm -->
                
            </div>

          <input type="hidden" name="dl_id">
        </form>
    </section>


</main>