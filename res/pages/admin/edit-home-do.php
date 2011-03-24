<?php
if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$name = mysql_escape_string($_POST['TxtareaInput']);

mysql_query("UPDATE cinema SET description = '$name' WHERE id = '1'");

mysql_close($link);

header("location: ../../../admin.php?page=edit-home");
?>
