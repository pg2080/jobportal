<?php
session_start();
include './../Connection.php';
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		$paymentid=$_POST['ORDERID'];
		$amount=$_POST['TXNAMOUNT'];
		$txnid=$_POST['TXNID'];
		$pid=$_SESSION['PID'];
		$com_id=$_SESSION['COM_ID'];
		$time=$_POST['TXNDATE'];
		$select_com="select * from companyinfo where LoginId='$com_id'";
		$run_com=mysqli_query($conn, $select_com);
		$row_com=mysqli_fetch_assoc($run_com);
		$companyname=$row_com['CompanyName'];

		$select_plan="select * from tblplan where IsActive='1' and PlanId='$pid'";
		$run_plan=mysqli_query($conn, $select_plan);
		$row_plan=mysqli_fetch_assoc($run_plan);
		$duration=$row_plan['Duration'];

		$dt = strtotime($_POST['TXNDATE']);
		$enddate = date("Y-m-d", strtotime("+$duration month", $dt));
		$insert_payment="INSERT INTO tblpayment(PaymentId,PlanId,ComapnyId,StartedOn,ExpiredOn,Amount,TransacionId,TransacionDate,TransacionBy) VALUES ('$paymentid','$pid','$com_id',NOW(),'$enddate','$amount','$txnid',NOW(),'$companyname')";
		$insert_row=mysqli_query($conn,$insert_payment);
		if($insert_row)
		{
			?>
			<script>
			alert("Transaction status is success");
			</script>
			<?php 
		}
	}

	else {
		?>
		<script>
			alert("Transaction status is failure");
			</script>
			<?php
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	/*if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}*/
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>