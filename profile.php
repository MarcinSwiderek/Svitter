<?php
include ("header.php");
?>
<main>
	<h2>
	<?php  
	$current_user_profile=$_GET['profile_id'];
	$sql='SELECT * FROM Users WHERE id="'.$current_user_profile.'"';
	$result=$conn->query($sql);
	if($result->num_rows > 0) {
		while ($row=$result->fetch_assoc()) {
			echo ($row['name']);
		}
	}
	else {
		echo ("Taki użytkownik nie istnieje! ");
	}
	?>
	</h2>
	<form method="post" action="writemessage.php" name="send_message_form">
		<button type="submit">Wyślij wiadomość do użytkownika</button>	
	</form>
	
	<div class="friend-list-container">
	
	</div>
	
	<div class="posts-container">
	<?php 
	$sql='SELECT * FROM Posts WHERE user_id="'.$current_user_profile.'"';
	$result=$conn->query($sql);
	if($result->num_rows > 0) {
		while($row=$result->fetch_assoc()){
			echo("<p class='post-name'>
					
					Tytuł postu: <a href='post.php?page_id={$row['post_id']}'>{$row['post_name']}</a> ,Dodany {$row['post_date']}
			</p>
			");
			echo("<p class='post-content'>
			{$row['post_input']}
			</p>
			");
		}
	}
	else {
		echo "Brak postów do wyświetlenia";
	}
	
	?>
	
	</div>





</main>







<?php 
include ("footer.php");
?>