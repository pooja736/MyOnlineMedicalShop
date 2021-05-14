
<?php
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
			<span id="top_span"><marquee><h2 style="color:blue"> Online Medical Shop Management System</h2></marquee></span>
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
				<div id="headline">
					<div id ="headline_content">
						<b>Welcome Guest!</b>
						<b style="color: yellow;"> Shooping Cart</b>
						<span> -Item - Price:</span>
					</div>
				</div>

				
				<div id="Products_box">
					
					<?php 

					if (isset($_GET['pro_id'])) {
							
					$product_id = $_GET['pro_id'];

					$get_products = "select * from products where product_id='$product_id'";
					
					$run_products = mysqli_query($db, $get_products);

					while ($row_products = mysqli_fetch_array($run_products)) {

						$pro_id = $row_products['product_id'];
						$pro_title = $row_products['product_title'];
						$pro_cat = $row_products['cat_id'];
						$pro_brand = $row_products['brand_id'];
						$pro_desc = $row_products['product_desc'];
						$pro_price = $row_products['product_price'];
						$pro_image1 = $row_products['product_img1'];
						$pro_image2= $row_products['product_img2'];
						$pro_image3= $row_products['product_img3'];


						echo "
						<div id= 'single_product'>
						<h3>$pro_title</h3>
						<img src='admin_area/product_images/$pro_image1' width='180' hight='180'/>
						<img src='admin_area/product_images/$pro_image2' width='250' hight='250'/>
						<img src='admin_area/product_images/$pro_image3' width='250' hight='250'/><br>

						<p><b>Price:Rs.$pro_price</b></p>
						<p>$pro_desc</p>
						<a href='index.php'style='float:left;'>Go Back</a>
						<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>

						</div>

						";
					}
				}

					?>
				</div>
			</div>
		</div>
		<!--Content Bar Starts-->

		
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