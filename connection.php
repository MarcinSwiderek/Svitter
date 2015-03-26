<?php
$servername = "127.0.0.1";
$username = "root";
$password = "password";
$baseName = "Svitter";

// Tworzymy nowe połączenie
$conn = @new mysqli($servername, $username, $password, $baseName);
// Sprawdzamy czy połączcenie się udało
if ($conn->connect_error) {
	die("Polaczenie nieudane. Blad: " . $conn->connect_error."<br>");
}


?>