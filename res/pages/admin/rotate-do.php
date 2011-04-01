<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin&fail=');
}


$ids = explode(",", $_POST['ids']);


include('res/lib/class_dbcon.php');
$connect = new doConnect();


for( $i=0; $i <= (sizeof($ids)-1); $i++) {
	$screen = $i+1;
	
	$sql = "UPDATE showings SET screen_ID = '$screen' WHERE showing_ID = '$ids[$i]'";
	echo $sql."<p>";
	mysql_query($sql);
}


$connect->disc();
header("location: admin.php");
?>
