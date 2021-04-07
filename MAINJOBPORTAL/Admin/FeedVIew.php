<?php include './Sidebar.php'; ?> 
<?php
//$LId = $_SESSION['Login']['LId'];
include '../Connection.php';
//
?>


<?php
$statq = "Select * from tblFeedback LEFT JOIN jobseekerinfor ON jobseekerinfor.LoginId = tblfeedback.LoginId Where FeedType='JS'";
$result = mysqli_query($conn, $statq);
?>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> JobSeeker FeedBack </strong>
                    </div>
                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="row"><div class="col-sm-12"><table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                            <tr role="row">
                                                
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 374.883px;" aria-label="Position: activate to sort column ascending"> Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 374.883px;" aria-label="Position: activate to sort column ascending"> No. of start</th>
                                                <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" style="width: 374.883px;" aria-label="Position: activate to sort column ascending">Rating</th>
                                                
                                        </thead>
                                        <tbody>

                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                <tr role="row" class="odd">
                                                    
                                                    <td class="sorting_1"><?php echo $row['FullName'] ?></td>
                                                    <td class="sorting_1"><?php echo $row['Ratings'] ?> </td>
                                                    <td class="sorting_1">
                                                        <?php $a = $row['Ratings'];
                                                        for ($b = 0; $b < $a; $b++) { ?> <i class="fa fa-star" style="color: yellow"></i><?php } ?>
                                                    </td>

                                                    
                                                </tr>

<?php } ?>
                                        </tbody>
                                    
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
<?php include './Footer.php'; ?>

