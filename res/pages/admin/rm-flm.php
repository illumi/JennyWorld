<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$removed=$_POST['removefilm'];

mysql_query("DELETE FROM films WHERE film_ID='$removed'");

header("location: ../../../admin.php?page=remove-film");
Mysql_close($;oml);


?>
