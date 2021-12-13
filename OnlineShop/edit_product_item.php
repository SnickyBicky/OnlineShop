<?php 
require_once('my_connect.php');

//////////// update script will go in here /////////////////

if (isset($_POST['edit_products'])): 

$product_id = $_POST["product_id"];
$product_description = $_POST["product_description"];
$price = $_POST["price"];
$reorder_level=$_POST["reorder_level"];
$stock_level=$_POST["stock_level"];

$edit_query="update Stationery set product_description = '$product_description', price = '$price',
reorder_level='$reorder_level', stock_level='$stock_level' where product_id='$product_id'"; 

$edit_result= mysqli_query($connection, $edit_query);
	
if ($edit_result) :
	header ('location: edit_product_list.php?confirm=Product item successfully updated');
else :
	echo "<b>This didn`t work, error: </b>";
	echo mysqli_error($connection);
endif;

endif;

$product_id=$_GET['product_id']; 

$my_query="select * from Stationery where product_id=$product_id"; 
$result= mysqli_query($connection, $my_query);

while ($myrow = mysqli_fetch_array($result)):
	$product_description = $myrow["product_description"];
	$price = $myrow["price"];
	$reorder_level=$myrow["reorder_level"];
	$stock_level=$myrow["stock_level"];
endwhile;
?>
<html>
<head></head>
<body>

<H1>Edit Product Form</H1>
<form method="POST" action="edit_product_item.php" onsubmit ="return confirm ('Are you sure you want to amend?')">
<p><b>Product Description:</b>
<input type="text" name="product_description" size="30" value="<?php echo $product_description; ?>">
<p><b>Price:</b>
<input type="text" name="price" value="<?php echo $price; ?>"> 
<p><b>Re Order Level:</b>
<input type="text" name="reorder_level" value="<?php echo $reorder_level; ?>">
<p><b>Stock Level:</b>
<input type="text" name="stock_level" value="<?php echo $stock_level; ?>"> 
<input type="hidden"  name=product_id value= "<?php echo $product_id; ?>" >
<input type="submit" name="edit_products" value="Save Changes">

</form>
</body>
</html>