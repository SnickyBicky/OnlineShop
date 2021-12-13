
<?php
 require_once('my_connect.php');

if (isset($_POST['add_product'])):
	$product_description=$_POST['product_description'];
	$price=$_POST['price'];
	$reorder_level =$_POST['reorder_level'];
	$stock_level =$_POST['stock_level'];

	$image_name = $_FILES['image']['name'];
	$add_this = "images/$image_name";
	move_uploaded_file($_FILES['image']['tmp_name'],$add_this);

$my_query="INSERT INTO Stationery VALUES ('','$product_description','$price','$reorder_level','$stock_level', '$image_name')";

	$result= mysqli_query($connection, $my_query);

	if ($result):
		echo "<b>Item Successfully Added!</b>";
	else:
		echo "<b>ERROR: unable to post.</b>";
	endif;
 endif;
?>

<html><head><title>Add New Product</title></head>
<body>
<H1>Add a New Product</H1>
<table><form method=post action="add_product_and_image.php" enctype="multipart/form-data">
<tr><td><b>Product Description:</b><td><input type="text" name="product_description" size="30">
<tr><td><b>Price:</b><td><input type="text" name="price"> 
<tr><td><b>Re Order Level:</b><td><input type="text" name="reorder_level">
<tr><td><b>Stock Level:</b><td><input type="text" name="stock_level"> 
<tr><td><b>Add Image:</b><td><input type="file" name="image">
<tr><td><input type="submit" name="add_product">
</form></table>
</body></html>
