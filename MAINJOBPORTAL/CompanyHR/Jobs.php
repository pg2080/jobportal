<?php
include './Sidebar.php';
include '../Connection.php';
include '../validation.php';
$result = $_SESSION['Login']['Company'];
$ComId =  $result['CompanyId'];
$LoginId = $_SESSION['Login']['LId'];

$DepartmentId =  $_SESSION['Login']['HRInfo']['DepartmentId'];
$error_designation="";
$error_location="";
$error_jt="";
$error_es="";
$error_des="";
$error_er="";
$error_va="";
$error_mq="";
$errorresult=true;
if (isset($_POST['addjob'])) {
    echo 'DOnnnne';
    if(empty($_POST['Designation']))
        {
            $error_designation = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_designation = "";
        }
    if(empty($_POST['Location']))
        {
            $error_location = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_location = "";
        }
        if(empty($_POST['Location']))
        {
            $error_location = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_location = "";
        }
        if(empty($_POST['des']))
        {
            $error_des = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_des = "";
        }  
        if(empty($_POST['es']))
        {
            $error_es = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_es = "";
        }
        if(empty($_POST['jt']))
        {
            $error_jt = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_jt = "";
        }
        if(empty($_POST['er']))
        {
            $error_er = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_er = "";
        }
        if(empty($_POST['va']))
        {
            $error_va = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_va = "";
        }
        if(empty($_POST['mq']))
        {
            $error_mq = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_mq = "";
        }
    if($errorresult==false)
        {
            goto end;
        }

    $Designation = $_POST['Designation'];
    $Location = $_POST['Location'];
    $jt = $_POST['jt'];
    $es = $_POST['es'];
    $des = $_POST['des'];
    $er = $_POST['er'];
    $va = $_POST['va'];
    $mq = $_POST['mq'];


    try {
        $sql = "INSERT INTO tbljob(CompanyId, HRLoginId, DepartmentId, JobTypeId, Qualification, Designation, Location, ExpectedSalary, Experiance, Description, Vacancy) VALUES('$ComId','$LoginId','$DepartmentId','$jt','$mq','$Designation','$Location','$es','$er','$des','$va')";
        if (mysqli_query($conn, $sql)) {
                   echo "<script>alert('Job added sucessfully');</script>";
 
        } else {
                   echo "<script>alert('Job added successfully');</script>";
 
        }


        //echo "<script>alert('Job added sucessfully');</script>";
    } catch (mysqli_sql_exception $ex) {
        echo "Me Error" . $ex;
    }
}
end:
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add job</strong></div>
                    <div class="card-body card-block">
                        <form method="post">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="company" class=" form-control-label">Designation</label>
                                    <input type="text" name="Designation" id="company" placeholder="Designation" class="form-control">
                                    <span style="color: red;"><?php echo $error_designation;?></span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="vat" class=" form-control-label">Location</label>
                                    <input type="text" name="Location" id="vat" placeholder="Location" class="form-control">
                                    <span style="color: red;"><?php echo $error_location;?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="company" class=" form-control-label">Job Type</label>
                                    <select class="form-control" name="jt">
                                    <span style="color: red;"><?php echo $error_jt;?></span>
                                        <option disabled selected value="">Select jobtype</option>
                                        <option value="F">Full Time</option>
                                        <option value="P">Part Time</option>
                                        <option value="I">Internship</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="vat" class=" form-control-label">Expected Salary</label>
                                    <input type="text" name="es" id="vat" placeholder="Salary" class="form-control">
                                    <span style="color: red;"><?php echo $error_es;?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="company" class=" form-control-label">Qualification</label>
                                    <input type="text" id="company" name="mq" placeholder="ex Degree name" class="form-control">
                                    <span style="color: red;"><?php echo $error_mq;?></span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="vat" class=" form-control-label">Description</label>
                                    <input type="text" id="vat" name="des" placeholder="Description" class="form-control">
                                    <span style="color: red;"><?php echo $error_des;?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="company" class=" form-control-label">Expriance Required</label>
                                    <input type="text" name="er" id="company" placeholder="in Year" class="form-control">
                                    <span style="color: red;"><?php echo $error_er;?></span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="vat" class=" form-control-label">Vacancy</label>
                                    <input type="text" name="va" id="vat" placeholder="Vacancy" class="form-control">
                                    <span style="color: red;"><?php echo $error_va;?></span>
                                </div>
                            </div>
                            <center><input type="submit"   name="addjob" class=" btn btn-lg btn-ca" value="Add job"></center> 
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div><?php include './Footer.php'; ?>

