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
        include './Navbar.php';
        include '../Connection.php';
//       if(!isset($_SESSION['Login']['LId']))
//        {
//            header('Location:Login.php');
//            return;
//        }
        ?>
        <?php
if(isset($_GET['action']) && $_GET['action']=="apply")
{
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
//$sql = "Select tbljob.*,tbldepartment.*,companyinfo.*,tblcity.*,tblstate.* from tbljob Left Join tbldepartment on tbljob.DepartmentId = tblDepartment.DepartmentId left join companyinfo on tbljob.CompanyId = companyinfo.CompanyId INNER JOIN tblcity ON companyinfo.City = tblcity.CitytId INNER JOIN tblstate on companyinfo.State = tblstate.StateId WHERE EXISTS(SELECT * from tblappplication where (tbljob.JobId!=tblappplication.JobId or tblappplication.ApplicantId!=$LoginID) AND 1=1)";
$sql = "Select tbljob.*,tbldepartment.*,companyinfo.*,tblcity.*,tblstate.* from tbljob Left Join tbldepartment on tbljob.DepartmentId = tblDepartment.DepartmentId left join companyinfo on tbljob.CompanyId = companyinfo.CompanyId INNER JOIN tblcity ON companyinfo.City = tblcity.CitytId INNER JOIN tblstate on companyinfo.State = tblstate.StateId WHERE tbljob.Vacancy > 0";
    
$result = mysqli_query($conn, $sql);
           while ($r = mysqli_fetch_assoc($result)){
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
                                        <!--<a name="apj" class="btn btn-primary py-2" name='appyjob' href="JobView.php?action=apply&jc=<?php echo $r['JobId']; ?>&CC=<?php echo $r['CompanyId']; ?>&RC=<?php echo $r['HRLoginId']; ?>">Apply Job</a>-->
                                    </div>
                                </div>
                            </div><!-- end -->
           <?php }?>

                            
                            
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>
            
        </form>
        


        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    </body>
    <?php include './Footer.php'; ?>
</html>
