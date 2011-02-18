<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$filmid = $_POST['remove'];

include 'sql-connection.php';

$sql="DELETE FROM films WHERE film_ID='$filmid'";

mysql_query($sql) or die(mysql_error());

header("location: ../../../admin.php?page=promo-acs");

mysql_close($link);
