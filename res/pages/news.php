<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>
<div id="body">
	<h1>Current promotions</h1>

	<p>

	<?php

	include 'sql-connection.php';


	$query = "select films.film_title, promotions.promo_name, promotions.end_date, promotions.description from films, promotions";
		 
	$result = mysql_query($query) or die(mysql_error());

	echo "<table>
	<tr>
	<th>Film Title</th>
	<th>Name</th>
	<th>End Date</th>
	<th>Description</th>
	</tr>";
	// Print out the contents of each row into a table 
	while($row = mysql_fetch_array($result)){

		echo "<tr>";
		echo "<td>" . $row['film_title'] . "</td>";
		echo "<td>" . $row['promo_name'] . "</td>";
		echo "<td>" . $row['end_date'] . "</td>";
		echo "<td>" . $row['description'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	mysql_close($link);

	?> 
</div>





