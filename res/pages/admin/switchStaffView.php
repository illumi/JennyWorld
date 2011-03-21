<?php

	if($_SESSION['admin'] == 1  && $_SESSION['staff'] == 1){
		$_SESSION['staff'] = 0;
	} else {
		$_SESSION['staff'] = 1;
	}
	
	header("location: admin.php");

?>