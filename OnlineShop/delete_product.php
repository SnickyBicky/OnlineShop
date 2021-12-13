<?php
require_once('my_connect.php');

$product_id = $_GET["product_id"];
$delete_query=	"delete from Stationery where product_id='$product_id'"; 

$delete_result= mysqli_query($connection, $delete_query);
echo $delete_result;
if ($delete_result) :
header ('location: edit_product_list.php?confirm=Product item successfully deleted');
else :
echo "<b>This didn`t work, error: </b>";
echo mysqli_error($connection);
endif;

?>
