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
		$sql = "SELECT * FROM utilisateur WHERE ID_User = " .  $ID_user . "";

		// On envoit la requête
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);

		// Si le tableau de resultat est vide
		if(empty($data))
		{
			header("Refresh: 0; url=LoginErrone.html");
		}
		else
		{
            $email 		= $data['Mail'];  // If then else
            $nom        = $data['Nom'];
            $prenom     = $data['Prenom'];
            $password 	= $data['MotDePasse'];
            $date       = $data['DateNaissance'];
		}
        
        // On écrit la requête SQL
		$sql2 = "SELECT * FROM experience WHERE ID_User = " .  $ID_user . "";

		// On envoit la requête
		$result2 = mysqli_query($db_handle, $sql2);
		$data2 = mysqli_fetch_assoc($result2);

		// Si le tableau de resultat est vide
		if(empty($data))
		{
			header("Refresh: 0; url=LoginErrone.html");
		}
		else
		{
            //$experiences[] = array($data2);
            $experience = $data2['TypeExperience'];
		} 
        
        // On écrit la requête SQL
		$sql3 = "SELECT * FROM formation WHERE ID_User = " .  $ID_user . "";

		// On envoit la requête
		$result3 = mysqli_query($db_handle, $sql3);
		$data3 = mysqli_fetch_assoc($result3);

		// Si le tableau de resultat est vide
		if(empty($data))
		{
			header("Refresh: 0; url=LoginErrone.html");
		}
		else
		{
            
		}
	}
?>

<!--Source GetBootstrap-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LinkedInECE</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="ModifierProfil.php" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Modifier vos informations</h1>
      <label for="inputEmail" class="sr-only">Votre Adresse mail</label>
      <input type="email" class="form-control" placeholder="Adresse Email" value="<?php echo $email?>" required autofocus name="email">
        <br>
      <label for="inputText" class="sr-only">Votre Nom </label>
      <input type="text" class="form-control" placeholder="Votre nom" value="<?php echo $nom?>" required autofocus name="nom">
        <br>
        <label for="inputText" class="sr-only">Votre Prénom </label>
      <input type="text" class="form-control" placeholder="Votre Prénom" value="<?php echo $prenom?>" required autofocus name="prenom">
        <br>
      <label for="inputPassword" class="sr-only">Mot de Passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Mot de Passe" value="<?php echo $password?>" required name="MDP">
        <br>
      <input type="date" name="date" placeholder="jj/mm/aaaa" value="<?php echo $date?>" style="text-align : right;">
        <br> <br>
        <div  style="inline">
            <a class="btn btn-secondary" href="ModifierExperiences.php" >Modifier vos Experiences</a>
            <br> <br>
            <a class="btn btn-secondary" href="ModifierFormations.php" >Modifier vos Formations</a> 
        </div>
        <br>
      <button class="btn btn-lg btn-block btngr egn " type="submit">Valider</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>
</html>