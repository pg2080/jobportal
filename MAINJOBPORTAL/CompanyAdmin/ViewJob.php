<?php include './Sidebar.php'; ?> 
<?php
$CompanyId = $_SESSION['Login']['Company']['CompanyId'];
include '../Connection.php';
if (isset($_POST['add'])) {

    $DepartmentName = $_POST["deptname"];
    $CompanyId = $_SESSION['Login']['Company']['CompanyId'];
    echo $CompanyId;
    $querylrc = 'INSERT INTO tbldepartment(DepartmentName,CompanyId) VALUES(?,?)';
    $stmtl = $conn->prepare($querylrc);
    $stmtl->bind_param('si', $DepartmentName, $CompanyId);
    $stmtl->execute();
}
?>
<?php
//echo $CompanyId;
//echo $_SESSION['Login']['LId'];
$statq = "Select tbljob.*, hrinfo.HRFullName,tbldepartment.DepartmentName from tbljob LEFT JOIN tbldepartment on tbldepartment.DepartmentId = tbljob.DepartmentId LEFT JOIN hrinfo on hrinfo.LoginId = tbljob.HRLoginId WHERE tbljob.CompanyId=$CompanyId and tbljob.Vacancy > 0 and tbljob.IsDeleted=1";
//echo $statq;
$result = mysqli_query($conn, $statq);
//$r = mysqli_fetch_assoc($result);
//print_r($r);
//print_r(mysqli_fetch_assoc($result));

//echo $r['HRFullName'];
if (isset($_POST['ft'])) {
    $dep = $_POST["dept"];
    if ($dep > 0) {
        $statq = "Select tbljob.*, hrinfo.HRFullName,tbldepartment.DepartmentName from tbljob LEFT JOIN tbldepartment on tbldepartment.DepartmentId = tbljob.DepartmentId LEFT JOIN hrinfo on hrinfo.LoginId = tbljob.HRLoginId WHERE tbljob.CompanyId=$CompanyId and tbldepartment.DepartmentId = $dep and tbljob.Vacancy > 0 and tbljob.IsDeleted=1";
    } else {
        $statq = "Select tbljob.*, hrinfo.HRFullName,tbldepartment.DepartmentName from tbljob LEFT JOIN tbldepartment on tbldepartment.DepartmentId = tbljob.DepartmentId LEFT JOIN hrinfo on hrinfo.LoginId = tbljob.HRLoginId WHERE tbljob.CompanyId=$CompanyId and tbljob.Vacancy > 0 and tbljob.IsDeleted=1";
    }
    echo $statq;
    $result = mysqli_query($conn, $statq);
}
$ComyId = $_SESSION['Login']['Company']['LoginId'];
$sqlpt = "Select * from tbldepartment where tbldepartment.CompanyId=$ComyId";
$rsdept = mysqli_query($conn, $sqlpt);
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Jobs</strong>
                        <form action="" method="post">
                            <input name="ft" type="submit" value="GO" class="btn btn-ca pull-right">
                            <select class="col-sm-3 pull-right  form-control" name="dept">
                                <option value="0">Select</option>
<?php while ($row = mysqli_fetch_assoc($rsdept)) { ?>
                                    <option value=<?php echo $row['DepartmentId'] ?>><?php echo $row['DepartmentName'] ?></option>
                                <?php } ?>

                            </select>
                            <strong class=" card-title pull-right">Select Departments : </strong>
                        </form>
                    </div>

                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row"><div class="col-sm-12">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_desc" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Name: activate to sort column ascending" aria-sort="descending">Edit</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Department</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Job Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Job Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Qualification</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">job Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Experiance In Year</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Vacancy</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Created On</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Position: activate to sort column ascending">Expected Salary</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1"  aria-label="Office: activate to sort column ascending">Delete</th>
                                        </thead>
                                        <tbody>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr role="row" class="odd">
                                                    <td class=""><button type="button" data-toggle="modal" data-target="#myModal<?php echo $row['JobId'] ?>" class="btn btn-sm btn-dark fa fa-pencil"></button></td>
                                                    <td class="sorting_1"><?php echo $row['DepartmentName'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Designation'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Location'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Qualification'] ?></td>
                                                    <td class="sorting_1"><?php
                                            if ($row['JobTypeId'] == 'F') {
                                                echo 'Full Time';
                                            } elseif ($row['JobTypeId'] == 'P') {
                                                echo 'Part Time';
                                            } else {
                                                echo 'Intership';
                                            }
    ?></td>
                                                    <td class="sorting_1"><?php echo $row['Experiance'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Description'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Vacancy'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Created_on'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['ExpectedSalary'] ?></td>
                                            <form method="get" action="">   
                                                <td class=""> <a href="ViewJob.php?jcc=trr&i=<?php echo $row['JobId']; ?>"> <i class="btn btn-sm btn-danger fa fa-trash"></i></a></td>
                                            </form>

                                            </tr>
                                            <div id="myModal<?php echo $row['JobId'] ?>" class="modal fade" data-backdrop="static" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit <?php echo $row['Designation'] ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"  action=""> 
                                                                <input type="hidden" name="jid" value="<?php echo $row['JobId']; ?>" >
                                                                <div class="row pr-3 pl-3">
                                                                    <label for="Qualification" class=" form-control-label">Qualification</label>
                                                                    <input type="text" name="Qualification" value="<?php echo $row['Qualification'] ?>" id="company" placeholder="Qualification" class="form-control">
                                                                </div>

                                                                <div class="row pr-3 pl-3">
                                                                    <label for="company" class=" form-control-label">job Type</label>
                                                                    <select class="form-control" name="jt">
                                                                        <option value="F" <?= $row['JobTypeId'] == 'F' ? ' selected="selected"' : ''; ?>>Full Time</option>
                                                                        <option value="P" <?= $row['JobTypeId'] == 'P' ? ' selected="selected"' : ''; ?>>Part Time</option>
                                                                        <option value="I" <?= $row['JobTypeId'] == 'I' ? ' selected="selected"' : ''; ?>>Internship</option>
                                                                    </select>                 
                                                                </div>
                                                                <div class="row pr-3 pl-3">
                                                                    <label for="Location" class=" form-control-label">Location</label>
                                                                    <input type="text" name="Location" value="<?php echo $row['Location'] ?>" id="company" placeholder="ExpectedSalary" class="form-control">
                                                                </div>

                                                                <div class="row pr-3 pl-3">
                                                                    <label for="Qualification" class=" form-control-label">Description</label>
                                                                    <input type="text" name="Description" value="<?php echo $row['Description'] ?>" id="company" placeholder="Description" class="form-control">
                                                                </div>

                                                                <div class="row pr-3 pl-3">
                                                                    <label for="Qualification" class=" form-control-label">Vacancy</label>
                                                                    <input type="text" name="Vacancy" value="<?php echo $row['Vacancy'] ?>" id="company" placeholder="Vacancy" class="form-control">
                                                                </div>

                                                                <div class="row pr-3 pl-3">
                                                                    <label for="Qualification" class=" form-control-label">ExpectedSalary</label>
                                                                    <input type="text" name="ExpectedSalary" value="<?php echo $row['ExpectedSalary'] ?>" id="company" placeholder="ExpectedSalary" class="form-control">
                                                                </div>

                                                                <div class="row pr-3 pl-3 mb-2">
                                                                    <label for="Qualification" class="form-control-label">Experiance</label>
                                                                    <input type="text" name="Experiance" value="<?php echo $row['Experiance'] ?>" id="company" placeholder="Qualification" class="form-control">
                                                                </div>
                                                                <center> <button type="submit" class="btn btn-ca" name="jup">Update</button></center>

                                                            </form>

                                                        </div>  

                                                    </div>

                                                </div>
                                            </div>

<?php } ?>
                                        </tbody>
                                    </table></div></div></div>
                    </div>

                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
<?php
if (isset($_GET['jcc']) && $_GET['jcc'] == 'trr') {
    $j = $_GET['i'];
    $sql = "UPDATE tbljob SET Vacancy=0,IsDeleted=0 WHERE JobId = $j";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Deleted Suceesfully')</script>";
    } else {
        echo "<script>alert('not Deleted ')</script>";
    }
    // echo $sql;
    refresh();
}

function refresh() {
    echo '<script>window.location.href="ViewJob.php";</script>';
}

if (isset($_POST['jup'])) {
    $Location = $_POST["Location"];
    $Qualification = $_POST['Qualification'];
    $jt = $_POST['jt'];
    $Description = $_POST['Description'];
    $Vacancy = $_POST['Vacancy'];
    $ExpectedSalary = $_POST['ExpectedSalary'];
    $Experiance = $_POST['Experiance'];
    $ji = $_POST['jid'];

    $sql = "UPDATE tbljob SET Qualification='$Qualification',Location='$Location',ExpectedSalary='$ExpectedSalary',Experiance='$Experiance',Description='$Description',Vacancy='$Vacancy' WHERE JobId = $ji";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Updated Suceesfully')</script>";
    } else {
        echo "<script>alert('not Updated ')</script>";
    }
    //  echo $sql;
    refresh();
}
?>

<?php include './Footer.php'; ?>

