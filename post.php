<?php
include("header.php");
?>
<main>
	<?php 
		//obsluga formularza
		if($_SERVER['REQUEST_METHOD']==="POST") {
			if(isset($_POST['comment_input']) && strlen($_POST['comment_input']) > 0 ) {
				$commentdate=date('Y-m-d H:i:s');
				$sql='INSERT INTO Comments(user_id, post_id, comment_text, comment_date) VALUES("'.$_SESSION['user_id'].'",
						"'.$_POST['post_id'].'","'.$_POST['comment_input'].'","'.$commentdate.'")';
				$result=$conn->query($sql);
				
			}
		}
		//post oraz formularz do komentarza
		$post=$_GET['page_id'];
		$sql='SELECT * FROM Users JOIN Posts on Users.id=Posts.user_id WHERE Posts.post_id="'.$_GET['page_id'].'"';
		$result=$conn->query($sql);
		if($result->num_rows > 0) {
			while($row=$result->fetch_assoc()) {
				echo ("<p class='post-author'>
							Dodany przez: {$row['name']}, Data:{$row['post_date']}
					</p>
					");
					echo ("<p class='post-title'>
							Tytuł posta: {$row['post_name']}
						</p>		
					");
					echo ("<p class='post-content'>
							Treść posta: <br>
							{$row['post_input']}	
							</p>					
					");
					echo (" <fieldset>
								<legend>Dodaj komentarz</legend>
								<form method='POST' name='comment_form' action='#'>
									<textarea rows='3' cols='30' name='comment_input' maxlength='60'></textarea>
									<button type='submit' name='comment_submit_button'>Wyślij</button>
									<input type='hidden' value='{$post}' name='post_id'>	  
								</form>
							</fieldset>
							
						");
					//tutaj wyświetlanie komentarzy do posta
					
			}
		} 
		
		else {
			"Nie ma takiego postu.";
		}
		//lista komentarzy
		echo ("<div class='comments-container'>");
		echo ("<h2>Najnowsze komentarze: </h2>");
		$sql='SELECT * FROM Comments JOIN Posts on Comments.post_id=Posts.post_id JOIN Users on Comments.user_id=Users.id WHERE Comments.post_id="'.$post.'" ORDER BY Comments.comment_date DESC';
		$result=$conn->query($sql);
		if($result->num_rows > 0 ) {
			while ($row=$result->fetch_assoc()) {
				echo("<p class='comment-author'>
					Autor komentarza: {$row['name']} , data dodania komentarza: {$row['comment_date']}	
					</p>
				");
				echo("<p class='comment-content'>
					{$row['comment_text']}
					</p>	
						
				");
			}
		}
		else {
			echo ("Brak komentarzy");
		}
			
		echo("</div>");
	
	
	?>





</main>