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

		// Si le tableau de resultat est vide le compte n'existe pas encore on peut le créer
		if(empty($data))
		{
            $sql = "UPDATE utilisateur SET Prenom = '". $prenom ."', Nom = '". $nom ."', Mail = '". $email ."', MotDePasse = '". $password ."', DateNaissance = '". $date. "' WHERE ID_user =". $ID_user. "";
            //On effecte la requèt d'ajout, l'ID stincrémenté automatiquement
            if(mysqli_query($db_handle, $sql)){
            }
            else{
                echo"error";
            }
            
            //On ouvre la session du nouvel utilisateur grâce a son ID
            //header("Refresh: 0; url=Profil.php");
            $connexion = true;
            mysqli_close($db_handle);
		}
        //L'adresse est déjà utilisée 
		else
		{
            header("Refresh: 0; url=CreerCompteErrone.html");

		}
	}
?>