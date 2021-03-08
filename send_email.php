<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST["submit"]))
{ echo $email=$_POST["email"];
}

try {
    set_time_limit(60);
    //Server settings
    $mail->isSMTP(true);                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hellobabai2136@gmail.com';                     // SMTP username
    $mail->Password   = '5nfrJHL2hjkhMuq';      

    //Set who the message is to be sent from

    $mail->setFrom('hellobabai2136@gmail.com', 'Email Auth Hall Management Center');
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('hellobabai2136@gmail.com', 'HMC');                         // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       =465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients       // Name is optional
    //$mail->addCC('hellobabai2136@gmail.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments

    // Content
    $randomNum=rand(100000,999999);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'OTP from Hall Management Center';
    $mail->Body    = "Your OTP is <b>".$randomNum."</b>";
    $mail->AltBody = "Your OTP is 000";
    $mail->send();
    echo 'success';
} catch (Exception $e) {
    echo "Mail can't be send. Check your mail ID";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<body>
    <style type="text/css">
        section{
            width: 70vw;
            height: 40vh;
            padding-top: 30vh;
            padding-left: 30vw;
        }
    </style>
  <!--Section: Block Content-->
<section class="mb-5 text-center ">

  <p>Set a new password</p>

  <form action="#!">

    <div class="md-form md-outline">
      <input type="password" id="newPass" class="form-control">
      <label data-error="wrong" data-success="right" for="newPass">New password</label>
    </div>

    <div class="md-form md-outline">
      <input type="password" id="newPassConfirm" class="form-control">
      <label data-error="wrong" data-success="right" for="newPassConfirm">Confirm password</label>
    </div>

    <button type="submit" class="btn btn-primary mb-4">Change password</button>

  </form>

</section>
<!--Section: Block Content-->
</body>
</html>