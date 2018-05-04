<?php
	// Sauvegarder l'ID
	session_start();
	$ID_user    = $_SESSION['ID_user'];

    //Arrays internes
    $arrayID_user = array();
    $arrayID_formation = array();
    $arrayTypeFormation = array();
    $arrayNomEcole = array();
    $arrayDateArrive = array();
    $arrayDateFin = array();
    $arrayCommentaires = array();
    $cpt = 0;
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
		$sql2 = "SELECT * FROM formation WHERE ID_user = " .  $ID_user . "";

		// On envoit la requête
		$result2 = mysqli_query($db_handle, $sql2);

		// Si le tableau de resultat est vide
        while($data2 = mysqli_fetch_assoc($result2))    
	    {	          
            array_push($arrayID_user,$data2['ID_user']);
            array_push($arrayID_formation,$data2['ID_formation']);
            array_push($arrayTypeFormation,$data2['TypeFormation']);
            array_push($arrayNomEcole,$data2['NomEcole']);
            array_push($arrayDateArrive,$data2['DateArrive']);
            array_push($arrayDateFin,$data2['DateFin']);
            array_push($arrayCommentaires,$data2['Commentaire']);
            $cpt++;
	    }

	}
?> 
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
  <body class="text-center">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

      <!-- Bouton à gauche -->
      <a class="navbar-brand logo" href="Accueil.php" >ECE'IN</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav mr-auto -brand BarBoutons">
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Accueil.php">Accueil <span class="sr-only">(current)</span></a>
          </li>
            <!-- Bouton réseau -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Reseau.php">Réseau</a>
          </li>
          <!-- Bouton emplois -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Emplois.php">Emplois</a>
          </li>
          <!-- Bouton messagerie -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Messagerie.php">Messagerie</a>
          </li>
          <!-- Bouton notifications -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Notifications.php">Notifications</a>
          </li>
          <!-- Bouton profil ACTIVE-->
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
    <form class="form-signin" action="ModifierFormations.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Vos Formations</h1>
         
        <?php for($i=0;$i<$cpt;$i++){ ?>
        <div class="card text-center text-white bg-secondary mb-3" style="width: 500px; margin-left: -100px">
          <div class="card-header"><?php echo $arrayTypeFormation[$i]?> à <?php echo $arrayNomEcole[$i]?> </div>
          <div class="card-body">
            <p class="card-text">Du : <?php echo $arrayDateArrive[$i]?> au <?php echo $arrayDateFin[$i]?></p>
            <p class="card-text">Commentaires : <?php echo $arrayCommentaires[$i]?></p>
            <a href="SupprimerFormation.php?ID=<?php echo $arrayID_formation[$i]?>" class="btn btn-primary">Supprimer</a>
            <a href="ModifierUneFormation.php?ID=<?php echo $arrayID_formation[$i]?>" class="btn btn-primary">Modifier</a>
          </div>
        </div>
        <?php } ?>
    <a href="AjouterFormation.html" class="btn btn-primary">Ajouter une Formation</a><br><br>
    <a class="btn btn-info btn-lg btn-block egn " href="AfficherModifierProfil.php">Retour</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>     
    </form>
      
  </body>

</html>