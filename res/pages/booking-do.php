<?php

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$filmID = $_POST['film'];
$filmdate = $_POST['fdate'];
$filmtime = $_POST['ftime'];

$sql = "SELECT * FROM showings s WHERE film_id = '$filmID' AND start_date = '$filmdate' AND start_time = '$filmtime'";

//$sql = "INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('$filmID', '', '$filmdate', '1', '0');"
$q = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($q);

echo "You want to book a ticket for showing_ID: " . $row['showing_ID'];


$connect->disc();
//header("location: ../../../admin.php?page=staff-acs");
?>
