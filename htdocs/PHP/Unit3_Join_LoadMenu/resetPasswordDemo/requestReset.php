<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

// Load Composer's autoloader
// require 'vendor/autoload.php';

if(isset($_POST['email'])){
    $emailTo = $_POST['email'] ;
// uniqid(): để tạo ra một chuỗi duy nhất tạo duy nhất ID
    $code =  uniqid(true);
    // 
    $query = mysqli_query($connection , "INSERT INTO resetpassword(code , email) VALUES ('$code' , '$emailTo') ");
    // 
    // 
    $query2 =  mysqli_query($connection , "SELECT email FROM user WHERE email = '$emailTo' ");

    if (!$query){
        exit ("Error") ;
    }
    


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = ' smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hoaitugl@gmail.com';                     // SMTP username
    $mail->Password   = 'hoaitu79';                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->SMTPSecure = 'ssl';  
      $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients: người gửi mail mặc định
    $mail->setFrom('hoaitugl@gmail.com', 'Mailer');
    // $mail->addAddress('hoaitugl@gmail.com');     // Add a recipient
     $mail->addAddress($emailTo);  

              // Name is optional
    $mail->addReplyTo('no-reply@gmail.com', 'No reply');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
   
    $url  = "http://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/resetPassword.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "<h1>You request a password reset</h1> Click <a href = '$url'> this link</a> to do something ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Reset password has been sent to your email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();

}
?>
<form method="POST">
    <input type="text" name="email" autocomplete="off"><br>

 <input type="submit" name="submit" value="Reset email"><br>
</form>