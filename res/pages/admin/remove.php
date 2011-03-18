<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

$name = addslashes($_POST['login']);
$role = $_POST['editrole'];

include 'sql-connection.php';

mysql_query("DELETE FROM staff WHERE user_name='$name'");

header("location:../../../admin.php?page=staff-acs");

mysql_close($link);

?>
