<?php
session_start();
/*
$_SESSION['user_id']=NULL;
$_SESSION['user_name']=NULL;
*/
session_destroy();
header("Location: index.php");
?>