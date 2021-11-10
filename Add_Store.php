     <!-- Bootstrap --> 
     <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	    
	<?php
	include_once("connection.php");
	if(isset($_POST["btnAdd"]))
	{
		$id=$_POST["txtID"];
		$name=$_POST["txtName"];
        $address=$_POST["txtAddress"];
		$des=$_POST["txtDes"];
		$err="";
		if($id==""){
			$err.="<li>Enter Store ID, Please</li>";
		}
		if($name==""){
			$err.="<li>Enter Store Name, Please</li>";
		}
        if($address==""){
			$err.="<li>Enter Store Address, Please</li>";
		}
		if($err!=""){
			echo "<ul>$err</ul>";
		}
		else{
			$sq="select * from public.store where storeid='$id' or storename='$name' or storeaddress='$address'";
			$result=pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn,"Insert into public.store (storeid, storename, storeaddress, storedescription) values ('$id','$name','$address','$des')");
				echo '<script>alert("Add store successful");</script>';
				echo '<meta http-equiv="refresh" content="0; URL=?page=store_management"/>';
			}
			else{
				echo"<li>Dublicate store ID or Name";
			}
		}
	}
	?>

<div class="container">
	<h2>Adding Store</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>

                    <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Store Address(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Catepgy Address" value='<?php echo isset($_POST["txtAddress"])?($_POST["txtAddress"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" onclick="window.location='?page=store_management'" />
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=store_management'" />
						</div>
					</div>
				</form>
	</div>