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

$con = mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());


$query = "select films.film_title, promotions.promo_name, promotions.end_date, promotions.description from films, promotions";
     
$result = mysql_query($query) or die(mysql_error());

echo "<h3><table border='1'>
<tr>
<th>Film Title</th>
<th>Name</th>
<th>End Date</th>
<th>Description</th>
</tr>";
// Print out the contents of each row into a table 
while($row = mysql_fetch_array($result)){
  

	echo "<tr>";
	echo "<td><a href='index.php?page=details1'>" . $row['film_title'] . "</td>";
	echo "<td>" . $row['promo_name'] . "</td>";
	echo "<td>" . $row['end_date'] . "</td>";
	echo "<td>" . $row['description'] . "</td>";
	echo "</tr>";
}
echo "</table></h3>";

mysql_close($con);

?> 
</div>





