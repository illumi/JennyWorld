<?php

	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$filmid = $_POST['filmid'];


print_r($_REQUEST);

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());

mysql_select_db('js230') or die(mysql_error());

$sql="DELETE FROM films WHERE film_ID='$filmid'";
mysql_query($sql) or die(mysql_error());
header("location: ../../../admin.php?page=remove-promo");


