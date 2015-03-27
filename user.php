

	<?php include("connection.php");?>
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
		
	
	</main>
	<?php include("footer.php");?>
	



