<?php

    $html_admin='';
    foreach($admin_dm as $item){
        extract($item);
        $check_home = ($home == 1) ? 'Có' : 'Không';
        $ten_ldm=ten_LoaiDanhMuc($id_LoaiDanhMuc);
        $html_admin.='
        <tr class="text-gray-700">
                                    <td class="h-auto w-[200px] px-4 py-3 font-semibold text-sm border "><a href="index.php?page=sanpham&iddm='.$id.'">'.$name.'</a></td>
                                    
                                    
                                    
                                    
                                    
                                    <td class="px-4 py-3 text-sm border">'.$content.'</td>
                                    <td class="px-4 py-3 text-sm border">'.$check_home.'</td>
                                    <td class="px-4 py-3 text-sm border">'.$ten_ldm.'</td>
                                    <td class="px-4 py-3 text-lg border">
                                        <a href="index.php?page=update-dm&id='.$id.'" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-50 rounded-sm"> Sửa </a>
                                        <a href="index.php?page=delete-dm&id='.$id.'" class="ml-2 px-2 py-1 font-semibold leading-tight text-red-700 bg-red-50 rounded-sm"> Xóa </a>

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
            <button
                class="w-fit px-4 py-2 rounded-lg bg-black text-white font-bold text-xl duration-300 hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><a
                    href="index.php?page=danhmuc_add">Thêm
                    danh mục</a></button>
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
                                <th class="px-4 py-3">Tên danh mục</th>
                                <th class="px-4 py-3">Content</th>
                                <th class="px-4 py-3">Trang chủ</th>
                                <th class="px-4 py-3">Loại danh mục</th>
                                <th class="px-4 py-3">Chức Năng</th>




                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?=$html_admin?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- table -->

    </div>


</main>