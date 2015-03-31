<?php
include("header.php");
?>
<main>
	<form action="writemessage.php" method="post">
		<button type="submit" name="new_message_button">Utwórz nową wiadomość</button> 
	</form>
	<h2>INBOX:</h2>
	<ul class="inbox-list">
	<?php 

	
	
	$sql='SELECT * FROM Messages JOIN Users ON Messages.sender_id=Users.id WHERE receiver_id="'.$_SESSION['user_id'].'" ORDER BY Messages.message_date DESC';
	$result=$conn->query($sql);
	
	if($result->num_rows > 0 ){
		while($row=$result->fetch_assoc()) {
			echo("<li class='inbox-message-title'>");
			echo('<a href="showmessage.php?message_id='.$row['message_id'].'">Pokaż</a>');
			echo('<a href="profile.php?profile_id='.$row['sender_id'].'">'.$row['name'].'</a>');
			echo("    ".$row['message_date']."<br>");
			echo("<p class='message-content'>");
			//początek zapytania wyświetlającego tylko 30 pierwszych znaków wiaadomości , do uzupełnienia:$sqltext='SELECT LEFT(message_text, 30) AS excerpt FROM Messages WHERE ';
			echo($row['message_text']);
			echo("</li><br>");
		}
	}
	else {
		echo("Brak wiadomości w skrzynce odbiorczej");
	}
	?>
	</ul>


	<h2>OUTBOX:</h2>

    <ul class="outbox-list">
	<?php 

	
	
	$sql='SELECT * FROM Messages JOIN Users ON Messages.receiver_id=Users.id WHERE sender_id="'.$_SESSION['user_id'].'" ORDER BY Messages.message_date DESC';
	$result=$conn->query($sql);
	
	if($result->num_rows > 0 ){
		while($row=$result->fetch_assoc()) {
			echo("<li class='outbox-message-title'>");
			echo('<a href="showmessage.php?message_id='.$row['message_id'].'">Pokaż</a>');
			echo('<a href="profile.php?profile_id='.$row['receiver_id'].'">'.$row['name'].'</a>');
			echo("    ".$row['message_date']."<br>");
			echo("<p class='message-content'>");
			echo($row['message_text']);
			echo("</li><br>");
		}
	}
	else {
		echo("Brak wiadomości w skrzynce nadawczej");
	}
	?>
	</ul>







</main>
<?php 
include("footer.php");
?>