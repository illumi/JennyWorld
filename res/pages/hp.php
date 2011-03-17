<!DOCTYPE html>


<div id="container">
<div id="body">

<h1>Harry Potter
<div id="header">
	<table border="0">
	<tr>
		<td> 
							<script>
      						function pop_up(){
        						
									  });
			    </script>
					<input type=button onClick="$('#gay').toggle('slow');" value='Film times'> 
<div id="gay">
<center>
<?php

include 'sql-connection.php';

$sql= "select start_time, end_time from showings where film_ID = 2";

$result = mysql_query($sql) or die(mysql_error());

echo "<h3><table border='1'>
<tr>
<th>Start Time</th>
<th>End Time</th>
</tr>";
// Print out the contents of each row into a table 
while($row = mysql_fetch_array($result)){
  

	echo "<tr>";
	echo "<td>" .$row['start_time']. " </td> ";
	echo "<td>" . $row['end_time'] . "</td>";

	echo "</tr>";
}
echo "</table></h3>";

mysql_close($link);

?>
</center>

</div>	
	</td>
	</tr>
</table>
</div>
</h1>
<p>

<h3>
<p>
Release date: 19 November 2010
<p>
Running time: 146 mins
<p>
Director: David Yates
<p>
Starring: Daniel Radcliffe, Rupert Grint, Emma Watson, Helena Bonham Carter, Robbie Coltrane, Tom Felton, Ralph Fiennes
</h3>

<p>

<iframe title="YouTube video player" width="500" height="300" src="http://www.youtube.com/embed/Iv_Aym8gW2Q" frameborder="0" allowfullscreen></iframe>

<p>
<h3>
No longer a boy, Harry draws ever closer to his ultimate battle in JK Rowling's epic fantasy.
<p>
Harry (Daniel Radcliffe), Ron (Rupert Grint) and Hermione set out on their perilous mission to track down and destroy the secret to Voldemort's immortality and destruction - the Horcruxes. Without the guidance of their professors or the protection of Dumbledore, the three friends must rely on one another more than ever. But Dark Forces in their midst threaten to tear them apart. Meanwhile, the wizarding world has become a dangerous place for all enemies of the Dark Lord. The long-feared war has begun and Voldemort's Death Eaters seize control of the Ministry of Magic and even Hogwarts, terrorising and arresting anyone who opposes them. But the one prize they still seek is the one most valuable to Voldemort - Harry Potter. The Death Eaters begin their hunt for Harry with orders to bring him to Voldemort - alive!
<p>
Screenplay: Steve Kloves
<p>
You should see it because: The movie saga of the century approaches its spectacular conclusion.
<p>
See it if you liked: Harry Potter And The Goblet Of Fire (2005), Harry Potter And The Order Of The Phoenix (2007), Harry Potter And The Half-Blood Prince (2009)

</h3>
	
</div>

</div>


</html>
