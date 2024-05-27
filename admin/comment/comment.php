<?php
$html_bl='';
foreach($all_bl as $item){
    extract($item);
    $name=cmt_name_idsp($iduser);
    $sp=get_sp_chitiet($idsp);
    if($hide==0){
        $check_hide='Hiện';
    }else{
        $check_hide='Ẩn';
    }
    $html_bl.='
    <tr class="text-gray-700">
                                    
                                    
                                    
                                    
                                    
                                    
                                    <td class="px-4 py-3 text-sm border">'.$noidung.'</td>
                                    <td class="px-4 py-3 text-sm border">'.$ngaybinhluan.'</td>
                                    <td class="px-4 py-3 text-sm border">'.$name.'</td>
                                    <td class="px-4 py-3 text-sm border">'.$sp['name'].'</td>   
                                    <td class="px-4 py-3 text-sm border">Bình luận: '.$check_hide.'</td>   
                                    <td class="px-4 py-3 text-lg border">
                                        <a href="" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-50 rounded-sm">Xem</a>
                                        <a href="" class="ml-2 px-2 py-1 font-semibold leading-tight text-red-700 bg-red-50 rounded-sm"> Xóa </a>

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
                <li><a href="">Bình luận</a></li> /
                <li><a href="">Sản phẩm</a></li>
            </ul>
        </div>
        <div></div>
    </header>


    <!-- Table -->
    <div class="w-full mt-12 bg-white rounded-lg py-5">
        


        <!-- table -->
        <!-- component -->
        <section class=" mx-auto px-2 font-roboto">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Nội dung</th>
                                <th class="px-4 py-3">Ngày bình luận</th>
                                <th class="px-4 py-3">Người bình luận</th>
                                <th class="px-4 py-3">Sản phẩm bình luận</th>
                                <th class="px-4 py-3">Hiện / ẩn bình luận</th>
                                
                                <th class="px-4 py-3">Chức Năng</th>


                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?=$html_bl?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- table -->

    </div>


</main>