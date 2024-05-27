<?php



$hinh='../'.PATH_IMG;
    $html_allPro='';
  
    foreach($allPro as $item){
        $ten_dm=ten_dannhmuc($item['iddm']);
        $html_option_dl='';
        $all_ctsp=get_ctsp($item['id']);
        $product_dungluong=get_dungluong_detail($item['id']);
        $product_color=get_color_detail($item['id']);
        
        foreach($product_dungluong as $dl){
            $html_option_dl.='
            <a title="Sửa '.$dl['Ma_DungLuong'].'" href="index.php?page=update-dl&id=" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-50 rounded-sm">'.$dl['Ma_DungLuong'].'</a>
            ';
        }
        $html_option_color='';
       
        foreach($product_color as $color){
            $html_option_color.='
            <a title="'.$color['Ma_Mau'].'" href="index.php?page=update-color&id=" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-50 rounded-sm">'.$color['Ma_Mau'].'</a>
            ';
        }
        
        $html_allPro.='

        <tr class="text-gray-700">
                                    <td class="h-auto w-[200px] px-4 py-3 font-semibold text-sm border ">'.$item['name'].'</td>
                                    <td class="px-4 py-3 text-md font-semibold border"><img class="w-20" src="'.$hinh.''.$item['img'].'" alt=""></td>
                                    <td class="px-4 py-3 text-sm border">'.number_format($item['price'], 0, ",", ".").' đ</td>
                                    <td class="px-4 py-3 text-sm border">'.$item['price_sale'].'</td>
                                    <td class="px-4 py-3 text-base text-center border relative">
                                        <div class="w-fit flex flex-col gap-y-1">
                                       
                                       '.$html_option_dl.'
                                        </div>
                                        
                                    </td>
                                    <td class="px-4 py-3 text-base text-center border relative">
                                        <div class="w-full flex flex-col gap-y-1">
                                           
                                          '.$html_option_color.'
                                        </div>
                                        
                                    </td>
                                    <td class="px-4 py-3 text-sm border">'.$item['view'].'</td>
                                    <td class="h-auto w-[150px] p-2 font-bold text-md border">'.$ten_dm.'</td>
                                    <td class="px-4 py-3 w-[150px] text-lg border">
                                        <a href="index.php?page=update-sp&idsp='.$item['id'].'" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-50 rounded-sm"> Sửa </a>
                                        <a href="index.php?page=delete-pro&id='.$item['id'].'" class="ml-2 px-2 py-1 font-semibold leading-tight text-red-700 bg-red-50 rounded-sm"> Xóa </a>

                                    </td>
                                    </tr>
        ';
    }
?>

<main class="w-full  px-2 rounded-[20px] bg-[#eee]">
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
                    href="index.php?page=add_pro">Thêm sản phẩm</a></button>
            <form class="h-10 py-2 w-[400px] relative flex items-center " action="index.php?page=sanpham" method="post">
                <button class="absolute z-10 top-1/2 translate-y-[-50%] left-2"><i
                        class='bx bx-sm bx-search'></i></button>
                <input name="keyword" value="" class="absolute pl-10   w-full h-full   border-black border rounded-lg" type="text"
                    placeholder="search">
            </form>
        </div>


        <!-- table -->
        <!-- component -->
        <section class=" mx-auto px-2 font-roboto">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Ảnh</th>
                                <th class="px-4 py-3">Giá</th>
                                <th class="px-4 py-3">Giá giảm</th>
                                <th class="px-4 py-3">Dung lượng</th>
                                <th class="px-4 py-3">Màu sắc</th>
                                <th class="px-4 py-3">Lượt xem</th>
                                <th class="px-4 py-3">Danh mục</th>
                                <th class="px-4 py-3">Chức Năng</th>


                            </tr>
                        </thead>

                        <tbody class="bg-white">
                           


                            <?=$html_allPro;?>


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- table -->

    </div>


</main>