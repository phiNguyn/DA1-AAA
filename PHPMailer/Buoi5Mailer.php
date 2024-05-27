  <?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'src/Exception.php';
  require 'src/PHPMailer.php';
  require 'src/SMTP.php';


  $connection = mysqli_connect("localhost", "root", "", "test_da1");

  $email = $_POST["email"];
  $reset_token = "";

  $sql = "SELECT * FROM user WHERE email = '$email'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result) > 0)
  {
      $reset_token = time() . md5($email);
  }
  else
  {
      
  }

  $sql = "UPDATE user SET reset_token='$reset_token' WHERE email='$email'";
  
  mysqli_query($connection, $sql);

  $message = "<p>Please click the link below to reset your password</p>";
  $message .= "<a href='http://localhost:3000/index.php?page=resetPass&email=$email&reset_token=$reset_token'>";
  $message .= "Reset password";
  $message .= "</a>";


  //Create an instance; passing `true` enables exceptions
  function send_mail($to, $subject, $message)
  {
      $mail = new PHPMailer(true);

      try {
          //Server settings
      $mail->SMTPDebug = 0;                                       // Enable verbose debug output
      $mail->isSMTP();                                            // Set mailer to use SMTP
      $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username = 'dobinhduong1705@gmail.com'; // Thay 'your_email@gmail.com' bằng email của bạn
      $mail->Password = 'dkcpzjgcjgzexilj'; // Thay 'your_email_password' bằng mật khẩu email của bạn
      $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      $mail->setFrom('dobinhduong1705@gmail.com', 'ADMIN');
      //Recipients
      $mail->addAddress($to);

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $message;

      $mail->send();
      echo ' <div>
      <div class="email-container">
      <h1>Email Gửi Thành Công!</h1>
      <p class="success-message">Vui lòng kiểm tra email của bạn !</p>
      
      
      <p class="closing-message">Trân trọng,<br>All About Apple </p>
    </div>
      </div>
      ';
      } catch (Exception $e) {
      echo ' <div>
      <div class="email-container-incorrect">
      <h1> EMAIL KHÔNG ĐÚNG HOẶC KHÔNG TỒN TẠI !</h1>

      <a class="my-button" href="../index.php?page=login"> QUAY LẠI </a>
      </p>

      
      
      <p class="closing-message">Trân trọng,<br>All About Apple </p>
    </div>
      </div>
      '  ;
       
    }
  }
  send_mail($email, "Reset password", $message);
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
        background-color: #66FF99;
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
      .email-container-incorrect {
        width: 80%;
        max-width: 600px;
        margin: 20px auto;
        background-color: #FF6666;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      .email-container-incorrect h1 {
        color: yellow;
        text-align: center;
      }

      .email-container-incorrect p {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
      }

      .email-container-incorrect .success-message {
        font-weight: bold;
        color: #28a745;
      }

      .email-container-incorrect .cc-message {
        font-style: italic;
        color: #6c757d;
      }
/* CSS cho button */
.my-button {
  background-color: #3498db;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
  transition-duration: 0.4s;
}

/* Hover effect */
.my-button:hover {
  background-color: #2980b9;
  color: white;
}

      
      </style>
  </head>
  <body>
    <a href=""></a>
      
  </body>
  </html>