<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

  // Variables 
  $arrayID_moi= array();
  $arrayID_amis = array();
  $arrayID_amisamis=array();
  $arrayPrenomNom = array();
  $arrayPrenomSuggestions =array();

  // Identifier BDD
  $database = "linkedin";
  array_push($arrayID_moi,$ID_user);
  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);

  // Si BDD existe
  if($db_found)
  {
    // On stocke les résultats de la requête
    $sql = "SELECT * FROM connexion WHERE ID_user_1 = " .$ID_user. " OR ID_user_2 = " .$ID_user;
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))    
    {
        
      if($data['ID_user_1']!=$ID_user){
          array_push($arrayID_amis,$data['ID_user_1']);
      }
      if($data['ID_user_2']!=$ID_user){
          array_push($arrayID_amis, $data['ID_user_2']);
      }
        
    }

    // On récupère le prénom et nom de l'auteur
    $size = count($arrayID_amis);
    
    for($i=0; $i<$size; $i++)
    {
      $sql = "SELECT * FROM connexion WHERE ID_user_1 = " .$arrayID_amis[$i]. " OR ID_user_2 = " .$arrayID_amis[$i];
      $result = mysqli_query($db_handle, $sql);
      while($data = mysqli_fetch_assoc($result))   
      {
         
        if($data['ID_user_1']!=$arrayID_amis[$i])
          array_push($arrayID_amisamis,$data['ID_user_1']);
        else
          array_push($arrayID_amisamis, $data['ID_user_2']);
      }
    }
    
    // On supprime les doublons
    $arrayID_amisamis = array_unique($arrayID_amisamis);
    $arrayID_amisamis = array_diff($arrayID_amisamis, $arrayID_amis);
    $arrayID_amisamis= array_diff($arrayID_amisamis, $arrayID_moi);
    
    if(count($arrayID_amisamis)==0){
        echo "aucune suggestion <br>";
    }

    foreach ($arrayID_amisamis as $value) 
    {
      $sql = "SELECT Prenom, Nom FROM utilisateur WHERE ID_user = " . $value;
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      array_push($arrayPrenomSuggestions, $data['Prenom'] . " " . $data['Nom']);
    }

    // On affiche les résultats
    for($i=0; $i<count($arrayID_amisamis); $i++)
    {
      echo "Je devrai etre amis avec : " . $arrayPrenomSuggestions[$i] . "<br>";
    }

    $size = count($arrayID_amis);
    for($i=0; $i<$size; $i++)
    {
      $sql = "SELECT Prenom, Nom FROM utilisateur WHERE ID_user = " . $arrayID_amis[$i];
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      array_push($arrayPrenomNom, $data['Prenom'] . " " . $data['Nom']);
    }

    // On affiche les résultats
    for($i=0; $i<$size; $i++)
    {
      echo "Je suis amis avec : " . $arrayPrenomNom[$i] . "<br>";
    }
  }

  mysqli_close($db_handle);

?>
