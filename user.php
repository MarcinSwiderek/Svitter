

	
	<header><?php include("header.php");?></header> 
	<main>
		<h3>Username : <?php 
			
			$sql="SELECT * FROM Users WHERE id={$_SESSION['user_id']}";
			$result=$conn->query($sql);
			
			if($result->num_rows > 0) {
				while($row=$result->fetch_assoc()) {
					echo($row['name']);
				}
			}
		?> </h3>
		<div class='all_user_posts'>
		 <h2>Wszystkie moje posty:</h2>
			<?php 
			$sql='SELECT * FROM Posts WHERE user_id="'.$_SESSION['user_id'].'"';
			$result=$conn->query($sql);
			if($result->num_rows > 0) {
				while($row=$result->fetch_assoc()){
					echo("<p class='post-name'>
							Tytuł postu: {$row['post_name']} ,Dodany {$row['post_date']}	
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
	<?php include("footer.php");?>
	


