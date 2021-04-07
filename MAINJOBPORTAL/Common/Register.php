<?php
    include '../Connection.php';
    include '../validation.php';
    $error_fname = "";
    $error_address= "";
    $error_pincode="";
    $error_city="";
    $error_state="";
    $error_dob="";
    $error_gen="";
    $error_email="";
    $error_pass="";
    $error_c_pass="";
    $error_mobile="";
    $errorresult=true;
    if (isset($_POST['registerjs'])) {
        if(firstname($_POST['fullname']))
        {
            $error_fname = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_fname = "";
        }
        if(address($_POST['address']))
        {
            $error_address= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_address="";
        }
        if(pincode($_POST['pincode']))
        {
            $error_pincode= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_pincode="";
        }
        if(empty($_POST['states']))
        {
            $error_state= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_state="";
        }
        if(empty($_POST['position']))
        {
            $error_city= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_city="";
        }
        if(emails($_POST['email']))
        {
            $error_email= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_email="";
        }
        if(contacts($_POST['mobile']))
        {
            $error_mobile= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_mobile="";
        }
        if(pass($_POST['password']))
        {
            $error_pass= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_pass="";
        }
        if(empty($_POST['cpassword']))
        {
            $error_c_pass= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_c_pass="";
        }
        if(empty($_POST['dob']))
        {
            $error_dob= "Required Date Of Birth And You are to young for registration..";
            $errorresult=false;
        }
        else
        {
            $error_dob="";
        }
        if(empty($_POST['gender']))
        {
            $error_gen= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_gen="";
        }
        if($errorresult==false)
        {
            goto end;
        }
        $fname = $_POST['fullname'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        $mno = $_POST['mobile'];
        $state = $_POST['states'];
        $city = $_POST['position'];
        $dob = $_POST['dob'];
        $gen = $_POST['gender'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        if($pass==$cpass){
           $passw= md5($pass);
            $querylrc = 'INSERT INTO tbllogin(Email,Password,UserType) VALUES(?,?,?)';
            $stmtl = $conn->prepare($querylrc);
            $ut = "JS";
            $stmtl->bind_param('sss', $email, $passw, $ut);
            $stmtl->execute();

            $loginid = $conn->insert_id; //$_SESSION["loginid"]



            $sqls = "INSERT INTO jobseekerinfor(LoginId, FullName, Address, City, State, Gender, Resume, Mobile, DOB) VALUES($loginid,'$fname','$address',$city,$state,'$gen',0,'$mno','$dob')";
            //echo $sqls;
            if (mysqli_query($conn, $sqls)) {
                echo "<script>alert('User registered succesfully')</script>";
            } else {
                echo "<script>alert('error in User registeration')</script>";
            }
        }else{
            echo "<script>alert('password are not match')</script>";
        }
        
    }
    end:
    ?>

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

        .p{
               color:red;   
            }
    </style>
    <body class="form-v10">
        <div class="page-content" >
            <div class="form-v10-content" style="margin-top: 100px">
                <form class="form-detail" action="#" method="post" id="myform">
                    <div class="form-left">
                        <h2>General Infomation</h2>
                        <div class="form-row">
                            <input type="text" name="fullname" class="company" id="fullnme" placeholder="Full Name" pattern="[A-Za-z]*" autocomplete="off" required>
                            <span style="color: red;"><?php echo $error_fname;?></span>
                        </div>
                        <?php
                        /* require '../Connection.php';
                          require './CommonServices.php';
                          //$allstate = array();
                          $allstate =getstate($conn);
                          // print_r($allstate);
                          while ($re = mysqli_fetch_array($allstate))
                          {
                          // echo $re['StateId'];;
                          }
                         */
                        ?>

                        <div class="form-row">
                            <input type="text" name="address"  multiple="true"  class="container" id="address"  placeholder="Address"required>
                            <span style="color: red;"><?php echo $error_address;?></span>
                        </div>

                        <div class="form-row">
                            <input type="text" name="pincode"  multiple="true"  class="container" id="pincode"  placeholder="Pincode" pattern="[1-9][0-9]{5}"  maxlength="6" required>
                            <span style="color: red;"><?php echo $error_pincode;?></span>
                        </div> 

                        <div class="form-row">
                            <select id="state" name="states" required>
                            <span style="color: red;"><?php echo $error_state;?></span>
                                <option class="option" value="0">state</option>
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
                            <select name="position" id="city" name="cityy" required>
                            </select>
                            </select>
                            <span class="select-btn">
                                <i class="zmdi zmdi-chevron-down"></i>
                            </span>
                        </div>

                        <div class="form-row">
                            <input type="date" name="dob" class="input100 pad" placeholder="Date of Birth" required>
                            <span style="color: red;"><?php echo $error_dob;?></span>
                        </div>



                        <div class="form-group">
                            <div class="form-row form-row-4">
                                <select name="gender" required>
                                <span style="color: red;"><?php echo $error_gen;?></span>
                                    <option value="">Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                                <span class="select-btn">
                                    <i class="zmdi zmdi-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-right">
                        <h2>Contact Details</h2>

                        <div class="form-group">
                            <div class="form-row form-row-3">
                            <input type="text" name="mobile" class="business" id="mobile" placeholder="Mobile"  pattern="[9876][0-9]{9}"  maxlength="10" required>
                            <span style="color: red;"><?php echo $error_mobile;?></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <input type="email" name="email" class="street" id="street" placeholder="Email"  required>
                            <span style="color: red;"><?php echo $error_email;?></span>
                        </div>
                        <div class="form-row">
                            <input type="password" name="password" class="additional" id="password" placeholder="password"   required>
                            <span style="color: red;"><?php echo $error_pass;?></span>
                        </div>

                        <div class="form-row">
                            <input type="password" name="cpassword" class="additional" id="password" placeholder="Confirm password" required>
                            <span style="color: red;"><?php echo $error_c_pass;?></span>
                        </div>

                        <!--<div class="form-row">
                            <input type="date" minlength="18" name="password" class="additional" id="password" placeholder="password" required>
                        </div>

                        <div class="form-row">
                            <input type="date" minlength="18" name="password" class="additional" id="password" placeholder="password" required>
                        </div>

                        <div class="form-checkbox">
                            <label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>-->
                        <div class="form-row-last">
                            <input type="submit" name="registerjs" class="register" value="Register">
                        </div>
                    </div>
                </form>
                
               
            </div>
        </div>
    </body>
    
   
    
    <!-- This templates was made by Colorlib (https://colorlib.com) -->
    <?php include './Footer.php'; ?>
    
</html>