<?php
  
require_once('my_connect.php');

$product_description=$_GET['product_description'];
$price=$_GET['price'];
$reorder_level =$_GET['reorder_level'];
$stock_level =$_GET['stock_level'];

$my_query="INSERT INTO Stationery  VALUES ('',  '$product_description' , '$price' , '$reorder_level' , '$stock_level')";

$result= mysqli_query($connection, $my_query);

if ($result) {
echo "<b>Item Successfully Added!</b>";
}//end then
else {
echo "<b>ERROR: unable to post.</b>";
}//end else

mysqli_close();   

?>
