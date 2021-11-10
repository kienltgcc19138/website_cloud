        
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
        <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p>
        	<img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /><a href="?page=add_product">Add new</a>
        </p>
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Product Description</strong></th>
                    <th><strong>Price($)</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Store Name</strong></th>
                    <th><strong>Category Name</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
            include_once("connection.php");
            if(isset($_GET["function"])=="del"){
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    $sq="SELECT proimage from public.product where proid='$id'";
                    $res=pg_query($conn,$sq);
                    $row=pg_fetch_array($res, NULL,PGSQL_ASSOC);
                    $filePic=$row['proimage'];
                    unlink("images/".$filePic);
                    pg_query($conn,"delete from public.product where proid='$id'");
                }
            }
            ?>
            
            <?php
			$No=1;
            $result=pg_query($conn,"SELECT * from public.product a, category b, store c
            where a.catid=b.catid AND a.storeid=c.storeid");
            while($row=pg_fetch_array($result, NULL,PGSQL_ASSOC)){	
			?>
			<tr>
              <td ><?php echo $No; ?></td>
              <td ><?php echo $row["proid"];  ?></td>
              <td><?php echo $row["proname"];  ?></td>
              <td><?php echo $row["prodescription"];  ?></td>
              <td><?php echo $row["price"];   ?></td>
              <td ><?php echo $row["quantity"]; ?></td>
              <td align='center' class='cotNutChucNang'>
                 <img src='images/<?php echo $row['proimage'] ?>' border='0' width="50" height="50"  /></td>
              <td ><?php echo $row["storename"]; ?></td>
              <td><?php echo $row["catname"]; ?></td>
             
             <td align='center' class='cotNutChucNang'><a href="?page=update_product&&id=<?php echo $row["proid"];?>"><img src='images/edit.png' border='0'/></a></td>
             <td align='center' class='cotNutChucNang'><a href="?page=product_management&&function=del&&id=<?php echo $row["proid"];?>"onclick="return deleteConfirm()"><img src='images/delete.png' border='0' /></a></td>
            </tr>
            <?php
               $No++;
            }
			?>
			</tbody>
        </table>  
 </form>
 
<?php
}
?>