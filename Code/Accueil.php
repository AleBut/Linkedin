<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

	echo "Bienvenue dans votre accueil ! <br>";
	echo "Votre ID est " . $ID_user;
?>

<!DOCTYPE html>
<html>

</html>