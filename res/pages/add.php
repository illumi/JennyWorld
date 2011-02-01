<?php
include 'sql-connection.php';
echo "doing stuff";

$name = $_POST['newStaffName'];
$password = $_POST['newStaffPassword'];
$role = $_POST['newStaffRole'];

if ($role!="manager" && $role!="cashier){
echo $role;
}
else {
	echo "Role must be either manager or cashier";
}


?>
