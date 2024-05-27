<?php
if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) {
    $username = $_SESSION['user']['name'];
    $email = $_SESSION['user']['email'];
    $phone = $_SESSION['user']['phone'];
    $address = $_SESSION['user']['address'];
    $btn_checkout='<button type="submit" name="btn-dathang"  class="w-full p-3 font-bold text-2xl  uppercase text-white bg-gray-600  py-3 px-6 rounded-xl shadow-[0_10px_black] duration-300 -translate-y-[10px] active:translate-y-0 active:shadow-[0_0_white]"
    >Hòa tất đơn hàng</button>';
} else {
    $username = '';
    $email = '';
    $phone = '';
    $address = '';
    $btn_checkout='<a href="index.php?page=login&idcheckout=1"  class="w-fit p-3 font-bold text-2xl  uppercase text-white bg-gray-600   rounded-xl shadow-[0_10px_black] duration-300 -translate-y-[10px] active:translate-y-0 active:shadow-[0_0_white]"
    >Đăng nhập để thanh toán</a>';
}

$html_cart = '';
foreach ($_SESSION['cart'] as $item) {
    extract($item);
    $html_cart .= '
        <div class="w-full p-2.5 border rounded-md border-black flex  items-center gap-x-5 mt-5">
                            <div class="w-24 flex items-center justify-center"><img class="w-full" src="view/img/' . $img . '" alt=""></div>
                            <div class="w-[calc(100%-96px)] flex flex-col gap-y-2">
                                <h1 class=" text-xl "> <b> ' . $name . '</b> </h1>
                                <div class="w-full text-xl flex gap-x-5 font-semibold">
                                    <span>' . $dungluong . '</span> <span>' . $color . '</span>
                                
                                </div>
                                <div class="flex w-full  gap-x-5 items-center">
                                
                                    <div class="font-bold text-xl"> X' . $soluong . ' </div>
                                    <div class="font-bold  text-lg">' . number_format($price, 0, ",", ".") . ' đ</div>

                                </div>
                            </div>
                      
                    </div>
        ';
}
    $html_payment='';
    $payment=payment();
    foreach($payment as $pttt){
        extract($pttt);
        $html_payment.='
        <div class="w-full   flex gap-x-5">
                                <input type="radio" id="'.$payment_id.'" name="pttt" value="'.$payment_id.'" class="hidden peer" required>
                                <label for="'.$payment_id.'" class="w-full p-2 border-2 rounded border-black  peer-checked:text-black peer-checked:border-2 peer-checked:border-blue-300  peer-checked:bg-blue-200 ">
                                    
                                    <div class="flex  justify-between">
                                        <div class="text-lg font-bold">'.$payment_name.'</div>
                                        
                                        <div class="text-lg font-bold">'.number_format($payment_ship, 0, ",", ".").' đ</div>
                                    </div>
                                    <div class="">Từ 2-3 ngày </div>
                                </label>
                              
                                <input type="hidden" name="ship" value="'.$payment_ship.'">
                            </div>
        ';
    }


$html_tongTien=getTongDonHang();
if($html_tongTien>99999999){
    $donvi=9;
}
else if($html_tongTien>9999999){
    $donvi=8;
}else if($html_tongTien>999999){
    $donvi=7;
}else if($html_tongTien >99999){
    $donvi=6;
}else if($html_tongTien >9999){
    $donvi=5;
}else $donvi=4;

?>

    <section class="w-[1240px] mx-auto max-lg:w-full">
        <form action="index.php?page=donhang" method="post"class="w-full flex gap-[50px] max-lg:flex-col">
            <!-- form -->
            <div class="w-[60%] h-fit pt-5 pb-12  rounded-lg shadow-[4px_4px_15px_gray] mx-auto max-lg:w-full">
                <div class="flex flex-col w-[600px] mx-auto gap-y-5  max-lg:w-full max-lg:px-5">

                    <h1 class="text-center text-xl "> <b>THÔNG TIN NGƯỜI ĐẶT HÀNG </b> </h1> 
                    <input class="input " value="<?= $username ?>" type="text" id="name" name="name" placeholder="Họ tên" required>
                    <div class="grid grid-cols-2 gap-5 max-lg:grid-cols-1">
                        <input class="input " value="<?= $email ?>" type="email" id="Email" name="email" placeholder="Email" required>

                        <input class="input " value="<?= $phone ?>" type="text" id="sdt" name="phone" placeholder="Số điện thoại" required>
                    </div>

                    <input class="input " value="<?= $address ?>" type="text" id="diachi" name="address" placeholder="Địa chỉ " required>

                    <span class="cursor-pointer" id="btn-doi">Thay đổi thông tin </span>


                    <div class="w-full mt-5 hidden " id="ttNhanHang" >

                    <span class="close p-2 w-5 h-5 text-2xl font-bold cursor-pointer border border-black">X</span>


                        <h1 class="text-center text-xl "> <b>THÔNG TIN NGƯỜI NHẬN HÀNG</b> </h1>
                        <div class="flex flex-col gap-y-5">

                            <input class="input w-full" name="receiver_name" type="text" id="name" name="name" placeholder="Họ tên">
                            <input class="input w-full" name="receiver_phone" type="text" id="sdt" name="sdt" placeholder="Số điện thoại">
                            <input class="input w-full" name="receiver_address" type="text" id="diachi" name="diachi" placeholder="Địa chỉ ">
                        </div>

                    </div>




                </div>

                
            </div>

            

            <!-- cart -->
            <div class="w-[calc(40%-50px)] p-5  rounded-lg shadow-[-5px_5px_15px_2px_rgba(0,0,0,0.3)] max-lg:w-full">
                <div class="w-full">
                    <h1 class="text-center text-xl"><b>GIỎ HÀNG </b> </h1>
                    <!-- giỏ hàng -->
                    <?= $html_cart ?>
                    <!-- giỏ hàng -->


                    <div class="mt-10">
                        <h1 class="text-center text-xl"><b>PHƯƠNG THỨC THANH TOÁN </b> </h1>
                        

                        <div class="mt-5 flex flex-col gap-y-5">
                            <?=$html_payment?> 
                        </div>

                    </div>

                    <div class="py-5 w-full flex justify-between"><span class="uppercase font-bold text-xl">Tổng đơn hàng</span> <span class=" font-bold text-xl"><?=number_format($html_tongTien, 0, ",", ".")?> đ</span> </div>

                    <div class="w-full mt-12 flex justify-center">
                    <?=$btn_checkout?>
                    </div>




                </div>
            </div>
           
            
        </form>
        <div>
            <img id="qrcode" src="view/img/blue.png" alt="">
        </div>
        <div  class="w-96 bg-red-300">
            <input class="" type="text" id="content" value="<?=$html_tongTien?>">
            <button id="btnCreate">Laays max</button>
        </div>
    </section>





<script>
    const linkNhanHang = document.getElementById("ttNhanHang");
        var span = document.getElementsByClassName("close")[0];

        const btnDatHang = document.getElementById("btn-doi");
        btnDatHang.onclick = function() {
          linkNhanHang.style.display = "block";
        };
        span.onclick = function() {
          linkNhanHang.style.display = "none";
        }
</script>

<script>
    let qrcode=document.getElementById('qrcode');
    let content = document.getElementById('content');
    let btnCreate = document.getElementById('btnCreate');
    btnCreate.onclick = () =>{
        if(content.value == '') return ;
        
        let link =' https://api.qrserver.com/v1/create-qr-code/';
        qrcode.src =link+ '?size=200x200&data=' + '00020101021238570010A000000727012700069704220113VQRQ00013k1de0208QRIBFTTA5303704540' + '<?=$donvi?>'   +content.value  +'5802VN62270107NPS68690812Huy Ngu6304A4FE'  ;
    }
</script>