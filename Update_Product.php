<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script> -->
<?php

$id = $_GET['id'];
$result = pg_query($conn, "SELECT* FROM public.product WHERE proid='{$id}'");
$row = pg_fetch_assoc($result);

include_once("connection.php");
function bind_Category_List($conn){
	$sqlstring="select catid, catname from public.category";
	$result=pg_query($conn,$sqlstring);
	echo "<select name='CategoryList' class='form-control'>
		<option value='0'>Choose category</option>";
		while($row= pg_fetch_array($result, NULL,PGSQL_ASSOC)){
			echo "<option value='".$row['catid']."'>".$row['catname']."</option>";
		} 
		echo "</select>";

}
?>
<?php
include_once("connection.php");
function bind_Store_List($conn){
	$sqlstring="select storeid, storename, storeaddress from public.store";
	$result=pg_query($conn,$sqlstring);
	echo "<select name='StoreList' class='form-control'>
		<option value='0'>Choose store</option>";
		while($row= pg_fetch_array($result, NULL,PGSQL_ASSOC)){
			echo "<option value='".$row['storeid']."'>".$row['storename']."</option>";
		} 
		echo "</select>";
}
?>


<?php

if(isset($_POST["Update"]))
{

	$id=$_POST["txtID"];
	$proname=$_POST["txtName"];
	$short=$_POST["txtShort"];
	$price=$_POST["txtPrice"];
	$qty=$_POST["txtQty"];
	$pic=$_FILES['txtImage'];
	$store=$_POST['StoreList'];
	$category=$_POST['CategoryList'];
	
	$err="";

	if(trim($proname)==""){
		$err.="<li>Enter product name, please</li>";
	}
	if(trim($category)==""){
		$err.="<li>Enter product category, please</li>";
	}
	if(trim($store)==""){
		$err.="<li>Enter store, please</li>";
	}
	if(!is_numeric($qty)){
		$err.="<li>Enter quantity, please</li>";
	}
	if($err!=""){
		echo "<ul>$err</ul>";
	}

	copy($pic['tmp_name'],"images/".$pic['name']);
	$filePic=$pic['name'];
	$result = pg_query($conn, "UPDATE public.product 
        SET proname = '$proname',prodescription = '$short', price ='$price', quantity = '$qty', proimage = '$filePic', storeid ='$store', catid ='$category'
        WHERE proid='$id'");

if ($result) {
	echo "Quá trình cập nhật thành công.";
	echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
} else
	echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='?page=product_management'>Again</a>";
}
?>
<div class="container">
	<h2>Updating Product</h2>

	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" readonly value='<?php echo $row['proid'] ?>'/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='<?php echo $row['proname'] ?>'/>
							</div>
                </div>   

				<div class="form-group">   
                    <label for="lblShort" class="col-sm-2 control-label">Short description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='<?php echo $row['prodescription'] ?>'/>
							</div>
                </div>

				<div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='<?php echo $row['price'] ?>'/>
							</div>
                 </div>   

				 <div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value='<?php echo $row['quantity'] ?>'/>
							</div>
                </div>

				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value='<?php echo $row['proimage'] ?>'/>
							</div>
                </div>

				<div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product Store(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Store_List($conn); ?>
							</div>
                </div>  

                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
							<div class="col-sm-10">
							      <?php bind_Category_List($conn); ?>
							</div>
                </div>  
                
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="Update" id="btnAdd" value="Add new" onclick="window.location='?page=product_management'" />
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=product_management'" />
                              	
						</div>
				</div>
				
		</form>
</div>