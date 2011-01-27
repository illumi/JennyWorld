<?php

$username="js230";
$password="js230";
$database="js230";
$host = "anubis.macs.hw.ac.uk";

$user = $_POST['username'];
$pass = $_POST['password'];

$link = mysql_connect($host,$username,$password) or die('Could not connect: ' . mysql_error());

mysql_select_db($database) or die( "Unable to select the database: " . $database . " ");

$sql = "SELECT * FROM staff WHERE user_name = '$user' AND password = '$pass'";

$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1){
	// Register $myusername, $mypassword and redirect to file "admin-access.php"
	session_register("user");
	session_register("pass");
	header("location:admin-access.php");
}
//displays error message otherwise
else {
	echo "Wrong Username or Password";
}
?>
