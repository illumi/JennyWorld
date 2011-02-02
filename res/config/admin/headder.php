<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Administration</title>

	<link href="res/css/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">
	<header id="logo">
		<hgroup>
			<h1>Jworld</h1>
		</hgroup>
		
		
	<nav>
		<li><a href="admin.php">Home</a></li>
		<li><a href="admin.php?page=staff-acs">Staff</a>
			<ul>
				<li><a href="admin.php?page=add-staff">Add Staff</a></li>
				<li><a href="admin.php?page=edit-staff">Edit Staff</a></li>
				<li><a href="admin.php?page=remove-staff">Remove Staff</a></li>
			</ul>
		</li>

		<li><a href="admin.php?page=promo-acs">Promotions</a></li>
		<li><a href="admin.php?page=tt-acs">Timetable</a></li>
		<li><a href="admin.php?page=stat-acs">Statistics</a></li>
	</nav>
</header>
