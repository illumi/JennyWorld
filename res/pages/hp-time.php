<?php

include 'sql-connection.php';

$sql= "select start_time, end_time from showings where film_ID = 1";

$result = mysql_query($sql) or die(mysql_error());

echo "<div id='container'><div id='body'><h3><table border='1'>
<tr>
<th>Start Time</th>
<th>End Time</th>
</tr>";
// Print out the contents of each row into a table 
while($row = mysql_fetch_array($result)){
  

	echo "<tr>";
	echo "<td>" .$row['start_time']. " </td> ";
	echo "<td>" . $row['end_time'] . "</td>";

	echo "</tr>";
}
echo "</table></h3></div></div>";

mysql_close($link);

?>
