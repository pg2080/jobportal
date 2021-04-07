<?php 
session_start(); 
?>
<?php 
           
          /* if(!isset($_SESSION['customer_email'])){
            //   ?>
            //<script>window.open('customer/login','_self')</script>
            //<?php
           }*/
           
?>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $_POST['TXN_ID'];
$paramList["CUST_ID"] = $_POST['COM_ID'];
$_SESSION['COM_ID']=$_POST['COM_ID'];
$paramList["PID"] = $_POST['PID'];
$_SESSION['PID']= $_POST['PID'];
$paramList["INDUSTRY_TYPE_ID"] = $_POST['INDUSTRY_TYPE_ID'];
$paramList["CHANNEL_ID"] = $_POST['CHANNEL_ID'];
$paramList["TXN_AMOUNT"] = $_POST['AMOUNT'];
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$paramList["CALLBACK_URL"] = "http://localhost/MAINJOBPORTAL/CompanyAdmin/pgResponse.php";


//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>

<head>
    <title>Merchant Check Out Page</title>
</head>

<body>
    <center>
        <h1>Please do not refresh this page...</h1>
    </center>
    <form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
        <table border="1">
            <tbody>
                <?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
                <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
            </tbody>
        </table>
        <script type="text/javascript">
        document.f1.submit();
        </script>
    </form>
</body>

</html>