<?php
	// Sauvegarder l'ID
	session_start();
	$ID_user    = $_SESSION['ID_user'];

	// isset: vérifie que la donnée existe, équivalente à !empty()
	$email		= isset($_POST["email"])? $_POST["email"]: "";  // If then else
    $nom        = isset($_POST["nom"])? $_POST["nom"]: "";
    $prenom     = isset($_POST["prenom"])? $_POST["prenom"]: "";
	$password 	= isset($_POST["MDP"])? $_POST["MDP"]: "";
    $date       = isset($_POST["date"])? $_POST["date"]: "";
	$connexion = false;

	// Identifier BDD
	$database = "linkedin";

	// Connecter utilisateur à MYSQL
	$db_handle = mysqli_connect('localhost', 'root', '');
	// Connecter l'utilisateur à la BDD
	$db_found = mysqli_select_db($db_handle, $database);

	// Si BDD existe
	if($db_found)
	{
        $sql = "UPDATE utilisateur SET Prenom = '". $prenom ."', Nom = '". $nom ."', Mail = '". $email ."', MotDePasse = '". $password ."', DateNaissance = '". $date. "' WHERE ID_user =". $ID_user. "";
        mysqli_query($db_handle, $sql);
        //On effecte la requèt d'ajout, l'ID stincrémenté automatiquement
        header("Refresh: 0; url=AfficherModifierProfil.php");
        mysqli_close($db_handle);
	}
?>