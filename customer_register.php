
<?php
session_start();

include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Medical shop</title>
	<link rel="stylesheet" href="sytles/style.css" media="all"/>
</head>
<body>
	<!--Main Container Starts-->
	<div class="main_wrapper">

		<!-- Header Starta-->

		<div class="header_wrapper">
			<span id="top_span"><marquee><h2 style="color:blue"> Online Medical Store</h2></marquee></span>
			<!--<img src="images/index_28.gif" style="float: left;">
			<img src="images/index_19.gif" style="float: right;">-->
			
		</div>

		<!-- Header End-->


		<!--Navagation Bar Starts-->
		<div id="navbar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<li><a href="user_register.php">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="contact.php">Contact</a></li>

			</ul>

			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					
					<input type="text" name="user_query" placeholder="Search a Products"/>
					<input type="submit" name="search" value="Search"/>
				</form>
			</div>





		</div>
		<!--Navagation Bar End-->

		<!--Content Bar Starts-->
		<div class="content_wrapper">
			<div id="left_sideber">
				<div id="sidebar_titel">Categories</div>	

				<ul id="cats">
						<?php getCats(); ?>
					
				</ul>

				

				<div id="sidebar_titel">Brands</div>

				<ul id="cats">
					<?php getBrands(); ?>
					
				</ul>


			</div>


			<div id="right_content">
				

				<?php cart(); ?>

				<div id="headline">
					<div id ="headline_content">
						<b>Welcome Guest!</b>
						<b style="color: yellow;"> Shooping Cart</b>
			<span> -Total Item:<?php items(); ?> -Total Price:<?php total_price();?> 
					-<a href="cart.php"style="color: #FF0;">Go to Cart</a>
			<?php
			if(!isset($_SESSION['customer_email'])){


			echo "<a href='checkout.php' style='color: #F93;'>Login</a>";
                

                }
                else
                {
                	echo "<a href='logout.php' style='color: #F93;'>Logout</a>";
                }
                    
                   ?>
                   </span>
				</div>
				</div>

				<div>
					
				<form action="customer_register.php" method="post" enctype="multipart/form-data"/>
				<table width="750"  align="center">
					<tr align="center">
						<td colspan="8"><h2>Create an Account </h2></td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
						</td>
					</tr>


					<tr>
						<td align="right"><b>Customer Name:</b></td>
						<td><input type="text" name="c_name" required/></td>
					</tr>

					<tr>
						<td align="right"><b>Customer Email:</b></td>
						<td><input type="text" name="c_email" required/></td>
					</tr>

					<tr>
						<td align="right"><b>Customer Password:</b></td>
						<td><input type="Password" name="c_pass" required/></td>
					</tr>

					

					<tr>
						<td align="right"><b>Customer Country:</b></td>
						<td>
							<select name="c_country">
								<option>Select a Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Japan</option>
								<option>china</option>
								<option>Iran</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right"><b>Customer City:</b></td>
						<td><input type="text" name="c_city" required/></td>
					</tr>


					<tr>
						<td align="right"><b>Customer Moblie no:</b></td>
						<td><input type="text" name="c_contact" required/></td>
					</tr>

					<tr>
						<td align="right"><b>Customer Address:</b></td>
						<td><input type="text" name="c_address" required/></td>
					</tr>

					<tr>
						<td align="right"><b>Customer Image:</b></td>
						<td><input type="file" name="c_image" required/></td>
					</tr>

					<tr align="center">
						<td colspan="8"><input type="submit" name="register" value="Submit"/>

						</td>
					</tr>

					</table>
				</form>



					
				</div>
			</div>
		</div>
		<!--Content Bar Starts-->

		
		<!--Footer Bar Starts-->

		<div class="footer">
			<h1 style="color: #000;padding-top: 30px;text-align: center;">@copy:11-9-2020-By:- www.My Online Medical Shop.com</h1>
			<h2 style="color: #000;padding-top: 30px;text-align: center;">POOJA KUMARI</h2>
		</div>


		</div>
		<!--Main Container Starts-->
	
<div>



	
	</div>




</body>
</html>


<?php
if(isset($_POST['register'])){


	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_contact'];
	$c_address = $_POST['c_address'];
	$c_image = $_FILES['c_image'] ['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	
	$c_ip = getRealIpAddr();


  $insert_customer = "insert into customers(customer_name,customer_email,customer_pass,
  customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)
	values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address',
	'$c_image','$c_ip')";

 	$run_customer = mysqli_query($con,$insert_customer);

 	move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");

 	$sel_cart = "select * from cart where ip_add='$c_ip'";

	$run_cart = mysqli_query($con,$sel_cart);

	$check_cart = mysqli_num_rows($run_cart);


   	if($check_cart>0){

   		$_SESSION['customer_email']=$c_email;


   		echo "<script>alert('Account Created Successfully',Thank you!)</script>";
   		echo "<script>window.open('checkout.php','_self')</script>";


   	}
   	else{

   		$_SESSION['customer_email']=$c_email;
   		echo "<script>alert('Account Created Successfully',Thank you!)</script>";
   		echo "<script>window.open('index.php','_self')</script>";
   	}







}


?>