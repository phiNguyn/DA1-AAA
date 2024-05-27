<?php
    $dh_new=count_dh_new();
    $count_sp=count_sp();
    $count_user=count_user();
?>
<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee]">
                <header class="flex items-center justify-between gap-4 flex-wrap">
                    <div>

                        <h1 class="text-4xl font-semibold mb-2.5">Dashboard</h1>
                        <ul class="flex items-center gap-4 ">
                            <li><span href="">Trang chủ</span></li> 
                          
                        </ul>
                    </div>
                    <div></div>
                </header>
               
                <!-- hết header -->

                <!--  -->
                <ul class="mt-9 grid grid-cols-3 gap-6 ">
                    <li class="px-6 py-6 rounded-3xl  flex items-center gap-6 cursor-pointer bg-white shadow-lg shadow-gray-300">
                        <span class="w-20 h-20 rounded-[10px] flex justify-center items-center bg-blue-200">
                            <i class='text-blue-500 bx bx-lg bx-package'></i>
                        </span>
                        <span>
                            <h3 class="text-2xl"><?=$dh_new?> đơn hàng</h3>
                            <p>Mới</p>
                        </span>
                        
                    </li>

                    <li class="px-6 py-6 rounded-3xl  flex items-center gap-6 cursor-pointer bg-white">
                        <span class="w-20 h-20 rounded-[10px] flex justify-center items-center bg-blue-200">
                            <i class='text-blue-500 bx bx-lg bx-package'></i>
                        </span>
                        <span>
                            <h3 class="text-2xl"><?=$count_sp?> Sản phẩm</h3>
                          
                        </span>
                        
                    </li>


                    <li class="px-6 py-6 rounded-3xl  flex items-center gap-6 cursor-pointer bg-white">
                        <span class="w-20 h-20 rounded-[10px] flex justify-center items-center bg-blue-200">
                            <i class='text-blue-500 bx bx-lg bx-package'></i>
                        </span>
                        <span>
                            <h3 class="text-2xl"><?=$count_user?> Tài khoản</h3>
                           
                        </span>
                        
                    </li>



                    



                    
                    
                </ul>
</main>

