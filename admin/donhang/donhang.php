
<?php

    $html_allDH='';
    foreach($admin_allDH as $item){

        extract($item);
        $payment=payment_id($pttt);
   $trangthai_id= trangthai_id($trang_thai);
   if($trangthai_id['trangthai_id']==1){
    $dtn=' text-yellow-700 bg-yellow-100 rounded-md';
   }else if($trangthai_id['trangthai_id']==2){
    $dtn='text-blue-700 bg-blue-300 rounded-md ';
   }else{
    $dtn='text-green-700 bg-green-300 rounded-md ';
   }
        $html_allDH.='
        
        <tr class="text-gray-700">
 <td class="px-4 py-3 font-semibold text-base border ">'.$madonhang.'</td>
 <td class="px-4 py-3    text-md font-semibold border "><div class=" px-2 py-3 font-semibold leading-tight '.$dtn.'">'.$trangthai_id['ten_trangthai'].'</div></td>
 <td class="px-4 py-3 text-sm border">'.number_format($tong_thanhtoan, 0, ",", ".").' đ</td>
 
 <td class="px-4 py-3 text-base text-center border ">
     
 '.$payment['payment_name'].'
 </td>
 <td class="px-4 py-3 text-base text-center border ">
     
'.$ngaymua.'
 </td>
 <td class="text-center px-4 py-3 text-sm border">
 <button 
             class="w-fit mx-auto  text-xl font-bold text-white bg-black rounded-xl p-3  hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
       <a href="index.php?page=ctdonhang&iddh='.$id.'" class="w-full" >Xem chi tiết</a>      
         </button>
 </td>


 </tr>
        ';
    }
?>
<main class="w-full px-6 py-9 rounded-[20px] bg-[#eee] ">
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
            <div class="flex gap-5">

                <button
                        class="w-fit px-4 py-2 rounded-lg bg-black text-white font-bold text-xl duration-300 hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><a
                            href="index.php?page=cho-xyly">Đơn hàng mới</a></button>
        
                            <button
                        class="w-fit px-4 py-2 rounded-lg bg-black text-white font-bold text-xl duration-300 hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><a
                            href="index.php?page=dh-da-xuly">Đang trên đường giao</a></button>
                            <button
                        class="w-fit px-4 py-2 rounded-lg bg-black text-white font-bold text-xl duration-300 hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><a
                            href="index.php?page=dh-thanhcong">Đã giao thành công</a></button>
            </div>
                    
                    
            <form class="h-10 py-2 w-[400px] relative flex items-center " action="">
                <button class="absolute z-10 top-1/2 translate-y-[-50%] left-2"><i
                        class='bx bx-sm bx-search'></i></button>
                <input class="absolute pl-10   w-full h-full   border-black border rounded-lg" type="text"
                    placeholder="search">
            </form>
        </div>


        <!-- table -->
        <section class=" mx-auto p-6 font-roboto">
                         
                            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full">
                                <thead>
                                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3">Mã đơn hang</th>
                                    <th class="px-4 py-3">Trang thái</th>
                                    <th class="px-4 py-3">Giá</th>
                                    
                                    <th class="px-4 py-3">Hình thức thanh toán</th>
                                    
                                    <th class="px-4 py-3">Ngày đặt</th>
                                    <th class="px-4 py-3">Chức Năng</th>

                                    
                                    </tr>
                                </thead>

                                <tbody class="bg-white">
                                    <?=$html_allDH?>


                                    

                                    
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </section>
        
        <!-- table -->

    </div>


</main>