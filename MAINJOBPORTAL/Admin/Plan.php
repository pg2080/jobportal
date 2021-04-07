<?php include './Sidebar.php'; ?> 
<?php
$a = $_SESSION['Login']['ADM'];
include '../Connection.php';
include '../validation.php';
$error_plan="";
$error_price="";
$error_time="";
$errorresult=true;
if (isset($_POST['add'])) {

    if(firstname($_POST['pname']))
        {
            $error_plan = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_plan = "";
        }
    if(price($_POST['pprice']))
    {
        $error_price="Required..";
        $errorresult=false;
    }
    else{
        $error_price = "";
    }
        if(empty($_POST['t']))
        {
            $error_time = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_time = "";
        }
        if($errorresult==false)
        {
            goto end;
        }
    $pname = strtoupper($_POST["pname"]);
    $pprice = $_POST["pprice"];
    $t = $_POST['t'];
    $s = "Select * from tblplan where planName='$pname' || Amount =$pprice && Duration =$t";
            echo $s;

    $r = mysqli_query($conn, $s);
     $rs = mysqli_fetch_array($r);
    
     
    if(count($rs) > 0)
    {
                echo "<script>alert(' Plan exist alrady with same name,amount or duration');</script>";
                 echo '<script>window.location.href="plan.php";</script>';
                 return;
    }
    
    //$CompanyId = $_SESSION['Login']['CId'];
    // echo $CompanyId;
    $querylrc = 'INSERT INTO tblplan(PlanName,Amount,Duration) VALUES(?,?,?)';
    $stmtl = $conn->prepare($querylrc);
    $stmtl->bind_param('sss', $pname, $pprice, $t);
    $stmtl->execute();
}
if (isset($_GET['ac']) && $_GET['ac'] == 't') {
    $id = $_GET['ii'];
    $sql = "UPDATE tblplan SET IsActive=0 WHERE PlanId =$id ";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert(' Plan deactivated Sucesssfully');</script>";
    } else {
        echo "<script>alert('not deactivated ');</script>";
    }
}

if (isset($_GET['c']) && $_GET['c'] == 't') {
    $id = $_GET['ii'];
    $sql = "UPDATE tblplan SET IsActive=1 WHERE PlanId =$id ";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert(' Plan activated Sucesssfully');</script>";
    } else {
        echo "<script>alert('not activated ');</script>";
    }
}
end:
?>


<div class="content">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Add Plan</strong>
                        <a class="btn btn-ca btn-sm pull-right" href="#pl"> View Plans</a>
                    </div>
                    <div class="card-body">


                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <center>
                                    <div class="form-group col-md-10"><label class=" form-control-label pull-left    ">Plan name</label><input type="text"  placeholder="Enter Plan name.." name="pname" class="form-control" >
                                    <span style="color: red;"><?php echo $error_plan;?></span>
                                    </div>
                                    <center>
                                        <div class="form-group row col-md-12 ml-5">
                                            <div class=" col-md-5 ml-1 ">
                                                <label class=" form-control-label pull-left    ">Plan amount</label><input type="text"  placeholder="Enter Plan amount.." name="pprice" class="form-control" >
                                                <span style="color: red;"><?php echo $error_price;?></span>
                                            </div>
                                            <div class=" col-md-5 ">
                                                <label class=" form-control-label pull-left    ">Plan amount</label>
                                                <select class="form-control" name='t'>
                                                <span style="color: red;"><?php echo $error_time;?></span>
                                                    <option value="0">Select Duration</option>
                                                    <option value="1">Per Month</option>
                                                    <option value="6">3 Months</option>

                                                    <option value="6">6 Months</option>
                                                    <option value="6">9 Months</option>

                                                    <option value="12">12 Months</option>
                                                </select>
                                            </div>
                                        </div>
                                    </center>
                                    <div class="form-group"><input type="submit" placeholder="Enter Password.." class="btn btn-ca" value="Submit " name="add"></div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$statq = "Select * from tblplan ";
$result = mysqli_query($conn, $statq);
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card" id="pl">
                    <div class="card-header">
                        <strong class="card-title">Plans</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 374.883px;" aria-label="Position: activate to sort column ascending">Sr. no.</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 374.883px;" aria-label="Position: activate to sort column ascending">Plan Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 374.883px;" aria-label="Position: activate to sort column ascending">Plan Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 53.883px;" aria-label="Office: activate to sort column ascending">Duration</th>
                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 53.883px;" aria-label="Office: activate to sort column ascending">IsActive</th>
                                                                       <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 53.883px;" aria-label="Office: activate to sort column ascending" >Edit</th>

                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 53.883px;" aria-label="Office: activate to sort column ascending" >Action</th>

                            </thead>
                            <tbody>

                                <?php
                                $cout = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?php echo ++$cout ?></td>

                                        <td class="sorting_1"><?php echo $row['PlanName'] ?></td>
                                        <td class="sorting_1 fa fa-rupee" style="border: none"><?php echo ' ' . $row['Amount'] ?></td>
                                        <td class="sorting_1"><?php echo $row['Duration'] . ' Month' ?></td>
                                        <td class="sorting_1"><?php
                                            if ($row['IsActive'] == 1) {
                                                echo "<font color=green>Active</font>";
                                            } else {
                                                echo "<font color=red>Deactivated</font>";
                                            }
                                            ?></td>
                                        <td class=""><button data-toggle="modal" data-target="#e_<?php echo $row['PlanId']; ?>" type="submit" title="Click here to edit this plan" class="btn btn-lg btn-primary  fa fa-pencil"></i></button>
                                                                                        
                    <div id="e_<?php echo $row['PlanId'] ?>" class="modal fade" data-backdrop="static" role="dialog">
  <div class="modal-dialog">
                                                                    
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PLAN</h4>
      </div>
      <div class="modal-body">
        <p>Update Plan Detail</p>
        <form method="post" action=""> 
            <input type="hidden" name="pid" value="<?php echo  $row['PlanId']?>">
            Plan Amount: <b></b>
            <input type="text" class="form-control" name="pprice" value="<?php echo $row['Amount'] ?>">
            Plan Duration: <b></b>
            <input type="text" class="form-control" name="t" value="<?php echo $row['Duration'] ?>">
            <br>
           <input type="submit" name="up" class="btn btn-md btn-ca" value="Update"> </form>
      </div>  
         
<?php 

if(isset($_POST['up'])){
        $pprice=$_POST['pprice'];
        $t=$_POST['t'];
        $PlanId = $_POST['pid'];
        if(!isset($PlanId))
        {return;}
        
        if(!isset($pprice))
        {return;} 
        
        if(!isset($t))
        {return;}
        $sql="UPDATE tblplan SET Amount='$pprice',Duration='$t' WHERE PlanId = $PlanId";
        echo $sql;

        
        $run=mysqli_query($conn, $sql);
        if ($run) {
        ?>
        <script>
        alert('Updated Suceesfully');
       // window.open('Plan.php','_self');
        </script>
        <?php

    } else {
        ?>
    <script>
    alert('not Updated');
   // window.open('Plan.php','_self');
    </script>
    <?php
    }
}
?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

                                                                                        </td>
                                        <?php if ($row['IsActive'] == 1) { ?>
                                            <td class=""><a href="Plan.php?ac=t&ii=<?php echo $row['PlanId']; ?>" type="submit" title="Click here to deactivate this plan" class="btn btn-lg btn-warning fa fa-eye-slash"></i></a></td>
    <?php } else { ?>
                                            <td class=""><a href="Plan.php?c=t&ii=<?php echo $row['PlanId']; ?>" type="submit" title="Click here to activate this plan" class="btn btn-lg btn-primary  fa fa-eye"></i></a></td>


    <?php } ?>
                                    </tr>

<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                                                                                            </div>
                </div>

        </div>
    </div><!-- .animated -->
</div>
<?php

include './Footer.php';
?>