<?php
	// Sauvegarder l'ID
	session_start();
	$ID_user    = $_SESSION['ID_user'];


	// isset: vérifie que la donnée existe, équivalente à !empty()
    $Description    = isset($_POST["Description"])? $_POST["Description"]: "" ;
    $CV = $_FILES['CV']['name'];
    $PhotoProfil    = $_FILES['PhotoProfil']['name'];
    $ImgeFond       = $_FILES['ImageFond']['name'];
	// Identifier BDD
	$database = "linkedin";

	// Connecter utilisateur à MYSQL
	$db_handle = mysqli_connect('localhost', 'root', '');
	// Connecter l'utilisateur à la BDD
	$db_found = mysqli_select_db($db_handle, $database);

    $sql = "UPDATE description SET Description = '". $Description ."', CV = '". $CV ."', PhotoProfil= '". $PhotoProfil."', ImageFond = '". $ImgeFond ."' WHERE ID_user =".$ID_user;
    
if(mysqli_query($db_handle, $sql)){
        header("Refresh: 0; url=AfficherModifierProfil.php");
    }
    else{
        echo $sql;
    }

    mysqli_close($db_handle);
?>