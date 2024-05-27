<?php
   $html_list_donhang='';
   foreach($list_Bill as $item){
   
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

    $html_list_donhang.='
    
    <tr class="text-gray-700">
    <td class="px-4 py-3 font-semibold text-base border ">'.$madonhang.'</td>
    <td class="px-4 py-3 text-md font-semibold border  "><div class="px-2 py-3 font-semibold leading-tight '.$dtn.'">'.$trangthai_id['ten_trangthai'].'</div></td>
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
          <a href="index.php?page=donhang-one&iddh='.$id.'" class="w-full" >Xem chi tiet</a>      
            </button>
    </td>
 
   
    </tr>
    ';
   }

?>


<div class="w-full mt-12 bg-white rounded-lg py-5">
<div class="mx-auto">Đơn hàng của tôi</div>

                    <!-- table -->
                    <!-- component -->
                        <section class=" mx-auto p-6 font-roboto">
                         
                            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full">
                                <thead>
                                <?php
                                    if(isset($list_Bill)&& (count($list_Bill)>0)){
                                        $check_donhang='<tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3">Mã đơn hang</th>
                                        <th class="px-4 py-3">Trang thái</th>
                                        <th class="px-4 py-3">Giá</th>
                                        
                                        <th class="px-4 py-3">Hình thức thanh toán</th>
                                        
                                        <th class="px-4 py-3">Ngày đặt</th>
                                        <th class="px-4 py-3">Chức Năng</th>
    
                                        
                                        </tr>';
                                        
                                    }else {
                                        $check_donhang='<div class="w-fit mx-auto font-bold text-2xl">Chưa có đơn hàng nào</div>';
                                    }
                                    ?>
                                    
                                    <?=$check_donhang?>
                                </thead>

                                <tbody class="bg-white">
                                    <?=$html_list_donhang?>


                                    

                                    
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </section>
                    <!-- table -->

                </div>
