<?php
//include '../Common/CommonServices.php';
//checkIsLogin('CH');
include './Sidebar.php';
include './../Connection.php';

?>     
<!-- Content -->
<script src="../CompanyHR/assets/js/lib/data-table/jquery-1.12.4.js"></script>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Applicants InterView</h4>
                    </div>
                    <div class="card-body">
                        <div class="custom-tab">

                            <nav>
                                <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-NA-tab" data-toggle="tab" href="#custom-nav-NA" role="tab" aria-controls="custom-nav-NA" aria-selected="true">New Shortlisted </a>
                                    <a class="nav-item nav-link" id="custom-nav-SH-tab" data-toggle="tab" href="#custom-nav-SH" role="tab" aria-controls="custom-nav-SH" aria-selected="false">Approved</a>
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
                                                    $Cid = $_SESSION['Login']['Company']['CompanyId'];//['CompanyId'];
                                                     $sqln = "SELECT iw.*,dept.DepartmentName,j.*,js.*,hr.*,ap.* from tblinterview iw LEFT JOIN tbldepartment dept on iw.DepartmentId = dept.DepartmentId LEFT JOIN tbljob j on iw.JobId = j.JobId LEFT JOIN jobseekerinfor js ON iw.ApplicantId = js.LoginId LEFT JOIN hrinfo hr ON iw.HRId = hr.LoginId LEFT JOIN tblappplication ap ON iw.ApplicationId = ap.ApplicationId WHERE iw.STATUS='PE' and iw.CompanyId=$Cid";
                                                    $result = mysqli_query($conn, $sqln);
                                                    //      print_r(mysqli_fetch_assoc($result));
                                                    while ($row = mysqli_fetch_array($result)) {
                                                       // echo $row['InterViewId'];
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
                                                                                  <p style="margin-top: 60px" class="mt-60"><a href="../Resume/resumeshow.php?apid=<?php echo $row['ApplicantId']; ?>" target="_blank" class="btn btn-primary mt-1 " style="margin-bottom: 5px;"><i class="fa fa-file-text-o"></i></a>
                                                                        </p>
    <!--                                                                                <a href="#" class="btn btn-primary mt-1 " style="margin-bottom: 5px;"><i class="fa fa-file-text-o"></i></a>-->
                                                                            <!--    <br><a href="#" class="btn btn-success   mr-1" data-toggle="modal" data-target="#myModala<?php echo $row['InterViewId']; ?>" style="margin-bottom: 5px"><i class="fa fa-check-circle-o"></i></a>
                                                                                <br> <a href="#" class="btn btn-danger  mr-1 " data-toggle="modal" data-target="#myModal<?php echo $row['InterViewId']; ?>"><i class="fa fa-trash-o"></i></a></p>
-->
                                                                        </div>
                                                                    </div>

                                                                </div><!-- /.content -->
                                                            </div>
                                                        </form>
                                                    <form method="post" action="InterView.php?IID=<?php echo $row['InterViewId']; ?>&rstatus=rstatus">
                                                            <div class="modal fade" id="myModal<?php echo $row['InterViewId']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">Non-approval </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                           <!--<input type="text" name="rstatus" class="form-control" placeholder="Remark"><br>
                                                                         -->   <textarea name="rstatus" class="form-control" placeholder="Mail Description" cols="10" rows="5"></textarea>       
                                                                            <br><input type="submit" value="submit" name="iwrej" class="btn btn-lg btn-ca"  />
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
                                                    <form method="post" action="InterView.php?IID=<?php echo $row['InterViewId']; ?>&sstatus=sstatus&JId=<?php echo $row['JobId']; ?>">

                                                            <div class="modal fade" id="myModala<?php echo $row['InterViewId']; ?>" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">approval </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                           
                                                                           <!-- <input type="text" name="sstatus" class="form-control" placeholder="Mail Description"><br>
 -->   <textarea name="sstatus" class="form-control" placeholder="Mail Description" cols="10" rows="5"></textarea>       
 <br>
                                                                            <br> 
                                                                            <input type="submit" value="submit" name="iwapp" class="btn btn-lg btn-ca"  />
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
                                    //echo 'HI';
                                    $Cid = $_SESSION['Login']['Company']['CompanyId'];//['CompanyId'];
                                    $sqln = "SELECT iw.*,dept.DepartmentName,j.*,js.*,hr.*,ap.* from tblinterview iw LEFT JOIN tbldepartment dept on iw.DepartmentId = dept.DepartmentId LEFT JOIN tbljob j on iw.JobId = j.JobId LEFT JOIN jobseekerinfor js ON iw.ApplicantId = js.LoginId LEFT JOIN hrinfo hr ON iw.HRId = hr.LoginId LEFT JOIN tblappplication ap ON iw.ApplicationId = ap.ApplicationId WHERE iw.STATUS='AP' and iw.CompanyId=$Cid";
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
                                                            <p class="mb-0" style="color: black"><b>status :</b>Approved</p>

                                                        </div>
                                                          <p style="margin-top: 60px" class="mt-60"><a href="../Resume/resumeshow.php?apid=<?php echo $row['ApplicantId']; ?>" target="_blank" class="btn btn-primary mt-1 " style="margin-bottom: 5px;"><i class="fa fa-file-text-o"></i></a>
                                                                        </p>
                                                    </div>

                                                </div><!-- /.content -->
                                            </div>
                                        </form>
                                    <?php } ?>
                                    
                                </div>
                                <div class="tab-pane fade" id="custom-nav-RJ" role="tabpanel" aria-labelledby="custom-nav-RJ-tab">

                                    <?php
                                    $Cid = $_SESSION['Login']['Company']['CompanyId'];//['CompanyId'];
                                                     $sqln = "SELECT iw.*,dept.DepartmentName,j.*,js.*,hr.*,ap.* from tblinterview iw LEFT JOIN tbldepartment dept on iw.DepartmentId = dept.DepartmentId LEFT JOIN tbljob j on iw.JobId = j.JobId LEFT JOIN jobseekerinfor js ON iw.ApplicantId = js.LoginId LEFT JOIN hrinfo hr ON iw.HRId = hr.LoginId LEFT JOIN tblappplication ap ON iw.ApplicationId = ap.ApplicationId WHERE iw.STATUS='RJ' and iw.CompanyId=$Cid";
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
                                    <?php } ?>

                                    
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
if (isset($_POST['iwrej'])) {
      //   echo "<script>alert('Rejectded Successfully');</script>";
    $rm = $_POST['rstatus'];
    $IntId = $_GET['IID'];

    $sqls = "update tblinterview set Status='RJ',Remark='$rm' where InterViewId = $IntId";
    echo $sqls;
    if (mysqli_query($conn, $sqls)) {
        echo "<script>alert('Rejectded Successfully');</script>";
    } else {
        echo "<script>alert('Not Rejectded');</script>";
    }
}

if (isset($_POST['iwapp'])) {
    $IntId = $_GET['IID'];
    $remark = $_POST['sstatus'];
    echo $remark;
    $Jid = $_GET['JId'];
    echo $Jid;
    //$sql = "INSERT INTO tblinterview(CompanyId, ApplicationId, HRId, DepartmentId, JobId, ApplicantId, ResumeId, Date, Time, Location) VALUES($Cid,$applicationId,$HRId,$Did,$Jid,$JSID,0,$date,$time,$loc)";
    include '../Connection.php';
    $sqls = "update tblinterview set Status='AP',Remark='$remark' where InterViewId = $IntId";
    if (mysqli_query($conn, $sqls)) {
        $sql = "update tbljob set Vacancy=Vacancy-1 where JobId=$Jid";
        echo $sql;
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Success');</script>";
            $e = new Email();
            
        } else {
            echo "<script>alert('falied 2');</script>";
        }
    } else {
        echo "<script>alert('falied S');</script>";
    }
    echo $sqls;
}
?>




<?php include './Footer.php'; ?>