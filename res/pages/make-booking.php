<?php

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$showing = $_POST['showing_id'];
$tickets = $_POST['tickets'];
$name = $_POST['name'];
$date = date('y-m-d');

$start = "START TRANSACTION;";
mysql_query($start);
$sql = "INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) 
	VALUES 
	('$showing', '$name', '$date', '$tickets', '0');";
mysql_query($sql) or die(mysql_error());

$qid = "SELECT max(booking_id) FROM booking;";
$q = mysql_query($qid);
$row = mysql_fetch_assoc($q);

$end = "COMMIT;";
mysql_query($end);


$connect->disc();
?>

	<div id="body">
	<h1>Booking Successful!</h1>
	
	<h3>
		<p>Your booking ID is: <?php echo $row['max(booking_id)']; ?>
		<p>Please take this number with you when you pick up your tickets.
	</h3>
	
	
	<h2></h2>
	</div>