<?php
$editid=$_POST['editid'];
$editpassword=md5($_POST['editpw']);

$con=mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());
mysql_select_db('js230') or die(mysql_error());

mysql_query("UPDATE staff SET password='$editpassword' WHERE staff_ID = '$editid'");
echo "success";
header("location:../../../admin.php?page=staff-acs");
mysql_close($con);
?>
