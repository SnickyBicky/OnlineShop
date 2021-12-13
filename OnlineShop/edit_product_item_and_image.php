
<?php
require_once('my_connect.php');

if (isset($_POST['edit_products'])): 

	$product_id = $_POST["product_id"];
	$product_description = $_POST["product_description"];
	$price = $_POST["price"];
	$reorder_level=$_POST["reorder_level"];
	$stock_level=$_POST["stock_level"];

	/* this line captures the original image name posted from the edit form below */
	$image_name=$_POST["image"];
	
	/* this if statement checks if a new image has been uploaded 
	if not no action is taken in both deleting or adding a new file*/
	if ($_FILES['image']['name']):
	
		/* if a new image has been uploaded then the script has to delete the original
		image which resides in the images directory if it exists */
		if (file_exists('images/'.$image_name)) :
			unlink('images/'.$image_name);
		endif;
	
		/*  once the original image has been deleted the $image_name variable is assigned
		a new value - the new image name which has just been uploaded */
		$image_name = $_FILES['image']['name'];
		$add_this = "images/$image_name";
		move_uploaded_file($_FILES['image']['tmp_name'],$add_this);

	endif;
	
	/* this is the same edit query string as before but with the (image='$image_name') added */
	$edit_query=	"update Stationery set 	
					product_description = '$product_description',
					price = '$price',
					reorder_level='$reorder_level',
					stock_level='$stock_level', 
					image='$image_name'
					where product_id='$product_id'"; 

	$edit_result= mysqli_query($connection, $edit_query);
	
	if ($edit_result) :
		/* this location file has been changed */
		header ('location: edit_product_list_and_images.php?confirm=Product item successfully updated');
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
/* this additional variable has been added to get the original image name
which will be used to show the image on this page and send to the editing 
script above */
$image=$myrow["image"];

endwhile;
?>

<html>
<head></head>
<body>
<H1>Edit Product Form</H1>
<table>
<!-- enctype="multipart/form-data" attributed added to the form tag -->
<form method="POST" action="edit_product_item_and_image.php" enctype="multipart/form-data" onsubmit ="return confirm('Are you sure you want to amend?')">

<tr><td><b>Product Description:</b>
<td><input type="text" name="product_description" size="30" value="<?php echo $product_description; ?>">
<tr><td><b>Price:</b>
<td><input type="text" name="price" value="<?php echo $price; ?>"> 
<tr><td><b>Re Order Level:</b>
<td><input type="text" name="reorder_level" value="<?php echo $reorder_level; ?>">
<tr><td><b>Stock Level:</b>
<td><input type="text" name="stock_level" value="<?php echo $stock_level; ?>"> 
<tr><td><b>Replace Image?:</b>
<td><input type="file" name="image">
<input type="hidden"  name="product_id" value= "<?php echo $product_id; ?>" >
<!-- this hidden field passes the original image name to the edit script for checking -->
<input type="hidden"  name="image" value= "<?php echo $image; ?>" >
<tr><td><input type="submit" name="edit_products" value="Save Changes">
</form>
</table>
<?php
/* this PHP section is added to show the original image if it exists */
if($image):
echo "<img src=\"images/$image\">";
else:
echo "<img src=\"images/no_image.png\">";
endif;
?>
</body>
</html>
