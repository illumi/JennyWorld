<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$removed=$_POST['removefilm'];

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());
mysql_select_db('js230') or die(mysql_error());

mysql_query("DELETE FROM films WHERE film_ID='$removed'");

header("location:../../../admin.php?page=remove-film");
Mysql_close($con);


?>
