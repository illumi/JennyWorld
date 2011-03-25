<?php

$filmID = $_POST['film'];
$filmdate = $_POST['fdate'];
$filmtime = $_POST['ftime'];
$name = $_POST['name'];
$tickets = $_POST['tickets'];

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$sql = "SELECT f.film_title, s.showing_ID FROM showings s, films f WHERE f.film_id = s.film_id AND s.film_id = '$filmID' AND start_date = '$filmdate' AND start_time = '$filmtime';";

$q = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($q);

$showing = $row['showing_ID'];
$date = date('Y-m-d');

$start = "START TRANSACTION;";
mysql_query($start);
$sql = "INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) 
	VALUES 
	('$showing', '$name', '$date', '$tickets', '1');";
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
	</h3>
	
	<p>
	<h2></h2>
	</div>