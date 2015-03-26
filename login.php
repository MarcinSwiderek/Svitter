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
		<?php 
		if($_SERVER['REQUEST_METHOD']==="POST") {
			if(isset($_POST['login_name']) && isset($_POST['login_password'])) {
				$sql='SELECT * FROM Users';
				$result=$conn->query($sql);
				
				
				if($result-> num_rows >0) {
					while($row=$result->fetch_assoc()){
						if($row['name']===$_POST['login_name']) {
							$truepass=password_verify($_POST['login_password'],$row['password']);
							if($truepass) {
								/*Tutaj obsluga zalogowanego uzytkownika*/
								$_SESSION['user_id']=$row['id'];
								$_SESSION['user_name']=$row['name'];
								header("Location: index.php");
							}
						}
					}
				}
				echo ("Błędny login lub hasło. Spróbuj ponownie");
				
			}
		}
		
		
		?>
		
		<div>
			<form name="login_form" method="post" action="#">
				<h3>Zaloguj się:</h3>
				<label>Nazwa użytkownika:</label><br>
				<input type="text" name="login_name" minlength="4" maxlength="30"><br>
				<label>Hasło</label><br>
				<input type="password" name="login_password" minlength="4" maxlength="30"><br>
				<button type="submit" name="login_button">Zaloguj</button>		
			</form>
		</div>
	
	</main>
	<footer><?php include("footer.php");?></footer>	
	
	
</body>
</html>