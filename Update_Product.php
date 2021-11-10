   <!-- Bootstrap -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
<?php
	include_once("connection.php");
	Function bind_Category_List($conn,$selectedValue){
		$sqlstring="SELECT catid, catname FROM public.category";
		$result = pg_query($conn, $sqlstring);
		echo "<select name='CategoryList' class='form-control'>
			<option value='0'>Chose category</option>";
			while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				if($row['catid'] == $selectedValue)
				{
					echo "<option value='".$row['catid']."' selected>".$row['catname']."</option>";
				}
				else{
					echo "<option value='".$row['catid']."'>".$row['catname']."</option>";
				}
			}
		echo "</select>";
	}
	if(isset($_GET["id"]))
	{
		$id= $_GET["id"];
		$sqlstring = "SELECT productname, prodescription, price,
		quantity, proimage, storeid, catid
		FROM public.product WHERE proid = '$id' ";

		$result = pg_query($conn, $sqlstring);
		$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
		
		$proname =$row["productname"];
		$short = $row['prodescription'];
		$price=$row['price'];
		$qty=$row['quantity'];
		$pic =$row['proimage'];
		$store =$row['storeid'];
		$category= $row['catid'];

?>
<div class="container">
	<h2>Updating Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" 
								  placeholder="Product ID" readonly value='<?php echo $id; ?>'/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" 
								  placeholder="Product Name" value='<?php echo $proname;?>'/>
							</div>
                </div>   

				<div class="form-group">   
                    <label for="lblShort" class="col-sm-2 control-label">Product Description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='<?php echo $short;?>'/>
							</div>
                </div>

				<div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='<?php echo $price; ?>'/>
							</div>
                 </div>  

				 <div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="<?php echo $qty;?>"/>
							</div>
                </div>

				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							<img src='product-imgs/<?php echo $pic; ?>' border='0' width="50" height="50"  />
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>

				 <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product Store(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Category_List($conn,$store); ?>
							</div>
                </div>  

                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Category_List($conn,$category); ?>
							</div>
                </div>  
                          
                
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"monclick="window.location='?page=product_management'">
							  <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=product_management'">

						</div>
				</div>
			</form>
</div>
<?php
	}	
	else 
	{
		echo '<meta http-equiv="Refresh" content="0; URL=?page=product_management"/>';
	}
?>
<?php	
	include_once("connection.php");
	if(isset($_POST["btnUpdate"]))
	{
		$id=$_POST["txtID"];
		$proname=$_POST["txtName"];
		$short=$_POST["txtShort"];
		$price=$_POST["txtPrice"];
		$qty=$_POST["txtQty"];
		$pic=$_FILES['txtImage'];
		$category=$_POST['CategoryList'];

		$err="";

		if(trim($id)=="")
		{
			$err .="<li>Enter Product ID, please</li>";
		}
		if(trim($proname)=="")
		{
			$err .= "<li>Enter product name,please</li>";
		}
		if($category=="0")
		{
			$err .= "<li>Choose product category,please</li>";
		}
		if(!is_numeric($price))
		{
			$err .= "<li>Product price must be number</li>";
		}
		if(!is_numeric($qty))
		{
			$err .= "<li>Product quantity must be number</li>";
		}
		if($err != "")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			if($pic['name'] !="")
			{
				if($pic['type']=="image/jpg" || $pic['type']=="image/jpeg" || $pic['type']=="image/png" || $pic['type']=="image/git" )
				{
					if($pic['size']<= 614400)
					{
						$sq="SELECT * FROM public.product WHERE proid != '$id' and proname='$proname'";
						$result=pg_query($conn,$sq);
						if(pg_num_rows($result)==0)
						{
						copy($pic['tmp_name'], "product-imgs/".$pic['name']);
						$filePic = $pic['name'];

						$sqlstring="UPDATE product SET proname='$proname',prodescription='$short', price=$price,
						quantity=$qty, proimage='$filePic',catid='$category',
						ProDate='".date('Y-m-d H:i:s')."' WHERE Product_ID='$id'";
						pg_query($conn,$sqlstring);
						echo '<meta http-equiv="refresh" content="0; URL=?page=product_management"/>';
						}
						else 
						{
							echo "<li>Duplicate productId or Name</li>";
						}
					}
					else 
					{
						echo "Size of image to big";
					}	
				}
				else 
				{
					echo "Image format is not correct";
				}
			}
			else
			{
				$sq="SELECT * FROM public.product where proid != '$id' and proname='$proname'";
				$result= pg_query($conn,$sq);
				if(pg_num_rows($result)==0)
				{
					$sqlstring="UPDATE public.product SET proname='$proname',prodescription='$short',
					price=$price, quantity=$qty,
					catid='$category' WHERE proid='$id'";

					pg_query($conn,$sqlstring);
					echo '<meta http-equiv="refresh" content="0; URL=?page=product_management"/>';
				}
				else 
				{	
					echo "<li>Duplicate productId or Name</li>";
				}
			}
		} 
	}
?>