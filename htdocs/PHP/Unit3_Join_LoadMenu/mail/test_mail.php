<?php defined('BASEPATH') OR exit('no direct script access allwed') ;

include APPPATH . "PHPMailer-master/src/PHPMailer.php";
include APPPATH . "PHPMailer-master/src/Exception.php";
include APPPATH . "PHPMailer-master/src/OAuth.php";
include APPPATH . "PHPMailer-master/src/POP3.php";
include APPPATH . "PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// 

/**
 * 
 */
//khai báo 1 đtuogn mail ra
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //2: để xhien lỗi ; nhập 0 là ko biết lỗi
    $mail->SMTPDebug = 2; 
    //smtp : sdung gmail để gửi                                // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hoaitugl@gmail.com';                 // SMTP username
    $mail->Password = 'hoaitu79';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    // người nhận nhìn tháy gửi từ mail nào từ đâu
    $mail->setFrom('hoaitugl@gmail.com', 'Admin From Post web');
   // email kachs khi nhạn mail
    $mail->addAddress('hoaitugl@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    // mail khi khách hàng phản hồi nhận đk đơn 
    $mail->addReplyTo('ihoaitugl@gmail.com', 'Information đơn hàng');
   
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    // //Attachments
    // gửi link 
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Xac nhan dky mua hang';
    // ND mail
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

 ?>