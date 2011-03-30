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
$query = "SELECT  f.film_title, sum(b.numof_tickets) AS total 
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

$connect->disc();
?>

<div id="body">
<h1>Statistics</h1>
<h2>


<meta charset="utf-8">



<div class="demo">

<div id="accordion">
	<h3><a href="#">Section 1</a></h3>
	<div>
		<p>
		<?php
			echo "Total number of customers: " . $total['SUM(numof_tickets)'];
		?>
    <!-- table containing the film title and the number of viewers -->
    <table>
        <tr>
            <td><strong>Film Title</strong></td>
            <td><strong>Number of viewers</strong></td>
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
	</div>
	<h3><a href="#">Section 2</a></h3>
	<div>
			<p>
			 <!-- table containing the showings schedule and the number of tickets -->
    <table>
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
	<h3><a href="#">Section 3</a></h3>
	<div>
		<p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
		<ul>
			<li>List item one</li>
			<li>List item two</li>
			<li>List item three</li>
		</ul>
	</div>
	<h3><a href="#">Section 4</a></h3>
	<div>
		<p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
	</div>
</div>

</div><!-- End demo -->



</h2>
</div>
