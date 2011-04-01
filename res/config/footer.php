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
						echo "<div class=\"lb\"><a href=\"admin.php?page=switchStaffView\">Manager View</a><p></h2></div>";
					} else if ($_SESSION['admin'] == 1) {
						echo "<div class=\"lb\"><a href=\"admin.php?page=switchStaffView\">Staff view</a><p></h2></div>";
					}
				}
				if(isset($_SESSION['login'])) {
					echo "<div class=\"lb\"><a href=\"admin.php?page=logOut\">Log Out</a></div>";
				}
				else {
					echo "<div class=\"lb\"><a href=\"index.php?page=adminLogin&fail=\">Staff Login</a></div>";
				}
				?>
				<br/>

				&copy; JWorld Cinema Complex 2011
			</div>
		</footer>
	
	</div> <!--Close the container opened in headder.php-->
</body>
