<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V3</title>
        <meta charset="UTF-8">
        <?php include './Navbar.php'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="Login_v3/css/main.css">
        <!--===============================================================================================-->
    </head>
    <style>
        .ftco-navbar-light .navbar-nav > .nav-item.active > a,
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link
        {
            color: black
        }

    </style>
    <body>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('Login_v3/images/bg-01.jpg');">
                <div class="wrap-login100" style="box-shadow: 0px 0px 17px #797979;margin-top: 70px">
                    <form class="login100-form validate-form" action="" method="post">
<!--                        <span class="login100-form-logo">
                            <i class="zmdi zmdi-landscape"></i>
                        </span>-->

                        <span class="login100-form-title p-b-34 p-t-27">
                            Forget Password     
                        </span>
                        <br>
                        <br>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="Email" placeholder="Email">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <input type="submit" name="SendOTP" value="Send OTP" class="login100-form-btn" style="background: white;color: black">
                        </div>


                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="text" name="pass" placeholder="Enter OTP">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>


                        <div class="container-login100-form-btn">
                            <input type="submit" name="Chnage" value="GO" class="login100-form-btn" style="background: white;color: black">
                        </div>

                        <div class="text-center p-t-90">
                            <a class="txt1" href="ForgetPass.php">
                                Forgot Password?
                            </a>
                            <br>

                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        <script src="../Login_v3/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="../Login_v3/js/main.js"></script>

    </body>
    <?php
    include './Connection.php';
    require './Common/CommonServices.php';
    require './EmailSetup/Email.php';
    try {
       
        if (isset($_POST['SendOTP'])) {
            $email = $_POST['Email'];
            $_SESSION['OTPEmail'] = $email;
           
            
            
            $sql = "Select Email As e from tbllogin where Email = '$email' ";
            $RE = mysqli_query($conn, $sql);
            $rr = mysqli_fetch_assoc($RE);
            if (count($rr) == 1) {

                echo "<script>alert('Email With OTP Will sended on provided Email');</script>";
                $otparr = getOTP();
                echo $otparr;
                
                $sqls = "delete from tblotp where Email = '$email' ";
                 mysqli_query($conn, $sqls);
            
                
                $sqlotp = "INSERT INTO tblotp(OTP, Email) VALUES ($otparr,'$email')";
                echo $sqlotp;
                if (mysqli_query($conn, $sqlotp)) {
                    echo 'Error';
                } else {
                    return;
                }
                
                $from = "dhruvivaghela22@gmail.com";
                $subject = "Change Password";
                $message = "For Chnage Password of Your Job POrtal Your OTP is $otparr";

                $e = new Email();
                $p = $e->send($from, $subject, $message, $email);
            } else {
                echo "<script>alert('Email Not Exist');</script>";
            }
            print_r($rr);
      
        }

        if (isset($_POST['Chnage'])) {
 $em =  $_SESSION['OTPEmail'] ;
         $otp = $_POST['pass'];
            echo $otp;
            echo $otparr;
              $sqlotpp = "Select OTP from tblotp where  Email = '$em'";
              
                echo $sqlotpp;
                $r = mysqli_query($conn, $sqlotpp);
                $rr = mysqli_fetch_array($r);
                print_r($rr);
                if (mysqli_query($conn, $sqlotpp)) {
                    echo 'Error';
                } else {
                    return;
                }
                echo $rr[0]['OTP'];
            if ($otp == $rr[0]) {
                header("Location:ChangePass.php?Ema=$em");
            } else {
                echo "<script>alert('OTP Does Not Match');</script>";
            }
        }
    } catch (Exception $ex) {
        
    }

    function getOTP() {
        $generator = "1357902468";
        $result = "";

        for ($i = 1; $i <= 5; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        // Return result 
        return $result;
    }
    ?>
    <?php
    ob_start();
    include './Common/Footer.php';
    ob_flush();
    ?>

</html>