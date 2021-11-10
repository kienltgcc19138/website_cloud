<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN Shop</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-demo.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- Tao menu cap -->
    <link href="csseshop/bootstrap.min.css" rel="stylesheet">
    <link href="csseshop/font-awesome.min.css" rel="stylesheet">
    <link href="csseshop/prettyPhoto.css" rel="stylesheet">
    <link href="csseshop/price-range.css" rel="stylesheet">
    <link href="csseshop/animate.css" rel="stylesheet">
	<link href="csseshop/main.css" rel="stylesheet">
	<link href="csseshop/responsive.css" rel="stylesheet">
    
    <link href="css/salomon.css" rel="stylesheet">
    
<!--datatable-->
	<script src="js/jquery-3.2.0.min.js"/></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
    
  </head>
  <body>
  
  <?php
    session_start();
    include_once("connection.php"); 
  ?>

   <header id="header"><!--header-->
		
		<div class="header-middle" style="background-color:#069"><!--header-middle-->
			<div class="container" >
				<div>
					<div class="col-sm-6" >
						<div class="logo pull-left" >
                            <a href="index.php" style="background-color:#069;color:#FFF">
                            <img src="images/kevin.png" width="150" height="150"></a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav" >
                                <li><a href="?page=cart" style="background-color:#069;color:#FFF">
                                <i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php
                                    if(isset($_SESSION['us']) && $_SESSION['us'] != "")
                                    {
                                ?>  
                                        <li><a style ="background-color:#069;color:#FFF" href="?page=update_customer">
                                                <i class="fa fa-lock"></i>Hi,<?php echo $_SESSION['us'] ?></a>
                                        </li>
                                        <li><a href="?page=logout" style ="background-color:#069;color:#FFF">
                                        <i class="fa fa-crosshairs"></i>Logout</a></li>
                                <?php
                                    } 
                                    else 
                                    {
                                ?>  
                                <li><a href="?page=login" style="background-color:#069;color:#FFF">
                                <i class="fa fa-lock"></i>Login</a></li>
                                <li><a href="?page=register" style="background-color:#069;color:#FFF">
                                <i class="fa fa-star"></i>Register</a></li>
                                <?php
                                    }
                                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="?page=menu">Menu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?page=remotecontrolcar">Remote Control Car</a></li>
										<li><a href="?page=buldingtoys">Building Toys</a></li> 
										<li><a href="?page=figuemodel">Figure Model</a></li>
                                        <li><a href="?page=featuredproducts">Featured Products</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Management<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?page=category_management">Category</a></li>
                                        <li><a href="?page=store_management">Store</a></li>
										<li><a href="?page=product_management">Product</a></li>
                                    </ul>
                                </li> 
								<li><a href="?page=cart">Cart</a></li>
                                <li><a href="?page=feedback">Feedback</a></li>
                                <li>
                                <form action="?page=search" method="POST">
                                    <input  type="text" name="key" placeholder="Search...">
                                    <button type="submit" name="search" style=" background-color: #e97a3a; border-color: #ffffff;">Search</button>
                                </form>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
  
    <?php
        if(isset($_GET['page']))
        {
            $page =$_GET['page'];
            if($page=="register")
            {
                include_once("Register.php");
            }
            elseif($page=="login")
            {
                include_once("Login.php");
            }
            elseif($page=="category_management")
            {
                include_once("Category_Management.php");
            }
            elseif($page=="product_management")
            {
                include_once("Product_Management.php");
            }
            elseif($page=="store_management")
            {
                include_once("Store_Management.php");
            }
            elseif($page=="search")
            {
                include_once("Search.php");
            }
            elseif($page=="add_store")
            {
                include_once("Add_Store.php");
            }
            elseif($page=="update_store")
            {
                include_once("Update_Store.php");
            }
            elseif($page=="add_category")
            {
                include_once("Add_Category.php");
            }
            elseif($page=="add_product")
            {
                include_once("Add_Product.php");
            }
            elseif($page=="update_category")
            {
                include_once("Update_Category.php");
            }
            elseif($page=="update_product")
            {
                include_once("Update_Product.php");
            }
            elseif($page=="logout")
            {
                include_once("Logout.php");
            }
            elseif($page=="remotecontrolcar")
            {
                include_once("Remote_Control_Car.php");
            }
            elseif($page=="buldingtoys")
            {
                include_once("Building_Toys.php");
            }
            elseif($page=="figuemodel")
            {
                include_once("One_Piece_Figure_Model.php");
            }
            elseif($page=="featuredproducts")
            {
                include_once("Featured_Products.php");
            }
        }
        else
        {
            include("Content.php");
        }
	?>
      
      <div class="footer">
            <div class="footer-top-area">
                    <div class="zigzag-bottom"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-about-us">
                                    <h2>ATN<span>Shop</span></h2>
                                    <p>ATN Shop sells toys No.1 in Viet Nam</p>
                                    <div class="footer-social">
                                        <a href="https://www.facebook.com/kienle0660/" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="https://www.facebook.com/kienle0660/" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/kienle0660/" target="_blank"><i class="fa fa-youtube"></i></a>
                                        <a href="https://www.facebook.com/kienle0660/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-menu">
                                    <h2 class="footer-wid-title">User</h2>
                                    <ul>
                                        <li><a href="?page=login">Account</a></li>
                                        <li><a href="#">Bill</a></li>
                                        <li><a href="#">Interests</a></li>
                                        <li><a href="#">Supplier</a></li>
                                        <li><a href="#">Other information</a></li>
                                    </ul>                        
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-menu">
                                    <h2 class="footer-wid-title">About Us</h2>
                                    <ul>
                                    <li><a href="https://www.google.com/maps/place/New+York,+NY,+USA/@40.6971494,-74.2598714,10z/data=!3m1!4b1!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728?hl=en">New York, NY 10012, US</a></li>
                                        <li><a href="emailto'Admin@gmail.com'">Admin@gmail.com</a></li>
                                        <li><a href="#">+84 949 876 345</a></li>
                                        <li><a href="#">+84 946 783 649</a></li>
                                        <li><a href="#">Other information</a></li>
                                    </ul>                        
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="footer-newsletter">
                                    <h2 class="footer-wid-title">News</h2>
                                    <p>Sign up for our newsletter and get our exclusive deals.</p>
                                    <div class="newsletter-form">
                                        <form action="Login.php">
                                            <input type="email" placeholder="Enter Email Address">
                                            <input type="button" value="Submit" onclick="window.location='?page=login'">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End footer top area -->
                
                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="copyright">
                                    <p>&copy;Copyright © 2020  ATNShop Group Pte Ltd. All Rights Reserved. Design by Kevin</p>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="footer-card-icon">
                                    <a href="https://www.facebook.com/kienle0660/"><i class="fa fa-cc-discover"></i></a>
                                    <a href="https://www.facebook.com/kienle0660/"><i class="fa fa-cc-mastercard"></i></a>
                                    <a href="https://www.facebook.com/kienle0660/"><i class="fa fa-cc-paypal"></i></a>
                                    <a href="https://www.facebook.com/kienle0660/"><i class="fa fa-cc-visa"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End footer bottom area -->
            
                <!-- Latest jQuery form server -->
                <script src="https://code.jquery.com/jquery.min.js"></script>
                
                <!-- Bootstrap JS form CDN -->
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                
                <!-- jQuery sticky menu -->
                <script src="js/owl.carousel.min.js"></script>
                <script src="js/jquery.sticky.js"></script>
                
                <!-- jQuery easing -->
                <script src="js/jquery.easing.1.3.min.js"></script>
                
                <!-- Main Script -->
                <script src="js/main.js"></script>
                
                <!-- Slider -->
                <script type="text/javascript" src="js/bxslider.min.js"></script>
                <script type="text/javascript" src="js/script.slider.js"></script>
                
                <!--data table - dat dung vi tri nay-->
                <script src="js/jquery.dataTables.min.js"/></script>
                <script src="js/dataTables.bootstrap.min.js"/></script>
                <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
                <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>
            </div>
  </body>
</html>