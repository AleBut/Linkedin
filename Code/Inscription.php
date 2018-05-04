<?php
	// Sauvegarder l'ID
	session_start();

	// isset: vérifie que la donnée existe, équivalente à !empty()
	$email 		= isset($_POST["email"])? $_POST["email"]: "";  // If then else
    $nom        = isset($_POST["nom"])? $_POST["nom"]: "";
    $prenom     = isset($_POST["prenom"])? $_POST["prenom"]: "";
	$password 	= isset($_POST["MDP"])? $_POST["MDP"]: "";
    $date       = isset($_POST["date"])? $_POST["date"]: "";

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
		$sql = "SELECT * FROM utilisateur WHERE Mail = '" .  $email . "'" ;

		// On envoit la requête
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);

		// Si le tableau de resultat est vide le compte n'existe pas encore on peut le créer
		if(empty($data))
		{
            $sql1 = "INSERT INTO utilisateur (Prenom, Nom, Mail, MotDePasse, DateNaissance, DroitsAdmins) VALUES('". $prenom ."', '". $nom. "', '". $email. "', '". $password. "','" . $date . "', 'NON')";
            //On effecte la requèt d'ajout, l'ID stincrémenté automatiquement
            if(mysqli_query($db_handle, $sql1)){
            }
            else{
                echo"error";
            }
            
            // On selectionne l'ID incrémenté du nouvel utilisateur
            $sql = "SELECT ID_user FROM utilisateur WHERE Mail = '" .  $email . "'" ;

            // On envoit la requête
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);

            // Insertion table description
            $sql = "INSERT INTO description (ID_user, Description, CV, PhotoProfil, ImageFond, ModeVisibilite) VALUES ('" . $data['ID_user'] . "', '', '', 'imageProfilDefault.jpg', 'imageBackgroundDefault.jpg','0')";
      		mysqli_query($db_handle, $sql);
            
            //On ouvre la session du nouvel utilisateur grâce a son ID
            $_SESSION['ID_user'] = $data['ID_user'];
            mysqli_close($db_handle);
            header("Refresh: 0; url=Accueil.php");
		}
        //L'adresse est déjà utilisée 
		else
            header("Refresh: 0; url=CreerCompteErrone.html");
	}
?>