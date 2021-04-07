<?php

session_start();
$c = mysqli_connect("localhost", "root", "", "magnifyme");

    $i = $_SESSION['Login']['CId'];
    $Pid =1;// $_SESSION['pid'];
    echo $i;  
    $sqq = "SELECT companyinfo.*,tbllogin.* from companyinfo LEFT JOIN tbllogin on tbllogin.LoginId = companyinfo.LoginId WHERE companyinfo.LoginId='$i'";
    $rs = mysqli_query($c, $sqq);
    $co = mysqli_num_rows($rs);
    //echo "<script>alert('$co')</script>";
    $rows = mysqli_fetch_array($rs);

    //$quer="select tbl_product.Product_name,tbl_orders.Product_id from tbl_orders join tbl_product on tbl_orders.Product_id=tbl_product.Product_id where tbl_orders.User_id='".$_SESSION['id']."'";
    $quer = "Select * from tblPlan where PlanId = $Pid";
    $exec = mysqli_query($c, $quer);
    $cooo = mysqli_num_rows($exec);
    echo "<script>alert('$cooo')</script>";
    $rops = mysqli_fetch_array($exec);
    print_r($rops);
    print_r($rows);
    $su="http://localhost/MAINJOBPORTAL/CompanyAdmin/success.php";
    $fu="http://localhost/MAINJOBPORTAL/CompanyAdmin/failure.php";
    $_POST['email']=$rows['Email'];
    $_POST['firstname'] = $rops['PlanName'];
?>
<?php

$MERCHANT_KEY = "hqhvfXEI";
$SALT = "ODsa72PLrw";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
        echo 'hello';

    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
    print_r($posted);
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($rops['Amount'])) ? '' : $rops['Amount'] ?>" /></td>
          <td>Plan Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($rops['PlanName'])) ? '' : $rops['PlanName']; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($rows['Email'])) ? '' : $rows['Email']; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($rows['Mobile'])) ? '' : $rows['Mobile']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($rows['CompanyName'])) ? '' : $rows['CompanyName'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($su)) ? '' : $su ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="<?php echo (empty($fu)) ? '' : $fu ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
