<?php
extract($detail);
$product_dungluong = get_dungluong_detail($id);
$product_color = get_color_detail($id);
?>
<?php
$html_dl = '';
foreach ($product_dungluong as $item) {
    extract($item);
   

        $html_dl .= '
              <div class="">
                        <input type="radio" id="' . $Ma_DungLuong . '" name="dungluong" value="' . $Ma_DungLuong . '" class="hidden peer" >
                        <label for="' . $Ma_DungLuong . '" class="inline-flex items-center justify-between w-full p-2 text-black bg-white border-2 border-black rounded-lg cursor-pointer   peer-checked:text-white peer-checked:border-black peer-checked:bg-black  hover:text-white hover:bg-black duration-500">                           
                            <div class="block">
                                <div class="w-full font-bold">' . $Ma_DungLuong . '</div>
                            </div>
                            
                        </label>
                    </div>
              ';
    
}

$html_color = '';
foreach ($product_color as $item) {
    extract($item);
   
    $html_color .= '
        <div class="">
                    <input type="radio" id="' . $Ma_Mau . '" name="color" value="' . $Ma_Mau . '" class="hidden peer" >
                    <label for="' . $Ma_Mau . '" class="inline-flex items-center justify-between w-full p-2 text-black bg-white border-2 border-black rounded-lg cursor-pointer   peer-checked:text-white peer-checked:border-black peer-checked:bg-black  hover:text-white hover:bg-black ">                           
                        <div class="block">
                            <div class="w-full">' . $Ma_Mau . '</div>
                        </div>
                        
                    </label>
                </div>
        ';
    
}

    $html_lienquan='';
foreach($sp_lien_quan as $lienquan){
   
    $html_lienquan.='
    <div
                class="relative group mt-8 w-[270px] text-center gap-y-3 rounded-[20px] py-2.5 px-2.5 flex flex-col shadow-item transition duration-700 hover:scale-[1.02] hover:shadow-itemHover max-lg:w-[calc(100%-25px)]">
                <div class="flex justify-center h-[222px]">
                    <img class="w-[82%] object-contain" src="view/img/'.$lienquan['img'].'" alt="" />
                </div>
                <div class="text-base font-semibold">'.$lienquan['name'].'</div>
                <div class="text-base font-semibold">'.number_format($lienquan['price'], 0, ",", ".").' đ</div>
                <div class="flex justify-evenly">
                    <img src="view/img/natural.png" alt="" />
                    <img src="view/img/black.png" alt="" />
                    <img src="view/img/white.png" alt="" />
                    <img src="view/img/black.png  " alt="" />
                </div>
                <a href="index.php?page=detail_pro&id='.$lienquan['id'].'"
                    class="absolute bottom-0 left-1/2 -translate-x-1/2 opacity-0 group-hover:absolute group-hover:bottom-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 duration-700 group-hover:opacity-100 hover:bg-black hover:text-white font-extrabold border-2 text-lg border-black text-black bg-white py-2.5 px-5 rounded-full">
                    Xem ngay
                </a>
            </div>
    ';
}

$html_list_img='';
$html_list_img_1="";
foreach($product_img as $list_img){
  
    

        $html_list_img.='
        "view/img/'.$list_img['img'].'" 
        ' .',';
    


    $html_list_img_1.='
    <div class="swiper-slide">
    <img class="w-[100px] h-[100px] duration-300" onclick="chonAnh(this)" src="view/img/'.$list_img['img'].'" alt="">
    </div>
   
    ';

}



?>



    <section class="max-w-7xl px-4 mx-auto">
        <form action="index.php?page=add-cart" method="post" onsubmit="return validdetailinput()" class="w-full flex gap-[50px] py-10 max-lg:w-full max-lg:flex-col">

            <div class="w-1/3  mx-auto max-lg:w-full">
                <div class="w-full  bg-[#f2f2f2]  relative rounded-xl border border-black">

                    <img id="anh-goc" class="object-contain rounded-2xl w-full h-[360px] mx-auto duration-300" src="view/img/<?=$img?>"
                        alt="">

                    <div class="arrows w-full absolute z-50 top-1/2   flex justify-between ">
                        <span id="detail-prev" class="duration-300"><i
                                class=" absolute bg-gray-200  -left-[25px] bx bx-lg bx-chevron-left cursor-pointer border border-black rounded-full"></i></span>
                        <span id="detail-next" class="duration-300"><i
                                class=" absolute bg-gray-200 -right-[25px] bx bx-lg bx-chevron-right cursor-pointer border border-black rounded-full"></i></span>
                    </div>
                </div>
                <div class="w-full swiper mySwiper3 border border-black mt-2">
                    <div class="swiper-wrapper">
                        <?=$html_list_img_1?>

                    </div>

                </div>

            </div>
            <div class="w-1/2 flex flex-col gap-y-2 max-lg:w-full">
                <h1 class="text-4xl font-bold">
                    <?=$name?>
                </h1>

                <div class="font-semibold text-lg">
                    <?= number_format($price, 0, ",", ".") ?> đ
                </div>

                <div class="flex items-center justify-start gap-2">
             
               
               
                   <h2 class="text-2xl">Dung lượng :</h2>
                
                   

                 
                  
                    <?= $html_dl ?>
                   
                </div>
                <span class="storage-error  text-red-500"> </span>

                <div class="flex items-center justify-start gap-5 mt-5">
                   
                
                    <h2 class="text-2xl">Chọn màu :</h2>
                  

                    
                    <?= $html_color ?>
                   
                </div>
                <span class="color-error  text-red-500"> </span>

                <div class="mt-5 w-fit flex gap-5 items-center font-semibold text-lg">
                    <div class="w-[170px] p-2 flex justify-evenly items-center bg-[#F3F3F3] rounded-3xl quantity-container">
                        <button type="button" class="incre-quantity" onclick="dec()"><i class='bx bx-minus'></i></button>
                        <input class="w-6 bg-[#F3F3F3] text-center" type="number" name="soluong" value="1" min="1" step="1">
                        <button type="button" class="decre-quantity" onclick="inc()"><i class='bx bx-plus'></i></button>
                    </div>

                    <button type="submit" name="btn-add-cart"
                        class="w-fit   text-xl font-bold text-black bg-white rounded-md p-3  border border-black">
                        Thêm vào giỏ hàng
                    </button>
                </div>
                <button type="submit" name=""
                    class="w-[400px] mt-5  text-xl font-bold text-white bg-black rounded-lg py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
                    Mua ngay
                </button>



                <input type="hidden" name="img" value="<?= $img ?>">
                <input type="hidden" name="name" value="<?= $name ?>">
                <input type="hidden" name="price" value="<?= $price ?>">



                <input type="hidden" name="idpro" value="<?= $id ?>">
            </div>
        </form>

    </section>


    <section class="w-[1240px] mx-auto max-lg:w-full">


        <div class="w-full mt-12">
            <h1 class="text-xl font-semibold">Có thể bạn sẻ thích</h1>
            <div class="grid grid-cols-4 mt-9  max-lg:w-full max-lg:grid-cols-3 max-md:grid-cols-2 ">
                <?=$html_lienquan?>
            </div>
        </div>

        <div class="w-full py-5  mt-12">
            <h1>Hỏi và đáp</h1>
            <form action="index.php?page=cmt" method="post" class="w-full flex justify-between gap-x-5 mt-5" action="">
                <textarea class="w-[62%] h-20  p-2.5 rounded-lg border border-black " name="noidung"  id=""  placeholder="Để lại bình luận của bạn"></textarea>
                <?php
    if(isset($_SESSION['user'])){
        $btn_cmt='
        <button
                    class="w-fit h-auto
                     text-xl font-bold text-white bg-black rounded-[20px] p-2.5 group hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"
                    type="submit" name="btn-cmt"> <i class="group-hover:-rotate-45 duration-500   bx bx-send"></i> Gửi </button>
        ';
    }else {
        $btn_cmt='
        <a href="index.php?page=login"
                    class= "text-center w-fit h-fit text-xl font-bold text-white bg-black rounded-[20px] p-2.5 group hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0"
                   >  Đăng nhập để bình luận</a>
        ';
    }
?>
                <?=$btn_cmt?>

            <input type="hidden" name="idsp" value="<?=$id?>" >
            <?php if(isset($_SESSION['user'])){
                $iduser=$_SESSION['user']['id'];
             }else $iduser='';
             ?>
            <input type="hidden" name="iduser" value="<?=$iduser?>">
            </form>


            <!-- bình luận -->
            <?php
                $comment_idsp=comment_idsp($id);
               
                $html_comment_idsp='';
                foreach($comment_idsp as $cmt){
                    extract($cmt);
                    $name_user_cmt=cmt_name_idsp($cmt['iduser']);
                    $html_comment_idsp.='
                    
                    <div class="w-[62%] p-2.5 flex flex-col gap-y-2">
                <div class="flex gap-x-5 items-center">
                    <div class="border border-black w-12 h-12 flex justify-center items-center rounded-full"> <i
                            class="bx-md bx bxs-user"></i></div>
                    <span class="text-xl font-bold">'.$name_user_cmt.'</span>
                </div>
                <div class="">'.$ngaybinhluan.'</div>
                <div class="w-full h-auto rounded-2xl  p-2.5 shadow-item   bg-white">'.$noidung.'</div>
            </div>
                    ';
                }
            ?>
            <!-- start bình luận -->
            <?=$html_comment_idsp?>
            <!-- end Bình luận -->
        </div>
    </section>



<script>
    const images = [<?= $html_list_img ?>];
    const detailprev = document.getElementById('detail-prev')
    const detailnext = document.getElementById('detail-next')
    let anhGoc = document.getElementById('anh-goc')
    let slide = 0;

    detailnext.addEventListener(('click'), () => {
        slide++
        if (slide === images.length) {
            slide = 0
        }
        anhGoc.src = images[slide]
    })

    detailprev.addEventListener(('click'), () => {
        slide--
        if (slide < 0) {
            slide = images.length - 1
        }
        anhGoc.src = images[slide]
    })

    function chonAnh(x) {

        document.getElementById("anh-goc").setAttribute("src", x.src);
    }

    function validdetailinput() {
        var dungluongSelected = document.querySelector('input[name="dungluong"]:checked');
        var colorSelected = document.querySelector('input[name="color"]:checked');
        var storageError = document.querySelector('.storage-error');
        var colorError = document.querySelector('.color-error');
        var btnAddCart = document.getElementById('btn-add-cart');

        storageError.textContent = ''; 
        colorError.textContent = '';

       
       
        if (!dungluongSelected) {
            storageError.textContent = 'Vui lòng chọn Dung lượng.';
        }
        
       

        if (!colorSelected) {
            colorError.textContent = 'Vui lòng chọn Màu sắc.';
        }

        if (!dungluongSelected || !colorSelected) {
            return false; 
        }
       

        return true; 
    }

    function inc() {
        let soluong = document.querySelector('[name="soluong"]');
        
            soluong.value = parseInt(soluong.value) + 1;
}

function dec() {
        let soluong = document.querySelector('[name="soluong"]');
            if (parseInt(soluong.value) > 0) {
            soluong.value = parseInt(soluong.value) - 1;
        }
}
</script>