<?php
	// Sauvegarder l'ID
	session_start();
	$ID_user    = $_SESSION['ID_user'];

	// isset: vérifie que la donnée existe, équivalente à !empty()
    $TypeExperience = isset($_POST["TypeExperience"])? $_POST["TypeExperience"]: "" ;
    $Entreprise     = isset($_POST["Entreprise"])? $_POST["Entreprise"]: "";
    $DateArrive     = isset($_POST["DateArrive"])? $_POST["DateArrive"]: "";
    $DateFin        = isset($_POST["DateFin"])? $_POST["DateFin"]: "";
    $Localisation   = isset($_POST["Localisation"])? $_POST["Localisation"]: "";
    $Commentaires   = isset($_POST["Commentaires"])? $_POST["Commentaires"]: "";

	// Identifier BDD
	$database = "linkedin";

	// Connecter utilisateur à MYSQL
	$db_handle = mysqli_connect('localhost', 'root', '');
	// Connecter l'utilisateur à la BDD
	$db_found = mysqli_select_db($db_handle, $database);

    $sql = "INSERT INTO experience (ID_user, TypeExperience, Entreprise, DateArrive, DateFin, Localisation, Commentaires) VALUES (".$ID_user.", '". $TypeExperience ."', '". $Entreprise ."', '". $DateArrive ."', '". $DateFin ."', '". $Localisation."', '".$Commentaires."')";
    if(mysqli_query($db_handle, $sql)){
        header("Refresh: 0; url=ModifierExperiences.php");
    }
    else{
        echo "error";
    }

    mysqli_close($db_handle);
?>