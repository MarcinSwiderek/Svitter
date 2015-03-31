<?php
include ("header.php");
?>
<main>
	<?php 
	//burdel bo nie wiem jak złożyć wszystko w jedno zapytanie
	$sql='SELECT * FROM Messages JOIN Users ON Messages.sender_id=Users.id OR Messages.receiver_id=Users.id WHERE message_id="'.$_GET['message_id'].'"'; 
	$recsql='SELECT * FROM Messages JOIN Users ON Messages.receiver_id=Users.id WHERE message_id="'.$_GET['message_id'].'"';
	$recresult=$conn->query($recsql);
	$recrow=$recresult->fetch_assoc() ;
	$receiver=$recrow['name'];
	$sensql='SELECT * FROM Messages JOIN Users ON Messages.sender_id=Users.id WHERE message_id="'.$_GET['message_id'].'"';
	$senresult=$conn->query($sensql);
	$senrow=$senresult->fetch_assoc() ;
	$sender=$senrow['name'];
	$result=$conn->query($sql);
	if($result->num_rows>0) {
		$row=$result->fetch_assoc();
		if($_SESSION['user_name'] == ($receiver || $sender)) {
			echo("<span>Data: ".$row['message_date']."</span><br>");
			echo('<span>Nadawca: <a href="profile.php?profile_id='.$row['sender_id'].'">'.$sender.'</a></span><br>');
			
			echo('<span>Odbiorca: <a href="profile.php?profile_id='.$row['receiver_id'].'">'.$receiver.'</a></span><br>');
			echo("<p class='message'>
					".$row['message_text']."
				</p>");	
		}
		
		
	}
	
	?>






</main>

<?php 
include ("footer.php");
?>