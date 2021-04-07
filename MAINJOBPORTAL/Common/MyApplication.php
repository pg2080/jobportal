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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <?php
        // put your code here
        include './NavbarLogin.php';
        include '../Connection.php';
//       if(!isset($_SESSION['Login']['LId']))
//        {
//            header('Location:Login.php');
//            return;
//        }
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
        <form  method="post" action="">
            <section class="ftco-section bg-light"> 
                <div class="row">
                    <div class="container ">
                        <div class="col-lg-12 pr-lg-4">
                            <div class="col-lg-12 row bg-light" >
                                <b><label class="form-control-plaintext mt-1 mr-3" style="font-size: 20px">Status : </label></b>
                                <select class="form-control col-md-3 mr-2" name="ap">
                                    <option value="EALL" >ALL</option>
                                    <option value="AAP" >Application Approved</option>
                                    <option value="APE">Application Pending</option>
                                    <option value="ARJ">Application Rejected</option>
                                     <option value="IAP">Intervies Approved</option>
                                    <option value="IPE">Interview Pending</option>
                                    <option value="IRJ">Interview Rejected</option>
                                </select> 
                                <button type="submit" name="FLT" class="fa fa-filter  btn btn-primary" > Submit</button>
                            </div>
                                <br>                   
                            

                            <div class="row">
                                <?php
                                $JID = $_SESSION['Login']['LId'];
                                $sql = "SELECT cm.CompanyName,ap.Status as aps,ap.Remark as ar ,j.*,J.Location as JL, ap.*,hr.*,tbllogin.Email as Email,hr.LoginId as HRLoginId,dept.*,js.*,js.LoginId as JSLoginId,iw.*,iw.Status as interviewStatus from tblappplication ap RIGHT JOIN tbljob j on j.JobId = ap.JobId LEFT JOIN tbllogin on tbllogin.LoginId = ap.ApplicantId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId LEFT JOIN companyinfo cm on cm.CompanyId = ap.CompanyId LEFT JOIN tblinterview iw on iw.ApplicationId = ap.ApplicationId where js.LoginId =  $JID  ORDER BY ap.AppliedOn DESC";
                                //$res = mysqli_fetch_assoc($resultarr);
                                //echo count($res);
                                //print_r($res);
                                //echo $sql;
                                if(isset($_POST['FLT']))
                                {
                                   $ap = $_POST['ap'];
                                   $_POST['ap'] = $ap;
                                   $sp = substr($ap, 1);
                                   $ap = substr($ap,0,1);
                                  // echo $ap;
                                   if($ap=='A'){
                                        $sql = "SELECT cm.CompanyName,ap.Status as aps,ap.Remark as ar ,j.*,J.Location as JL, ap.*,hr.*,tbllogin.Email as Email,hr.LoginId as HRLoginId,dept.*,js.*,js.LoginId as JSLoginId,iw.*,iw.Status as interviewStatus from tblappplication ap RIGHT JOIN tbljob j on j.JobId = ap.JobId LEFT JOIN tbllogin on tbllogin.LoginId = ap.ApplicantId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId LEFT JOIN companyinfo cm on cm.CompanyId = ap.CompanyId LEFT JOIN tblinterview iw on iw.ApplicationId = ap.ApplicationId where js.LoginId =  $JID and ap.Status = '$sp'  ORDER BY ap.AppliedOn DESC";

                                   }
                                  else if($ap=='I'){
                                        $sql = "SELECT cm.CompanyName,ap.Status as aps ,ap.Remark as ar,j.*,J.Location as JL, ap.*,hr.*,tbllogin.Email as Email,hr.LoginId as HRLoginId,dept.*,js.*,js.LoginId as JSLoginId,iw.*,iw.Status as interviewStatus from tblappplication ap RIGHT JOIN tbljob j on j.JobId = ap.JobId LEFT JOIN tbllogin on tbllogin.LoginId = ap.ApplicantId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId LEFT JOIN companyinfo cm on cm.CompanyId = ap.CompanyId LEFT JOIN tblinterview iw on iw.ApplicationId = ap.ApplicationId where js.LoginId =  $JID and iw.Status = '$sp'  ORDER BY ap.AppliedOn DESC";

                                   }
                                    else {
                                        $sql = "SELECT cm.CompanyName,ap.Status as aps,ap.Remark as ar ,j.*,J.Location as JL, ap.*,hr.*,tbllogin.Email as Email,hr.LoginId as HRLoginId,dept.*,js.*,js.LoginId as JSLoginId,iw.*,iw.Status as interviewStatus from tblappplication ap RIGHT JOIN tbljob j on j.JobId = ap.JobId LEFT JOIN tbllogin on tbllogin.LoginId = ap.ApplicantId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId LEFT JOIN companyinfo cm on cm.CompanyId = ap.CompanyId LEFT JOIN tblinterview iw on iw.ApplicationId = ap.ApplicationId where js.LoginId =  $JID  ORDER BY ap.AppliedOn DESC";
 
                                   }
                                  // echo $sql;
                                }$count = 0;
                                  $resultarr = mysqli_query($conn, $sql);
                                    $resu= mysqli_query($conn, $sql);

                             if(count(mysqli_fetch_all($resu)) <=0)
                             {
                                 echo 'No Record Found. You might not have any appliction in this context';
                                 return;
                             }
                                ?>
                                <table style="background: white" class="table table-striped table-bordered table-responsive table-hover">
                                    <thead class="thead-dark ">
                                    <th>Sr. No.</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th>Job Type</th>
                                    <th>Salary (Expected)</th>
                                    <th>Applied On</th>
                                    <th>Department</th>
                                    <th>Application status</th>
                                                                        <th>Application Remark</th>

                                    <th>Interview Status</th>    
                                    </thead>
                                    <?php while ($row = mysqli_fetch_assoc($resultarr)) { ?>
                                        <tr>
                                            <td>  <?php echo  ++$count.'.';  ?> </td>
                                            <td><?php echo $row['Designation']; ?></td>
                                            <td><?php echo $row['CompanyName']; ?></td>
                                            <td><?php echo $row['JL']; ?></td>
                                            <td><?php
                                                if ($row['JobTypeId'] == 'F') {
                                                    echo 'Full Time';
                                                } elseif ($row['JobTypeId'] == 'P') {
                                                    echo 'Part Time';
                                                } else {
                                                    echo 'Intership';
                                                }
                                                ?></td>
                                            <td><?php echo $row['ExpectedSalary']; ?></td>
                                            <td><?php echo $row['AppliedOn']; ?></td>
                                            <td><?php echo $row['DepartmentName']; ?></td>
                                            <td><?php 
                                                                                        
                                             if (empty($row['aps'])) 
                                                 echo '---';
                                             else {
                                                 
                                             if ($row['aps'] == 'PE') {
                                                    echo "<font color=gray>Pending</font>";

                                                } elseif ($row['aps'] == 'RJ') {
                                                echo "<font color=red>Rejected</font>";
                                                } else {
                                                    echo "<font color=green>Approved</font>";
                                                }
                                             }
                                            ?></td>
                                            <td><?php echo $row['ar']; ?></td>
                                            <td><?php 
                                              if (empty($row['interviewStatus'])) 
                                                 echo "<center style='font-weight:700'>-NA-</center>";
                                             else {
                                           
                                            if ($row['interviewStatus'] == 'PE') {
                                                    echo "<font color=gray>Pending</font>";

                                                } elseif ($row['interviewStatus'] == 'RJ') {
                                                echo "<font color=red>Rejected</font>";
                                                } else {
                                                    echo "<font color=green>Approved</font>";
                                             }}?></td>

                                        </tr>
<?php } ?>


                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </form>
        <!--<section class="ftco-section-parallax">
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

                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. </p>
                    </div>
                </div>
            </div>
        </footer>-->



        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    </body>
<?php include './Footer.php'; ?>
</html>
