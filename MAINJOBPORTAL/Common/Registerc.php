<?php
    include '../Connection.php';
    include './CommonServices.php';
    include '../validation.php';
    $error_cname = "";
    $error_companme= "";
    $error_address= "";
    $error_email="";
    $error_Email="";
    $error_pass="";
    $error_mobile="";
    $error_image="";
    $error_url="";
    $error_about="";
    $errorresult=true;
    if (isset($_POST['registercm'])) {
        if(firstname($_POST['ctname']))
        {
            $error_cname = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_cname = "";
        }
        if(firstname($_POST['compnme']))
        {
            $error_companme = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_companme = "";
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
        
        
        if(emails($_POST['cemail']))
        {
            $error_email= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_email="";
        }
        if(emails($_POST['Email']))
        {
            $error_Email= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_Email="";
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
        $test_img2=$_FILES['logo']['name'];
                
        if(images($test_img2))
        {   
            $error_image="JPEG,JPG or PNG file.";
            $errorresult=false;
        }
        else{
            $error_image="";
        }

        if(url($_POST['cWebsite']))
        {
            $error_url= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_url="";
        }
        if(empty($_POST['cAbout']))
        {
            $error_about= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_about="";
        }
        if($errorresult==false)
        {
            goto end;
        }
        $cname = $_POST['ctname'];
        $compnme = $_POST['compnme'];
        $state = $_POST['states'];
        $city = $_POST['states'];
        $address = $_POST['address'];
        $ctname = $_POST['ctname'];
        $mobile = $_POST['mobile'];
        $cEmail = $_POST['cemail'];
        $cWebsite = $_POST['cWebsite'];
        $cAbout = $_POST['cAbout'];
        $email = $_POST['Email'];
        $password = $_POST['password'];
        $passwor= md5($password);
        //$password= $password;

        $logo = $_FILES['logo']['name'];
       $id= RegisterCompany($conn, $compnme, $address, $city, $state, $cname, $mobile, $cEmail, $cWebsite, $logo, $cAbout, $email, $passwor);

        $target_dir = "Company/";
        $target_file = $target_dir . $id.'.jpg'; // basename($_FILES["logo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         $check = getimagesize($_FILES["logo"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
            return;
        }
        echo 'All OK';
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["logo"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
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

    </style>
    <body class="form-v10">
        <div class="page-content" >
            <div class="form-v10-content" style="margin-top: 100px">
                <form class="form-detail" action="#" method="post" id="myform" enctype="multipart/form-data">
                    <div class="form-left">
                        <h2>Company Infomation</h2>
                        <div class="form-row">
                            <input type="text" name="compnme" class="company" id="compname" placeholder="Company Name" required>
                            <span style="color: red;"><?php echo $error_companme;?></span>
                        </div>
                        <div class="form-row">
                            <select id="state" name="states">
                                <option class="option" value="0">state</option>
                                <?php
                                require '../Connection.php';
                               // require './CommonServices.php';
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
                            </select>
                            <span class="select-btn">
                                <i class="zmdi zmdi-chevron-down"></i>
                            </span>
                        </div>

                        <div class="form-row">
                            <input type="text" name="address"  multiple="true"  class="container" id="address"  placeholder="Address" required>
                            <span style="color: red;"><?php echo $error_address;?></span>
                        </div> 
                        <div class="form-row">
                            <input type="text" name="ctname" class="company" id="ctname" placeholder="Contact Peroson Name" required>
                            <span style="color: red;"><?php echo $error_cname;?></span>
                        </div>

                        <div class="form-row">
                            <input type="text" name="mobile" class="business" id="mobile" placeholder="Mobile" required>
                            <span style="color: red;"><?php echo $error_mobile;?></span>
                        </div>
                        <div class="form-row">
                            <input type="file" name="logo" class="street" id="logo" placeholder="Logo" accept=".jpg,.jpeg,.png" required>
                            <span style="color: red;"><?php echo $error_image;?></span>
                        </div>



                    </div>
                    <div class="form-right">
                        <h2>Contact Details</h2>
                        <div class="form-row">
                            <input type="text" name="cemail" class="street" id="street" placeholder="Email" required>
                            <span style="color: red;"><?php echo $error_email;?></span>
                        </div>
                        <div class="form-row">
                            <input type="url" name="cWebsite" class="street" id="Website" placeholder="Website" required>
                            <span style="color: red;"><?php echo $error_url;?></span>
                        </div>
                        <div class="form-row">
                            <input type="text" name="cAbout" class="street" id="About" placeholder="About" required>
                            <span style="color: red;"><?php echo $error_about;?></span>
                        </div>

                        <div class="form-row">
                            <input type="email" name="Email" class="street" id="street" placeholder="Email" required>
                            <span style="color: red;"><?php echo $error_Email;?></span>
                        </div>

                        <div class="form-row">
                            <input type="password" name="password" class="additional" id="password" placeholder="password" required>
                            <span style="color: red;"><?php echo $error_pass;?></span>
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
    
</html>