<?php

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$filmID = $_POST['film'];
$filmdate = $_POST['fdate'];
$filmtime = $_POST['ftime'];

$sql = "SELECT f.film_title, s.showing_ID FROM showings s, films f WHERE f.film_id = s.film_id AND s.film_id = '$filmID' AND start_date = '$filmdate' AND start_time = '$filmtime';";

//$sql = "INSERT INTO booking (showing_id, customer_name, booking_date, numof_tickets, collected) VALUES ('$filmID', '$name', '$filmdate', '$numberOfTickets', '0');"
$q = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($q);

$connect->disc();
//header("location: ../../../admin.php?page=staff-acs");
?>

	<div id="body">
	<h1>Make a Booking</h1>
	<h3>
		<?php
		echo "You want to book a ticket for : " . $row['film_title'] . " on the $filmdate at $filmtime";
		?>
		<form name="bookingForm" method="POST" action="index.php?page=make-booking" class="center">
			<input type="text" value="<?php echo $row['showing_ID']; ?>" name="showing_id" id="showing_id" style="visibility:hidden"/>	
			<table>
				<tr>
					<td>
						Number of Tickets:	<input type="text" name="tickets" pattern="[0-9]*" value="1" id="tickets" /> <p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="formSubmit" id="buFormSubmit" value="Make Booking!"/> 
					</td>
				</tr>
			</table>
		</form>
	</h3>
	</div>



