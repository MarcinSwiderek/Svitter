

	
	<header><?php include("header.php");?></header> 
	<main>
	<?php 
	if(isset($_SESSION['user_id'])) {
		echo "<h3>Cześć  {$_SESSION['user_name']} !!! </h3> ";
	
	
	echo("<div id='new_post_div'>
	<form name='post_form' action='newpost.php' method='post'>
		<fieldset>
			<legend>Stwórz nowy post</legend>
			<label>Tytuł postu</label><br>
			<input type='text' name='post_name' maxlength='30'><br>
			<label>Treść postu</label><br>
			<textarea name='post_text' cols='50' rows='3' maxlength='140' placeholder='Co Ci chodzi po głowie...?'></textarea><br>
			<button type='submit' name='post_submit_button'>Prześlij!</button>		
		</fieldset>
	</form> ");
	}
	?>
	</div>
	
	
	<div id='container'>
		<?php 
		if(isset($_SESSION['user_id'])) {
			
			$sql='SELECT * FROM Users JOIN Posts on Users.id=Posts.user_id ORDER BY post_date DESC';  //zapytanie łączące dwie tabele
			$result=$conn->query($sql);
			if($result->num_rows > 0) {
				while($row=$result->fetch_assoc()) {
					echo ("<p class='post-author'>
							Dodany przez: <a href='profile.php?profile_id={$row['id']}'>{$row['name']}</a>, Data:{$row['post_date']}
					</p>
					");
					echo ("<p class='post-title'>
							Tytuł posta: <a href='post.php?page_id={$row['post_id']}'>{$row['post_name']}</a>
						</p>		
					");
					echo ("<p class='post-content'>
							
							{$row['post_input']}	
							</p>					
					");
				}
			
				  
			}
		}
		
		?>
	</div>
	
	
	</main>
	<?php include("footer.php");?>
	
	