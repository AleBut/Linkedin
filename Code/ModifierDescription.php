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
		$sql = "SELECT * FROM description WHERE ID_user = " .$ID_user;
		// On envoit la requête
        $result = mysqli_query($db_handle, $sql);
        $data=mysqli_fetch_assoc($result);
        if(empty($data)){
           echo"error";
            }
        
        else{
            $Description = $data['Description'];
            $CV = $data['CV'];
            $PhotoProfil = $data['PhotoProfil'];
            $ImageFond = $data['ImageFond'];
            }
	}
?>
           
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

  <body class="text-center" >
      
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
      
    <form class="form-signin form-signin2" action="AppliquerModifDescription.php" method="post" enctype="multipart/form-data">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Modifier votre Description</h1>
      <label for="inputText" class="sr-only">Description</label>
      <textarea type="text" rows="5" class="form-control" placeholder="Nouvelle description" name="Description"></textarea>
        <br>
        
        <div class="card text-center text-white bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header">Curriculum Vitae :</div>
          <div class="card-body">
            <input type="file" name="CV"/>
          </div>
        </div>
        
        <div class="card text-center text-white bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header">Photo de profil :</div>
          <div class="card-body">
            <input type="file" name="PhotoProfil"/>
          </div>
        </div>
        
        <div class="card text-center text-white bg-secondary mb-3" style="max-width: 18rem;">
          <div class="card-header">Image de fond :</div>
          <div class="card-body">
            <input type="file" name="ImageFond"/>
          </div>
        </div>
        
      <button class="btn btn-lg btn-block btngr egn " type="submit" >Valider</button>
      <a class="btn btn-info btn-lg btn-block egn " href="AfficherModifierProfil.php">Retour</a>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>
</html>