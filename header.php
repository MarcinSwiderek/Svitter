<!DOCTYPE html>
<html>
<head>
</head>
<body>
	poczatek tekstu Headera:
	<h2><?php 
	session_start();
	if(isset($_SESSION['id'])) {
		$sql="SELECT * FROM Users WHERE id={$_SESSION['id']}";
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
	<nav>
		<ul class="main-menu">
			<a href="#">Strona główna</a> 
			<a href="friends">Przyjaciele</a> 
			<a href="messages">Wiadomości</a> 
			<a href="settings">Opcje</a>
		</ul>
	</nav>

	Koniec tekstu headera

</body>

</html>
