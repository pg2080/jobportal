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
            $sql="SELECT js.*,st.*,ct.*,lg.* FROM `jobseekerinfor`  js LEFT JOIN tblstate st on st.StateId = js.State LEFT JOIN tblcity ct on ct.CitytId = js.City LEFT JOIN tbllogin lg on lg.LoginId = js.LoginId";
            
            $resultarr = mysqli_query($conn, $sql);
            
        ?>
        
        <div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card" id="pl">
                    <div class="card-header">
                        <strong class="card-title">Registered Candidates</strong>
                    </div>
                    <div class="card-body">
                        <table style="background: white" class="table table-striped table-bordered table-responsive table-hover">
            <thead class="thead-dark ">
                                    <th>Sr. No.</th>
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Gender</th>
                                    <th>Mobile No</th>
                                    <th>Date of birth</th>
                                    <th>Email Id</th>
                                       
                                    </thead>
                                    <?php
                                    $count=0;
                                    while ($row = mysqli_fetch_assoc($resultarr)) {
                                    ?>
                                    <tr>
                                         <td>  <?php echo  ++$count.'.';  ?>
                                            <td><?php echo $row['FullName']; ?></td>
                                            <td><?php echo $row['Address']; ?></td>
                                            <td><?php echo $row['CityName']; ?></td>
                                            <td><?php echo $row['StateName']; ?></td>
                                            <td><?php echo $row['Gender']; ?></td>
                                            <td><?php echo $row['Mobile']; ?></td>
                                            <td><?php echo $row['DOB']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
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
