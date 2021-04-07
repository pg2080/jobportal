<?php
include './Sidebar.php';
include '../Connection.php';
include '../validation.php';
$LoginId = $_SESSION['Login']['CId'];
//echo $LoginId;
$sql = "SELECT CompanyInfo.*,l.*,st.StateName,ct.CityName from CompanyInfo LEFT JOIN tbllogin l on l.LoginId = CompanyInfo.LoginId LEFT JOIN tblstate st ON st.StateId = CompanyInfo.State LEFT JOIN tblcity ct ON ct.CitytId = CompanyInfo.City where CompanyInfo.LoginId =  $LoginId";
$res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
//echo $sql;
//print_r($res);
?> 
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
    $l = $res['LoginId'];
    $sql = "UPDATE tbllogin set Password='$nep' WHERE LoginId = $l";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Password Updated Suceesfully')</script>";
    } else {
        echo "<script>alert('not Updated ')</script>";
    }
    //  echo $sql;
}
$error_name="";
$error_email="";
$error_mobile="";
$error_url="";
$error_address="";
$error_about="";
$errorresult=true;
if (isset($_POST['up'])) {

    if(empty($_POST['ContactPersonName']))
        {
            $error_name = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_name = "";
        }
    if(empty($_POST['AboutCompany']))
        {
            $error_about = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_about = "";
        }
    if(url($_POST['Wesite']))
        {
            $error_url = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_url = "";
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
    if(contacts($_POST['Mobile']))
        {
            $error_mobile= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_mobile = "";
        }
    if(emails($_POST['CompanyEmail']))
        {
            $error_email= "Required..";
            $errorresult=false;
        }
        else
        {
            $error_email = "";
        }
    if($errorresult==false)
        {
            goto end;
        }
    $ContactPersonName = $_POST['ContactPersonName'];
    $CompanyEmail = $_POST['CompanyEmail'];
    $Wesite= $_POST['Wesite'];
    $Address = $_POST['Address'];
    $AboutCompany = $_POST['AboutCompany'];
    $Mobile = $_POST['Mobile'];
    
    $sql = "UPDATE companyinfo SET Address='$Address',ContactPersonName='$ContactPersonName',Mobile='$Mobile',CompanyEmail='$CompanyEmail',Wesite='$Wesite',AboutCompany='$AboutCompany' WHERE LoginId= $LoginId";
    //echo $sql;
    $run=mysqli_query($conn, $sql);
    if ($run) {
        ?>
        <script>
        alert('Updated Suceesfully');
        window.open('COProfile.php','_self');
        </script>
        <?php

    } else {
        ?>
    <script>
    alert('not Updated');
    window.open('COProfile.php','_self');
    </script>
    <?php
    }
    echo $sql;
}
end:
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-header"><strong>My Company Profile </strong>
                        <button type="submit" data-toggle="modal" data-target="#myModal"   name="addjob" class=" btn btn-sm  pull-right btn-ca ml-2" title="click here to edit profile" value="">Edit Profile</button>
                        <a type="button" href="#chp"  name="addjob" class=" btn btn-sm  pull-right btn-ca" title="click here to change password" value=""> change password</a>

                    </div>
                    <div class="card-body card-block">
                        <form method="post">
                            <img src="../Common/Company/<?php echo $res["CompanyId"] . '.jpg'; ?>" class="mb-5" height="150px" width="100%" style="opacity: 1;box-shadow: 0px 0px 5px #545B61" >
                      <!--      <img src="../Common/Company/<?php echo $res["CompanyId"] . '.jpg'; ?>" height="125px" style="box-shadow: 0px 0px 22px #545B61;;position: absolute;margin-top: 59px;opacity: 1;margin-left: -397px;" >
                           --> 
                           <br>
                            Company Information: 
                            <div class="row pl-5 pr-3 mt-1">
                                <label class="fa fa-navicon"> Company Name : <?php echo $res['CompanyName'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-user-circle-o"> ContactPersonName : <?php echo $res['ContactPersonName'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3 ">
                                <label class="fa fa-globe"> CompanyEmail : <?php echo $res['CompanyEmail'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3 ">
                                <label class="fa fa-envelope"> Wesite : <?php echo $res['Wesite'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-map-marker"> Address : <?php echo $res['Address'] . ',' . $res['CityName'] . ',' . $res['StateName'] ?></label>
                            </div>
                            <div class="row pl-5 pr-3">
                                <label class="fa fa-phone"> Mobile : <?php echo $res['Mobile'] ?></label>
                            </div>


                            <div class="row pl-5 pr-3">
                                <label class="fa fa-caret-square-o-right"> AboutCompany : <?php echo $res['AboutCompany'] ?></label>
                            </div>

                            <div class="row pl-5 pr-3">
                                <label class="fa fa-envelope-o">Login Email : <?php echo $res['Email'] ?></label>
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
                        <label for="company" class=" form-control-label">ContactPersonName </label>
                        <input type="text" name="ContactPersonName" value="<?php echo $res['ContactPersonName'] ?>" id="company" placeholder="Contact Person Name" class="form-control">
                        <span style="color: red;"><?php echo $error_name;?></span>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">CompanyEmail  :</label>
                        <input type="text" name="CompanyEmail" value="<?php echo $res['CompanyEmail'] ?>" id="company" placeholder="CompanyEmail" class="form-control">
                        <span style="color: red;"><?php echo $error_email;?></span>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Mobile :</label>
                        <input type="text" name="Mobile" value="<?php echo $res['Mobile'] ?>" id="company" placeholder="Mobile No" class="form-control">
                        <span style="color: red;"><?php echo $error_mobile;?></span>
                    </div>

            
                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Website:</label>
                        <input type="text" name="Wesite" value="<?php echo $res['Wesite'] ?>" id="company" placeholder="Website" class="form-control">
                        <span style="color: red;"><?php echo $error_url;?></span>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Address :</label>
                        <input type="text" name="Address" value="<?php echo $res['Address'] ?>" id="company" placeholder="Address" class="form-control">
                        <span style="color: red;"><?php echo $error_address;?></span>
                    </div>

                        <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">AboutCompany  :</label>
                        <input type="text" name="AboutCompany" value="<?php echo $res['AboutCompany'] ?>" id="company" placeholder="About Company" class="form-control">
                        <span style="color: red;"><?php echo $error_about;?></span>
                    </div>

                </div>
                <div class="pr-3">
                    <button type="submit" class="btn btn-ca pull-right mb-5" name="up" >Update</button></div>
            </form>
      <!--     <form action="" method="post">
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





</div><?php include './Footer.php'; ?>

