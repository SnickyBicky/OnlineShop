<?php

require_once('my_connect.php');

$my_query="select * from Stationery"; 
$result= mysqli_query($connection, $my_query);

while ($myrow = mysqli_fetch_array($result)):

	$description = $myrow["product_description"];
	$price = $myrow["price"];
	$image=$myrow["image"];

	if($image):
	echo "<img src=\"images/$image\">";
else:
	echo "<img src=\"images/no_image.png\">";
endif;
	echo "$description  &pound;$price  <br>";

endwhile;

?>
