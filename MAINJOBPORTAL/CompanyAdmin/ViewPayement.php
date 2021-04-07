<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
  <?php
            include './Sidebar.php';
            include '../Connection.php';
        // put your code here
        ?>
        
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
        
      
        <?php
        $Cid = $_SESSION['Login']['CId'];
        //echo $Cid;
               $sql="Select * from tblpayment pa left join tblplan p  on p.PlanId = pa.PlanId where pa.ComapnyId = $Cid";
           // $sql="SELECT pm.*,co.*,lg.* FROM `tblpayment`  pm LEFT JOIN companyinfo co on LEFT JOIN tbllogin lg on lg.LoginId = co.LoginId";
            //Select * from tblpayment pa left join tblplan p  on p.PlanId = pa.PlanId LEFT JOIN companyinfo co on co.LoginId = pa.ComapnyId
            $resultarr = mysqli_query($conn, $sql);
            //print_r($resultarr);
            
        ?>
        
        <div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card" id="pl">
                    <div class="card-header">
                        <strong class="card-title">Payment History</strong>
                    </div>
                    <div class="card-body">
                        <table style="background: white" class="table table-striped table-bordered table-responsive table-hover">
            <thead class="thead-dark ">
                                    <th>Sr. No.</th>
                                    <th>Plan Name</th>
                                    <th>Started On</th>
                                    <th>Expired On</th>
                                    <th>Amount</th>
                                    <th>Transaction Id</th>
                                    <th>Transaction Date</th>
                                    
                                       
                                    </thead>
                                    <?php
                                    $count=0;
                                    while ($row = mysqli_fetch_assoc($resultarr)) {
                                    ?>
                                    <tr>
                                         <td>  <?php echo  ++$count.'.';  ?>
                                            <td><?php echo $row['PlanName']; ?></td>
                                            <td><?php echo $row['StartedOn']; ?></td>
                                            <td><?php echo $row['ExpiredOn']; ?></td>
                                            <td><?php echo $row['Amount']; ?></td>
                                            <td><?php echo $row['TransacionId']; ?></td>
                                            <td><?php echo $row['TransacionDate']; ?></td>
                                            
                                    </tr>
                                    <?php }?>
        </table>
   
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div>
    
        <br>
        <br>
        
    </body>
</html>
<?php include './Footer.php'; ?>
