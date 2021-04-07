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
        include './Connection.php';
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
         <div class="hero-wrap img" style="background-image: url(styles/images/bg_1.jpg);">
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
			            
				          <div class="col-md-12 tab-wrap">
				            
				          
				              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
				              	<form action="#" class="search-job">
				              		<div class="row">
				              			<div class="col-md">
				              				<div class="form-group">
					              				<div class="form-field">
					              					<div class="icon"><span class="icon-user"></span></div>
									                <input type="text" class="form-control" placeholder="eg. Adam Scott">
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
					              					<div class="select-wrap">
							                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
							                      <select name="" id="" class="form-control">
							                      	<option value="">Category</option>
							                      	<option value="">Full Time</option>
							                        <option value="">Part Time</option>
							                        <option value="">Freelance</option>
							                        <option value="">Internship</option>
							                        <option value="">Temporary</option>
							                      </select>
							                    </div>
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
					              					<div class="icon"><span class="icon-map-marker"></span></div>
									                <input type="text" class="form-control" placeholder="Location">
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
									                <button type="submit" class="form-control btn btn-primary">Search</button>
									              </div>
								              </div>
				              			</div>
				              		</div>
				              	</form>
				              </div>
				            </div>
				          </div>
				        </div>
			        </div>
	          </div>
	        </div>
	    	</div>
      </div>
    </div>

    

      </body>
    <?php include './Footer.php'; ?>
</html>
