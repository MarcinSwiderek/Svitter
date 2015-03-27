




	
	<?php include("connection.php");?>
	<header> <?php include("header.php");?> </header> 
	<main>
		<?php 
		/*OBSŁUGA FORMULARZA REJESTRACJI*/
		if($_SERVER['REQUEST_METHOD']==="POST") {
			
			if(isset($_POST['new_user_name']) && isset($_POST['new_user_password']) && isset($_POST['new_user_password2'])) {
				/*sprawdzenie czy podana nazwa istnieje:*/
				$sql='SELECT * FROM Users';
				$result=$conn->query($sql);
				$is_unique=true;
				if($result->num_rows >0) {
					while($row=$result->fetch_assoc()) {
						if($row['name']===$_POST['new_user_name']) {
							$is_unique=false; 
							echo("Podany użytkownik już istnieje"); break;
						}											
					}
				}
				if($is_unique) {
					if($_POST['new_user_password']===$_POST['new_user_password2']) {
						/*sprawdzenie poprawności hasła oraz przypisanie odpowiednich wartosci do bazy:*/
						$options= [
								'cost' => 5,
								'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
						];
						$hashedPass=password_hash($_POST['new_user_password'], PASSWORD_BCRYPT,$options);
						$sql='INSERT INTO Users(name,password) VALUES ("'.$_POST['new_user_name'].'","'.$hashedPass.'")';
						$result=$conn->query($sql);						
						$_SESSION['user_id']=$conn->insert_id;
						$_SESSION['user_name']=$_POST['new_user_name'];
						header("Location: index.php");
						
						
					}
					else echo("Wpisz dane jeszcze raz");
				}		
			}
		}	
		?>
		<h2>Zarejestruj się:</h2>
		<form name="registration_form" method="post" action="#">
			<fieldset>
				<label>Twoja nowa nazwa użytkownika:</label><br>
				<input type="text" name="new_user_name" minlength="4" maxlength="30"><br>
				<label>Twoje hasło:</label><br>
				<input type="password" name="new_user_password" minlength="4" maxlength="30"><br>
				<label>Powtórz hasło:</label><br>
				<input type="password" name="new_user_password2" minlength="4" maxlength="30"><br>			
				<button type="submit" name="registration_form_button">Register</button><br>
			</fieldset>
		</form>
	
	</main>
	<?php include("footer.php"); ?> 	
	
	

