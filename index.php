<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8>
	<title>Svitter</title>


</head>


<body>
	<script src="http://code.jquery.com/jquery-1.11.2.js"></script>
	<?php include("connection.php");?>
	<header><?php include("header.php");?></header> 
	<main>
	<?php 
	if(isset($_SESSION['user_id'])) {
		echo "<h3>Hello user {$_SESSION['user_name']} !!! </h3> ";
	}
	
	?>
	
	</main>
	<footer><?php include("footer.php");?></footer>	
	
	
</body>
</html>