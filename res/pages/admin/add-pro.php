<?php

	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$filmid = $_POST['filmid'];
$promotype = $_POST['type'];
$start = $_POST['testinput'];
$end = $_POST['testinput2'];
$description = $_POST['desc'];

print_r($_REQUEST);

include 'sql-connection.php';

$sql="INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description) 
     VALUES('$filmid','$promotype','$stdate','$enddate','$description')";
mysql_query($sql) or die(mysql_error());
header("location: ../../../admin.php?page=add-promo");

mysql_close($link);

?>
