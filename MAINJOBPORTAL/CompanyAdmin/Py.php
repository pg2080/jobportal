<?php
ob_start();
session_start();
require '../Common/Connection.php';

$c = mysqli_connect("localhost", "root", "", "magnifyme");
$MERCHANT_KEY ="cD3ECA9H";// "68emhBVD";
$SALT = "74koRefD6i";// "VQ7Ulubqtq";

// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";  // For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if (!empty($_POST)) {
    //print_r($_POST);
    foreach ($_POST as $key => $value) {
        $posted[$key] = $value;
    }
}

$formError = 0;

if (empty($posted['txnid'])) {
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
    $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
//$hash=strtolower(hash('sha512', $hashSequence));
if (empty($posted['hash']) && sizeof($posted) > 0) {
    if (
            empty($posted['key'])  || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email'])  || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])
    ) {
       // $formError = 1;
    } else {
        //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach ($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }

        $hash_string .= $SALT;


        $hash = strtolower(hash('sha512', $hash_string));
        echo $hash;
        $action = $PAYU_BASE_URL . '/_payment';
    }
} elseif (!empty($posted['hash'])) {
    $hash = $posted['hash'];
    $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
    <head>
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="<color-code>"
 bolt-logo="<image path>"></script>
    </head>
    <body onload="submitPayuForm()">
        <!--<h2>PayU Form</h2>-->
        <br/>
<?php if ($formError) { ?>

            <span style="color:red">Please fill all mandatory fields.</span>
            <br/>
            <br/>
<?php }
?>
        <form action="<?php echo $action; ?>" method="post" name="payuForm">
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
<?php
    $i = $_SESSION['Login']['CId'];
    $Pid =1;// $_SESSION['pid'];

    $sqq = "SELECT companyinfo.*,tbllogin.* from companyinfo LEFT JOIN tbllogin on tbllogin.LoginId = companyinfo.LoginId WHERE companyinfo.companyId='$i'";
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
?>
            <table>
                <tr>
                  <!--<td>Amount: </td>-->
                    <td><input type="hidden" name="amount" value="<?php echo $rops['2']; ?>" /></td>
                  <!--<td>First Name: </td>-->
                    <td><input name="firstname" type="hidden" id="firstname" value="<?php echo $rows['CompanyName']; ?>" /></td>
                </tr>   
                <tr>
                  <!--<td>Email: </td>-->
                    <td><input name="email" id="email" type="hidden" value="<?php echo $rows['Email']; ?>" /></td>
                  <!--<td>Phone: </td>-->
                    <td><input name="phone"  type="hidden" value="<?php echo $rows['Mobile']; ?>" /></td>
                </tr>
                <tr>
                  <!--<td>Product Info: </td>-->
                    <td colspan="3"><input name="productinfo" type="hidden" value="<?php echo $rops['0']; ?>"></td>
                </tr>
                <tr>
                  <!--<td>Success URI: </td>-->
                    <td colspan="3"><input name="surl" type="hidden" value="http://localhost/PhpProject1/CompanyAdmin/success.php" size="64" /></td>
                </tr>
                <tr>
                  <!--<td>Failure URI: </td>-->
                    <td colspan="3"><input name="furl" type="hidden" value="http://localhost/PhpProject1/CompanyAdmin/failure.php" size="64" /></td>
                </tr>

                <tr>
                    <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
                </tr>
<?php if (!$hash) { ?>
                    <td colspan="4">
    <?php
    echo "<input type='submit' name='submit' onclick='submitPayuForm()' class='btn btn-success' style='border-radius: 0px' value='submit'>";
    ?>
                        <!--<input type="submit" value="Submit"  style="border-radius: 3px;height: 70px;width: 120px;color: white;background-color: #042056"/></td>-->
<?php } ?>
                    </tr>
            </table>
        </form>

        <script>
            var hash = '<?php echo $hash ?>';
            function submitPayuForm() {
                if (hash == '') {
                    return;
                }
                alert('paymenu');
                var payuForm = document.forms.payuForm;
                payuForm.submit();
            }
        </script>
    </body>
</html>
