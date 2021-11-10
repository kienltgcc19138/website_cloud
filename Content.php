<link rel="stylesheet" href="h2brand.css">

<?php
include_once("connection.php");
?>
    <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

        <div class="item active">
            <img src="images/kien.jpg" alt="T" style="width:100%;">
        </div>

        <div class="item">
            <img src="images/kien2.jpg" alt="R" style="width:100%;">
        </div>
        
        <div class="item">
            <img src="images/kien3.jpg" alt="U" style="width:100%;">
        </div>
    
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
    </div>

    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Product</h2>
                        <div class="product-carousel">
                        
                        <!--Load san pham tu DB -->
                           <?php
						  // 	include_once("database.php");
		  				   	$result = pg_query($conn, "SELECT * FROM public.product" );
			
			                while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				            ?>
				            <!--Một sản phẩm -->
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/<?php echo $row['proimage']?>" width="150" height="150">
                                    <div class="product-hover">
                                        <a href="?page=cart&ma=<?php echo  $row['proid']?>" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="?page=menu&ma=<?php echo  $row['proid']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?page=menu&ma=<?php echo  $row['proid']?>">Product Name: <?php echo  $row['proname']?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>Price($): <?php echo  $row['price']?></ins>
                                </div> 
                            </div>
                
                <?php
				}
				?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    

    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Best Seller</h2>
                        <?php
						  // 	include_once("database.php");
		  				   	$result = pg_query($conn, "SELECT * FROM public.product where quantity > 20" );

			                while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				            ?>
                        <div class="single-wid-product">
                            <a href="?page=cart"><img src="images/<?php echo $row['proimage']?>" alt="" class="product-thumb"></a>
                            <h2>Product Name: <a href="?page=cart&ma=<?php echo  $row['proid']?>"><?php echo  $row['proname']?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                            <ins>Price($): <?php echo  $row['price']?></ins> <del></del>
                            </div>                            
                        </div>

                        <?php
			        	}
				        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                    <h2 class="product-wid-title">High Quality</h2>
                        <?php
						  // 	include_once("database.php");
		  				   	$result = pg_query($conn, "SELECT * FROM public.product where price Like '5%'");

			            
			                while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				            ?>
                        <div class="single-wid-product">
                            <a href="?page=cart"><img src="images/<?php echo $row['proimage']?>" alt="" class="product-thumb"></a>
                            <h2>Product Name:<a href="?page=cart&ma=<?php echo  $row['proid']?>"><?php echo  $row['proname']?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                </div>
                            <div class="product-wid-price">
                            <ins>Price($): <?php echo  $row['price']?></ins> <del></del>
                            </div>                            
                        </div>

                        <?php
			        	}
				        ?>
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="single-product-widget">
                    <h2 class="product-wid-title">Featured Products</h2>
                        <?php
						  // 	include_once("database.php");
		  				   	$result = pg_query($conn, "SELECT * FROM public.product where catid='C004'" );

			                while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				            ?>
                        <div class="single-wid-product">
                            <a href="?page=cart"><img src="images/<?php echo $row['proimage']?>" alt="" class="product-thumb"></a>
                            <h2>Product Name: <a href="?page=cart&ma=<?php echo  $row['proid']?>"><?php echo  $row['proname']?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                </div>
                            <div class="product-wid-price">
                            <ins>Price($): <?php echo  $row['price']?></ins> <del></del>
                            </div>                            
                        </div>
                        <?php
			        	}
				        ?>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->