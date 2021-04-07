<?php

require '../Common/CommonServices.php';

$rows = array();
$sql = "Select COUNT(*) as AppliCount,DATE(Created_on) as dates from companyinfo GROUP By Date(Created_on) ORDER By CompanyId DESC LIMIT 15 ";
$data =  mysqli_query($conn, $sql);
while ($r = mysqli_fetch_assoc($data)) {
    $rows[] = $r;
}

echo json_encode($rows);
?>