<?php



$editid=$_POST['editid'];
$editpassword=md5($_POST['editpw']);

include 'sql-connection.php';

mysql_query("UPDATE staff SET password='$editpassword' WHERE staff_ID = '$editid'");
echo "success";
header("location:../../../admin.php?page=staff-acs");
mysql_close($link);
?>
