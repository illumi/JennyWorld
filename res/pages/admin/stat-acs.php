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
<h1>Staff Overview</h1>
<h2>

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
</h2>
</div>