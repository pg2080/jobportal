<?php
//include '../Common/CommonServices.php';
//checkIsLogin('co');
include './Sidebar.php';
include './../Connection.php';
include '../EmailSetup/Email.php';
?>     
<!-- Content -->
<script src="../CompanyHR/assets/js/lib/data-table/jquery-1.12.4.js"></script>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Payment</h4>
                    </div>
                    <div class="card-body">
                        <h6><b>Note:-</b> Your All rights are revoked untill Payment is not done</h6><br>
                        <div id="Plans">
                            <center>
                                <div class="col-md-7 col-sm-6 ">
                                    <?php
                                    require '../Common/Connection.php';
                                    $sql = "Select * from tblPlan where IsActive = 1";
                                    $res = mysqli_query($conn, $sql);
                                    //$rre = mysqli_fetch_assoc($res);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <div class="row p-3" id="lilirad_<?php echo $row['PlanId'] ?>" style="box-shadow: 0px 0px 3px gray"> 
                                            <div class="mr-5" style="height: 100px;background-color: whitesmoke;width: 100px;border-radius: 50%;border: 1px solid;">
                                                <center><label style="margin-top: 36%;font-size: 29px" class="fa fa-rupee"><?php echo $row['Amount'] ?></label></center></div>
                                            <div style="margin-top: 3%;font-weight: 600" class="ml-20">
                                                Plan Name: <?php echo $row['PlanName']; ?> <br>Duration :<?php echo $row['Duration']; ?> Month/s
                                            </div>
                                            
                                            <div style="margin-top: 7%" class="ml-5">
                                            
                                                <form action="pgRedirect.php" method="POST">
                                                <input type="hidden" name="PID" value="<?php echo $row['PlanId']; ?>" />
                                                <input type="hidden" name="AMOUNT" value="<?php echo $row['Amount']; ?>" />
                                                <input type="hidden" id="TXN_ID" tabindex="1" maxlength="20" size="20" name="TXN_ID"  value="<?php echo  "MAIN".rand(10000,99999999)?>">
                                            <input type="hidden" id="COM_ID" tabindex="2" maxlength="12" size="12" name="COM_ID"  value="<?php echo $_SESSION['Login']['CId']  ?>">
                                            
                                            <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID"  value="Retail">
                                            <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID"  value="WEB">
                                               <input  type="submit" class="btn btn-ca"  value="Payment" name="submit" />
                                               
                                               </form>
                                    </div>
                                        </div> <br><?php } ?>                                          
                                        <input type="hidden" value="" id="pll" name="pln" />                                  
                                        <input type="submit" id="pys" value="Next" onclick="" disabled="" class="btn btn-ca" style="color: white;cursor:pointer"/>
                     <input type="submit" name="py" value="Next" onclick=""  class="btn btn-ca" style="color: white;cursor:pointer"/>
                                </div>
                            </center>
                        </div>
                    
                        <!--<div id="payinfo" style="display: none">
                            <center>Your Selected Plan 
                                <input type="hidden" id="hdn" />
                                <div id="pl" class="col-md-7 col-sm-6 mt-2">

                                </div>
                                <input type="button" onclick="backdiv()"  id="pys" value="back" onclick=""  class="btn btn-ca" style="color: white;cursor:pointer"/>
                            </center>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





<?php include './Footer.php'; ?>
