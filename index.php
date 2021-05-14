
<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Medical Store</title>
	<link rel="stylesheet" href="sytles/style.css" media="all"/>
</head>
<body>
	<!--Main Container Starts-->
	<div class="main_wrapper">

		<!-- Header Starta-->

		<div class="header_wrapper">
			<span id="top_span"><marquee><h2 style="color:blue">ONLINE MEDICAL STORE</h2></marquee></span>
			<!--<img src="images/index_28.gif" style="float: left;">
			<img src="images/index_19.gif" style="float: right;">-->
			
		</div>

		<!-- Header End-->


		<!--Navagation Bar Starts-->
		<div id="navbar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="customer_register.php">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="admin_area/login.php">Admin</a></li>



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

						<?php

						if(!isset($_SESSION['customer_email']))
						{

							echo "<b>Welcome Guest!</b> <b style='color:yellow'>Shopping Cart</b>";
						}


						else
						{

							echo "<b>Welcome:" ."<span style='color:skyblue'>".$_SESSION['customer_email']. "</span>". "</b>" . "<b style='color:yellow'>Your Shopping Cart</b>";
						}
					?>
					
						<span> -Total Item:<?php items(); ?> -Total Price:<?php total_price();?> -<a href="cart.php"style="color: #FF0;">Go to Cart</a>

                        &nbsp;<?php
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

				
		     

				<div id="Products_box">
					
					<?php 
					getPro(); 
					getCatpro();
					getBrandPro();
					?>
				</div>
			</div>
		</div>
		<!--Content Bar Starts-->
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28462.476280474257!2d80.95693933955076!3d26.909539200000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39995726c40c33e7%3A0x9546bdaf44315d2c!2sraj%20medical%20store!5e0!3m2!1sen!2sin!4v1618405882402!5m2!1sen!2sin" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		
		<!--Footer Bar Starts-->

		<div class="footer">
			<h1 style="color: #000;padding-top: 30px;text-align: center;">@copy:2020-By:- www.My Online Medical Shop.com</h1>
			<h2 style="color: #000;padding-top: 30px;text-align: center;">POOJA KUMARI</h2>
		</div>


		</div>
		<!--Main Container Starts-->
	
<div>



	
	</div>




</body>
</html>