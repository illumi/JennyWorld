<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 
$today = date('Y-m-d');
?>

<div id="body">
<h1>Current promotions</h1><p>


	<?php

	include ('res/lib/class_dbcon.php');
	$connect = new doConnect();


	$query = "select promo_name, film_title, description, end_date from promotions p, films f where p.film_ID = f.film_ID and p.start_date <= '$today' and p.end_date >= '$today';";
		 
	$result = mysql_query($query) or die(mysql_error());

	echo "<table class=\"table-std\">
	<tr>
	<th>Promotion</th>
	<th>Film Title</th>
	<th>Description</th>
	<th>End Date</th>
	</tr>";
	// Print out the contents of each row into a table 
	while($row = mysql_fetch_array($result)){

		echo "<tr>";
		echo "<td>" . $row['promo_name'] . "</td>";
		echo "<td>" . $row['film_title'] . "</td>";
		echo "<td>" . $row['description'] . "</td>";
		echo "<td>" . $row['end_date'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	$connect->disc();

	?> 



</div>
