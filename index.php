

	
	<header><?php include("header.php");?></header> 
	<main>
	<?php 
	if(isset($_SESSION['user_id'])) {
		echo "<h3>Hello user {$_SESSION['user_name']} !!! </h3> ";
	}
	?>
	<div id="container">
	container
	</div>
	
	</main>
	<?php include("footer.php");?>
	
	