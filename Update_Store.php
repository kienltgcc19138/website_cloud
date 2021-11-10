     <!-- Bootstrap --> 
     <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
   <?php
		include_once("connection.php");
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$result = pg_query($conn, "SELECT * from public.store where storeid='$id'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$store_id = $row['storeid'];
			$store_name = $row['storename'];
            $store_add = $row['storeaddress'];
			$store_des = $row['storedescription'];
			
	?>
	
<div class="container">
	<h2>Updating Store</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Store ID" readonly 
								  value='<?php echo $store_id; ?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Store Name" 
								  value='<?php echo $store_name; ?>'>
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store Address(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Store Name" 
								  value='<?php echo $store_add; ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" 
								  value='<?php echo $store_des; ?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=store_management'" />
                              	
						</div>
					</div>
				</form>
	</div>

	<?php
		}
	else
	{
		echo '<meta http-equiv="Refresh" content="0;URL=Store_Management.php"/>';
	}
	?>


    <?php
		if(isset($_POST["btnUpdate"]))
		{
			$id = $_POST["txtID"];
			$name = $_POST["txtName"];
            $address = $_POST["txtAddress"];
			$des = $_POST["txtDes"];
			$err = "";
			if($name=="")
			{
				$err .= "<li>Enter Store Name, please</li>";
			}
			if($err!="")
			{
				echo "<ul>$err</ul>";
			}
			else
			{
				$sq="SELECT * from public.store where storeid != '$id' and storename='$name'";
				$result = pg_query($conn, $sq);
				if(pg_num_rows($result)==0)
				{
					pg_query($conn, "UPDATE public.store Set storename = '$name', storeaddress ='$address', storedescription='$des' where storeid='$id'");
					echo '<meta http-equiv="Refresh" content="0;URL=?page=store_management"/>';
				}
				else
				{
					echo "<li>Duplicate store name</li>";
				}
			}
		}
	?>



	
      