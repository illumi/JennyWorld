<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Administration</title>

	<link href="res/css/redmond/jquery-ui-1.8.10.custom.css" rel="stylesheet" type="text/css" />
	<link href="res/css/admin.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="res/js/jquery-1.5.1.js"></script>
	<script type="text/javascript" src="res/js/funcs.js"></script>
	<script type="text/javascript" src="res/js/jquery-ui-1.8.10.custom.min.js"></script>
	
	<script type="text/javascript">
		var datefield=document.createElement("input")
		datefield.setAttribute("type", "date")
		if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
			jQuery(function($){ //on document.ready
				$('#start').datepicker({dateFormat: 'yy-mm-dd'});
				$('#end').datepicker({dateFormat: 'yy-mm-dd'});
			})
		}
	</script>
</head>

<body>

<div id="container">
	<header id="logo">
		<hgroup>
			<h1>Jworld</h1>
		</hgroup>
		
	<?php	
	if($_SESSION['admin'] == 1 && $_SESSION['staff'] == 0){
		echo "
	<nav>
		<li><a href=\"admin.php\">Home</a>
			<ul>
				<li><a href=\"admin.php?page=edit-home\">Edit Home</a></li>
			</ul>
		</li>
		<li><a href=\"admin.php?page=staff-acs\">Staff</a>
		</li>
		<li><a href=\"admin.php?page=promo-acs\">Promotions</a>
			<ul>
				<li><a href=\"admin.php?page=add-promo\">Add Promo</a></li>
				<li><a href=\"admin.php?page=edit-promo\">Edit Promo</a></li>
				<li><a href=\"admin.php?page=remove-promo\">Remove Promo</a></li>
			</ul>
		</li>
		<li><a href=\"admin.php?page=tt-acs\">Timetable</a>
			<ul>
				<li><a href=\"admin.php?page=add-film-tt\">Add Film</a></li>
				<li><a href=\"admin.php?page=edit-film-tt\">Edit Film</a></li>
				<li><a href=\"admin.php?page=remove-film-tt\">Remove Film</a></li>
			</ul>
		</li>
		<li><a href=\"admin.php?page=stat-acs\">Statistics</a></li>
		<li><a href=\"admin.php?page=films-acs\">Film Records</a>
			<ul>
				<li><a href=\"admin.php?page=add-film\">Add Film</a></li>
				<li><a href=\"admin.php?page=edit-film\">Edit Film</a></li>
				<li><a href=\"admin.php?page=remove-film\">Remove Film</a></li>
			</ul>
		</li>
	</nav>
		";	
	} else {
		echo "
	<nav>
		<li><a href=\"admin.php\">Home</a>
		</li>
		<li><a href=\"admin.php?page=booktickets\">Tickets</a>
		</li>
		<li><a href=\"admin.php?page=tt-acs\">Timetable</a>
			<ul>
				<li><a href=\"admin.php?page=add-film-tt\">Add Film</a></li>
				<li><a href=\"admin.php?page=edit-film-tt\">Edit Film</a></li>
				<li><a href=\"admin.php?page=remove-film-tt\">Remove Film</a></li>
			</ul>
		</li>
		<li><a href=\"admin.php?page=stat-acs\">Statistics</a></li>
		<li><a href=\"admin.php?page=films-acs\">Film Records</a>
			<ul>
				<li><a href=\"admin.php?page=add-film\">Add Film</a></li>
				<li><a href=\"admin.php?page=edit-film\">Edit Film</a></li>
				<li><a href=\"admin.php?page=remove-film\">Remove Film</a></li>
			</ul>
		</li>
	</nav>
		";
	}
	?>

	
	
	</header>
