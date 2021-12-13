<h2>Choose a product to edit</h2>
<?php
require_once('my_connect.php');

$my_query="select * from Stationery order by product_description";

$result= mysqli_query($connection, $my_query);

while ($myrow = mysqli_fetch_array($result)):

	$product_id = $myrow["product_id"];
	$description = $myrow["product_description"];
	$price = $myrow["price"];
	$image=$myrow["image"];

	echo "<img src=\"products/$image\">";
	echo "<a href=edit_product_item.php?product_id=$product_id>$description  &pound;$price</a> - ";
	echo "<a onClick =\"return confirm('Are you sure you want to delete?')\" href = delete_product.php?product_id=$product_id >Delete</a><br>";

endwhile;

?>
