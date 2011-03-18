<div id="body">




<h1>Staff Login</h1>


<section id="login">
	<form method="POST" action="res/pages/login.php">
	<p>Username: <input type="text" name="username" id="username" size="25" autofocus required /></p>
	<script>
	if (!("autofocus" in document.createElement("input"))) {
		document.getElementById("username").focus();
	}
	</script>
	<p>Password: <input type="password" name="password" id="password" size="25" required /></p>
	<p>
		<input type="submit" name="submit" id="submit" value="Submit"/>
		<input type="reset" name="reset" id="reset" value="Reset"/>
	</p>
	</form>
</section>



</div>
