<?php
include ("header.php");

?>

<?php 
if ($_SERVER['REQUEST_METHOD']==="POST") {
	if((isset($_POST['select-from-friends']) || isset($_POST['send_to'])) && isset($_POST['message'])) {
		if($_POST['select-from-friends']){
			$receiver=$_POST['select-from-friends'];
		}
		else {
			$receiver=$_POST['send_to'];
		}
		$sender=$_SESSION['user_name'];
		$sender_id=$_SESSION['user_id'];
		if($receiver!=$sender) {
			$sql='SELECT id FROM Users WHERE name="'.$receiver.'"';
			$result=$conn->query($sql);
			if($result->num_rows > 0) {
				while ($row=$result->fetch_assoc()) {
					$receiver_id=$row['id'];
					$messagedate=date('Y-m-d H:i:s');
					$sql='INSERT INTO Messages(sender_id,receiver_id,message_text,message_date) VALUES ('.$sender_id.','.$receiver_id.',"'.$_POST['message'].'","'.$messagedate.'")';
					$result2=$conn->query($sql);
					if($result2) {
						echo("<br>Wiadomość wysłana poprawnie!");
					}	
				}
			}
			else {
				echo ("Taki użytkownik nie istnieje! ");
				
			}
		}
		else{
			echo("<br>Nie możesz wysłać wiadomości do siebie !");
		}	
	}
}


?>

<main>
	
	<form method="post" action="#" name="write_message_form">
		<fieldset>
			<legend>Nowa wiadomość</legend>
				<label>Wybierz użytkownika z listy przyjaciół:</label>
				<select name="select-from-friends">
				<option value="0">N/A yet</option>
				</select><br>
				<label>Lub wpisz nazwę użytkownika:</label>
				<input type="text" name="send_to" value="<?php 	
				if(isset($_GET['send_to'])) {
					echo($_GET['send_to']);
				}
				else {;};
				?>"><br>
				<textarea name="message" cols="50" rows="10" maxlength="500" placeholder="Wpisz tutaj swoją wiadomość..." required></textarea><br>
				<button type="submit" name="send_message_button">Wyślij!</button>
		</fieldset>
	</form>
	



</main>

<?php 
include ("footer.php");
?>