<?php
//include '../Common/CommonServices.php';
//checkIsLogin('CH');
include './Sidebar.php';
include './../Connection.php';
include '../EmailSetup/Email.php';
?>     
<!-- Content -->
<script src="../CompanyHR/assets/js/lib/data-table/jquery-1.12.4.js"></script>
                <script type="text/javascript">
                                                        $(document).ready(function () {

                                                            var optionM = "<option value=-1>Minutes</option>";
                                                            optionM = optionM + "<option value=00>00</option>";
                                                            var optionH = "<option value=00>Hours</option>";
                                                            for (var i = 1; i <= 60; i++)
                                                            {
                                                                if (i < 13)
                                                                    optionH = optionH + "<option value=" + i + ">" + i + "</option>";

                                                                optionM = optionM + "<option value=" + i + ">" + i + "</option>"
                                                            }
                                                            $(".dateH").append(optionH);
                                                            $(".timeM").append(optionM);

                                                        });
                                                    </script>
                                    
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Applicants</h4>
                    </div>
                    <div class="card-body">
                        <div class="custom-tab">

                            <nav>
                                <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-NA-tab" data-toggle="tab" href="#custom-nav-NA" role="tab" aria-controls="custom-nav-NA" aria-selected="true">New Applicants</a>
                                    <a class="nav-item nav-link" id="custom-nav-SH-tab" data-toggle="tab" href="#custom-nav-SH" role="tab" aria-controls="custom-nav-SH" aria-selected="false">Shortlisted</a>
                                    <a class="nav-item nav-link" id="custom-nav-RJ-tab" data-toggle="tab" href="#custom-nav-RJ" role="tab" aria-controls="custom-nav-RJ" aria-selected="false">Rejected</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-NA" role="tabpanel" aria-labelledby="custom-nav-NA-tab">
                                    <section class="ftco-section ftco-candidates ftco-candidates-2 ">
                                        <div class="container ">
                                            <div class="row">
                                                <br><br>
                                                <div class="col-lg-12 pr-lg-4 ">

                                                    <?php
                                                    $Cid = $_SESSION['Login']['Company']['CompanyId'];
$Ciid = $_SESSION['Login']['HRInfo']['DepartmentId'];
                                                                                                        
//echo $Cid;
                                                  //  $sqln = "SELECT j.*,ap.*,hr.*,hr.LoginId as HRLoginId, dept.*,js.*,js.LoginId as JSLoginId from tblappplication ap LEFT JOIN tbljob j on j.CompanyId = ap.CompanyId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId where ap.CompanyId = $Cid and ap.Status = 'PE' GROUP BY ap.applicationId ";
                                                    $sqln = "SELECT j.*, ap.*,hr.*,tbllogin.Email as Email,hr.LoginId as HRLoginId,dept.*,js.*,js.LoginId as JSLoginId from tblappplication ap RIGHT JOIN tbljob j on j.JobId = ap.JobId  LEFT JOIN tbllogin on tbllogin.LoginId = ap.ApplicantId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId where ap.CompanyId = $Cid and ap.Status = 'PE' and hr.DepartmentId=$Ciid Order by ap.ApplicationId Desc ";
                                                    //echo $sqln;
                                                    $result = mysqli_query($conn, $sqln);
                                                     //  print_r(mysqli_fetch_assoc($result));
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <form method="post" action="">

                                                            <div class="row mt-4">
                                                                <div class="col-md-10" style="padding-top: 12px;box-shadow: 0px 0px 2px 2px #bbb">
                                                                    <div class="team d-md-flex p-3 bg-white col-md-12">
                                                                        <div class="image"  tyle="background-image: url(../styles/images/person_1.jpg);"></div>
                                                                        <img class="img"  style="border-radius: 50%;width: 20%;height: 20%" src="../styles/images/person_1.jpg"/>

                                                                        <div class="text pl-md-4 col-md-8">
                                                                            <span class="location mb-0" style="font-size: 12px;color: red"><?php
                                                    if ($row['JobTypeId'] == 'F') {
                                                        echo 'Full Time';
                                                    } elseif ($row['JobTypeId'] == 'P') {
                                                        echo 'Part Time';
                                                    } else {
                                                        echo 'Intership';
                                                    }
                                                        ?></span>
                                                                            <h5><?php echo $row['FullName'] ?></h5>
                                                                            <p class="position mb-0">High Qualification :<?php echo $row['Qualification']; ?></p>
                                                                            <p class="mb-0 "><b>HR :</b><?php echo $row['HRFullName'] ?>  <b style="margin-left: 20px">Department :</b><?php echo $row['DepartmentName'] ?></p>
                                                                            <p class="mb-0"><b>Mobile :</b><?php echo $row['Mobile'] ?>  <b style="margin-left: 20px">Applied On :</b><?php echo $row['AppliedOn'] ?></p>
                                                                            <p class="mb-0"><b>Job Post :</b><?php echo $row['Designation'] ?>  </p>

        <!--<input type="text" name="ncomt" placeholder="Rmark" class="form-control col-sm-9" />-->
        <!--    <p><a href="#" class="btn btn-primary">Shortlist</a></p>
                                                                            --></div>
                                                                        <div class="col-md-1">
                                                                            <p class=" ">
                                                                                <a href="../Resume/resumeshow.php?apid=<?php echo $row['ApplicantId']; ?>" target="_blank" class="btn btn-primary mt-1 " style="margin-bottom: 5px;"><i class="fa fa-file-text-o"></i></a>
                                                                                <br><a href="#" class="btn btn-success   mr-1" data-toggle="modal" data-target="#myModala<?php echo $row['ApplicationId']; ?>" style="margin-bottom: 5px"><i class="fa fa-check-circle-o"></i></a>
                                                                                <br> <a href="#" class="btn btn-danger  mr-1 " data-toggle="modal" data-target="#myModal<?php echo $row['ApplicationId']; ?>"><i class="fa fa-trash-o"></i></a></p>

                                                                        </div>
                                                                    </div>

                                                                </div><!-- /.content -->
                                                            </div>
                                                        </form>
                                                    <form method="post" action="Application.php?Email=<?php echo $row['Email'];?>&AID=<?php echo $row['ApplicationId']; ?>">
                                                        <div class="modal fade" id="myModal<?php echo $row['ApplicationId']; ?>" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Non-approval </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="text" name="rstatus" class="form-control" placeholder="Remark"><br>
                                                                     <input type="submit" value="submit" name="rej" class="btn btn-lg btn-ca"  />
                                                                               <br>
                                                                        <br> <span style="color: lightgray">Non-approval Mail will be sended to addressed candidate</span>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form method="post" action="Application.php?Email=<?php echo $row['Email'];?>&AID=<?php echo $row['ApplicationId']; ?>&JSID=<?php echo $row['JSLoginId']; ?>&Hid=<?php echo $row['HRLoginId']; ?>  &PID=<?php echo $row['DepartmentId']; ?> &JId= <?php echo $row['JobId']; ?>&sstatus=sstatus&dt=dt&dateH=dateH&timeM=timeM&itime=itime&loc=loc">

                                                            <div class="modal fade" id="myModala<?php echo $row['ApplicationId']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">approval </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="text" name="sstatus" class="form-control" placeholder="Remark"><br>
                                                                            Interview Date :
                                                                            <input type="date" class="form-control" name="dt" min="<?php echo date("Y-m-d"); ?>"  placeholder="date">
                                                                            <br>
                                                                            Interview Time :
                                                                            <div class="col-md-10 row">
                                                                                <br><select id="dateH" name="dateH" class="dateH form-control col-md-3 mr-3"></select>
                                                                                <select id="timeM" name="timeM"  class=" timeM form-control col-md-4 mr-3"></select>
                                                                                <select id="itime" name="itime" class="itime form-control col-md-3">
                                                                                    <option>Select</option>
                                                                                    <option value="PM">PM</option>
                                                                                    <option value="AM">AM</option>
                                                                                </select>
                                                                            </div>
                                                                            <br>
                                                                            Interview Location
                                                                            <input type="text" name="loc" placeholder="Interview Location" class="form-control">
                                                                            <br> 
                                                                            <!--<a name="rbtn" href="Application.php?AID=<?php echo $row['ApplicationId']; ?>&JSID=<?php echo $row['JSLoginId']; ?>&Hid=<?php echo $row['HRLoginId']; ?>  &PID=<?php echo $row['DepartmentId']; ?> &JId= <?php echo $row['JobId']; ?>" value="Submit" class="btn btn-md btn-md btn-ca" style="color: white" >Submit</a>-->
                                                                            <input type="submit" value="submit" name="inter" class="btn btn-lg btn-ca"  />
                                                                            <br> <span style="color: lightgray">Mail will be sended to addressed candidate</span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </form>


                                                    <?php } ?>
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {

                                                            var optionM = "<option value=-1>Minutes</option>";
                                                            optionM = optionM + "<option value=00>00</option>";
                                                            var optionH = "<option value=00>Hours</option>";
                                                            for (var i = 1; i <= 60; i++)
                                                            {
                                                                if (i < 13)
                                                                    optionH = optionH + "<option value=" + i + ">" + i + "</option>";

                                                                optionM = optionM + "<option value=" + i + ">" + i + "</option>"
                                                            }
                                                            $("#dateH").append(optionH);
                                                            $("#timeM").append(optionM);

                                                        });
                                                    </script>
                                                    


                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>
                                </form> 
                                <div class="tab-pane fade" id="custom-nav-SH" role="tabpanel" aria-labelledby="custom-nav-SH-tab">
                                    <?php 
                                     $Cid = $_SESSION['Login']['Company']['CompanyId'];
                                                    $sqln = "SELECT j.*,tbllogin.Email as Email, ap.*,hr.*,hr.LoginId as HRLoginId,dept.*,js.*,js.LoginId as JSLoginId from tblappplication ap RIGHT JOIN tbljob j on j.JobId = ap.JobId  LEFT JOIN tbllogin on tbllogin.LoginId = ap.ApplicantId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId where ap.CompanyId = $Cid and ap.Status = 'AP' and hr.DepartmentId=$Ciid Order by ap.ApplicationId Desc  ";
                                                    $result = mysqli_query($conn, $sqln);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <form method="post" action="">

                                                            <div class="row mt-4">
                                                                <div class="col-md-10" style="padding-top: 12px;box-shadow: 0px 0px 2px 2px #bbb">
                                                                    <div class="team d-md-flex p-3 bg-white col-md-12">
                                                                        <div class="image"  tyle="background-image: url(../styles/images/person_1.jpg);"></div>
                                                                        <img class="img"  style="border-radius: 50%;width: 20%;height: 20%" src="../styles/images/person_1.jpg"/>

                                                                        <div class="text pl-md-4 col-md-8">
                                                                            <span class="location mb-0" style="font-size: 12px;color: red"><?php
                                                    if ($row['JobTypeId'] == 'F') {
                                                        echo 'Full Time';
                                                    } elseif ($row['JobTypeId'] == 'P') {
                                                        echo 'Part Time';
                                                    } else {
                                                        echo 'Intership';
                                                    }
                                                        ?></span>
                                                                            <h5><?php echo $row['FullName'] ?></h5>
                                                                            <p class="position mb-0">High Qualification :<?php echo $row['Qualification']; ?></p>
                                                                            <p class="mb-0 "><b>HR :</b><?php echo $row['HRFullName'] ?>  <b style="margin-left: 20px">Department :</b><?php echo $row['DepartmentName'] ?></p>
                                                                            <p class="mb-0"><b>Mobile :</b><?php echo $row['Mobile'] ?>  <b style="margin-left: 20px">Applied On :</b><?php echo $row['AppliedOn'] ?></p>
                                                                            <p class="mb-0"><b>Job Post :</b><?php echo $row['Designation'] ?>  </p>
                                                                            <p class="mb-0" style="color: black"><b>status :</b>Shortlisted</p>

                                                                    </div>
                                                                        <p style="margin-top: 60px" class="mt-60"><a href="../Resume/resumeshow.php?apid=<?php echo $row['ApplicantId']; ?>" target="_blank" class="btn btn-primary mt-1 " style="margin-bottom: 5px;"><i class="fa fa-file-text-o"></i></a>
                                                                        </p>
                                                                    </div>

                                                                </div><!-- /.content -->
                                                            </div>
                                                        </form>
                                                    <?php }?>
                                    
                                </div>
                                <div class="tab-pane fade" id="custom-nav-RJ" role="tabpanel" aria-labelledby="custom-nav-RJ-tab">
                                   
                                                                        <?php 
                                     $Cid = $_SESSION['Login']['Company']['CompanyId'];
                                                    $sqln = "SELECT j.*, ap.*,hr.*,hr.LoginId as HRLoginId,dept.*,js.*,js.LoginId as JSLoginId from tblappplication ap RIGHT JOIN tbljob j on j.JobId = ap.JobId LEFT JOIN hrinfo hr on hr.LoginId = ap.HRId LEFT JOIN tbldepartment dept on dept.DepartmentId = hr.DepartmentId LEFT JOIN jobseekerinfor js on js.LoginId = ap.ApplicantId where ap.CompanyId = $Cid and ap.Status = 'RJ' ";
                                                    $result = mysqli_query($conn, $sqln);
                                                    //      print_r(mysqli_fetch_assoc($result));
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        ?>
                                                        <form method="post" action="">

                                                            <div class="row mt-4">
                                                                <div class="col-md-10" style="padding-top: 12px;box-shadow: 0px 0px 2px 2px #bbb">
                                                                    <div class="team d-md-flex p-3 bg-white col-md-12">
                                                                        <div class="image"  tyle="background-image: url(../styles/images/person_1.jpg);"></div>
                                                                        <img class="img"  style="border-radius: 50%;width: 20%;height: 20%" src="../styles/images/person_1.jpg"/>

                                                                        <div class="text pl-md-4 col-md-8">
                                                                            <span class="location mb-0" style="font-size: 12px;color: red"><?php
                                                    if ($row['JobTypeId'] == 'F') {
                                                        echo 'Full Time';
                                                    } elseif ($row['JobTypeId'] == 'P') {
                                                        echo 'Part Time';
                                                    } else {
                                                        echo 'Intership';
                                                    }
                                                        ?></span>
                                                                            <h5><?php echo $row['FullName'] ?></h5>
                                                                            <p class="position mb-0">High Qualification :<?php echo $row['Qualification']; ?></p>
                                                                            <p class="mb-0 "><b>HR :</b><?php echo $row['HRFullName'] ?>  <b style="margin-left: 20px">Department :</b><?php echo $row['DepartmentName'] ?></p>
                                                                            <p class="mb-0"><b>Mobile :</b><?php echo $row['Mobile'] ?>  <b style="margin-left: 20px">Applied On :</b><?php echo $row['AppliedOn'] ?></p>
                                                                            <p class="mb-0"><b>Job Post :</b><?php echo $row['Designation'] ?>  </p>
                                                                            <p class="mb-0" style="color: black"><b>status :</b>Rejected</p>

                                                                    </div>
                                                                          <p style="margin-top: 60px" class="mt-60"><a href="../Resume/resumeshow.php?apid=<?php echo $row['ApplicantId']; ?>" target="_blank" class="btn btn-primary mt-1 " style="margin-bottom: 5px;"><i class="fa fa-file-text-o"></i></a>
                                                                        </p>
                                                                    </div>

                                                                </div><!-- /.content -->
                                                            </div>
                                                        </form>
                                                    <?php }?>

                                    
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
<?php
if (isset($_POST['rej'])) {
    $rm = $_POST['rstatus'];
    $Em=$_GET['Email'];
        echo $Em;
    $applicationId = $_GET['AID'];
    
         $sqls = "update tblappplication set Status='RJ',Remark='$rm' where ApplicationId = $applicationId";
        if (mysqli_query($conn, $sqls)) {
            echo "<script>alert('Rejectded Successfully');</script>";
            $e=new Email();
            $from="dhruvivaghela22@gmail.com";
            $to=$Em;
            $subject="JobPortal Application";
            $message="Your is not approved ";
            $p= $e->send($from, $subject, $message, $to);

        } else {
            echo "<script>alert('Not Rejectded');</script>";
        }
   
}

if (isset($_POST['inter'])) {
    $applicationId = $_GET['AID'];
    $remark = $_POST['sstatus'];
    $date = $_POST['dt'];
    $time = $_POST['dateH'] . ':' . $_POST['timeM'] . ':' . $_POST['itime'];
    $JSID = $_GET['JSID'];
    $HRId = $_GET['Hid'];
    $Did = $_GET['PID'];
    $Jid = $_GET['JId'];
    $loc = $_POST['loc'];
        $Em=$_GET['Email'];

    //$sql = "INSERT INTO tblinterview(CompanyId, ApplicationId, HRId, DepartmentId, JobId, ApplicantId, ResumeId, Date, Time, Location) VALUES($Cid,$applicationId,$HRId,$Did,$Jid,$JSID,0,$date,$time,$loc)";
    $sql = "INSERT INTO tblinterview(CompanyId, ApplicationId, HRId, DepartmentId, JobId, ApplicantId, ResumeId, Date, Time, Location) VALUES($Cid,$applicationId,$HRId,$Did,$Jid,$JSID,0,'$date','$time','$loc')";
    //echo $sql;
    include '../Connection.php';
    if (mysqli_query($conn, $sql)) {
        $sqls = "update tblappplication set Status='AP',Remark='$remark' where ApplicationId = $applicationId";
        if (mysqli_query($conn, $sqls)) {
            echo "<script>alert('Success');</script>";
            $e=new Email();
            $from="dhruvivaghela22@gmail.com";
            $to=$Em;
            $subject="JobPortal InterView Schedule";
            $message="Your Interiew has been scheduled on $date at $time <br/> Venue: $loc ";
            $p= $e->send($from, $subject, $message, $to);

        } else {
            echo "<script>alert('falied S');</script>";
        }
        echo $sqls;
    } else {
        echo "<script>alert('falied');</script>";
    }
       echo '<script>window.location.href="Application.php";</script>';
}
?>




<?php include './Footer.php'; ?>