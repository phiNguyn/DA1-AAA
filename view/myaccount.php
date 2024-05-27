<?php
     if(isset($_SESSION['user'])&&(count($_SESSION['user'])>0))
     extract($_SESSION['user']);
   
    
?>

  <div class="flex max-lg:flex-col relative">
    <div class="w-auto flex flex-col gap-x-5  max-lg:w-full max-lg:flex max-lg:flex-row max-lg:justify-center">


     
        <button 
          class="max-lg:text-xs uppercase w-fit mt-6 text-md font-bold text-white bg-black rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
       <a href="index.php?page=user_info">Sửa thông tin</a> 
      </button>
      <button 
          class="uppercase w-fit  mt-6 text-md font-bold text-white bg-black rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
       <a href="index.php?page=list-donhang">Lịch sử đơn hàng</a> 
      </button>
     
    
    </div>
  

  <div class=" w-[400px] mx-auto h-auto flex flex-col justify-center items-center">
    <div  class=" w-full p-5 flex flex-col gap-y-5 shadow-xl shadow-gray-300 rounded-lg " >
      <h1 class="text-center"><b class="text-2xl">Tài khoản của bạn</b> </h1>
      <div class="border border-gray-300 px-4 py-2 rounded-md"><?=$name?></div>
      <div class="border border-gray-300 px-4 py-2 rounded-md"><?=$email?></div>
      <div class="border border-gray-300 px-4 py-2 rounded-md"><?=$phone?></div>
      <div class="border h-[42px] border-gray-300 px-4 py-2 rounded-md"><?=$address?></div>
    </div>

    <button 
      class="uppercase w-fit mx-auto mt-6 text-md font-bold text-black bg-white rounded-md py-3 px-6 border border-black">
   <a href="index.php?page=logout">Đăng xuất</a> 
  </button>

  </div>

</div>
 
  
