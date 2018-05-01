<?php
	// isset: vérifie que la donnée existe, équivalente à !empty()
	$email 		= isset($_POST["email"])? $_POST["email"]: "";  // If then else
	$password 	= isset($_POST["MDP"])? $_POST["MDP"]: "";

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
		// On écrit la requête SQL
		$sql = "SELECT ID_user FROM utilisateur WHERE Mail = '" .  $email . "' AND MotDePasse = '" . $password . "'";

		// On envoit la requête
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);

		// Si le tableau de resultat est vide
		if(empty($data))
		{
			header('Refresh: 0; url=LoginErrone.html');
		}
		else
		{
			header('Refresh: 0; url=Login.html');
			$connexion = true;
		}
	}
?>