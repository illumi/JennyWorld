<?php
$removed=$_POST['removeid'];
echo $removed;

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());
mysql_select_db('js230') or die(mysql_error());

mysql_query("DELETE FROM staff WHERE staff_ID='$removed'") or die("Staff ID does not exist");

echo "success";
Mysql_close($con);


?>
