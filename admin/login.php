<?php
    include '../dao/pdo.php';
    include '../dao/user.php';  
    if(isset($_POST['btn-login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];           
        $user_admin=check_user($email,$password);
        if(isset($user_admin) && (is_array($user_admin)) && (count($user_admin)>0)){
          
          if($user_admin['role']==1){
            $_SESSION['admin']=$user_admin;
            header('location: index.php');
          } else{ 
            $thongBao='Tài khoản không được quyền truy cập';
            
          }
    
        }else{
          $thongBao='Thông tin đăng nhập không chính xác vui lòng kiểm tra lại';
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/css/output.css">
</head>
<body>
<main class="w-full h-screen relative  ">
    <div class="w-[400px] border  h-auto flex flex-col justify-center items-center gap-y-5  absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"  class="w-full p-5 flex flex-col gap-y-5 shadow-xl shadow-gray-300 rounded-lg border-black">
            <h1 class="text-center"><b class="text-2xl">ĐĂNG NHẬP TÀI KHOẢN </b> </h1>

            <input
                class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500 "
                type="text" id="name" name="email" placeholder="Email">

            <input
                class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
                type="password" id="password" name="password" placeholder="Mật Khẩu">



            <button type="submit" name="btn-login"
                class="w-fit mx-auto mt-6 text-xl font-bold text-white bg-black rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
                ĐĂNG NHẬP
            </button>


        </form>

        

    </div>

</main>
</body>
</html>