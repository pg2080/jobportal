<?php

require '../Common/CommonServices.php';

$rows = array();
$sql = "Select COUNT(*) as AppliCount,DATE(AppliedOn) as dates from tblappplication GROUP By Date(AppliedOn) ORDER By ApplicationId DESC LIMIT 15 ";
$data =  mysqli_query($conn, $sql);
while ($r = mysqli_fetch_assoc($data)) {
    $rows[] = $r;
}

echo json_encode($rows);
?>