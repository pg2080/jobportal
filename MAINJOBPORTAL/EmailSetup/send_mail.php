<?php
   require 'PHPMailer-master/PHPMailerAutoload.php';
   
   
$mail = new PHPMailer();
$mail ->IsSmtp();
$mail ->SMTPDebug = 1;//0;
$mail ->SMTPAuth = true;
$mail ->SMTPSecure = 'ssl';
//$mail->Port=25;

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' =>   true
)
);

   //$mail ->Host = "tls.gmail.com";
   $mail->Host = 'smtp.gmail.com';
   //$mail->Host = 'tls://smtp.gmail.com';
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   //$mail ->Username = "f201506100110073@gmail.com";
   //$mail ->Password = "m1o2n3a4@";
   $mail ->Username = "bhikadiyanikita1298@gmail.com";
   $mail ->Password = "niki!1398";
   
   $mail ->SetFrom("bhikadiya.nikita12@gmail.com");
   $mail ->Subject = "OTP | Ashoka";
   $mail ->Body = "http://localhost/adminPanel/remark/material/base/addadmin.php";
   $mail ->AddAddress("f201506100110090@gmail.com");

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
	    echo "$mail->ErrorInfo";
   }
   else
   {
       echo "Mail Sent";
	    
   }