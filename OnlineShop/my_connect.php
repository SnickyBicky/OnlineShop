<?php

//set connection variables
$host='localhost';
$username='DW202588';
$password='DW202588';
$database_name='DW202588';

//connection to server & database
$connection = mysqli_connect($host, $username, $password,$database_name) ;
 
//check connection 
if (mysqli_connect_errno()):
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
endif;

?>