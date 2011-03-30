<?php

if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

if(isset($_GET['msg']))
{
    echo $_GET['msg'];
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT * FROM films");

$connect->disc();
?>

<div id="body">
<h1> Remove Film</h1><p>


<section id="remove info">
	<form method="POST" action="admin.php?page=remove-flm">
		<table class="table-std">
                    <tr>
                        <th>Delete</th>
                        <th>Film ID</th>
                        <th>Film Title</th>
                        <th>Film Length</th>
                        <th>Film Genre</th>
                        <th>Film Rating</th>
                        <th>Film Year</th>
                    </tr>

                    <?php
                        while($row = mysql_fetch_array($query))
                        {
                                echo "<tr>";
                                echo "<td> <input type='checkbox' name='delete[]' value='". $row['film_ID'] . "'/></td>";
                                echo "<td>" . $row['film_ID'] . "</td>";
                                echo "<td>" . $row['film_title'] . "</td>";
                                echo "<td>" . $row['film_length'] . "</td>";
                                echo "<td>" . $row['film_genre'] . "</td>";
                                echo "<td>" . $row['film_rating'] . "</td>";
                                echo "<td>" . $row['film_year'] . "</td>";
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

</h3>

<h2></h2>
</div>
