    
    <?php
if(!isset($_SESSION['admin']) or $_SESSION['admin']==0)
{
    echo"<script>alert('You are not administration')</script>";
    echo'<meta http-equiv="refresh" content="0;URL=?page=login">';
}
else
{
?>
    <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
        <script>
        function deleteConfirm(){
            if(confirm("Are you sure to delete!")){
                return true;
            }
            else{
                return false;
            }
        }
        </script>
         <?php
        include_once("connection.php");
        if(isset($_GET["function"])=='del'){
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                pg_query($conn,"DELETE from public.store where storeid='$id'");
            }
        }
        ?>
        <form name="frm" method="post" action="">
        <h1>Product Store</h1>
        <p>
        <img src="images/add.png" alt="Add new" width="16" height="16" border="0" /> <a href="?page=add_store"> Add</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Store Name</strong></th>
                    <th><strong>Store Address</strong></th>
                    <th><strong>Desscriptin</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
            $No=1;
            $result=pg_query($conn,"SELECT * from public.store");
            while($row=pg_fetch_array($result, NULL,PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td class="cotCheckBox"><?php echo $No;?></td>
              <td><?php echo $row["storename"];?></td>
              <td><?php echo $row["storeaddress"];?></td>
              <td><?php echo $row["storedescription"];?></td>
              <td style='text-align:center'><a href="?page=update_store&&id=<?php echo $row["storeid"];?>"><img src='images/edit.png' border='0'></a></td>
              <td style='text-align:center'><a href="?page=store_management&&function=del&&id=<?php echo $row["storeid"];?>" onclick="deleteConfirm()"><img src='images/delete.png' border='0'></a></td>
            </tr>
            <?php $No++;}?>
			</tbody>
        </table>  
        
        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	
            </div>
        </div><!--Nút chức nang-->
 </form>
<?php
}
?>