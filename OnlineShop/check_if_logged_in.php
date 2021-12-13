<?php
session_start();

if((!isset($_SESSION['authenticated'])) || ($_SESSION['user_type']!=$user_type)):
	
	header('location: log_me_in.php');
	
endif;

?>
