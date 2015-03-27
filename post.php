<?php
include("header.php");
?>
<main>
	<?php 
	if($_SERVER['REQUEST_METHOD']==="GET") {
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
								</form>
							</fieldset>
							
						");
			}
		} 
		else {
			"Nie ma takiego postu.";
		}
	}
	else {
		echo ("błąd");
	}
	?>





</main>