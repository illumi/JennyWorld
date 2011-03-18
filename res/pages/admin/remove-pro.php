<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}
include 'sql-connection.php';

$filmid = $_POST['remove'];


$sql="DELETE FROM promotions WHERE promo_id='$filmid'";
mysql_query($sql) or die(mysql_error());


header("location: ../../../admin.php?page=promo-acs");
mysql_close($link);

?>
