



	
	
	<?php include("header.php");?>
	<script type="text/javascript"  src="areyousure.js"></script>
	<main>
	
	<?php 
	
	if($_SERVER['REQUEST_METHOD']==="POST") {
		
		if(isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['repeat_new_password'])) {
			if($_POST['new_password']===$_POST['repeat_new_password']) {
				$sql="SELECT * FROM Users WHERE id={$_SESSION['user_id']}";
				$result=$conn->query($sql);
				if($result->num_rows > 0) {
					while($row=$result->fetch_assoc()) {
						$truepass=password_verify($_POST['current_password'],$row['password']);
						if($truepass){
							$options= [
								'cost' => 5,
								'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
							];
							$hashedpass=password_hash($_POST['new_password'],PASSWORD_BCRYPT,$options);
							$sql='UPDATE Users SET password="'.$hashedpass.'" WHERE password="'.$row['password'].'"';
							$result=$conn->query($sql);
							echo("Hasło zmienione poprawnie"); 
						}
					}
				}
				echo("Niepoprawnie wprowadzone dane");
			}
			else echo("Popraw nowe hasło");
		}
		
	}
	/*USUWANIE KONTA- NIE DZIAŁA PRZEKIEROWANIE DO STRONY GŁÓWNEJ*/
	if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['remove_account_button'])) {
		$sql='DELETE FROM Users WHERE id="'.$_SESSION['user_id'].'"';
		$result=$conn->query($sql);
		session_destroy();
		header("Location: index.php");
	}
	
	
	
	
	?>
	<form method="post" action="#" name="change_password_form">
		<fieldset>
			<legend>Zmień hasło</legend>
				<label>Obecne hasło:</label><br>
				<input type="password" name="current_password" minlength="4" maxlength="30"><br>
				<label>Nowe hasło:</label><br>
				<input type="password" name="new_password" minlength="4" maxlength="30"><br>
				<label>Powtórz nowe hasło:</label><br>
				<input type="password" name="repeat_new_password" minlength="4" maxlength="30"><br>
				<button type="submit" name="change_password_button">Wyślij</button>
		</fieldset>
	</form>
	<form method="post" action="#" name="remove_account_form">	
		<fieldset>
			<legend>Usuń konto</legend>
				<button type="submit" name="remove_account_button">Kliknij przycisk, jeśli chcesz usunąć konto</button>
				
		</fieldset>
	</form>
	
	</main>
	<?php include("footer.php");?>
	
	


