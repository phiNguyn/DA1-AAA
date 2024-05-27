<?php

    $html_user='';
    foreach($aLL_users as $item){
        extract($item);
        $html_user.='
        <tr class="text-gray-700">
        <td class="px-4 py-3 font-semibold text-base border ">'.$name.'</td>
        <td class="px-4 py-3 text-md font-semibold border">'.$email.'</td>
        <td class="px-4 py-3 text-sm border">'.$phone.'</td>
        <td class="px-4 py-3 text-sm border">'.$address.'</td>
        
        
        <td class="px-4 py-3 text-lg border text-center">
            <a href="index.php?page=userlist-dh&iduser='.$id.'" class="px-2 py-2 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-md">Xem chi tiết</a>

        </td>
        </tr>
        ';
    }
?>

<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee]">
    <header class="flex items-center justify-between gap-4 flex-wrap">
        <div>

            <h1 class="text-4xl font-semibold mb-2.5">Dashboard</h1>
            <ul class="flex items-center gap-4 ">
                <li><a href="">Sản phẩm</a></li> /
                <li><a href="">Sản phẩm</a></li>
            </ul>
        </div>
        <div></div>
    </header>


    <!-- Table -->
    <div class="w-full mt-12 bg-white rounded-lg py-5">
        <div class="flex w-full px-5 justify-between">
            <!-- <button
                class="w-fit px-4 py-2 rounded-lg bg-black text-white font-bold text-xl transition-transform hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><a
                    href=""></a></button> -->
            <form class="h-10 py-2 w-[400px] relative flex items-center " action="">
                <button class="absolute z-10 top-1/2 translate-y-[-50%] left-2"><i
                        class='bx bx-sm bx-search'></i></button>
                <input class="absolute pl-10   w-full h-full   border-black border rounded-lg" type="text"
                    placeholder="search">
            </form>
        </div>


        <!-- table -->
        <!-- component -->
        <section class=" mx-auto p-6 font-roboto">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Họ tên</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Số điện thoại</th>
                                <th class="px-4 py-3">Địa chỉ</th>

                               
                                <th class="px-4 py-3">Lịch sửa mua hàng</th>


                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?=$html_user?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- table -->

    </div>


</main>
