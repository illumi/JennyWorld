<?php
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
header('Location: ./index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT SUM(numof_tickets) FROM booking");
$total = mysql_fetch_assoc($query);

// print the number of booked tickets according to the film title
$query = "SELECT f.film_title, sum(b.numof_tickets) AS total
FROM booking b
JOIN showings s on b.showing_id = s.showing_ID
JOIN films f on s.film_ID = f.film_ID
GROUP BY f.film_title
ORDER BY total DESC;";

$result = mysql_query($query);
$mostPopular = array();

for( $i=0; $i< mysql_num_rows($result); $i++)
    $mostPopular[$i] = mysql_fetch_assoc($result);


// print the number of tickets sold according to the showings schedules
$query = "SELECT s.start_time, s.end_time, SUM(numof_tickets) AS 'total'
FROM showings s
JOIN booking b on s.showing_ID = b.showing_id
GROUP BY s.start_time, s.end_time;";

$result = mysql_query($query);
$visit = array();

for( $i=0; $i< mysql_num_rows($result); $i++)
    $visit[$i] = mysql_fetch_assoc($result);
    
    
$query1 = "SELECT count(collected) as TotalBookings FROM booking;";
$query2 = "SELECT count(collected) as CollectedBookings FROM booking where collected = true;";
$query3 = "SELECT count(collected) as UncollectedBookings FROM booking where collected = false;";

$result1 = mysql_query($query1);
$result2 = mysql_query($query2);
$result3 = mysql_query($query3);

$connect->disc();
?>

<head>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/themes/base/jquery-ui.css" type="text/css" media="all" />
</head>



<meta charset="utf-8">



<div class="demo">

<div id="accordion">
<h3><a href="#"> Customer Statistics</a></h3>
<div>
<p>
<?php
echo "Total number of customers: " . $total['SUM(numof_tickets)'];
?>
<!-- table containing the film title and the number of viewers -->
<table class="table-std">
<tr>
Viewers

<th><strong>Film Title</strong></th>
<th><strong>Number of viewers</strong></th>
</tr>
<?php
                for($i = 0; $i < count($mostPopular); $i++)
                {
                    echo "<tr>
<td>". $mostPopular[$i]['film_title'] ."</td>
<td>". $mostPopular[$i]['total'] ."</td>
</tr>";
                }
        ?>
</table>

<?php

echo "<table class=\"table-std\">
	<tr>
	<th>Total Bookings</th>
	<th>Bookings collected</th>
	<th>Bookings uncollected</th>

	</tr>";
	// Print out the contents of each row into a table 
	while($row = mysql_fetch_array($result1)){

		echo "<td>" . $row['TotalBookings'] . "</td>";
	}
	while($row = mysql_fetch_array($result2)){


		echo "<td>" . $row['CollectedBookings'] . "</td>";

	}
	while($row = mysql_fetch_array($result3)){
		echo "<td>" . $row['UncollectedBookings'] . "</td>";

	}
	echo "</table>";

?>


</div>
<h3><a href="#">Timetable Statistics</a></h3>
<div>
<p>
<!-- table containing the showings schedule and the number of tickets -->
<table class="table-std">
<tr>
<td><strong>Showing start time</strong></td>
<td><strong>Showing end time</strong></td>
<td><strong>Number of viewers</strong></td>
</tr>
<?php
                for($i = 0; $i < count($visit); $i++)
                {
                    echo "<tr>
<td>". $visit[$i]['start_time'] ."</td>
<td>". $visit[$i]['end_time'] ."</td>
<td>". $visit[$i]['total'] ."</td>
</tr>";
                }
        ?>
</table>
</p>
</p>
</div>
<h3><a href="#">Promotional Statistics</a></h3>
<div>
<p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
<ul>
<li>List item one</li>
<li>List item two</li>
<li>List item three</li>
</ul>
</div>
<h3><a href="#">Film Statistics</a></h3>
<div>
<p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
</div>
</div>

</div><!-- End demo -->





