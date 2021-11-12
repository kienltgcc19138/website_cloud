<?php
//link  category
$pg_category = "SELECT * FROM public.category";
$query_category = pg_query($conn, $pg_category);

$pg_store = "SELECT * FROM public.store";
$query_store = pg_query($conn, $pg_store);

// lấy dữ liệu
if (isset($_POST['btnAdd'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');

    $proid   = $_POST['txtID'];
    $proname = $_POST['txtName'];
	$quantity      = $_POST['txtQty'];
    $price      = $_POST['txtPrice'];
    $description      = $_POST['txtShort'];
	$prostore      = $_POST['store_id'];
    $proimage      = $_FILES['Image'];
	$procat = $_POST['cate_id'];
    
   

    copy($proimage['tmp_name'], "images/" . $proimage['name']);
    $filePic = $proimage['name'];
    $result = pg_query($conn, "INSERT INTO public.product(proid,proname,prodescription,price,quantity,proimage,catid,storeid)
    VALUES('{$proid}','{$proname}','{$description}','{$price}',{$quantity},'{$filePic}','{$procat}','{$prostore}')");

    if ($result) {
        echo "Quá trình thêm mới thành công.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
    } else
        echo "Có lỗi xảy ra trong quá trình thêm mới. <a href='?page=product_management'>Again</a>";
}
?>



<div class="container">
    <h2>Add new Product</h2>

    <form id="frmProduct" name="frmProduct" method="POST" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Product ID(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value='' />
            </div>
        </div>
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Product Name(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='' />
            </div>
        </div>

		<div class="form-group">
            <label for="lblShort" class="col-sm-2 control-label">Description(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Description" value='' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblGia" class="col-sm-2 control-label">Price(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='' />
            </div>
        </div>


        <div class="form-group">
            <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
            <div class="col-sm-10">
                <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="" />
            </div>
        </div>

		<div class="form-group">
            <label for="sphinhanh" class="col-sm-2 control-label">Image(*): </label>
            <div class="col-sm-10">
                <input type="file" name="Image" id="txtImage" class="form-control" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Product category(*): </label>
            <div class="col-sm-10">
                <select class="form-control" name="cate_id">
                    <?php
                    while ($row_category = pg_fetch_assoc($query_category)) { ?>
                        <option value="<?php echo $row_category['catid']; ?>"> <?php echo $row_category['catname'] ?></option>}
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Product of store(*): </label>
            <div class="col-sm-10">
                <select class="form-control" name="store_id">
                    <?php
                    while ($row_store = pg_fetch_assoc($query_store)) { ?>
                        <option value="<?php echo $row_store['storeid']; ?>"> <?php echo $row_store['storename'] ?></option>}
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
			<input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" onclick="window.location='?page=product_management'" />
            <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=product_management'" />

            </div>
        </div>
    </form>
</div>