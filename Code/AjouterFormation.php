<?php
	// Sauvegarder l'ID
	session_start();
	$ID_user    = $_SESSION['ID_user'];

	// isset: vérifie que la donnée existe, équivalente à !empty()
    $TypeFormation = isset($_POST["TypeFormation"])? $_POST["TypeFormation"]: "" ;
    $NomEcole     = isset($_POST["NomEcole"])? $_POST["NomEcole"]: "";
    $DateArrive     = isset($_POST["DateArrive"])? $_POST["DateArrive"]: "";
    $DateFin        = isset($_POST["DateFin"])? $_POST["DateFin"]: "";
    $Commentaires   = isset($_POST["Commentaires"])? $_POST["Commentaires"]: "";

	// Identifier BDD
	$database = "linkedin";

	// Connecter utilisateur à MYSQL
	$db_handle = mysqli_connect('localhost', 'root', '');
	// Connecter l'utilisateur à la BDD
	$db_found = mysqli_select_db($db_handle, $database);

    $sql = "INSERT INTO formation (ID_user, TypeFormation, NomEcole, DateArrive, DateFin, Commentaire) VALUES (".$ID_user.", '". $TypeFormation ."', '". $NomEcole ."', '". $DateArrive ."', '". $DateFin ."', '".$Commentaires."')";
    if(mysqli_query($db_handle, $sql)){
        header("Refresh: 0; url=ModifierFormations.php");
    }
    else{
        echo $sql;
        echo "error";
    }

    mysqli_close($db_handle);
?>