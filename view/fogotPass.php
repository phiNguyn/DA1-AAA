<main class="w-full h-auto py-10">
    <div class="w-[400px]  mx-auto h-auto flex flex-col justify-center items-center gap-y-5">
        <form action="PHPMailer/Buoi5Mailer.php" method="post"  class="w-full p-5 flex flex-col gap-y-5 shadow-xl shadow-gray-300 rounded-lg" onkeyup="return emailValid()">
            <h1 class="text-center"><b class="text-2xl">KHÔI PHỤC TÀI KHOẢN </b> </h1>

            <input
                class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500 "
                type="text" id="emailvalid" name="email" placeholder="Email">

                <span class="email-error-mssg"></span>


            <button type="submit" name="btn-login"
                class="w-fit mx-auto mt-6 text-xl font-bold text-white bg-black rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
                HOÀN TẤT
            </button>


        </form>

        <div class="flex flex-col mt-5">
          <h1>Chưa có tài khoản?</h1>
          <a class="w-fit  mt-2 text-xl font-bold border border-black text-black bg-white rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0" href="index.php?page=dang-ky">Đăng ký</a>
        </div>

    </div>
    
</main>