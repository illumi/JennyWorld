<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin&fail=');
}

if(isset($_GET['msg']))
{
    echo $_GET['msg'];
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT screen_number, showing_ID, film_title, start_date, end_date, start_time FROM screens x, films y, showings z WHERE (x.screen_ID = z.screen_ID) AND z.film_ID = y.film_ID;");

$connect->disc();
?>

<div id="body">
<h1> Remove Film from timetable</h1>
<h2>

<section id="remove info">
	<form method="POST" action="admin.php?page=remove-f-tt">
		<table border="0" class="center">
                    <tr>
                        <th>Delete</th>
                        <th>Screen</th>
                        <th>Film Title</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Start time</th>
                    </tr>

                    <?php
                        while($row = mysql_fetch_array($query))
                        {
                                echo "<tr>";
                                echo "<td> <input type='checkbox' name='delete[]' value='". $row['showing_ID'] . "'/></td>";
                                echo "<td>" . $row['screen_number'] . "</td>";
                                echo "<td>" . $row['film_title'] . "</td>";
                                echo "<td>" . $row['start_date'] . "</td>";
                                echo "<td>" . $row['end_date'] . "</td>";
                                echo "<td>" . $row['start_time'] . "</td>";
                                echo"</tr>";
                        }
                    ?>
			
		</table>
		<table border="0" class="center">
			<p>
			<input type="submit" name="submit" id="submit" value="Delete">
			<input type="reset" name="reset" id="reset" value="Reset">
                </table>
	</form>
</section>

</h2>
</div>
