<!DOCTYPE html>
<html>
<head>
</head>
<body>
	poczatek tekstu Headera:
	<h2 class="user-name-top"><?php 
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
	?></h2>
	<br>
	<h2>WELCOME ON SVITTER!</h2>
	<nav>
	
		<ul class="main-menu">
			<a href="index.php">Strona główna</a> 
			<a href="friends">Przyjaciele</a>
			<a href="messages">Wiadomości</a>
			<a href="settings">Opcje</a>
			<a href="register.php">Zarejestruj się</a>
			<?php 
			if (isset($_SESSION['user_id'])) {
				echo ("<form method='post' action='logout.php'>
						<button type='submit' name='logout_button'>Wyloguj</button>
						</form>");
			}
			else {
				echo("<a href='login.php'>Zaloguj się</a>");
			}
			?>
		</ul>
	</nav>

	Koniec tekstu headera

</body>

</html>
