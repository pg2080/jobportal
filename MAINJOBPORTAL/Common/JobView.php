<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include './NavbarLogin.php';
        include '../Connection.php';
       if(!isset($_SESSION['Login']['LId']))
        {
            header('Location:Login.php');
            return;
        }
        ?>
        <?php
if(isset($_GET['action']) && $_GET['action']=="apply")
{
    $Lid  = $_SESSION['Login']['LId'];
    $sql = "Select * from resume where LoginId = $Lid";
    $c  = count(mysqli_fetch_all(mysqli_query($conn, $sql)));
    if($c == 1){
    $jid=$_GET['jc'];
    $HRID = $_GET['RC'];
    $C = $_GET['CC'];
    $resultSess = $_SESSION['Login']['JSI'];
    $LgoinId = $_SESSION['Login']['LId'];
    $_GET['action']='?';
    $sql = "INSERT INTO tblappplication(JobId, ApplicantId,CompanyId,HRId,ResumeId) VALUES($jid,$LgoinId,$C,$HRID,1)";
    $_GET = array();
    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Applied Sucessfully')</script>";
        
        
    }
 else {
      echo "<script>alert('Error')</script>";
}
   // header("Location: JobView.php");   
   echo '<script>window.location.href="JobView.php";</script>';
    }
 else {
             echo "<script>alert('Add resume frist')</script>";
             echo '<script>window.location.href="resumeadd.php";</script>';
    }
    
}

?>
        <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-start">
                    <div class="col-md-12 ftco-animate text-center mb-5">
                        <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                        <h1 class="mb-3 bread">Browse Jobs</h1>
                    </div>
                </div>
            </div>
        </div>
        <form >
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 pr-lg-4">
                        <div class="row">
                           
                            
<?php  
$LoginID = $_SESSION['Login']['LId'];
 $date = date("Y-m-d");
//echo $LoginID;
//$sql = "Select tbljob.*,tbldepartment.*,companyinfo.*,tblcity.*,tblstate.* from tbljob Left Join tbldepartment on tbljob.DepartmentId = tblDepartment.DepartmentId left join companyinfo on tbljob.CompanyId = companyinfo.CompanyId INNER JOIN tblcity ON companyinfo.City = tblcity.CitytId INNER JOIN tblstate on companyinfo.State = tblstate.StateId WHERE EXISTS(SELECT * from tblappplication where (tbljob.JobId!=tblappplication.JobId or tblappplication.ApplicantId!=$LoginID) AND 1=1)";
$sql = "Select tp.ExpiredOn as ex, tbljob.*,tbldepartment.*,companyinfo.*,tblcity.*,tblstate.* from tbljob Left Join tbldepartment on tbljob.DepartmentId = tblDepartment.DepartmentId  left join companyinfo on tbljob.CompanyId = companyinfo.CompanyId INNER JOIN tblcity ON companyinfo.City = tblcity.CitytId LEFT JOIN tblpayment tp on tp.ComapnyId = companyinfo.LoginId INNER JOIN tblstate on companyinfo.State = tblstate.StateId WHERE tbljob.JobId NOT IN (SELECT tblappplication.JobId from tblappplication where tbljob.JobId=tblappplication.JobId AND tblappplication.ApplicantId=$LoginID)  AND tbljob.Vacancy > 0 Order By tbljob.jobId Desc";
//echo $sql; 
$result = mysqli_query($conn, $sql);
           while ($r = mysqli_fetch_assoc($result)){
               if($r['ex'] < $date)
                   continue;
               
// echo 'Hii';
 //echo $r['DepartmentName'];
          
?>
                            <div class="col-md-12 ftco-animate">
                                <div class="job-post-item p-4 d-block d-lg-flex align-items-center" style="">
                                    <div class="one-third mb-4 mb-md-0">
                                        <div class="job-post-item-header align-items-center">
                                            <span class="subadge"><?php
                                            if($r['JobTypeId']=='F')
                                            {
                                                echo 'Full Time';
                                            }
                                            if($r['JobTypeId']=='P')
                                            {
                                                echo 'Part Time';
                                            }
                                            if($r['JobTypeId']=='I')
                                            {
                                                echo 'InternShip';
                                            }
                                                
                                                ?></span>
                                            <span  class="ml-md-4" style="font-weight: 600"><?php echo " (Min Qualification Required: ".$r['Qualification'].")"?>
                                               </span>
                                            <h2 class="mr-3 text-black"><a href="#"><?php
                                                        echo $r['Designation'];
                                            ?></a></h2>
                                        </div>
                                        <div class="job-post-item-body d-block d-md-flex">
                                            <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php 
                                                    echo $r['CompanyName']
                                            ?></a></div>
                                            <div><span class="icon-my_location"></span> <span><?php 
                                                    echo 'Job Location: '.$r['Location'];
                                            ?></span>
                                            
                                                <br>
                                                <span class="icon-map-marker"></span> <span><?php 
                                                    echo "Company: ".$r['CityName'].','." ".$r['StateName']
                                            ?></span>
                                            </div>
                                        </div>
                                        
                                           <div class="job-post-item-body d-block d-md-flex">
                                            <div class="mr-3"><span class="icon-search"></span> <a href="#"><?php 
                                                    echo $r['Wesite']
                                            ?></a>
                                            <span style="margin-left: 12px" class="icon-envelope  "></span> <a href="#"><?php 
                                                    echo $r['CompanyEmail']."   "
                                            ?></a>
                                            </div>
                                               <div style="margin-left: 12px"><span class="icon-phone"></span> <span><?php 
                                                    echo " ".$r['Mobile']
                                            ?></span></div>
                                        </div>
                                        
                                        <div class="job-post-item-body d-block d-md-flex" style="color: blue">
                                            <div class="mr-3"><span style="color: #000" class="icon-briefcase"></span> <a style="color:  #17a2b8" href="#"><?php 
                                                    echo $r['ExpectedSalary']
                                            ?></a></div>
                                            <div><span class="icon-heart" style="text-transform:none;color:  #000"> </span><span style="color: #17a2b8">Expriance in Year :</span> <span style="color: #17a2b8"><?php 
                                                    echo $r['Experiance']
                                            ?></span></div>
                                        </div>
                                    </div>

                                    <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                        <div>
                                            <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                                <span class="icon-heart"></span>
                                            </a>
                                        </div>
                                        <a name="apj" class="btn btn-primary py-2" name='appyjob' href="JobView.php?action=apply&jc=<?php echo $r['JobId']; ?>&CC=<?php echo $r['CompanyId']; ?>&RC=<?php echo $r['HRLoginId']; ?>">Apply Job</a>
                                    </div>
                                </div>
                            </div><!-- end -->
           <?php }?>

                            
                            
                        </div>
                        
                    </div>
                    <!--<div class="col-lg-3 sidebar">
                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <h3 class="heading-sidebar">Browse Category</h3>
                            <form action="#" class="search-form mb-3">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                            <form action="#" class="browse-form">
                                <label for="option-job-1"><input type="checkbox" id="option-job-1" name="vehicle" value="" checked> Website &amp; Software</label><br>
                                <label for="option-job-2"><input type="checkbox" id="option-job-2" name="vehicle" value=""> Education &amp; Training</label><br>
                                <label for="option-job-3"><input type="checkbox" id="option-job-3" name="vehicle" value=""> Graphics Design</label><br>
                                <label for="option-job-4"><input type="checkbox" id="option-job-4" name="vehicle" value=""> Accounting &amp; Finance</label><br>
                                <label for="option-job-5"><input type="checkbox" id="option-job-5" name="vehicle" value=""> Restaurant &amp; Food</label><br>
                                <label for="option-job-6"><input type="checkbox" id="option-job-6" name="vehicle" value=""> Health &amp; Hospital</label><br>
                            </form>
                        </div>

                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <h3 class="heading-sidebar">Select Location</h3>
                            <form action="#" class="search-form mb-3">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                            <form action="#" class="browse-form">
                                <label for="option-location-1"><input type="checkbox" id="option-location-1" name="vehicle" value="" checked> Sydney, Australia</label><br>
                                <label for="option-location-2"><input type="checkbox" id="option-location-2" name="vehicle" value=""> New York, United States</label><br>
                                <label for="option-location-3"><input type="checkbox" id="option-location-3" name="vehicle" value=""> Tokyo, Japan</label><br>
                                <label for="option-location-4"><input type="checkbox" id="option-location-4" name="vehicle" value=""> Manila, Philippines</label><br>
                                <label for="option-location-5"><input type="checkbox" id="option-location-5" name="vehicle" value=""> Seoul, South Korea</label><br>
                                <label for="option-location-6"><input type="checkbox" id="option-location-6" name="vehicle" value=""> Western City, UK</label><br>
                            </form>
                        </div>

                        <div class="sidebar-box bg-white p-4 ftco-animate">
                            <h3 class="heading-sidebar">Job Type</h3>
                            <form action="#" class="browse-form">
                                <label for="option-job-type-1"><input type="checkbox" id="option-job-type-1" name="vehicle" value="" checked> Partime</label><br>
                                <label for="option-job-type-2"><input type="checkbox" id="option-job-type-2" name="vehicle" value=""> Fulltime</label><br>
                                <label for="option-job-type-3"><input type="checkbox" id="option-job-type-3" name="vehicle" value=""> Intership</label><br>
                                <label for="option-job-type-4"><input type="checkbox" id="option-job-type-4" name="vehicle" value=""> Temporary</label><br>
                                <label for="option-job-type-5"><input type="checkbox" id="option-job-type-5" name="vehicle" value=""> Freelance</label><br>
                                <label for="option-job-type-6"><input type="checkbox" id="option-job-type-6" name="vehicle" value=""> Fixed</label><br>
                            </form>
                        </div>
                    </div>-->
                </div>
            </div>
        </section>
            
        </form>
        <section class="ftco-section-parallax">
            <div class="parallax-img d-flex align-items-center">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                            <h2>Subcribe to our Newsletter</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                            <div class="row d-flex justify-content-center mt-4 mb-4">
                                <div class="col-md-12">
                                    <form action="#" class="subscribe-form">
                                        <div class="form-group d-flex">
                                            <input type="text" class="form-control" placeholder="Enter email address">
                                            <input type="submit" value="Subscribe" class="submit px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="ftco-footer ftco-bg-dark ftco-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Skillhunt Jobboard</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Employers</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="pb-1 d-block">Browse Candidates</a></li>
                                <li><a href="#" class="pb-1 d-block">Post a Job</a></li>
                                <li><a href="#" class="pb-1 d-block">Employer Listing</a></li>
                                <li><a href="#" class="pb-1 d-block">Resume Page</a></li>
                                <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
                                <li><a href="#" class="pb-1 d-block">Job Packages</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-4">
                            <h2 class="ftco-heading-2">Candidate</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="pb-1 d-block">Browse Jobs</a></li>
                                <li><a href="#" class="pb-1 d-block">Submit Resume</a></li>
                                <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
                                <li><a href="#" class="pb-1 d-block">Browse Categories</a></li>
                                <li><a href="#" class="pb-1 d-block">My Bookmarks</a></li>
                                <li><a href="#" class="pb-1 d-block">Candidate Listing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-4">
                            <h2 class="ftco-heading-2">Account</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="pb-1 d-block">My Account</a></li>
                                <li><a href="#" class="pb-1 d-block">Sign In</a></li>
                                <li><a href="#" class="pb-1 d-block">Create Account</a></li>
                                <li><a href="#" class="pb-1 d-block">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Have a Questions?</h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">

                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    </body>
    <?php include './Footer.php'; ?>
</html>
