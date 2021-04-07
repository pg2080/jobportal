<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Form-v10 by Colorlib</title>
        <!-- Mobile Specific Metas -->
        <?php include './Navbar.php'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Font-->
        <link rel="stylesheet" type="text/css" href="../Register/css/montserrat-font.css">
        <link rel="stylesheet" type="text/css" href="../Register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <!-- Main Style Css -->
        <link rel="stylesheet" href="../Register/css/style.css"/>
        <script src="../styles/js/jquery.min.js"></script>

    </head>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#state").on("change", function () {
                var sid = $(this).val(); //document.getElementsByName("state").value;
                alert('Hii' + sid);
                $.ajax(
                        {
                            type: 'POST',
                            url: "CommonServices_1.php",
                            data: 'sid=' + sid,
                            //dataType: 'json',
                            success: function (result) {
                                console.log('data' + result);
                                $("#city").html(result);
                            }
                        })
            }
            );
        })
    </script>

    <style>
        .ftco-navbar-light .navbar-nav > .nav-item.active > a,
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link
        {
            color: black
        }

    </style>
    <body class="form-v10">
        <div class="page-content" >
            <div class="form-v10-content" style="margin-top: 100px">
                <form class="form-detail" action="#" method="post" id="myform" enctype="multipart/form-data">
                    <div class="form-left">
                        <h2>Company Infomation</h2>
                        <div class="form-row">
                            <input type="text" name="compnme" class="company" id="compname" placeholder="Name" required>
                        </div>
                        <div class="form-row">
                            <select id="state" name="states">
                                <option class="option" value="0">(select)</option>
                                <?php
                                require '../Connection.php';
                                require './CommonServices.php';
                                //$allstate = array();
                                $allstate = getstate($conn);

                                while ($re = mysqli_fetch_array($allstate)) {    //  print_r($allstate[$i])
                                    ?>

                                    <option value="<?php echo $re['StateId']; ?>"><?php echo $re['StateName']; ?></option>
                                <?php } ?>

                            </select>
                            <span class="select-btn">
                                <i class="zmdi zmdi-chevron-down"></i>
                            </span>
                        </div>

                        <div class="form-row"> 
                            <select name="position" id="city" name="cityy">
                            </select>
                            <span class="select-btn">
                                <i class="zmdi zmdi-chevron-down"></i>
                            </span>
                        </div>

                        <div class="form-row">
                            <input type="text" name="address"  multiple="true"  class="container" id="address"  placeholder="Address" required>
                        </div> 

                        <div class="form-row">
                            <input type="text" name="mobile" class="business" id="mobile" placeholder="Mobile" required>
                        </div>

                        <div class="form-row" >
                            <select class="dropdown" name="gen">
                                <option value="">Select Gender</option>
                                <option value="f">Female</option>
                                <option value="m">male</option>

                            </select>

                            <div class="form-row">
                                <input type="file" name="logo" class="form-control" id="logo" placeholder="Logo" required>
                            </div>

                        </div>



                    </div>
                    <div class="form-right">
                        <h2>Contact Details</h2>
                        <div class="form-row">
                            <label class="float-sm-left">Bith Date </label>
                            <input type="date" minlength="18" name="ob" class="additional" id="password" placeholder="password" required>
                        </div>

                        <div class="form-row">
                            <input type="text" name="Email" class="street" id="street" placeholder="Email" value="HR for <?php echo $_GET['tt']; ?> Department"  disabled="true" required>
                        </div>

                        <div class="form-row">
                            <input type="text" name="dept" class="street" id="street" placeholder="Email" value="<?php echo $_GET['email']; ?>"  disabled="true" required>
                        </div>



                        <div class="form-row">
                            <input type="password" name="password" class="additional" id="password" placeholder="password" required>
                        </div>



                        <div class="form-checkbox">
                            <label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="form-row-last">
                            <input type="submit" name="registercm" class="register" value="Register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
    <?php include './Footer.php'; ?>
    <?php
    include '../Connection.php';
    $email = $_GET['email']; //' Hi '.$params['name'].' your emailID is '.$params['email']; 
    //$u_time = $this->input->get('time'); // fetching time variable from URL
    $u_time = $_GET['AT'];
  //  $u_time = md5($u_time);
    //$u_time = $u_time;
    $cur_time = time();//md5(time()); //fetching current time to check with GET variable's time
    echo 'EMT' . $u_time;
    echo 'CTIME' . $cur_time;
    if ($cur_time - $u_time < 270000) {
        //echo 'No EXP';
    } else {
        echo "<script>alert('You can not register your link has been expired')</script>";
        return;
    }   
    $_POST['ctname'] = $email;
    $_POST['dept'] = $_GET['tt'];
    if (isset($_POST['registercm'])) {
        if ($cur_time - $u_time < 27000) {
            
        } else {
            echo "<script>alert('Youuuu  can not register your link has been expired')</script>";
            return;
        }

        $cname = $_POST['compnme'];
        $state = $_POST['states'];
        $city = $_POST['states'];
        $address = $_POST['address'];
        $dob = $_POST['ob'];
        $gen = $_POST['gen'];
        $mobile = $_POST['mobile'];
       // $email = $_POST['Email'];
        $password = $_POST['password'];
        $passwor= md5($password);
        $HRL = $_GET['LI'];
        $comp = $_GET['CID'];
        $dpt = $_GET['DId'];
        $sql = "INSERT INTO hrinfo(CompanyId, LoginId, DepartmentId, HRFullName, Address, Mobile, City, State, Gender, DOB) VALUES ($comp,$HRL,$dpt,'$cname','$address','$mobile'   ,$city,$state,'$gen','$dob')";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
         //   echo "<script>alert('HR registeration succesfull')</script>";
            
            $sqls = "update tblLogin set Password= '$passwor' where Email = '$email'";
            echo $sqls;
        if (mysqli_query($conn, $sqls)) {
                     echo "<script>alert('HR registeration succesfull ')</script>";
   
        }
 else {
              echo "<script>alert('HR Error 1')</script>";
   
 }  
        } else {
            echo "<script>alert('Error')</script>";
        }
    }
    ?>
</html>