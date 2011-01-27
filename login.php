<!DOCTYPE html><body>

<?php

$username="js230";
$password="js230";
$database="js230";
$host = "www2";

$user = $_POST['username'];
$pass = md5($_POST['password']);


$link = mysql_connect($host,$username,$password) or die('Could not connect: ' . mysql_error());
@mysql_select_db($database) or die( "Unable to select database");

$query = "SELECT FROM staff WHERE staff_ID='username' AND password ='password'";
$result = mysql_query($query);

echo "Hello ". $user . " " . $pass . ".<br />";
echo "Thank you for logging in!";

?>

</body></html>
