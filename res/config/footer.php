<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>
		<footer>

			<div id="valid" > <!--footer float area right--> 
				<?php
					if(isset($_SESSION['login']))
					{
				?>
					<a href="admin.php?page=logOut">Log Out</a>
				<?php
					}
					else
					{
				?>

				<a href="index.php?page=adminLogin">Staff Login</a>

				<?php } ?>
				<br/>

				&copy; JWorld Cinema Complex 2011
			</div>
		</footer>
	
	</div> <!--Close the container opened in headder.php-->
</body>
