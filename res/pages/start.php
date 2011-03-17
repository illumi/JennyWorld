<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 
include 'sql-connection.php';
?>

<head>
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getUser.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>

<div id ="container">
	<div id="body">
		<div id="booking">
		
						<form name="testform" method="POST" onchange=showUser(this.value) action="">
						<table>
						<tr>
							<th>Book Tickets</th>
							<tr>
							<td>		
									Name:
									<select NAME="filmname">					
									<option VALUE="0">----</option>
									<?php
									$query = mysql_query("SELECT film_title FROM films;");
									$i=1;
									while ($row = mysql_fetch_assoc($query)) {
										echo '<option value="' . $i . '">' . $row['film_title']. '</option>';
										$i++;
									}
									?>
									</select> 
									<p>
									Time:
									<select NAME="time">	
									<div id="txtHint">				
									
									
									</div>
									</select> 
									<p>
									<input type="submit" name="submit" id="submit" value="Submit">
									<input type="reset" name="reset" id="reset" value="Reset">
									</td>
									</tr>
						</tr>
						</table>
							</form>		
		</div>

		<div id="mainContent">
		<h1>
		
		Welcome to Jworld
		
		</h1>
		
		<h3>
				<center> 
	
					We have many new and classic films for you to enjoy
					at our cinema. We have _ large screens and _ seats for you to enjoy them in.
					<br>
					some more stuff here, and then some more etc etc
					<br>
					some more, some more, some more, some more, some more...
					<br>
					some more, some more, some more, some more, some more...
					<br>
					some more, some more, some more, some more, some more...
					<br>
					some more, some more, some more, some more, some more...
				</center> 
		</h3>

		
		</div>	
	</div>
</div>
