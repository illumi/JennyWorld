<?php

include 'sql-connection.php';

$sql= "select showings.start_time from showings, films where films.film_title = 'HP6'";

$result = mysql_query($sql) or die(mysql_error());

echo "<div id='body'><h3><table>
<tr>
<th>Start Time</th>
</tr>";
// Print out the contents of each row into a table 
while($row = mysql_fetch_array($result)){
  

	echo "<tr>";
	echo "<td>" . $row['start_time'] . " </td> ";

	echo "</tr>";
}
echo "</table></h3></div>";

mysql_close($link);

?>
