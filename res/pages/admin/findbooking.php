<?php
	if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}
?>

<div id="body">
<h1>Booking confirmation:</h1>
<h3>



	<?php
	
		include('res/lib/class_dbcon.php');
		$connect = new doConnect();
	
		if (isset($_GET['conf']) && $_GET['conf'] == 1)
			{
				
				$booking = $_GET['conf2'];
				$sql = "update booking set collected = 1 where booking_id = '$booking'";
				$result = mysql_query($sql) or die(mysql_error());

		header("location: admin.php?page=booktickets");
	
		}
		else {
	
			$booking = $_POST['ref'];



			echo date("Y-m-d");

			$query = "SELECT * FROM booking where booking_id = '$booking'";
				 
			$result = mysql_query($query) or die(mysql_error());

			echo "<table border='1' class=\"center\">
			<tr>
			<th>Booking ID</th>
			<th>Showing ID</th>
			<th>Customer Name</th>
			<th>Booking Date</th>
			<th>Number of Tickets</th>
			<th>Collected</th>
			</tr>";
			// Print out the contents of each row into a table 
			while($row = mysql_fetch_array($result)){
			  

				echo "<tr>";
				echo "<td>" .$row['booking_id']. " </td> ";
				echo "<td>" . $row['showing_id'] . "</td>";
				echo "<td>" . $row['customer_name'] . "</td>";
				echo "<td>" . $row['booking_date'] . "</td>";
				echo "<td>" . $row['numof_tickets'] . "</td>";
				echo "<td>" . $row['collected'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
	
		}
	



	$connect->disc();

	?> 

	<center><form name="findForm" method="POST" action="admin.php?page=findbooking&conf=1&conf2=<?php echo $booking ?>" class="center">
<table>
	<p>
	<input type="submit" name="formSubmit" id="" value="Confirm collection"> 
	</table>
</table>

</form>

	<center><form name="findForm" method="POST" action="admin.php?page=booktickets" class="center">
<table>
	<p>
	<input type="submit" name="formSubmit" id="" value="Back"> 
	</table>
</table>
	
</h3>
<h2></h2>
</div>


