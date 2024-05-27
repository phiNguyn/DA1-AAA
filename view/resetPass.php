
<?php
 
$email = $_GET["email"];
$reset_token = $_GET["reset_token"];
 
$connection = mysqli_connect("localhost", "root", "", "test_da1");
 
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
    //
}
else
{
    echo "Email does not exists";
}

$user = mysqli_fetch_object($result);
if ($user->reset_token == $reset_token)
{
    //
}
else
{
    echo "Recovery email has been expired";
}

if ($user->reset_token == $reset_token)
{
    ?>
<main class="w-full h-auto py-10">
    <div class="w-[400px]  mx-auto h-auto flex flex-col justify-center items-center gap-y-5">
       

        <form action="dao/new_password.php" method="post"   class="w-full p-5 flex flex-col gap-y-5 shadow-xl shadow-gray-300 rounded-lg">
            <h1 class="text-center"><b class="text-2xl">HÃY NHẬP LẠI MẬT KHẨU  </b> </h1>
            <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
            <input
                class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500 "
                type="password" id="new_password " name="new_password" placeholder="Mật Khẩu">

            <input
                class="border border-gray-300 px-4 py-2 rounded-md transition duration-300 hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-500"
                type="password"  id="confirmpass"  placeholder=" Nhập Lại Mật Khẩu">



            <button type="submit" name="btn-login"
                class="w-fit mx-auto mt-6 text-xl font-bold text-white bg-black rounded-md py-3 px-6 hover:shadow-mysd duration-300 hover:shadow-gray-500 hover:-translate-y-1 hover:-translate-x-1 active:shadow-none active:translate-y-0 active:translate-x-0">
                HOÀN TẤT 
            </button>


        </form>

    

</main>
<?php
}
else
{
    echo "Recovery email has been expired";
}?>     
<script>
    function checkform(){

    
    var pass = document.getElementById('new_password').value;
var confirmpass = document.getElementById('confirmpass').value; 

if (pass == confirmpass) {
    alert("Khop !");
} else {
    alert("Mật khẩu không khớp !");
    return true;
};
    }
</script>