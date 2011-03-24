<?php

if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

if(isset($_GET['msg']))
{
    echo $_GET['msg'];
}

include 'sql-connection.php';

$query = mysql_query("SELECT promo_id, promo_name, film_title, start_date, end_date, description FROM promotions p, films f WHERE p.film_ID = f.film_ID;
");
mysql_close($link);
?>

<div id="body">
<h1> Remove Film</h1>
<h3>

<section id="remove info">
	<form method="POST" action="res/pages/admin/remove-pro.php">
		<table border="0" class="center">
                    <tr>
                        <th>Delete</th>
                        <th>Promotion Name</th>
                        <th>Film Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Description</th>
                    </tr>

                    <?php
                        while($row = mysql_fetch_array($query))
                        {
                                echo "<tr>";
                                echo "<td> <input type='checkbox' name='delete[]' value='". $row['promo_id'] . "'/></td>";
                                echo "<td>" . $row['promo_name'] . "</td>";
                                echo "<td>" . $row['film_title'] . "</td>";
                                echo "<td>" . $row['start_date'] . "</td>";
                                echo "<td>" . $row['end_date'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
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
