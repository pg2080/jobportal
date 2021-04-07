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
          if(!isset($_SESSION['Login']['LId']))
        {
            header('Location:../Login.php');
        }
      
        ?>
        <?php $Jssql= "SELECT COUNT(*) As JsCount FROM jobseekerinfor ";$JsCount = mysqli_fetch_assoc(mysqli_query($conn, $Jssql));

       $Jobsql= "SELECT COUNT(*) As JobCount FROM tbljob ";$JobCount  = mysqli_fetch_assoc(mysqli_query($conn, $Jobsql));
       $Companysql="SELECT COUNT(*) As CompanCount FROM companyinfo "; $CompanyCout =  mysqli_fetch_assoc(mysqli_query($conn, $Companysql));
      
       //SELECT COUNT(*) FROM `companyinfo` GROUP BY Date(Created_on)
       
       function  GetCompanyData()
       {
           $sql = "SELECT COUNT(*) As CompanyDate,Date(Created_on) FROM `companyinfo` GROUP BY Date(Created_on) LIMIT  30";
           $data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
           echo json_encode($data);
           
       }
               ?>
         <div class="hero-wrap img" style="background-image: url(../styles/images/bg_1.jpg);">
      <div class="overlay"></div>
      <div class="container">
      	<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
	        <div class="col-md-10 d-flex align-items-center ftco-animate">
	        	<div class="text text-center pt-5 mt-md-5">
	        		<p class="mb-4">Find Job, Employment, and Career Opportunities</p>
	            <h1 class="mb-5">The Eassiest Way to Get Your New Job</h1>
							<div class="ftco-counter ftco-no-pt ftco-no-pb">
			        	<div class="row">
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-worldwide"></span>
				              	</div>
				              	<div class="desc text-left">
					                <span class="count" data-number="46"><?php echo $JobCount['JobCount']; ?></span>
					                <span>Jobs</span>
				                </div>
				              	
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-visitor"></span>
				              	</div>
                                            <div class="stat-content">
				              	<div class="text-left dib">
                                                    <div class="stat-text"><span class="count"><?php echo $CompanyCout['CompanCount'] ?></span></div>
					                <span>Companies</span>
					              </div>
                                            </div>
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-resume"></span>
				              	</div>
				              	<div class="desc text-left">
                                                    <span class="count"><?php echo $JsCount['JsCount']; ?></span>
					                <span>Active Employees</span>
					              </div>
				              </div>
				            </div>
				          </div>
				        </div>
			        </div>
							<div class="ftco-search my-md-5">
								<div class="row">
			            
				          
				        </div>
			        </div>
	          </div>
	        </div>
	    	</div>
      </div>
    </div>

    

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Job Categories</span>
            <h2 class="mb-0">Top Categories</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">Web Development <br><span class="number">354</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Graphic Designer <br><span class="number">143</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Multimedia <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Advertising <br><span class="number">90</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">Education &amp; Training <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">English <br><span class="number">200</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Social Media <br><span class="number">300</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Writing <br><span class="number">150</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">PHP Programming <br><span class="number">400</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Project Management <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Finance Management <br><span class="number">222</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Office &amp; Admin <br><span class="number">123</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">Web Designer <br><span class="number">324</span> <span>Open position</span></span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Customer Service <br><span class="number">564</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Marketing &amp; Sales <br><span class="number">234</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Software Development <br><span class="number">425</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        </div>
    	</div>
    </section>

    
        
  

    
    
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

      </body>
    <?php include './Footer.php'; ?>
</html>
