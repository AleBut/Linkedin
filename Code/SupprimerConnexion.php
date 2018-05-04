<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

  $ID_supprime = isset($_GET["ID"])? $_GET["ID"]: "";

  // Identifier BDD
  $database = "linkedin";

  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);

  // Si BDD existe
  if($db_found)
  {
    $sql = "DELETE FROM connexion WHERE ( ID_user_1 = '" . $ID_user . "' AND ID_user_2 = '" . $ID_supprime . "') OR ( ID_user_1 = '" . $ID_supprime . "' AND ID_user_2 = '" . $ID_user . "')";

    mysqli_query($db_handle, $sql);
  }
  mysqli_close($db_handle);

  header("Refresh: 0; url=AfficherAmis.php");
?>