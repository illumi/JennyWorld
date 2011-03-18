<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$id = $_POST['unique_id'];

mysql_query("DELETE FROM staff WHERE staff_ID='$id'");

header("location:../../../admin.php?page=staff-acs");

mysql_close($link);

?>
