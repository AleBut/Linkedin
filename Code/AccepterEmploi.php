<?php
  // Démarre la session
  session_start();
  $ID_user = $_SESSION['ID_user'];


  // Récupérer l'ID de l'emploi
  $ID_emploi = isset($_GET["emploi"])? $_GET["emploi"]: "";
    

  // Identifier BDD
  $database = "linkedin";
  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);


  // Si BDD existe
  if($db_found)
  {
    // Requete table offre pour acutaliser l'offre'
    $sql = "UPDATE offre SET ID_user_salarie = " .  $ID_user . " WHERE ID_offre = " . $ID_emploi;
    mysqli_query($db_handle, $sql);

    // Requete table offre pour récupérer les infos de l'offre
    $sql = "SELECT * FROM offre WHERE ID_offre = " . $ID_emploi;
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);

    // Requete table experience pour ajouter le job 
    $sql = "INSERT INTO experience (ID_user, TypeExperience, Entreprise, DateArrive, DateFin, Localisation, Commentaires) VALUES ('" . $ID_user . "', '" . $data['Nom'] . "', '" . $data['Entreprise'] . "', CURDATE(), CURDATE(), '" . $data['Localisation'] . "', '" . $data['Description'] . "') ";

    mysqli_query($db_handle, $sql);
  }

    mysqli_close($db_handle);

    header("Refresh: 0; url=Emplois.php");
?>