<?php

$filmid = $_POST['filmid'];
$promoname = $_POST['promoname'];
$start = $_POST['start'];
$end = $_POST['end'];
$description = $_POST['desc'];

$con = mysql_connect('anubis.macs.hw.ac.uk','js230','js230') or die(mysql_error());

mysql_select_db('js230') or die(mysql_error());

$sql="INSERT INTO promotions (film_ID, promo_name, start_date, end_date, description)
VALUES
('$filmid','$promoname','$start','$end','$description')";
mysql_query($sql) or die(mysql_error());
header("location:../../admin.php?page=promo-acs");
?>
