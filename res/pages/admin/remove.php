<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

$removed=$_POST['removeid'];

include 'sql-connection.php';

mysql_query("DELETE FROM staff WHERE staff_ID='$removed'");

header("location:../../../admin.php?page=remove-staff");

mysql_close($link);

?>
