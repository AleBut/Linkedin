<?php

	session_start();
	$ID_user    = $_SESSION['ID_user'];

	// Identifier BDD
	$database = "linkedin";
	// Connecter utilisateur à MYSQL
	$db_handle = mysqli_connect('localhost', 'root', '');
	// Connecter l'utilisateur à la BDD
	$db_found = mysqli_select_db($db_handle, $database);

	$message = isset($_POST['ameliorer'])? $_POST['ameliorer']: "";

	if($_FILES['fichier']['error'] == 0 && $message =="Publiez ce que vous voulez" ) // Photo
	{
	    $contenu = '<div><img src=' . $_FILES['fichier']['name'] . ' alt="" height="200" width"220" style="margin-left : 50px;"/></div>';
	}
	if($_FILES['fichier']['error']>0 && $message !="Publiez ce que vous voulez"  ) // texte
	{
	    $contenu = '<div style="width : 400px;"><p style="text-align : center;">'. $message .'</p></div>';
	}
	if($_FILES['fichier']['error']==0 && $message !="Publiez ce que vous voulez"  ) // texte et photo
	{
	    $contenu = '<div style="width : 400px;"><p style="text-align : center;">'. $message .'</p><img src='.$_FILES['fichier']['name'].' alt="" height="200" width"220" style="margin-left : 50px;"/></div>';
	}
	if($_FILES['fichier']['error']>0 && $message =="Publiez ce que vous voulez"  )
	{
	    $contenu = "";
	}

	// Si BDD existe
	  if( $db_found && (strlen($contenu) > 0) )
	  {
	    // Requete table post
	    $sql = "INSERT INTO post (ID_user, Contenu, DatePublication, Lieu, ModeVisibilite) VALUES ('" . $ID_user ."', '". $contenu ."', CURRENT_TIMESTAMP, 'Paris', '0')";
	    mysqli_query($db_handle, $sql);
	}
	mysqli_close($db_handle);

  	header("Refresh: 0; url=Accueil.php");
?>
