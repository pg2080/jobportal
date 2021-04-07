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
                            Change Password     
                        </span>
                        <br>
                        <br>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="Email" placeholder="Old Password">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="text" name="pass" placeholder="New Password">
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
    $otparr = "";
    try {
        if (isset($_POST['Chnage'])) {
            $email = $_GET['Ema'];
            $oldpa = $_POST['Email'];
            $newpa= $_POST['pass'];
            $sql = "update tbllogin set Password = '$newpa' where Email = '$email' and Password = '$oldpa'";
            //echo $sql;
            if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Password Changed');</script>";
        
                } else {
                echo "<script>alert('Password  Not changed');</script>";
            }
        }
        
    } catch (Exception $ex) {
        
    }
    ?>
    <?php
    ob_start();
    include './Common/Footer.php';
    ob_flush();
    ?>

</html>