<?php

if(!isset($_SESSION['login']) || !$_SESSION['admin'] || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin&fail=');
}

if(isset($_GET['msg']))
{
    echo $_GET['msg'];
}

include('res/lib/class_dbcon.php');
$connect = new doConnect();

$query = mysql_query("SELECT promo_id, promo_name, film_title, start_date, end_date, description FROM promotions p, films f WHERE p.film_ID = f.film_ID;
");
$connect->disc();
?>

<div id="body">
<h1> Remove Film</h1><p>

<section id="remove info">
	<form method="POST" action="admin.php?page=remove-pro">
		<table class="table-std">
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

<h2></h2>
</div>
