<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Administration</title>

	<link href="res/css/redmond/jquery-ui-1.8.10.custom.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="res/css/redmond/jquery-ui-timepicker.css" type="text/css"/>
	<link href="res/css/admin.css" rel="stylesheet" type="text/css"/>
	
	<script type="text/javascript" src="res/js/funcs.js"></script>
	<script type="text/javascript" src="res/js/jquery-1.5.1.js"></script>
	<script type="text/javascript" src="res/js/jquery-ui-1.8.10.custom.min.js"></script>
	<script type="text/javascript" src="res/js/jquery.ui.timepicker.js"></script>
	<script type="text/javascript">
		var ver = -1;
		if (navigator.appName == 'Microsoft Internet Explorer') {
			var ua = navigator.userAgent;
			var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
			if (re.exec(ua) != null)
			  ver = parseFloat( RegExp.$1 );
		}

		if ( ver > -1 ) {
			alert("As a staff member, you need to be using Firefox.");
		} else { 
			//not IE
		}
	</script>
	
	<script>
$(function() {
	$( "#accordion" ).accordion({ 
    collapsible: true, 
    autoHeight: false, 
    active: false 
});
});
</script>

	
	<script type="text/javascript">
	$(function() {
		var dates = $( "#start, #end, #date" ).datepicker({
		defaultDate: "+1w",
		dateFormat: 'yy-mm-dd',
		minDate: 0,
		changeMonth: true,
		numberOfMonths: 1,
		onSelect: function( selectedDate ) {
		var option = this.id == "start" ? "minDate" : "maxDate",
		instance = $( this ).data( "datepicker" ),
		date = $.datepicker.parseDate(
		instance.settings.dateFormat ||
		$.datepicker._defaults.dateFormat,
		selectedDate, instance.settings );
		dates.not( this ).datepicker( "option", option, date );
		}
		});
		});
		
	
    $(document).ready(function() {
                $('#timepicker_1').timepicker({
                    onHourShow: timepicker7OnHourShowCallback
                });
            });
            function timepicker7OnHourShowCallback(hour) {
                if ((hour > 22) || (hour < 9)|| (hour == 0)) {
                    return false;
                }
                return true;
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
	$today = date('Y-m-d');	
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
		<li><a href=\"admin.php?page=tt-acs&date=$today\">Timetable</a>
			<ul>
				<li><a href=\"admin.php?page=add-film-tt\">Add Film</a></li>
				<li><a href=\"admin.php?page=edit-film-tt\">Edit Film</a></li>
				<li><a href=\"admin.php?page=remove-film-tt\">Remove Film</a></li>
				<li><a href=\"admin.php?page=auto-rotate\">Auto Rotation</a></li>
			</ul>
		</li>
		<li><a href=\"admin.php?page=stat-acs\">Statistics</a></li>
		<li><a href=\"admin.php?page=films-acs\">Film Records</a>
			<ul>
				<li><a href=\"admin.php?page=add-film\">Add Film</a></li>
				<li><a href=\"admin.php?page=edit-film\">Edit Film</a></li>
			</ul>
		</li>
	</nav>
		";	
	} else {
		echo "
	<nav>
		<li><a href=\"admin.php\">Home</a></li>
		<li><a href=\"admin.php?page=booktickets\">Tickets</a></li>
		<li><a href=\"admin.php?page=tt-acs&date=$today\">Timetable</a></li>
		<li><a href=\"admin.php?page=stat-acs\">Statistics</a></li>
		<li><a href=\"admin.php?page=films-acs\">Film Records</a></li>
		<li><a href=\"admin.php?page=promo-acs\">Promotions</a></li>
	</nav>
		";
	}
	?>

	
	
	</header>
