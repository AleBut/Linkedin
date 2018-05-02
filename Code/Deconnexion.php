<?php
	// Detruis la session
	session_start();
	unset($_SESSION['ID_user']);
	session_destroy();

	// Retourne au login
	header("Refresh: 0; url=Login.html");

?>