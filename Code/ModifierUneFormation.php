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
		$sql = "SELECT * FROM formation WHERE ID_formation = " .$_GET['ID'];
		// On envoit la requête
        $result = mysqli_query($db_handle, $sql);
        $data=mysqli_fetch_assoc($result);
        if(empty($data)){
           echo"error";
            }
        
        else{
            $TypeFormation = $data['TypeFormation'];
            $NomEcole = $data['NomEcole'];
            $DateArrive = $data['DateArrive'];
            $DateFin = $data['DateFin'];
            $Commentaires = $data['Commentaire'];
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
      
    <form class="form-signin" action="AppliquerModifFormation.php?ID=<?php echo $_GET['ID'] ?>" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Modifier votre Formation</h1>
      <label for="inputText" class="sr-only">Type d'Formation</label>
      <input type="text" class="form-control" placeholder="Type de Formation" value="<?php echo $TypeFormation?>" required autofocus name="TypeFormation">
        <br>
      <label for="inputText" class="sr-only">NomEcole</label>
      <input type="text" class="form-control" placeholder="Nom de l'Ecole" value="<?php echo $NomEcole?>" required autofocus name="NomEcole">
    <br><div style="display: inline;">
          <p style="float: left;"> Date de début</p>
      <input type="date" name="DateArrive" placeholder="Date d'arrivee" value="<?php echo $DateArrive?>" style="text-align : right;">
        <br>
        </div>
        <br><div style="display: inline;">
          <p style="float: left;"> Date de début</p>
      <input type="date" name= "DateFin" placeholder="Date de fin" value="<?php echo $DateFin?>" style="text-align : right;">
        <br><br>
        </div>
      <label for="inputText" class="sr-only">Commentaires</label>
      <input type="text" class="form-control" placeholder="Commentaires" value="<?php echo $Commentaires?>" required autofocus name="Commentaires">
        <br>
        
      <button class="btn btn-success btn-lg btn-block btngr egn " type="submit">Valider</button>
      <a class="btn btn-info btn-lg btn-block egn " href="ModifierFormations.php">Retour</a>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>
</html>