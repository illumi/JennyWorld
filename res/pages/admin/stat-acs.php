<?php
	if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT SUM(numof_tickets) FROM booking");
$total = mysql_fetch_assoc($query);

$query = mysql_query("SELECT showing_id, sum(numof_tickets) AS total FROM booking GROUP BY showing_id ORDER BY total DESC"); //for showing ID, can be done on whole films.
$mostPopular = mysql_fetch_assoc($query);

$connect->disc();
?>

<div id="body">
<h1>Statistics</h1>
<h2>


<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>



<div class="demo">

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Customer Statisitcs</a></li>
		<li><a href="#tabs-2">Film Statistics</a></li>
		<li><a href="#tabs-3">Next Tab</a></li>
	</ul>
	<div id="tabs-1">
		<p>
		<?php
			echo "Total number of customers: " . $total['SUM(numof_tickets)'];
		?>
		</p>
	</div>
	<div id="tabs-2">
		<p>
		<?php	
			echo "<p> The most popular film to date is showing: " . $mostPopular['showing_id'] . " with number of viewers: ". $mostPopular['total'];
		?>
		</p>
	</div>
	<div id="tabs-3">
		<p>Some other statistical data here :)</p>
	</div>
</div>

</div>


</h2>
</div>
