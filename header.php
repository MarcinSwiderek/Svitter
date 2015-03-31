<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body>
	<?php include("connection.php");?>
	
	<h3 class="user-name-top"><?php 
	session_start();
	if(isset($_SESSION['user_id'])) {
		$sql="SELECT * FROM Users WHERE id={$_SESSION['user_id']}";
		$result=$conn->query($sql);
			
		if($result->num_rows > 0) {
			while($row=$result->fetch_assoc()) {
				echo($row['name']);
			}
		}
	}
	else {
		echo "nie jesteś zalogowany";
	}
	?></h3>
	<br>
	<h2 class="welcome-title"></h2>
	<ul class='main-menu'>
	
			
			<li><a href="index.php">Strona główna </a></li><?php 
			if (isset($_SESSION['user_id'])) {
				echo ("<li><a href='user.php'>Twoje dane </a></li>");
				echo("<li><a href='settings.php'>Opcje </a></li>");
				echo("<li><a href='friends'>Przyjaciele </a></li>");
			    echo ("<li><a href='messages.php'>Wiadomości </a></li>");
				echo ("<form method='post' action='logout.php'>
						<button type='submit' name='logout_button'>Wyloguj</button>
						</form>");
			}
			else {
				echo("<li><a href='register.php'>Zarejestruj się </a></li>");
				echo("<li><a href='login.php'>Zaloguj się </a></li>");
			}
			?>
		
	</ul>

	
