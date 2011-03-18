<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>
<div id="body">
<h1>Current promotions</h1>
<h3>
	<p>

	<?php

	include 'sql-connection.php';


	$query = "SELECT f.film_title, p.promo_name, p.end_date, p.description FROM films f, promotions p WHERE f.film_ID = p.film_ID;";
		 
	$result = mysql_query($query) or die(mysql_error());

	echo "<table class=\"center\">
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
	
</h3>
</div>





