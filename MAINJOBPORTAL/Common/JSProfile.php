<?php
include './NavbarLogin.php';
include '../Connection.php';
$LoginId = $_SESSION['Login']['LId'];
//echo $LoginId;
$sql = "SELECT jobseekerinfor.*,l.*,st.StateName,ct.CityName from jobseekerinfor LEFT JOIN tbllogin l on l.LoginId = jobseekerinfor.LoginId  LEFT JOIN tblstate st ON st.StateId = jobseekerinfor.State LEFT JOIN tblcity ct ON ct.CitytId = jobseekerinfor.City where jobseekerinfor.LoginId = $LoginId";
$res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
//print_r($res);
//echo $sql;
?> 
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                <h1 class="mb-3 bread">My Applications</h1>
            </div>
        </div>
    </div>
</div>
<center>
    <br><br><br><br><br><br>
    <div class="card  shadow-lg p-3 mb-5 bg-white rounded" style="width: 60%;margin-top:-290px"><br>
        <div class=""><strong>My Profile </strong>

        </div>
        <div class="card-body card-block" style="font-size: 20px" >
            <form method="post">

                Personal Information: 

                <div class="row pl-5 pr-3 mt-2">
                    <label class="fa fa-user"> Name : <?php echo $res['FullName'] ?></label>
                </div>

                <div class="row pl-5 pr-3">
                    <label class="fa fa-map-marker"> Address : <?php echo $res['Address'] . ',' . $res['CityName'] . ',' . $res['StateName'] ?></label>
                </div>
                <div class="row pl-5 pr-3">
                    <label class="fa fa-phone"> Mobile : <?php echo $res['Mobile'] ?></label>
                </div>

                <div class="row pl-5 pr-3">
                    <label class="fa fa-link"> Gender : <?php
                        if ($res['Gender'] == 'F') {
                            echo "<lable class='fa fa-female'>Female</lable>";
                        }
                        if ($res['Gender'] == 'M') {
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
            <button type="submit" data-toggle="modal" data-target="#myModal"   name="addjob" class=" btn btn-md btn-primary" title="click here to edit profile" value="">Edit Profile</button>
            <a type="button" href="#chp"  name="addjob" class=" btn btn-md btn-danger" title="click here to change password" value=""> change password</a>
            <a type="button" href="resumeedit.php" target="_blank" name="addjob" class=" btn btn-md btn-primary" title="click here to change password" value=""> Edit Resume</a>

        </div>
        
</center>
<center>
    <div class="card  shadow-lg p-3 mb-5 bg-white rounded" id="chp" style="width: 60%;margin-top:0px"><br>
        <div class=""><strong>Change Password </strong>
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
                    <center> <button type="submit" class="btn btn-primary " name="cp" >Change Password</button></center>  <br></div>
            </form>

        </div>
    </div>
</center>
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
                        <input type="text" name="fname" value="<?php echo $res['FullName'] ?>" id="company" placeholder="Designation" class="form-control">
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Address :</label>
                        <input type="text" name="Address" value="<?php echo $res['Address'] ?>" id="company" placeholder="Designation" class="form-control">
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Mobile :</label>
                        <input type="text" name="Mobile" value="<?php echo $res['Mobile'] ?>" id="company" placeholder="Designation" class="form-control">
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">Gender :</label>
                        <select name="gen" class="form-control">
                            <?php if ($res['Gender'] == 'M') { ?>
                                <option value="M" selected>Male</option>
                            <?php } else { ?>
                                <option value="M" >Male</option>
                            <?php } if ($res['Gender'] == 'F') { ?>
                                <option value="F" selected>Female</option>
                            <?php } else { ?>
                                <option value="F">Female</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="row pr-3 pl-3">
                        <label for="company" class=" form-control-label">DOB :</label>
                        <input type="date" name="DOB" value="<?php echo $res['DOB'] ?>" id="company" placeholder="Designation" class="form-control">
                    </div>


                </div>
                <div class="pr-3">
                    <center> <button type="submit" class="btn btn-primary pull-right mb-5" name="up" >Update</button></center> </div>
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
    $passw = md5($fname);
    $nep = $_POST['nep'];
    $passr= md5($nep);

    if ($passw == $res['Password']) {
        
    } else {
        echo"<script>alert('Password not match')</script>";
        return FALSE;
    }
    $sql = "UPDATE tbllogin set Password='$passr' WHERE LoginId = $LoginId";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Password Updated Suceesfully')</script>";
    } else {
        echo "<script>alert('not Updated ')</script>";
    }
    //  echo $sql;
}

if (isset($_POST['up'])) {
    $fname = $_POST['fname'];
    $Add = $_POST['Address'];
    $gen = $_POST['gen'];
    $DOB = $_POST['DOB'];
    $Mobile = $_POST['Mobile'];
    $sql = "UPDATE  jobseekerinfor SET FullName='$fname',Address='$Add',Gender='$gen',Mobile='$Mobile',DOB='$DOB' WHERE  LoginId = $LoginId";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Updated Suceesfully')</script>";
    } else {
        echo "<script>alert('not Updated ')</script>";
    }
    echo $sql;
}
?>


</div><?php include './Footer.php'; ?>

