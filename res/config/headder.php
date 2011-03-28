<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>JWorld</title>

	<link href="res/css/main.css" rel="stylesheet" type="text/css" />
	<link href="res/css/redmond/jquery-ui-1.8.10.custom.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="res/css/redmond/jquery-ui-timepicker.css" type="text/css"/>
	<script type="text/javascript" src="res/js/jquery-1.5.1.js"></script>
	<script type="text/javascript" src="res/js/funcs.js"></script>
	<script type="text/javascript" src="res/js/jquery-ui-1.8.10.custom.min.js"></script>	

	<script type="text/javascript"> <!--Adding a little compatablity for Internet Explorer. Joy.-->
		var ver = -1;
		if (navigator.appName == 'Microsoft Internet Explorer') {
			var ua = navigator.userAgent;
			var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
			if (re.exec(ua) != null)
			  ver = parseFloat( RegExp.$1 );
		}

		if ( ver > -1 ) {
			if ( ver >= 8.0 ) {
				document.createElement('header');
				document.createElement('hgroup');
				document.createElement('nav');
				document.createElement('menu');
				document.createElement('section');
				document.createElement('article');
				document.createElement('aside');
				document.createElement('footer');
			} else {
			  alert("You should upgrade your copy of Internet Explorer.");
			}
		} //not IE

	</script>

</head>

<body>

<div id="container">
	<header id="logo">
		<hgroup>
			<h1>Jworld</h1>
		</hgroup>
		<nav>
			<ul>
				<li><a href="index.php?page=start">Home</a></li>
				<li><a href="index.php?page=films">Films</a></li>
				<li><a href="index.php?page=about">Information</a></li>
				<li><a href="index.php?page=contact">Contact</a></li>
				<li><a href="index.php?page=news">Events</a></li>
			</ul>
		</nav>
	</header>
