<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'] == 1)
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$name = mysql_escape_string($_POST['text']);

mysql_query("UPDATE cinema SET description = '$name' WHERE id = '1'");

mysql_close($link);

header("location: ../../../admin.php?page=staff-acs");
?>
