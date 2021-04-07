<?php include './Sidebar.php'; ?> 
<?php
$CompanyId = $_SESSION['Login']['CId'];
include '../Connection.php';
if (isset($_POST['add'])) {

    $DepartmentName = $_POST["deptname"];
    $CompanyId = $_SESSION['Login']['CId'];
    echo $CompanyId;
    $querylrc = 'INSERT INTO tbldepartment(DepartmentName,CompanyId) VALUES(?,?)';
    $stmtl = $conn->prepare($querylrc);
    $stmtl->bind_param('si', $DepartmentName, $CompanyId);
    $stmtl->execute();
}
?>
<?php
echo $CompanyId;
$statq = "Select hrinfo.*,tblcity.CityName,tblstate.StateName,tbldepartment.DepartmentName,tbllogin.Email from hrinfo LEFT JOIN tbldepartment on tbldepartment.DepartmentId = hrinfo.DepartmentId LEFT JOIN tblcity on tblcity.CitytId = hrinfo.City LEFT JOIN tblstate on tblstate.StateId = hrinfo.State LEFT JOIN tbllogin on tbllogin.LoginId = hrinfo.LoginId where hrinfo.CompanyId =$CompanyId";
$result = mysqli_query($conn, $statq);
//$r = mysqli_fetch_assoc($result);
//print_r($r);
//echo $r['HRFullName'];

?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Company HR</strong>
                    </div>
                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row"><div class="col-sm-12">
                                    <button type="submit" class="pull-right mb-15"  style="background: transparent;border: none" data-toggle="modal" data-target="#myModalAddHR"><i class="btn btn-lg btn-ca fa fa-plus"> Add HR</i></button>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_desc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Name: activate to sort column ascending" aria-sort="descending">Edit</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Address</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Mobile No.</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Gender</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">DOB</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">City</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">State</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Department Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Office: activate to sort column ascending">Delete</th>
                                        </thead>
                                        <tbody>

                                            <?php while ($row = mysqli_fetch_assoc($result)) {  ?>
                                                <tr role="row" class="odd">
                                                    <td class=""><i class="btn btn-lg btn-dark fa fa-pencil"></i></td>
                                                    <td class="sorting_1"><?php echo $row['HRFullName'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Address'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Mobile'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Gender'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['DOB'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['CityName'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['StateName'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Email'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['DepartmentName'] ?></td>

                                                    <td class=""><i class="btn btn-lg btn-danger fa fa-trash"></i></td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table></div></div></div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
<div id="myModalAddHR" class="modal fade" data-backdrop="static" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add HR</h4>
      </div>
      <div class="modal-body">
        <p>New HR Email</p>
        <form method="post"> 
        <input type="email" name="hremail" class="form-control">
        <br>
        <?php
         
        $Cid = $_SESSION['Login']['CId'];
         $statq = "Select * from tblDepartment where CompanyId = $Cid";
         $result = mysqli_query($conn, $statq);
        ?>
        
        <select name="dept" class="form-control"  >
            <option value="">Select Department</option>            
            <?php 
                    while ($r= mysqli_fetch_array($result)){
                    ?>
            <option value="<?php echo $r['DepartmentId'].'_'.$r['DepartmentName'] ?>"><?php echo  $r['DepartmentName'] ?></option>            
 <?php }?>
        </select>
                   
        <br>
           <input type="submit" name="AddHRMail" class="btn btn-md btn-ca" value="Send Link"> </form>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php
require '../EmailSetup/Email.php';
if(isset($_POST['AddHRMail']))
{
    //Insert into login table
      $querylrc = 'INSERT INTO tbllogin(Email,UserType) VALUES(?,?)';
    $stmtl = $conn->prepare($querylrc);
    //echo $Email;
    $to=$_POST['hremail'];
    $ut = "CH";
    $stmtl->bind_param('ss', $to,$ut);
    if(!$stmtl->execute())
    {
        echo "<script>alert('Have some  issue due to  Same email alredy  exist  ')</script>";
        return;
    }

    $from="dhruvivaghela22@gmail.com";
    $activation=md5(time());
    
    $dept =$_POST['dept'];
    $depttext =   explode("_",$dept);
    
    echo 'Dept'.$depttext[1];
    echo 'txee'.$depttext[0];
    $log = $conn->insert_id; //$_SESSION["loginid"]
    
    //$activation=time();
    
    $time = time();
    $message="http://localhost:81/Jobp/Common/RegisterHR.php?email=$to&AT=$time&tt=$depttext[1]&DId=$depttext[0]&LI=$log&CID= $CompanyId";
    $subject="Register to JobPortal";
    $e=new Email();
    $p= $e->send($from, $subject, $message, $to);

}

?>
<?php include './Footer.php'; ?>

