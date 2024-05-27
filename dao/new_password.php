<?php
 
$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = $_POST["new_password"];
 
$connection = mysqli_connect("localhost", "root", "", "test_da1");
 
$sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_object($result);
    if ($user->reset_token == $reset_token)
    {
        $sql = "UPDATE user SET password='$new_password' WHERE email='$email' AND reset_token='$reset_token'";
        mysqli_query($connection, $sql);
 
        echo ' <div>
        <div class="email-container">
        <h1>ĐỔI MẬT KHẨU THÀNH CÔNG !</h1>
        
        <p class="closing-message">Trân trọng,<br>All About Apple </p>
      </div>
        </div>;';
    }
    else
    {
        echo "Recovery email has been expired";
    }
}
else
{
    echo "Email does not exists";
}
?> 
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS style */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .email-container {
      width: 80%;
      max-width: 600px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #007bff;
      text-align: center;
    }

    p {
      font-size: 16px;
      line-height: 1.6;
      color: #333;
    }

    .success-message {
      font-weight: bold;
      color: #28a745;
    }

    .cc-message {
      font-style: italic;
      color: #6c757d;
    }

    .closing-message {
      text-align: right;
      margin-top: 20px;
      font-style: italic;
      color: #999;
    }
    </style>
</head>
<body>
    
</body>
</html>