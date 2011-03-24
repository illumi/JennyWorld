<?php

if(!isset($_SESSION['login']) || !$_SESSION['admin']  || empty($_SESSION['login']))
{
	header('Location: ./index.php?page=adminLogin');
}

	if($_SESSION['admin'] == 1  && $_SESSION['staff'] == 1){
		$_SESSION['staff'] = 0;
	} else {
		$_SESSION['staff'] = 1;
	}
	
	header("location: admin.php");

?>