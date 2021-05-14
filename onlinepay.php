
<?php
session_start();
include("includes/db.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="#000000">
<form action="confirm.php?update_id=<?php echo $order_id;?>" method="post">
	<table width="500" height="400" align="center" border="2" bgcolor="#CCCCCC">

<tr align="center">
	<td colspan="5"><h2>Payment Details</h2></td>

</tr>
<tr>
	<td align="right">CARD NUMBER</td>
	<td><input type="text" name="cardno" required="required"/></td>
	</tr>

	<tr>
	<td align="right">EXPIRATION DATE</td>
	<td><input type="date" name="expiration" required="required"/></td>
	</tr>


	
	
	<tr>
	<td align="right">CVC CODE</td>
	<td><input type="text" name="cvc" required="required"/></td>
	</tr>

	

	<tr>
	<td align="right">Amount in Rs.</td>
	<td><input type="text" name="amount" required="required"/></td>
	</tr>

	<tr align="center">
	<td colspan="5"><input type="submit" name="payment" value="Online Payment" /
		></td>
	</tr>


</form>
</body>
</html>
<?php

echo "<script>alert('Admin Email or Password is incorrect,try again')</script>";
?>


