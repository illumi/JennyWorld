<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin&fail=');
}


$ids = explode(",", $_POST['ids']);
$screens = explode(",", $_POST['screens']);


include('res/lib/class_dbcon.php');
$connect = new doConnect();


for( $i=0; $i <= (sizeof($ids)-1); $i++) {
	
	$sql = "UPDATE showings SET screen_ID = '$screens[$i]' WHERE showing_ID = '$ids[$i]'";
	echo $sql."<p>";
	mysql_query($sql);
}


$connect->disc();
header("location: admin.php");
?>
