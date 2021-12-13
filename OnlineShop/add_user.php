<?php 
if (isset($_POST['add_user'])):

	require_once('my_connect.php');
	$user_name=$_POST['user_name'];
	$password=md5($_POST['password']);
	$email_address=$_POST['email_address'];
	
	$my_query="INSERT INTO users (user_name, password, email_address) VALUES('$user_name','$password','$email_address')";
	$result= mysqli_query($connection, $my_query);

	if ($result):
		echo "<b>New user successfully added!</b>";
	else:
		echo "<b>ERROR: unable to post.</b>";
	endif;

mysqli_close();   

endif; 
?>

<html>
<head><title>New User Form</title></head>
<body>
<h1>New User Form</h1>
<p><b>Enter your new details below:<b><br>
<table>
<form method="POST" action="add_user.php">
<tr><td>User name: <td><input type="text" name="user_name">
<tr><td>Password: <td><input type="password" name="password">
<tr><td>email address: <td><input type="text" name="email_address"> 
<tr><td><input type="submit" name="add_user" value="Add User"> 
</form> 
</table>
</body>
</html>
