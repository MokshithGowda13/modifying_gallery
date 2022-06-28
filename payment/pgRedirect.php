<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
	header('Location:../login.php');
}
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("lib/config_paytm.php");
require_once("lib/encdec_paytm.php");
require_once("../includes/connection.php");
$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = 1023;
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$EMAIL=$_POST["EMAIL"];
$MSISDN=$_POST['MSISDN'];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$customerid=$_SESSION['customer_id'];
$itemid=$_SESSION['item_id'];
$invoice=$_POST['invoice'];
$amount=$TXN_AMOUNT;


$paramList["CALLBACK_URL"] = "http://localhost/modifying_gallery/payment/pgResponse.php?invoice_number='$invoice'";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
//$paramList["VERIFIED_BY"] = "EMAIL"; //
//$paramList["IS_USER_VERIFIED"] = "YES"; //


$store_payment="INSERT INTO orders (customer_id,item_id,invoice_number,
				amount,status)VALUES ('$customerid','$itemid',
				'$invoice','$amount','ORDER CONFIRMED')";
$store_booking="INSERT INTO payments (customer_id,invoice_number,
				amount,status)VALUES ('$customerid',
				'$invoice','$amount','ORDER CONFIRMED')";
//echo $store_payment;
//echo $store_booking;
mysqli_query($con,$store_payment) or die(mysqli_query($con));
mysqli_query($con,$store_booking) or die(mysqli_query($con));


//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html> 
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
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