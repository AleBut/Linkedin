<?php
	// Sauvegarder l'ID
	session_start();
	$ID_user    = $_SESSION['ID_user'];

	// Identifier BDD
	$database = "linkedin";

	// Connecter utilisateur à MYSQL
	$db_handle = mysqli_connect('localhost', 'root', '');
	// Connecter l'utilisateur à la BDD
	$db_found = mysqli_select_db($db_handle, $database);

	// Si BDD existe
	if($db_found)
	{ 
        // On écrit la requête SQL
		$sql = "DELETE FROM formation WHERE ID_formation = " .$_GET['ID'];
		// On envoit la requête
        if(mysqli_query($db_handle, $sql)){
            header("Refresh: 0; url=ModifierFormations.php");
            }
        
        else{
            echo"error";
            }
	}
?>
	