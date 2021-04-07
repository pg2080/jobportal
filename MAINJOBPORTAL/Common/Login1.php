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
        <link rel="stylesheet" type="text/css" href="../Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../Login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../Login_v3/css/main.css">
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
            <div class="container-login100" style="background-image: url('../Login_v3/images/bg-01.jpg');">
                <div class="wrap-login100" style="box-shadow: 0px 0px 17px #797979;margin-top: 70px">
                    <form class="login100-form validate-form" action="" method="post">
                        <span class="login100-form-logo">
                            <i class="zmdi zmdi-landscape"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
                            Log in
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="pass" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div class="container-login100-form-btn">
                            <input type="submit" name="login" value="Login" class="login100-form-btn" style="background: white;color: black">
                        </div>

                        <div class="text-center p-t-90">
                            <a class="txt1" href="#">
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
    require '../Connection.php';
    require './CommonServices.php';
    
    try {
        $_SESSION['Login']=array();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['pass'];
            $dataset = Login($username, $password, $conn);
            // print_r($dataset);
            // echo count($dataset);
            if (count($dataset) == 1) {
                echo "<script>alert('Lgoin successfully');</script>";

//                 print_r($dataset[0][3]);
                if ($dataset[0][3] == 'co') { //Company Login
                    $LoginId = $dataset[0][0];
                    $statq = "Select * from companyinfo where LoginId=.$LoginId.";
                    $result = mysqli_query($conn, $statq);
                    $_SESSION['Login']['Company'] = $result;
                    $_SESSION['Login']['CId'] = $dataset[0][0];
                    $_SESSION['Login']['ut'] = $dataset[0][3];

                    header("Location:../CompanyAdmin/Homepage.php");
                    ob_end_flush();
                }
                if ($dataset[0][3] == 'CH') { //Company Login
                    $LoginId = $dataset[0][0];
                    $statqq = "Select * from hrinfo where LoginId=$LoginId";
                    $results = mysqli_query($conn, $statqq);

                    $results = mysqli_fetch_array($results);
                    $Cid = $results['CompanyId'];
                    $statq = "Select * from companyinfo where CompanyId =$Cid";
                    $result = mysqli_query($conn, $statq);
                    print_r($result);
                    $r = mysqli_fetch_array($result);
                    $_SESSION['Login']['Company'] = $r;
                    $_SESSION['Login']['HRInfo'] = mysqli_fetch_array($results);
                    
                    $_SESSION['Login']['LId'] = $dataset[0][0];
                    $_SESSION['Login']['ut'] = $dataset[0][3];

                    header("Location:../CompanyHR/Homepage.php");
                    ob_end_flush();
                }
                 if ($dataset[0][3] == 'JS') { //Company Login
                    $LoginId = $dataset[0][0];
                    $statq = "Select * from jobseekerinfor where LoginId=.$LoginId.";
                    $result = mysqli_query($conn, $statq);
                    $_SESSION['Login']['JSI'] = $result;
                    $_SESSION['Login']['LId'] = $dataset[0][0];
                    $_SESSION['Login']['ut'] = $dataset[0][3];

                    header("Location:HomepageSeeker.php");
                    ob_end_flush();
                }
            } else {
                echo "<script>alert('Login falied');</script>";
            }
        }
    } catch (Exception $ex) {
        
    }
    ?>
    <?php ob_start();
    include './Footer.php';
    ob_flush(); ?>

</html>