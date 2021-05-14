<!DOCTYPE html>
<html>
<head>
	<title>Payment Options</title>
</head>
<body>
<?php
include("includes/db.php");

?>



    <div align="center" style="padding: 10px;">
	<h1>Payment Option for you</h1>
	
	<?php
	
	$ip = getRealIpAddr();

	
	$get_customer = "select * from customers where customer_ip='$ip'";
	
	$run_customer = mysqli_query($con,$get_customer);
	
	$customer = mysqli_fetch_array($run_customer);
	
	$customer_id  = $customer['customer_id'];
?>



<b>Pay with</b>&nbsp;<a href="onlinepay.php"><img src="images/card.jpg" width="200" height="150"></a> <b>Or<a href="order.php?c_id=<?php echo $customer_id; ?>">
Cash on Delivery</a></b><br>
<br>
<br>
<br>

<b> Notes: If you selected "Pay offline" option then please check your email or account to find the Invioce No for your oder.</b>



</div>
</body>
</html>