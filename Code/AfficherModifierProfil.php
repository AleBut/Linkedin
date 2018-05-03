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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

      <!-- Bouton à gauche -->
      <a class="navbar-brand logo" href="#" >ECE'IN</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav mr-auto -brand BarBoutons">
          <!-- Bouton accueil -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Accueil.php">Accueil <span class="sr-only">(current)</span></a>
          </li>
            <!-- Bouton réseau -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="AfficherAmis.php">Réseau</a>
          </li>
          <!-- Bouton emplois -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="#">Emplois</a>
          </li>
          <!-- Bouton messagerie -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Messagerie.php">Messagerie</a>
          </li>
          <!-- Bouton notifications -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="#">Notifications</a>
          </li>
          <!-- Bouton profil ACTIVE -->
          <li class="nav-item active -brand bouton">
            <a class="nav-link" href="Profil.php">Profil</a>
          </li>
          <!-- Bouton Deconnexion -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Deconnexion.php">Deconnexion</a>
          </li>
        </ul>
      </div>
    </nav>
      
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
        <div>
            <a class="btn btn-primary btn-sm btn-block" href="ModifierExperiences.php">Modifier vos Experiences</a>
            <br>
            <a class="btn btn-primary btn-sm btn-block" href="ModifierFormations.php" >Modifier vos Formations</a> 
        </div>
        <br>
      <button class="btn btn-lg btn-block btngr egn " type="submit">Valider</button>
      <a class="btn btn-info btn-lg btn-block egn " href="Profil.php">Retour</a>


      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>
</html>