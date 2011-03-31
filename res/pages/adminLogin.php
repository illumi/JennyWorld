<div id="body">

<h1>Staff Login</h1>

	<form method="POST" action="res/pages/login.php">
		<table class="table-std">
			<tr>
			<td>
				Username:
			</td> 
			
			<td>
				<input type="text" name="username" id="username" size="25" autofocus required />
			</td>
			</tr>
					
			<script>
				if (!("autofocus" in document.createElement("input"))) {
					document.getElementById("username").focus();
				}
			</script>
			<tr>
			<td>
				Password:
			</td> 
			
			<td>
				<input type="password" name="password" id="password" size="25" required />
			</td>
			
			</tr>
			
			<table>
				<input type="submit" name="submit" id="submit" value="Submit"/>
				<input type="reset" name="reset" id="reset" value="Reset"/>
			</table>
	
		</table>
	</form>

<h2></h2>
</div>
