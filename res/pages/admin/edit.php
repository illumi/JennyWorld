<?php
$editid=$_POST['editid'];
$editname=$_POST['editname'];
$editpassword=$_POST['editpassword'];
$editrole=$_POST['editrole'];

$con=mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());
mysql_select_db('js230') or die(mysql_error());

if($editrole!="manager" && $editrole!="staff"){
die("role must be either manager or staff");
header("location:../../../admin.php?page=staff-acs");
}

mysql_query("UPDATE staff SET user_name = '$editname', password='$editpassword', 
role_type = '$editrole' WHERE staff_ID = '$editid'");
echo "success";
header("location:../../../admin.php?page=staff-acs");
mysql_close($con);
?>