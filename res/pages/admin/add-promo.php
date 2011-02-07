
<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

include 'sql-connection.php';

$con=mysql_connect($host,$username,$password) or die(mysql_error());

mysql_select_db($database) or die(mysql_error());

$filmQuery="SELECT film_ID,film_title FROM films";

$filmResult = mysql_query($filmQuery);

$filmOptions="";

while ($row=mysql_fetch_array($filmResult)){
$filmid=$row['film_ID'];
$filmname=$row['film_title'];
$filmOptions.="<OPTION VALUE=\"$filmid\">".$filmname."</option>";
}


?>

<div id="body">
<h1> Add Promotions</h1>
<center>
<p>
<div id="header">
	<input type=button onClick="location.href='admin.php?page=promo-acs'" value='Promotions
Overview'>
	<input type=button onClick="location.href='admin.php?page=add-promo'" value='Add
Promotion'>
	<input type=button onClick="location.href='admin.php?page=edit-promo'" value='Edit
Promotion'>
	<input type=button onClick="location.href='admin.php?page=remove-promo'" value='Remove
Promotion'>

</div>
<h2>
<section id="new promotion info">
	<form method="POST" action="res/pages/admin/add-pro.php">
	Film: <select NAME="filmid" required>
		<option VALUE="0">Film Title
		<? echo $filmOptions?>
		</select> <br />
	Promotion Name: <input type="text" value="" id="promoname" required> <br />
	Start Date: (Format: YYYY-MM-DD) <input type="text" value="" id="start" required> <br />
	End Date: (Format: YYYY-MM-DD) <input type="text" value="" id="end" required> <br />
	Description: <input type="text" value="" id="desc" required> <br />
		<input type="submit" name="submit" id="submit" value="Submit">
		<input type="reset" name="reset" id="reset" value="Reset"> <br />
	</form>
	</section>
</h2>
</center>
</div>
<?php
mysql_close($con);
?>
