<?php

session_start();

$username="js230"; /*username*/
$password="js230"; /*password*/
$database="js230"; /*database name*/
$host = "www.macs.hw.ac.uk";  /*host name*/

$user = $_POST['username'];
$pass = $_POST['password'];

// encrypt the password into MD5
$pass = md5($pass);

$link = mysql_connect($host,$username,$password) or die('Could not connect: ' . mysql_error());

mysql_select_db($database) or die( "Unable to select the database: " . $database . " ");

$sql = "SELECT * FROM staff WHERE user_name = '$user' AND password = '$pass'";

$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1){
	// get user's information
        while($row = mysql_fetch_array($result))
        {
            $_SESSION['user_id']= $row[0];
            $_SESSION['login'] = $row[1];

            if($row[3] == 'manager')
            {
                $_SESSION['admin'] = 1;
            }
            else
            {
                $_SESSION['admin'] = 0;
            }
        }
        header("location: ../../admin.php");
}
//displays error message otherwise
else {
	echo "Wrong Username or Password";
}
?>
