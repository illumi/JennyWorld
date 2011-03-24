<?php

if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ./index.php?page=adminLogin');
}

if(isset($_GET['msg']))
{
    echo $_GET['msg'];
}

include 'sql-connection.php';

$query = mysql_query("SELECT * FROM films");
mysql_close($link);
?>

<div id="body">
<h1> Remove Film</h1>
<h3>

<section id="remove info">
	<form method="POST" action="res/pages/admin/rm-flm.php">
		<table border="0" class="center">
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
</div>
