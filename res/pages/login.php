<?php

session_start();

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$user = $_POST['username'];
$pass = $_POST['password'];

// encrypt the password into MD5
$pass = md5($pass);

$sql = "SELECT * FROM staff WHERE user_name = '$user' AND password = '$pass'";

$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

$connect->disc();

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1){
	// get user's information
        while($row = mysql_fetch_array($result))
        {
            $_SESSION['user_id']= $row[0];
            $_SESSION['login'] = $row[2];

            if($row[4] == 'manager')
            {
                $_SESSION['admin'] = 1;
				$_SESSION['staff'] = 0;
            }
            else
            {
				$_SESSION['staff'] = 1;
                $_SESSION['admin'] = 0;
            }
        }
        header("location: admin.php");
}
//displays error message otherwise
else {
	header("location: index.php?page=adminLogin&fail=false");
}
?>
