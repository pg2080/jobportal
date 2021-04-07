<html lang="en">
    <head>
        <?php error_reporting(0); session_start(); ?>
        <title>MegnetMe - Free Bootstrap 4 Template by Colorlib</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../styles/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="../styles/css/animate.css">

        <link rel="stylesheet" href="../styles/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../styles/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="../styles/css/magnific-popup.css">

        <link rel="stylesheet" href="../styles/css/aos.css">

        <link rel="stylesheet" href="../styles/css/ionicons.min.css">

        <link rel="stylesheet" href="../styles/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="../styles/css/jquery.timepicker.css">


        <link rel="stylesheet" href="../styles/css/flaticon.css">
        <link rel="stylesheet" href="../styles/css/icomoon.css">
        <link rel="stylesheet" href="../styles/css/style.css">
        
        
      <?php 
      require './CommonServices.php';
      //error_reporting(0);
     checkIsLogin("JS");
                 /*   if(isset($_GET['act']) )
                    {
                        if($_GET['act']=='lg'){
                       $_SESSION['Login'] = array();
                               session_destroy();
                               header('Location:../Homepage.php');
                        }
                    }*/ 
        $IsResume = 0;
        $lid = $_SESSION['Login']['LId'];
        $sql="Select * from resume where loginId = $lid";
        $res = mysqli_fetch_all(mysqli_query($conn, $sql));
       
        if(count($res) == 1)
        {$IsResume = 1;
}
                    ?>
                  
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid px-md-4	">
                <a class="navbar-brand" href="index.html">JOB PORTAL</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  mr-md-1"><a href="HomepageSeeker.php" class="nav-link"><b>Home</b></a></li>
                        <li class="nav-item  "><a href="JobView.php" class="nav-link"><b>Browse Jobs</b></a></li>
                        <li class="nav-item  "><a href="FeedBack.php" class="nav-link"><b>FeedBack</b></a></li>

                        <li class="nav-item  mr-md-1"><a href="MyApplication.php" class="nav-link"><b>Application</b></a></li>
                        <li class="nav-item  mr-md-1"><a href="JSProfile.php" class="nav-link"><b>Profile</b></a></li>
                        <?php if($IsResume == 1) {?>
                        <li class="nav-item  mr-md-1"><a target="_blank" href="../Resume/resumeshow.php?apid=<?php echo $_SESSION['Login']['LId'] ?>" class="nav-link"><b>Resume</b></a></li>
                        <?php }else{?>
                        <li class="nav-item  mr-md-1"><a href="resumeadd.php" class="nav-link"><b>Add Resume</b></a></li>
                        <?php }?>

                        <li class="nav-item  mr-md-1"><a  href="NavbarLogin.php?act=lg"  class="nav-link"><b>Logout</b></a></li>
                        
                        <!-- <li class="nav-item cta cta-colored mr-md-1">
                                 <a href="job-post.html"  >
                                     Registration </a></li>
                                     
                        <!--<div  data-toggle="dropdown">class="nav-link dropdown-toggle "
                                <div class="dropdown-menu">
                                    <a  style="background-color: #FFF !important;border:none !important" class="dropdown-item" href="#">Recruiter </a>
                                    <a  style="background-color: #FFF !important;border:none !important" class="dropdown-item clMenu" href="#">Job Seeker</a>
                                </div>
                           </div>
                    </li>-->

                    </ul>
                </div>
            </div>
        </nav>


