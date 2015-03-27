<?php
include ("connection.php");
session_start();
if($_SERVER['REQUEST_METHOD']==="POST") {
	if(isset($_POST['post_text'])) {
		$postdate=date('Y-m-d H:i:s');
		
		$sql='INSERT INTO Posts (user_id, post_name, post_input, post_date) VALUES('.$_SESSION['user_id'].',
			 "'.$_POST['post_name'].'","'.$_POST['post_text'].'","'.$postdate.'")';
		$result=$conn->query($sql);
		header("Location:index.php");
	}
}