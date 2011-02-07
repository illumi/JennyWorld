<?php

	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$filmid = $_POST['filmid'];
$promoname = $_POST['promoname'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = $_POST['desc'];

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());

mysql_select_db('js230') or die(mysql_error());

echo $filmid;
echo $promoname;
echo $start;
echo $end;
echo $description;
echo "success";

?>
