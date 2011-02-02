<?php
$removed=$_POST['removeid'];

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());
mysql_select_db('js230') or die(mysql_error());

mysql_query("DELETE FROM staff WHERE staff_ID='$removed'");

header("location:../../../admin.php?page=staff-acs");
Mysql_close($con);


?>
