<?php if(isset($eror)) : ?>
<div
    class="fixed right-12 top-[10%]  px-3 py-3 rounded-lg text-black text-lg bg-red-300 font-bold flex items-center gap-x-2 shadow-md shadow-gray-300 max-lg:right-1  max-lg:text-xs max-lg:p-1">
    <i class='text-white bx bx-md bx-error-circle rounded-full bg-red-500'></i>
    <span><?=$eror?></span>
</div>
<?php endif; unset($eror);?>
<!-- Thông báo -->



  <div class="w-[400px] mx-auto h-auto flex flex-col justify-center items-center">
    <form action="index.php?page=resign" method="post"  class="w-full p-5 flex flex-col gap-y-5 shadow-xl shadow-gray-300 rounded-lg" onsubmit="return validateForm()">
      <h1 class="text-center"><b class="text-2xl">ĐĂNG KÝ TÀI KHOẢN</b></h1>

      <label for="name" class="flex flex-col">
          
          <input class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
              type="text" id="name" name="name" placeholder="Họ tên">
              <span id="name-error" class="text-red-500 mt-2"></span>
      </label>

      <label for="phone" class="flex flex-col">
          
          <input class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
              type="tel" id="phonenumber" name="phone" placeholder="Số điện thoại">
              <span id="phonenumber-error" class="text-red-500 mt-2 "></span>
      </label>

      <label for="email" class="flex flex-col">
          <span id="email-error" class="text-red-500"></span>
          <input class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
              type="text" id="email" name="email" placeholder="Email">
      </label>

      <label for="password" class="flex flex-col">
          <span id="password-error" class="text-red-500"></span>
          <input class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
              type="password" id="password" name="password" placeholder="Mật khẩu">
      </label>

      <button type="submit" name="btn-register"  class="uppercase w-fit mx-auto mt-6 text-xl font-bold text-white bg-black rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
          Đăng ký
      </button>
    </form>

    <div class="flex flex-col mt-5 text-center">
      <h1>Đã có tài khoản?</h1>
      <a  class="w-fit uppercase mt-2 text-xl font-bold border border-black text-black bg-white rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0" href="index.php?page=login">Đăng nhập</a>
    </div>

  </div>
 
  

<script>
   function validateForm() {
    document.getElementById("name-error").innerHTML = "";
    document.getElementById("phonenumber-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";

    var name = document.getElementById("name").value;
    var phone = document.getElementById("phonenumber").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
   
    if (name.trim() === "") {
        document.getElementById("name-error").innerHTML = "Vui lòng nhập Họ tên.";
        return false;
    }

    if (!/^\d{10,11}$/.test(phone)) {
        document.getElementById("phonenumber-error").innerHTML = "Số điện thoại của bạn không hợp lệ.";
        return false;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("email-error").innerHTML = "Email của bạn không hợp lệ.";
        return false;
    }

    if (!/[A-Z]/.test(password)) {
        document.getElementById("password-error").innerHTML = "Mật khẩu của bạn phải chứa 1 chữ hoa.";
        return false;
    }
    if (password.length < 8 || !/\d/.test(password)) {
        document.getElementById("password-error").innerHTML = "Mật khẩu phải có ít nhất 8 ký tự và ít nhất 1 ký tự số.";
        return false;
    }

    return true;
}
</script> 