<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

  $ID_refuse = isset($_GET["ID"])? $_GET["ID"]: "";

  // Identifier BDD
  $database = "linkedin";

  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);

  // Si BDD existe
  if($db_found)
  {
    $sql = "DELETE FROM demandeconnexion WHERE ( ID_expediteur = '" . $ID_user . "' AND ID_destinataire = '" . $ID_refuse . "') OR ( ID_expediteur = '" . $ID_refuse . "' AND ID_destinataire = '" . $ID_user . "')";

    mysqli_query($db_handle, $sql);
  }
  mysqli_close($db_handle);

  header("Refresh: 0; url=Notifications.php");
?>