<?php 
session_start();
if (isset($_POST['login'])):

	require_once('my_connect.php');
	$email_address=$_POST['email_address'];
	$password=md5($_POST['password']);
		
	$my_query="SELECT * from users where email_address='$email_address' AND password='$password'";
	$result= mysqli_query($connection, $my_query);
	
	while ($myrow = mysqli_fetch_array($result)):
	
		$_SESSION['user_id'] = $myrow["user_id"];
		$_SESSION['user_name'] = $myrow["user_name"];
		$_SESSION['user_type'] = $myrow["user_type"];

	endwhile;
		
	if ($result):
		$_SESSION['email_address'] = $email_address;
		$_SESSION['$password'] = $password;
		$_SESSION['authenticated'] = true;

		echo "<b>Hi ".$_SESSION['user_name']." (Id: ".$_SESSION['user_id']."), you are now logged in!</b>";
	else:
		echo "<b>Username or password incorrect!</b>";
	endif;

mysqli_close();   

endif; 
?> 


<html>
<head><title>Log In Form</title></head>
<body>
<h1>Log In Form</h1>
<p><b>Enter your login details below:<b><br>
<table>
<form method="POST" action="log_me_in.php">
<tr><td>email address: <td><input type="text" name="email_address"> 
<tr><td>Password: <td><input type="password" name="password">
<tr><td><input type="submit" name="login" value="Log In"> 
</form> 
</table>
<body>
<html>
