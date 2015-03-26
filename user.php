<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8>
	<title>Svitter</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<script src="http://code.jquery.com/jquery-1.11.2.js"></script>
	<?php include("connection.php");?>
	<header><?php include("header.php");?></header> 
	<main>
		<h3>Username : <?php 
			session_start();
			$sql="SELECT * FROM Users WHERE id={$_SESSION['id']}";
			$result=$conn->query($sql);
			
			if($result->num_rows > 0) {
				while($row=$result->fetch_assoc()) {
					echo($row['name']);
				}
			}
		?> </h3>
		
	
	</main>
	<footer><?php include("footer.php");?></footer>	
	
	
</body>
</html>




