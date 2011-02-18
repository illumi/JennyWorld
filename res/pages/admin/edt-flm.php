<?php
	if(!isset($_SESSION['login']) && !$_SESSION['admin'])
{
	header('Location: ../../../index.php?page=adminLogin');
}

$edit_filmid=$_POST['edit_filmid'];
$edit_filmtitle=addslashes($_POST['edit_filmtitle']);
$edit_filmlength=($_POST['edit_filmlength']);
$edit_genre=($_POST['edit_genre']);
$edit_rating=($_POST['edit_rating']);
$edit_year=($_POST['edit_year']);

print_r($_REQUEST);

$con=mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());
mysql_select_db('js230') or die(mysql_error());


$sql="UPDATE films SET film_title = '$edit_filmtitle', film_length = '$edit_filmlength', 
film_genre = '$edit_genre', film_rating = '$edit_rating', film_year = '$edit_year'
WHERE film_ID = '$edit_filmid'";
mysql_query($sql) or die(mysql_error());
header("location:../../../admin.php?page=edit-film");
mysql_close($con);
?>
