<?php

include '../Connection.php';
$id = $_POST["sid"];
$statq = "Select * from tblcity where StateId ='" . $id . "'";
$result = mysqli_query($conn, $statq);
print_r($result);
echo '<option value="">Select city</option>';
while ($row = mysqli_fetch_assoc($result)) {

    echo '<option value="' . $row['CitytId'] . '">' . $row['CityName'] . '</option>';
}

?> 