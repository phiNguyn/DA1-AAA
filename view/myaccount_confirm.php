<?php
     if(isset($_SESSION['user'])&&(count($_SESSION['user'])>0))
     extract($_SESSION['user']);
    
    
?>

  <div class="flex max-lg:flex-col relative">
   
  

  <form action="index.php?page=update-user" method="post" class=" w-[400px] mx-auto h-auto flex flex-col justify-center items-center">
    <div  class=" w-full p-5 flex flex-col gap-y-5 shadow-xl shadow-gray-300 rounded-lg " >
      <h1 class="text-center"><b class="text-2xl">Tài khoản của bạn</b> </h1>
      
      <input class="border border-gray-300 px-4 py-2 rounded-md" name="name" value="<?=$name?>">
      <input class="border border-gray-300 px-4 py-2 rounded-md" name="email" value="<?=$email?>">
      <input class="border border-gray-300 px-4 py-2 rounded-md" name="phone" value="<?=$phone?>">
      <input class="border border-gray-300 px-4 py-2 rounded-md" name="address" value="<?=$address?>">
     
      <button type="submit"  name="btn-update" 
      class="uppercase w-fit mx-auto mt-6 text-md font-bold text-black bg-white rounded-md py-3 px-6 border border-black">
   Lưu thay đổi
  </button>
    </div>

    
    <input type="hidden" name="id" value="<?=$id?>">
  </form>

</div>
 
  
