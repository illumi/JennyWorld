<?php

include ('res/lib/class_dbcon.php');
$connect = new doConnect();

$filmID = $_POST['film'];
$filmdate = $_POST['fdate'];
$filmtime = $_POST['ftime'];

$sql = "SELECT f.film_title, s.showing_ID FROM showings s, films f WHERE f.film_id = s.film_id AND s.film_id = '$filmID' AND start_date = '$filmdate' AND start_time = '$filmtime';";

$q = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($q);

$connect->disc();
?>

	<div id="body">
	<h1>Make a Booking</h1>
	<h3>
		<?php
		echo "You want to book a ticket for : " . $row['film_title'] . " on the $filmdate at $filmtime</br>";
		?>
		<form name="bookingForm" method="POST" action="index.php?page=make-booking" class="center">
			<input type="text" value="<?php echo $row['showing_ID']; ?>" name="showing_id" id="showing_id" style="visibility:hidden"/>	
			<table>
				<tr>
					<td>
						Number of Tickets:
					</td>
					<td>
						<input type="text" name="tickets" id="tickets" pattern="[0-9]*" value="1" />
					</td>
				</tr>
				<tr>
					<td>
						Enter your Name:
					</td>
					<td>
						<input type="text" name="name" id="name" value="" />
					</td>
				</tr>
			</table>
			<input type="button" name="submit" id="buSubmit" value="Make Booking!" onClick="onBookingSubmit(this);"/>
			<input type="submit" name="formSubmit" id="buFormSubmit" value="" style="visibility:hidden"/></br>
		</form>
	</h3>
	</div>
