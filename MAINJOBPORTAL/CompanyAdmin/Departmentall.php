<?php include './Sidebar.php'; ?> 
<?php
$CompanyId = $_SESSION['Login']['CId'];
include '../Connection.php';
include '../validation.php';
$error_deptname="";
$errorresult=true;
if (isset($_POST['add'])) {

    if(empty($_POST['deptname']))
        {
            $error_deptname = "Required..";
            $errorresult=false;
        }
        else
        {
            $error_deptname = "";
        }

if($errorresult==false)
        {
            goto end;
        }
    $DepartmentName = $_POST["deptname"];
    $CompanyId = $_SESSION['Login']['CId'];
    echo $CompanyId;
    $querylrc = 'INSERT INTO tbldepartment(DepartmentName,CompanyId) VALUES(?,?)';
    $stmtl = $conn->prepare($querylrc);
    $stmtl->bind_param('si', $DepartmentName, $CompanyId);
    $stmtl->execute();
}
end:
?>

<div class="content">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Add Department</strong>
                    </div>
                    <div class="card-body">


                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <div class="form-group"><label class=" form-control-label">Department name</label><input type="text"  placeholder="Enter Department name.." name="deptname" class="form-control">
                                <span style="color: red;"><?php echo $error_deptname;?></span>
                                </div>
                                <center><div class="form-group"><input type="submit" placeholder="Enter Password.." class="btn btn-ca" value="Submit " name="add"></div>
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
$statq = "Select * from tbldepartment where CompanyId =$CompanyId";
$result = mysqli_query($conn, $statq);
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Departments</strong>
                    </div>
                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                            <tr role="row">
                                               
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 374.883px;" aria-label="Position: activate to sort column ascending">Department Name</th>
                                                
                                        </thead>
                                        <tbody>

<?php while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr role="row" class="odd">
                                                    
                                                    <td class="sorting_1"><?php echo $row['DepartmentName'] ?></td>
                                                    
                                                </tr>

<?php } ?>
                                        </tbody>
                                    </table></div></div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
<?php include './Footer.php'; ?>

