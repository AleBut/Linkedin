<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

  $ID_accepte = isset($_GET["ID"])? $_GET["ID"]: "";

  // Identifier BDD
  $database = "linkedin";

  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);

  // Si BDD existe
  if($db_found)
  {
    // On efface la demande de connection
    $sql = "DELETE FROM demandeconnexion WHERE ( ID_expediteur = '" . $ID_user . "' AND ID_destinataire = '" . $ID_accepte . "') OR ( ID_expediteur = '" . $ID_accepte . "' AND ID_destinataire = '" . $ID_user . "')";

    mysqli_query($db_handle, $sql);

    // On accepte la demande de connexion
    $sql = "INSERT INTO connexion (ID_user_1, ID_user_2) VALUES (" . $ID_user . ", " . $ID_accepte . ")";

    mysqli_query($db_handle, $sql);
  }
  mysqli_close($db_handle);

  header("Refresh: 0; url=Notifications.php");
?>