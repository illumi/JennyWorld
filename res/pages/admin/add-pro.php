<?php

	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$filmid = $_POST['filmid'];
$promotype = $_POST['type'];
$start = $_POST['stdate'];
$end = $_POST['enddate'];
$description = $_POST['desc'];

print_r($_REQUEST);

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());

mysql_select_db('js230') or die(mysql_error());

$sql="INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description) 
     VALUES('$filmid','$promotype','$stdate','$enddate','$description')";
mysql_query($sql) or die(mysql_error());
header("location: ../../../admin.php?page=add-promo");

?>
