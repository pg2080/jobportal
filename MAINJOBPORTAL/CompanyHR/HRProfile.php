<?php
include './Sidebar.php';
include '../Connection.php';
include '../validation.php';
$LoginId = $_SESSION['Login']['LId'];
$sql = "SELECT hrinfo.*,l.*,st.StateName,ct.CityName,p.DepartmentName,c.CompanyName from hrinfo LEFT JOIN tbllogin l on l.LoginId = hrinfo.LoginId  LEFT JOIN tblstate st ON st.StateId = hrinfo.State LEFT JOIN tblcity ct ON ct.CitytId = hrinfo.City LEFT JOIN tbldepartment p ON p.DepartmentId = hrinfo.DepartmentId LEFT JOIN companyinfo c ON c.LoginId = hrinfo.CompanyId where hrinfo.LoginId = $LoginId";
//echo $sql;
$res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
//print_r($res);
$error_name="";
$error_address="";
$error_gen="";
$error_dob="";
$error_mobile="";
$errorresult=true;
if (isset($_POST['up'])) {
    if(firstname($_POST['fname']))
    {
        $error_name = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_name = "";
    }
    if(address($_POST['Address']))
    {
        $error_address = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_address = "";
    }
    if(empty($_POST['gen']))
    {
        $error_gen = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_gen = "";
    }
    if(empty($_POST['DOB']))
    {
        $error_dob = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_dob = "";
    }
    if(contacts($_POST['Mobile']))
    {
        $error_mobile = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_mobile = "";
    }
if($errorresult==false)
    {
        goto end;
    }
    $olp = $_POST['fname'];
    $Add = $_POST['Address'];
    $gen = $_POST['gen'];
    $DOB = $_POST['DOB'];
    $Mobile = $_POST['Mobile'];
    $sql = "UPDATE hrinfo set HRFullName='$olp',Address='$Add',Mobile='$Mobile',Gender='$gen',DOB='$DOB' WHERE LoginId = $LoginId";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Updated Suceesfully')</script>";
    } else {
        echo "<script>alert('not Updated ')</script>";
    }
    //  echo $sql;
}
end:
?> 

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-header"><strong>My Profile </strong>
                        <button type="submit" data-toggle="modal" data-target="#myModal"   name="addjob" class=" btn btn-sm  pull-right btn-ca ml-2" title="click here to edit profile" value="">Edit Profile</button>
                            <a type="button" href="#chp"  name="addjob" class=" btn btn-sm  pull-right btn-ca" title="click here to change password" value=""> change password</a>

                    </div>
                    <div class="card-body card-block">
                        <form method="post">
                            <img src="../styles/images/bg_1.jpg" height="150px" width="100%" style="opacity: .5" >
                            <img src="../Common/Company/<?php echo $res["CompanyId"] . '.jpg'; ?>" height="125px" style="box-shadow: 0px 0px 22px #545B61;;position: absolute;margin-top: 59px;opacity: 1;margin-left: -397px;" >
                            <br><br><br>
                            Professional Information: 
                            <div class="row pl-5 pr-3 mt-2">
                                <label class="fa fa-globe"> Company Name : <?php echo $res['CompanyName'] ?></label>
                                
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-square-o"> Department : <?php echo $res['DepartmentName'] ?></label>
                            </div>
                            <br>
                            Personal Information: 

                            <div class="row pl-5 pr-3 mt-2">
                                <label class="fa fa-user"> Name : <?php echo $res['HRFullName'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-map-marker"> Address : <?php echo $res['Address'] . ',' . $res['CityName'] . ',' . $res['StateName'] ?></label>
                            </div>
                            <div class="row pl-5 pr-3">
                                <label class="fa fa-phone"> Mobile : <?php echo $res['Mobile'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-link"> Gender : <?php
                                    if ($res['Gender'] == 'f') {
                                        echo "<lable class='fa fa-female'>Female</lable>";
                                    }
                                    if ($res['Gender'] == 'm') {
                                        echo "<lable class='fa fa-male'>Male</lable>";
                                    }
                                    ?>


                                </label>
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-birthday-cake"> DOB : <?php echo $res['DOB'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-envelope"> Email : <?php echo $res['Email'] ?></label>
                            </div>


                        </form>  
                    </div>
                </div>
                
                
                         <div class="card" id="chp">
                    <div class="card-header"><strong>Change Password </strong>
                    </div>
                    <div class="card-body card-block">
                               <form action="" method="post">
                <div class="row pr-3 pl-3">
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">old Password:</label>
                        <input type="tex" name="olp"  id="company" placeholder="old Password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">new Password :</label>
                        <input type="text" name="nep" id="company" placeholder="new Password" class="form-control">
                    </div>
                </div>
                <div class="pt-2 pr-3  pb-3">
                    <center> <button type="submit" class="btn btn-ca " name="cp" >Change Password</button></center>  <br></div>
            </form>
   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body ">
                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Full Name</label>
                        <input type="text" name="fname" value="<?php echo $res['HRFullName'] ?>" id="company" placeholder="Full Name" class="form-control">
                        <span style="color: red;"><?php echo $error_name;?></span>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Address :</label>
                        <input type="text" name="Address" value="<?php echo $res['Address'] ?>" id="company" placeholder="Address" class="form-control">
                        <span style="color: red;"><?php echo $error_address;?></span>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Mobile :</label>
                        <input type="text" name="Mobile" value="<?php echo $res['Mobile'] ?>" id="company" placeholder="Mobile No" class="form-control">
                        <span style="color: red;"><?php echo $error_mobile;?></span>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Gender :</label>
                        <select name="gen" class="form-control">
                        <span style="color: red;"><?php echo $error_gen;?></span>
                            <?php if ($res['Gender'] == 'm') { ?>
                                <option value="m" selected>Male</option>
                            <?php } else { ?>
                                <option value="m" >Male</option>
                            <?php } if ($res['Gender'] == 'f') { ?>
                                <option value="f" selected>Female</option>
                            <?php } else { ?>
                                <option value="f">Female</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">DOB :</label>
                        <input type="date" name="DOB" value="<?php echo $res['DOB'] ?>" id="company" placeholder="Date Of Birth" class="form-control">
                        <span style="color: red;"><?php echo $error_dob;?></span>
                    </div>


                </div>
                <div class="pr-3">
                    <button type="submit" class="btn btn-ca pull-right mb-5" name="up" >Update</button></div>
            </form>
         <!--   <form action="" method="post">
                <div class="row pr-3 pl-3">
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">old Password:</label>
                        <input type="tex" name="olp"  id="company" placeholder="old Password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="company" class=" form-control-label">new Password :</label>
                        <input type="text" name="nep" id="company" placeholder="new Password" class="form-control">
                    </div>
                </div>
                <div class="pt-2 pr-3  pb-3">
                    <center> <button type="submit" class="btn btn-ca " name="cp" >Change Password</button></center>  <br></div>
            </form>-->
        </div>

    </div>
</div>
<?php
if (isset($_POST['cp'])) {
    
    $fname = $_POST['olp'];
    $passw= md5($fname);
    $nep = $_POST['nep'];
    $passr= md5($nep);
    
    if($passw == $res['Password'])
    {}
 else {
    echo"<script>alert('Password not match')</script>";
    return FALSE;
    }
    $sql = "UPDATE tbllogin set Password='$nep' WHERE LoginId = $LoginId";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Password Updated Suceesfully')</script>";
    } else {
        echo "<script>alert('not Updated ')</script>";
    }
    //  echo $sql;
}


?>



</div><?php include './Footer.php'; ?>

