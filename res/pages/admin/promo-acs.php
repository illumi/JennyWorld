<?php
if(!isset($_SESSION['login']) && !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin&fail=');
}
?>

<div id="body">
<h1> Promotions Overview</h1>


	<?php

	include('res/lib/class_dbcon.php');
	$connect = new doConnect();

	echo date("Y-m-d");

	$query = "SELECT promotions.promo_id, films.film_title,  promotions.promo_name, promotions.start_date, promotions.end_date, promotions.description FROM promotions, films WHERE promotions.film_ID = films.film_ID";
		 
	$result = mysql_query($query) or die(mysql_error());

	echo "<table class=\"table-std\">
	<tr>
	<th>Promo ID</th>
	<th>Film Title</th>
	<th>Promotion Type</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th>Description</th>
	</tr>";
	// Print out the contents of each row into a table 
	while($row = mysql_fetch_array($result)){
	  

		echo "<tr>";
		echo "<td>" .$row['promo_id']. " </td> ";
		echo "<td>" . $row['film_title'] . "</td>";
		echo "<td>" . $row['promo_name'] . "</td>";
		echo "<td>" . $row['start_date'] . "</td>";
		echo "<td>" . $row['end_date'] . "</td>";
		echo "<td>" . $row['description'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	$connect->disc();

	?> 

<h2></h2>	
</div>


