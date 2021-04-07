<?php

require '../Common/CommonServices.php';

$rows = array();
$sql = "Select COUNT(*) as AppliCount,DATE(Created_on) as dates from tbljob where CompanyId = 71 GROUP By Date(Created_on) ORDER By JobId DESC LIMIT 15 ";
$data =  mysqli_query($conn, $sql);
while ($r = mysqli_fetch_assoc($data)) {
    $rows[] = $r;
}

echo json_encode($rows);
?>