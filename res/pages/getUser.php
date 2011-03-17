<?php
									$q=$_GET["q"];
									$query2 = mysql_query("SELECT start_time FROM showings, films WHERE films.film_ID = showings.film_ID 
															AND films.film_title = '". $q ."' ;");
									$j=1;
									while ($row = mysql_fetch_assoc($query2)) {
										echo '<option value="' . $j . '">' . $row['start_time']. '</option>';
										$j++;
									}
									?>
