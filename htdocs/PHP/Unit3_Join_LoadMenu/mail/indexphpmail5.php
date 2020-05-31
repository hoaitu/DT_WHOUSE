<?php 
require 'phpmailer/PHPMailerAutoload.php' ;
require 'phpmailer/class.phpmailer.php';
require 'phpmailer/class.smtp.php';

    //smtp : sdung gmail để gửi  
    $mail = new PHPMailer ;    
    $mail->SMTPDebug = 2;                           // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hoaitugl@gmail.com';                 // SMTP username
    $mail->Password = 'hoaitu79';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    // người nhận nhìn tháy gửi từ mail nào từ đâu
    $mail->setFrom('tuhoaitu79@gmail.com', 'Admin From Post web');
   // email kachs khi nhạn mail
    $mail->addAddress('hoaitugl@gmail.com', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    // mail khi khách hàng phản hồi nhận đk đơn 
    $mail->addReplyTo('tuhoaitu79@gmail.com', 'Information đơn hàng');
   
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    // //Attachments
    // gửi link 
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Xac nhan dky mua hang';
    // ND mail
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    if ($mail->send()) {
    echo 'Message has been sent';
}else {
    echo 'Message could not be sent. Mailer Error:................... ';
}

 ?>