<?php 

/**********************************************

Software Engineering Group Project

Computer Science and Information Systems Year 3

**********************************************/ 

?>
		<footer>

			<div id="valid" > <!--footer float area right--> 
				<?php
				if(isset($_SESSION['admin'])) {
					if($_SESSION['admin'] == 1  && $_SESSION['staff'] == 1){
						echo "<a href=\"admin.php?page=switchStaffView\">Manager View</a><p></h2>";
					} else if ($_SESSION['admin'] == 1) {
						echo "<a href=\"admin.php?page=switchStaffView\">Staff view</a><p></h2>";
					}
				}
				if(isset($_SESSION['login'])) {
					echo "<a href=\"admin.php?page=logOut\">Log Out</a>";
				}
				else {
					echo "<a href=\"index.php?page=adminLogin&fail=\">Staff Login</a>";
				}
				?>
				<br/>

				&copy; JWorld Cinema Complex 2011
			</div>
		</footer>
	
	</div> <!--Close the container opened in headder.php-->
</body>
