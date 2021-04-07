    <?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 10/01/2020
 * Time: 2:13 AM
 */

include 'email/PHPMailerAutoload.php';

class Email
{
    static public function send($from,$subject,$message,$to)
    {
        $mail = new PHPMailer(TRUE);
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = 'smtp.gmail.com';
        $mail ->Port = 465;//587
        $mail ->IsHTML(true);
        $mail ->Username ="jobportal2223@gmail.com";// "patelpreeta3554@gmail.com";
        $mail ->Password = "pd@22052080";//"PatelgmaiL3554";
        $mail ->SetFrom($from);
        $mail ->Subject = $subject;
        $mail ->Body = $message;
        $mail ->AddAddress($to);

        if(!$mail->Send())
        {
            echo 'Mail Send not';
            return false;
            
        }
        else
        {
            echo "<script>alert('Mail Sendd Succesfully')</script>";
            return true;
        }
    }
}



    /*$from="bhikadiya.nikita12@gmail.com";
    $to="f201506100110090@gmail.com";
    $message="hello";
    $subject="hello";
    $e=new Email();
    $p= $e->send($from, $subject, $message, $to);
    echo $p;*/
?>

   
        