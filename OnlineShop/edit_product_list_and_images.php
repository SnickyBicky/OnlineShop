<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154551692-1"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154551692-1');
</script>

<h1>Welcome to Stationery Shop!</h1>
<h2>Choose a product to edit</h2>
<table>

<?php

include_once("googleanalytics.php");

if (isset($_GET['confirm'])):
	$confirm=$_GET['confirm'];
	echo "<p><font color='red'>$confirm<br></font>";
endif;

require_once('my_connect.php');

$my_query="select * from Stationery order by product_description asc"; 

$result= mysqli_query($connection, $my_query);

while ($myrow = mysqli_fetch_array($result)):

	$product_id = $myrow["product_id"];
	$description = $myrow["product_description"];
	$price = $myrow["price"];
	$image = $myrow["image"];

	echo "<tr><td>";
	if($image):
		echo "<img style=\"width: 100px\" src=\"images/$image\">";
		else:
		echo "<img style=\"width: 100px\" src=\"images/no_image.png\">";
		
		$File = "error_log.txt";
		$Handle = fopen($File, 'a');
		$Data = "ERROR:Loading Image ".date("y-m-d" ,  time()). "\n";
		fwrite($Handle,$Data);
		fclose($Handle);

	endif;
	
echo "<td><a href=edit_product_item_and_image.php?product_id=$product_id>$description  &pound;$price </a>  ";

echo "<td><a onClick =\"return confirm('Are you sure you want to delete?')\" href = delete_product_and_image.php?product_id=$product_id ><img src = \"images/delete.png\" title=\"Click here to delete this record\"></a><br>";
endwhile;

?>

</table>
