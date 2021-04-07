<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="colorlib">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Resume</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!-- start banner Area -->
        <section class="banner-area" id="home">
            <!-- Start Header Area -->
            <header class="default-header">
                <nav class="navbar navbar-expand-lg  navbar-light">
                    <div class="container">
                        <a class="navbar-brand" href="index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="text-white lnr lnr-menu"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li><a href="#home">Home</a></li>
                                <li><a href="#service">Service</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#project">Projects</a></li>
                            </ul>
                        </div>						
                    </div>
                </nav>
            </header>
            <!-- End Header Area -->
            <?php
            include '../Common/Connection.php';
            $lid = $_GET['apid'];
            $sql = "select j.*,r.* from jobseekerinfor j LEFT JOIN resume r on r.LoginId=j.LoginId WHERE j.LoginId= $lid";
            $res = mysqli_query($conn, $sql);
            $re = mysqli_fetch_assoc($res);
            ?>
            <div class="container">
                <div class="row justify-content-start align-items-center">
                    <div class="col-lg-6 col-md-12 no-padding banner-right">
                        <img class="img-fluid" src="img/header-img.png" alt="">
                    </div>						
                    <div class="col-lg-6 col-md-12 banner-left">
                        <h1 class="text-white">
                            Hi, I’m <br>
                            <span><?php echo $re['FullName'] ?></span> <br>
                           					
                        </h1>
                        <p class="mx-auto text-white  mt-20 mb-40">
                            
                        </p>
                        <a href="#" class="text-uppercase header-btn" data-toggle="modal" data-target="#myModal"> Resume Pdf</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner Area -->	

        <!-- Start service Area -->
        <section class="service-area section-gap" id="service"> 
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Have a Look at my Services</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                    </div>
                </div>						
                <div class="row ml-20">
                    <?php
                    $ser = explode(',', $re['Services']);
                    $bt = explode(',', $re['AboutServices']);
                    $i = 0;
                    for ($i = 0; $i < count($ser); $i++) {
                        ?>
                        <div class="single-service col-lg-5 col-md-5 mb-30 ml-50" style="box-shadow: 0px 0px 5px gray">

                            <div class="dec">
                                <h4 class="mt-30"><a href="#"><?php echo $ser[$i]; ?></a></h4>			
                                <p class="mt-20">
                                    <?php echo $bt[$i]; ?>          

                                </p>								
                            </div>
                        </div>
                    <?php } ?>

                    

                </div>
            </div>	
        </section>
        <!-- End service Area -->

        <!-- Start about Area -->
        <section class="about-area section-gap" id="about">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">About Myself</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                    </div>
                </div>					
                <div class="row">
                    <!--<div class="col-lg-6 about-left">
                        <p>
                            <b style="color: black;font-weight: 900"><h3>OBJECTIVE : </h3></b><br>   <?php echo $re['Objective'] ?> 
                        </p>
                        <h4 class="pb-40">Tools Expertness</h4>
                        <div class="skillbar" data-percent="85%">
                            <div class="skill-bar-percent">After Effects 85%</div>
                            <div class="skillwrap">
                                <div class="skillbar-bar" style="width: 85%;"></div>
                            </div>
                        </div>

                        <div class="skillbar" data-percent="80%">
                            <div class="skill-bar-percent">Photoshop 80%</div>
                            <div class="skillwrap">
                                <div class="skillbar-bar" style="width: 80%;"></div>
                            </div>
                        </div>

                        <div class="skillbar" data-percent="40%">
                            <div class="skill-bar-percent">Illustrator 40%</div>
                            <div class="skillwrap">
                                <div class="skillbar-bar" style="width: 40%;"></div>
                            </div>
                        </div>

                        <div class="skillbar" data-percent="70%">
                            <div class="skill-bar-percent">Sublime 70%</div>
                            <div class="skillwrap">
                                <div class="skillbar-bar" style="width: 70%;"></div>
                            </div>
                        </div>

                        <div class="skillbar" data-percent="75%">
                            <div class="skill-bar-percent">Sketch 75%</div>
                            <div class="skillwrap">
                                <div class="skillbar-bar" style="width: 75%;"></div>
                            </div>
                        </div>				                
                    </div>-->
                    <div class="col-lg-6 about-right justify-content-end d-flex">
                        <div class="myself-wrap">
                            <img class="img-fluid" src="img/about-img.jpg" alt="">
                            <div class="desc">
                                <h4><?php echo $re['FullName'] ?></h4>
                                <p class="pb-10">Served services at   <?php echo $re['Services'] ?> and manymore</p> 
                                <p><span class="lnr lnr-phone"></span> <?php echo $re['Mobile'] ?></p>
                                <p><span class="lnr lnr-envelope"></span></p>
                                <a class="mt-30 text-uppercase talk-btn" data-toggle="modal" data-target="#myModal" href="#">Resume PDF</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </section>
        <!-- End about Area -->

        <!-- Start qualification Area -->
        <section class="qualification-area pt-100 pb-80">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-20 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">My Qualifications</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                    </div>
                </div>		
                <center>
                    <div class="title text-center">
                        <h2 class="mb-10">My Highest  Qualifications is in <?php $qr = explode(',', $re['maxedu']);
                    echo $qr[0] . "<br>" . 'and it is Cleard  with ' . $qr[1];
                    ?> </h2>
                    </div>
                </center>
                <div class="row d-flex justify-content-center">
                    <!--<div class="col-lg-6 col-md-6 qty-left">
                        <div class="single-qly">
                            <h3 class="text-uppercase">Spondonit</h3>
                            <p>July 2015 to Present</p>
                            <h4 class="pt-20 pb-20">Creative Content Developer</h4>
                            <p>
                                All users on MySpace will know that there are millions of <br>people out there. Every day besides.
                            </p>							
                        </div>
                        <div class="btm-border d-block mx-auto"></div>								
                        <div class="single-qly">
                            <h3 class="text-uppercase">Codepixar</h3>
                            <p>May 2013 to Present</p>
                            <h4 class="pt-20 pb-20">UI/UX Designer</h4>
                            <p>
                                All users on MySpace will know that there are millions of <br>people out there. Every day besides.
                            </p>								
                        </div>							
                    </div>
                    <div class="col-lg-6 col-md-6 qty-right">
                        <div class="single-qly">
                            <h4 class="pb-20">Masters in Graphics & Fine Arts</h4>
                            <p><b>Session</b>: 2010-11</p>								
                            <p><b>Result</b>:  3.78 (In the Scale of 4.00)</p>									
                        </div>
                        <div class="btm-border d-block mx-auto"></div>							
                        <div class="single-qly">
                            <h4 class="pb-20">Bachelor in Graphics & UI/UX</h4>
                            <p><b>Session</b>: 2006-09</p>								
                            <p><b>Result</b>:  3.40 (In the Scale of 4.00)</p>									
                        </div>	
                        <div class="btm-border d-block mx-auto"></div>							
                        <div class="single-qly">
                            <h4 class="pb-20">Diploma in Fine Arts & Printing</h4>
                            <p><b>Session</b>: 2003-06</p>								
                            <p><b>Result</b>:  4.94 (In the Scale of 5.00)</p>								
                        </div>																				
                    </div>	--!>					
                </div>
            </div>	
        </section>
                    <!-- End qualification Area -->

                    <!-- Start project Area -->
                    <section class="project-area section-gap" id="project">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="menu-content pb-70 col-lg-8">
                                    <div class="title text-center">
                                        <h1 class="mb-10">Latest Done Projects</h1>
                                        <p>Which are from academic and research</p>
                                    </div>
                                </div>
                            </div>					
                            <div class="row">
                                <?php
                                $ext = explode(',', $re['ProjectImage']);
                                $pname = explode(',', $re['Project']);
                                $pdes = explode(',', $re['ProjectDescription']);
                                for ($i = 0; $i < count($pname); $i++) {
                                    ?>

    <?php if ($i % 2 == 0) { ?>
                                        <div class="col-lg-6 project-left" style="border-right: 2px solid #e2e2e2">
                                            <div class="single-project pb-100">
                                                <center> <?php if($i=0){ ?>  <img class="img-fluid" src="../Common/Resume/Proj1/<?php echo $ext[$i] ?>" width="360px" alt=""><?php }else{?>
                                                <img class="img-fluid" src="../Common/Resume/Proj2/<?php echo $ext[$i] ?>" width="360px" alt=""><?php }?></center>
                                                <h4 class="pt-30 pb-30"><a href="#"><?php echo $pname[$i] ?></a></h4>
                                                <p style="word-break: break-word;">
        <?php echo $pdes[$i]; ?>
                                                </p>
                                            </div>

                                        </div>

    <?php } else { ?>
                                        <div class="col-lg-6 project-right">
                                            <div class="single-project">
                                                <h4 class="pt-30 pb-30"><a href="#"><?php echo $pname[$i] ?></a></h4>
                                                <p class=" pb-30" style="word-break: break-word;">
        <?php echo $pdes[$i]; ?>

                                                </p>								
                                                <center>   <img class="img-fluid" src="../Common/Resume/Proj1/<?php echo $ext[$i] ?>" width="360px"/></center>
                                            </div>

                                        </div>
    <?php } ?>



<?php } ?>
                            </div>
                        </div>	
                    </section>
                    <!-- End project Area -->

                    <!-- Start feature Area -->
                    <section class="feature-area pt-100">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="menu-content pb-70 col-lg-8">
                                    <div class="title text-center">
                                        <h1 class="mb-10">Certificates</h1>
                                        <p>Who are in extremely love with eco friendly system.</p>
                                    </div>
                                </div>
                            </div>						
                            <div class="row">
                                <?php $cer = explode(',', $re['Certification']); for($i=0;$i< count($cer);$i++){ ?>
                                <div class="col-lg-4 col-md-6 ">
                                    <div class="single-feature mb-30">
                                        <div class="title d-flex flex-row pb-20">
                                            <span class="lnr lnr-user"></span>
                                            <h4><a href="#"> <?php echo  $cer[$i] ?></a></h4>
                                        </div>
                                       							
                                    </div>							
                                </div>
                                <?php }?>
                                
                                																			
                            </div>
                        </div>	
                    </section>

                    <div id="myModal" class="modal fade" data-backdrop="static" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                                                        <h4 class="modal-title">Resume</h4>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="post"> 
                                        <embed src="../Common/Resume/<?php echo $re['LoginId'] . '.pdf' ?>" width="750" height="500" 
                                               type="application/pdf">        

                                        </div>  
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <!-- End feature Area -->

                        <!-- start contact Area -->		
                        <!-- end contact Area -->		

                        <!-- start footer Area -->		
                        <!-- End footer Area -->			

                        <script src="js/vendor/jquery-2.2.4.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                        <script src="js/vendor/bootstrap.min.js"></script>
                        <script src="js/jquery.ajaxchimp.min.js"></script>
                        <script src="js/jquery.magnific-popup.min.js"></script>
                        <script src="js/parallax.min.js"></script>			
                        <script src="js/owl.carousel.min.js"></script>			
                        <script src="js/jquery.sticky.js"></script>

                        <script src="js/main.js"></script>	
                        </body>
                        </html>