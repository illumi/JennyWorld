<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

include 'sql-connection.php';

$query = mysql_query("SELECT SUM(numof_tickets) FROM booking");

$total = mysql_fetch_assoc($query)

//$query = mysql_query("SELECT showing_id, sum(numof_tickets) AS total FROM booking GROUP BY showing_id ORDER BY total DESC"); //for showing ID, can be done on whole films.

//$mostPopular = mysql_fetch_assoc($query)

?>

<div id="body">
<h1>Staff Overview</h1>
<h2>

<?php
	echo "Total number of customers: " . $total['SUM(numof_tickets)'];
?>

</h2>
</div>