<?php
    extract($my_dh_detail);
    $payment=payment_id($pttt);
    $nguoinhan_ten = $nguoinhan_ten ?: $nguoidat_ten;
$nguoinhan_diachi = $nguoinhan_diachi ?: $nguoidat_diachi;
$nguoinhan_phone = $nguoinhan_phone ?: $nguoidat_phone;

    $html_dhsp='';
    $all_sp_dh= get_all_sp_iddh($id);
    foreach($all_sp_dh as $item){
        $tien_1sp=(INT)$item['price']*(INT)$item['soluong'];
        $html_dhsp.='
        <tr class="text-gray-700 ">
        <td class="px-4 py-3  font-semibold border"><img class="w-20 mx-auto"
                src="../view/img/'.$item['img'].'" alt=""></td>
        <td class="px-4 py-3 font-semibold text-base border ">
            <div class="text-2xl">'.$item['name'].'</div>
            <div class="text-sm">'.$item['color'].'</div>
            <div class="text-sm">'.$item['dungluong'].'</div>
        </td>
        <td class="px-4 py-3 text-lg border font-bold">'.number_format($item['price'], 0, ",", ".").' đ</td>
        <td class="px-4 py-3 text-lg border text-center">'.$item['soluong'].'</td>
        <td class="px-4 py-3 text-lg border text-center font-bold">'.number_format($tien_1sp, 0, ",", ".").' đ</td>
        

    </tr>
        ';
    }

    $trangthai_id= trangthai_id($trang_thai);
    if($trangthai_id['trangthai_id']==1){
     $dtn=' text-yellow-700 bg-yellow-100 rounded-md';
     $btn_duyet='
     <button 
                        class="w-fit px-4 py-2 rounded-lg bg-black text-white font-bold text-xl duration-300 hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><a
                            href="index.php?page=duyet&iddh='.$id.'">Duyệt đơn</a></button>
     ';
    }else{
     $dtn='text-green-700 bg-green-300 rounded-md ';
     $btn_duyet='
     <button
                        class="w-fit px-4 py-2 rounded-lg bg-black text-white font-bold text-xl duration-300 hover:shadow-mysd hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"><a
                            href="index.php?page=dh-complete&iddh='.$id.'">Giao hàng thành công</a></button>
     ';
    }
  
   
?>
<main class="w-full">
    <section class="w-[1240px] rounded-md h-auto mx-auto border border-gray-600 m-12">
        <div class="w-full px-5 h-16 flex justify-between items-center border-b border-black">
            <div class="w-96 flex justify-between font-bold">
                <span class="text-xl">Đơn Hàng Chi Tiết</span>
                <span class="font-medium text-gray-400 flex"><span>
                        <?=$ngaymua?><span></span>
                    </span>
            </div>
            <div ><span class="font-semibold text-xl">Tình trạng đơn hàng: </span> 
            
            <span class="px-2 py-3 font-semibold leading-tight <?=$dtn?>"><?=$trangthai_id['ten_trangthai']?></span>
            <?=$btn_duyet?>
                </div>
            
        </div>

        <div class="flex w-auto m-5 gap-x-6">
            <div class="w-[64%] flex justify-between border-black border rounded-md">
                <div class="w-1/2">
                    <h1 class="uppercase font-bold text-black border-b border-black p-4">
                        Thông tin người đặt
                    </h1>
                    <div class="p-4">
                        <h2 class="font-semibold">
                            <?=$nguoidat_ten?>
                        </h2>
                        <p class="text-gray-500">
                            <?=$nguoidat_diachi?>
                        </p>
                    </div>
                    <div class="px-4">
                        <span class="font-semibold">Email</span>
                        <h2 class="text-gray-500">
                           
                            <?=$nguoidat_email?>
                        </h2>
                    </div>
                    <div class="p-4">
                        <span class="font-semibold">Phone</span>
                        <h2>
                            <?=$nguoidat_phone?>
                        </h2>
                    </div>
                </div>

                <div class="w-1/2 border-l border-black">
                    <h1 class="uppercase font-bold text-black border-b border-black p-4">
                        Thông tin người nhận
                    </h1>
                    <div class="p-4">
                        <h2 class="font-semibold">
                            <?=$nguoinhan_ten?>
                        </h2>

                    </div>
                    <div class="p-4">
                        <span class="font-semibold">Số điên thoại</span>
                        <h2>
                            <?=$nguoinhan_phone?>
                        </h2>
                    </div>

                    <div class="p-4">
                        <span class="font-semibold">Địa chỉ</span>
                        <h2>
                            <?=$nguoinhan_diachi?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="w-[calc(36%-24px)] border border-black rounded-md">
                <div class="w-auto">
                    <div class="flex justify-between items-center   text-black border-b border-black p-4 ">
                        <div class="pr-4 border-black border-r">
                            <div class="uppercase">Mã đơn hàng</div>
                            <div class="font-semibold"><?=$madonhang?></div>

                        </div>

                        <div>
                            <div class="">Phương thức thanh toán</div>
                            <div class="font-semibold">
                                <?=$payment['payment_name']?>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 flex justify-between">
                        <p class="text-gray-500">Tổng phụ</p>
                        <h2 class="font-semibold"><?=number_format($total, 0, ",", ".")?>đ</h2>
                    </div>
                    <div class="px-4 flex justify-between">
                        <h2 class="text-gray-500">Giảm giá</h2>
                        <span class="font-semibold">0</span>
                    </div>

                    <div class="p-4 flex justify-between">
                        <h2>Ship</h2>
                        <span class="font-semibold">
                            <?=number_format($payment['payment_ship'], 0, ",", ".")?> đ
                        </span>
                    </div>
                    <div class="p-4 flex justify-between">
                        <h2>Tổng tiền</h2>
                        <span class="font-semibold">
                            <?=number_format($tong_thanhtoan, 0, ",", ".")?> đ
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <section class="px-5">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg ">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Sản phẩm</th>
                                <th class="px-4 py-3">Tên</th>
                                <th class="px-4 py-3">Giá</th>
                                <th class="px-4 py-3">Số lượng</th>
                                <th class="px-4 py-3">Tổng</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?=$html_dhsp?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</main>