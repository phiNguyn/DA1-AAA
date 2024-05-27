<?php
    $html_cart='';
    $html_cart_mb='';
    $i=0;
    foreach($_SESSION['cart'] as $item){
        extract($item);
        $tien_1sp=(INT)$price*(INT)$soluong;
        $html_cart.='
        <tr class="text-gray-700 ">
                                <td class="px-4 py-3  font-semibold border"><img class="object-contain w-20 mx-auto"
                                        src="view/img/'.$img.'" alt=""></td>
                                <td class="w-[300px] px-4 py-3 font-semibold text-base border ">
                                    <div class="text-xl max-lg:text-sm">'.$name.'</div>
                                    <div class="text-sm">'.$color.'</div>
                                    <div class="text-sm">'.$dungluong.'</div>
                                </td>
                                <td class="px-4 py-3 text-sm border font-bold">'.number_format($price, 0, ",", ".").' đ</td>
                                <td class="px-4 py-3 text-lg border text-center">'.$soluong.'</td>
                                <td class="px-4 py-3 text-lg border text-center font-bold ">'.number_format($tien_1sp, 0, ",", ".").' đ</td>
                                <td class="px-4 py-3 text-center text-sm border"><a href="index.php?page=del&idsp='.$i.'">
                                        <i class="bx bx-md dailymotion bx-trash-alt"></i>
                                    </a></td>

                            </tr>
        ';
       

    $html_cart_mb.='
    <div class="flex gap-x-5  w-full p-5 ">
          <img class="w-[70px] object-contain" src="view/img/'.$img.'" alt="">
            <div class="flex flex-col w-full">
                <div class="flex justify-between font-bold">
                    <h1>
                       '.$name.'
                    </h1> 
                    <a href="index.php?page=del&idsp='.$i.'"> <i class="bx bx-md  dailymotion bx-trash-alt"></i></a>
                </div>
                    <div class="font-bold">
                        <div class="w-full">
                            <div>Dung lượng: '.$dungluong.'</div>
                            <div>Màu: '.$color.'</div>
                            <div class="w-full flex justify-between items-center mt-5"> 
                                <div class=" w-[170px] p-2 flex justify-evenly items-center bg-[#F3F3F3] rounded-3xl quantity-container">
                                    <button type="button" class="incre-quantity" onclick="dec()"><i class="bx bx-minus"></i></button>
                                    <input class="w-6 bg-[#F3F3F3] text-center" type="number" name="soluong" value="'.$soluong.'" min="1" step="1">
                                    <button type="button" class="decre-quantity" onclick="inc()"><i class="bx bx-plus"></i></button>
                                </div>
                                <span>'.number_format($tien_1sp, 0, ",", ".").' đ</span></div>
                        </div>
                        <div>

                        </div>
                    </div>
               
            </div>

        </div>
    ';
    $i++;
    }
    $html_tongTien=getTongDonHang();
?>

<h1 class="w-full flex justify-center items-center text-5xl font-bold">Giỏ hàng</h1>


<div class="flex gap-x-10  mt-12 max-lg:flex-col">
    <!-- table -->
    <!-- component -->
    <section class=" font-roboto w-[70%] max-lg:hidden">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Ảnh</th>
                            <th class="px-4 py-3">Tên</th>
                            <th class="px-4 py-3">Giá</th>
                            <th class="px-4 py-3">Số lượng</th>
                            <th class="px-4 py-3 ">Tổng</th>
                            <th class="px-4 py-3">Xóa</th>




                        </tr>
                    </thead>

                    <tbody class="bg-white">


                        <?=$html_cart?>







                    </tbody>


                </table>

            </div>

        </div>
        <a href="index.php?page=cart&del=1">Xóa tất cả</a>
    </section>

    <section class="hidden w-full max-lg:block">
        <?=$html_cart_mb?>

    </section>
    <!-- table -->

    <section class="w-[calc(30%-40px)] max-lg:w-full">
        <div class="w-full h-fit rounded-lg shadow-[-5px_5px_15px_2px_rgba(0,0,0,0.3)]">


            <div class="p-5">

                <div
                    class="w-full py-5  flex flex-col gap-y-5   border-b border-black border-dashed font-semibold text-gray-500">
                    <div class="w-full flex justify-between"><span>Đơn hàng</span> <span>
                            <?=number_format($html_tongTien, 0, ",", ".")?>
                        </span></div>


                </div>

                <div class="py-5 w-full flex justify-between"><span class="uppercase font-bold text-xl">Tạm
                        tính</span> <span class=" font-bold text-xl">
                        <?=number_format($html_tongTien, 0, ",", ".")?> đ
                    </span> </div>

                <button
                    class=" w-full mt-5   font-bold text-2xl   text-white bg-gray-600  py-3 px-6 rounded-xl shadow-[0_10px_black] duration-300 -translate-y-[10px] active:translate-y-0 active:shadow-[0_0_white]">
                    <?=$btn_check_cart?>
                </button>
            </div>

        </div>
    </section>

</div>