<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

$filmid = $_POST['filmid'];


print_r($_REQUEST);

include 'sql-connection.php';

$sql="DELETE FROM films WHERE film_ID='$filmid'";
mysql_query($sql) or die(mysql_error());
header("location: ./admin.php?page=remove-promo");

mysql_close($link);
