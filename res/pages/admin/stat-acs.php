<?php
if(!isset($_SESSION['login']) || empty($_SESSION['login']))
{
header('Location: ./index.php?page=adminLogin&fail=');
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

for( $i=0; $i< 5; $i++)
    $mostPopular[$i] = mysql_fetch_assoc($result);


// print the number of tickets sold according to the showings schedules
$query = "SELECT s.start_time, s.end_time, SUM(numof_tickets) AS 'total'
FROM showings s
JOIN booking b on s.showing_ID = b.showing_id
GROUP BY s.start_time, s.end_time
ORDER BY total DESC;";

$result = mysql_query($query);
$visit = array();

for( $i=0; $i< 5; $i++)
    $visit[$i] = mysql_fetch_assoc($result);
    
    
$query1 = "SELECT count(collected) as TotalBookings FROM booking;";
$query2 = "SELECT count(collected) as CollectedBookings FROM booking where collected = true;";
$query3 = "SELECT count(collected) as UncollectedBookings FROM booking where collected = false;";

$result1 = mysql_query($query1);
$result2 = mysql_query($query2);
$result3 = mysql_query($query3);

$totalpromos = mysql_query("SELECT COUNT(promo_id) as Totalpromotions FROM promotions;");

$totalpromo = mysql_fetch_assoc($totalpromos);

// print the 5 less popular film from viewers
$query = "SELECT f.film_title, sum(b.numof_tickets) AS total
FROM booking b
JOIN showings s on b.showing_id = s.showing_ID
JOIN films f on s.film_ID = f.film_ID
GROUP BY f.film_title
ORDER BY total;";

$result = mysql_query($query);
$filmLessPopular = array();

for( $i=0; $i< 5; $i++)
    $filmLessPopular[$i] = mysql_fetch_assoc($result);

// list all the film haven't been put in the timetable yet
$query = "SELECT f.film_title FROM films f
          WHERE f.film_ID NOT IN ( SELECT DISTINCT s.film_ID FROM showings s)
          ORDER BY f.film_title;";

$result = mysql_query($query);
$notInTimetable = array();

for( $i=0; $i< mysql_num_rows($result); $i++)
    $notInTimetable[$i] = mysql_fetch_assoc($result);

$query = "SELECT promo_name, description, COUNT(*) AS 'times'
            FROM promotions
            GROUP BY promo_name, description
            ORDER BY times DESC;";

$result = mysql_query($query);
$mostUsedPromo = array();

for( $i=0; $i< mysql_num_rows($result); $i++)
    $mostUsedPromo[$i] = mysql_fetch_assoc($result);

// list the films per year which have been put into the timetable
$query = "SELECT film_title, film_year
            FROM films
            WHERE film_ID IN ( SELECT DISTINCT s.film_ID FROM showings s )
            GROUP BY film_year, film_title
            ORDER BY film_year DESC;";

$result = mysql_query($query);
$filmPerYear = array();

for( $i=0; $i< mysql_num_rows($result); $i++)
    $filmPerYear[$i] = mysql_fetch_assoc($result);

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
        echo "<div class=\"stat-text\">Total number of customers: " . $total['SUM(numof_tickets)'] . "</div>";
        ?>
        <!-- table containing the film title and the number of viewers -->
        <br/>
        <div class="stat-text">Customer Bookings</div>
        <br/>

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

        <br/>
        <div class="stat-text">Most Popular Time of Day</div>
        <br/>
        <!-- table containing the showings schedule and the number of tickets -->
        <table class="table-std">
            <tr>
                <th><strong>Showing start time</strong></th>
                <th><strong>Showing end time</strong></th>
                <th><strong>Number of viewers</strong></th>
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

        <br/>
        <div class="stat-text">Films never add to Timetable</div>
        <br/>

<?php  if(count($notInTimetable) > 0)
        {
?>

        <table class="table-std">
            <tr>
                <th><strong>Film Title</strong></th>
            </tr>
            <?php
                            for($i = 0; $i < count($notInTimetable); $i++)
                            {
                                echo "<tr>
                                        <td>". $notInTimetable[$i]['start_time'] ."</td>
                                      </tr>";
                            }
            ?>
        </table>
<?php   }
        else
        {
            echo "<div class='stat-text'>No Films matching</div>";
        }
?>
        </div>
        <h3><a href="#">Promotional Statistics</a></h3>
        <div>
            <?php
                echo "<div class=\"stat-text\">Total number of promotions: " . $totalpromo['Totalpromotions'] . "</div>";
            ?>

            <br/>
            <div class="stat-text">Most Used Promotions</div>
            <br/>
            
<?php  if(count($mostUsedPromo) > 0)
        {
?>
            <table class="table-std">
                <tr>
                    <th><strong>Promotions names</strong></th>
                    <th><strong>Promotions' Description</strong></th>
                    <th><strong>Times it has been used</strong></th>
                </tr>
                <?php
                                for($i = 0; $i < count($mostUsedPromo); $i++)
                                {
                                    echo "<tr>
                                            <td>". $mostUsedPromo[$i]['promo_name'] ."</td>
                                            <td>". $mostUsedPromo[$i]['description'] ."</td>
                                            <td>". $mostUsedPromo[$i]['times'] ."</td>
                                          </tr>";
                                }
                ?>
            </table>
<?php   }
        else
        {
            echo "<div class='stat-text'>No existing Promotions</div>";
        }
?>
        </div>

        <h3><a href="#">Film Statistics</a></h3>
        <div>
            <table class="table-std">
                <tr>
                    <div class="stat-text">Film</div>
                <br/>

                <th><strong>Film Title</strong></th>
                <th><strong>Less popoular movies amongst viewers (number of viewings)</strong></th>
                </tr>
                <?php
                                for($i = 0; $i < count($filmLessPopular); $i++)
                                {
                                    echo "<tr>
                                            <td>". $filmLessPopular[$i]['film_title'] ."</td>
                                            <td>". $filmLessPopular[$i]['total'] ."</td>
                                          </tr>";
                                }
                ?>
            </table>
            <table class="table-std">
                <tr>
                <br/>

                <th><strong>Film Title</strong></th>
                <th><strong>Most popoular movies amongst viewers (number of viewings)</strong></th>
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

            <br/>
            <div class="stat-text">Films shown per Year</div>
            <br/>

            <table class="table-std">
                <tr>
                <th><strong>Film Title</strong></th>
                <th><strong>Year</strong></th>
                </tr>
                <?php
                                for($i = 0; $i < count($filmPerYear); $i++)
                                {
                                    echo "<tr>
                                            <td>". $filmPerYear[$i]['film_title'] ."</td>
                                            <td>". $filmPerYear[$i]['film_year'] ."</td>
                                          </tr>";
                                }
                ?>
            </table>
        </div>
    </div>

</div><!-- End demo -->





