<?php
	// Sauvegarder l'ID
	session_start();
	$ID_user    = $_SESSION['ID_user'];

    //Arrays internes
    $arrayID_user = array();
    $arrayID_Experience = array();
    $arrayTypeExperience = array();
    $arrayEntreprise = array();
    $arrayDateArrive = array();
    $arrayDateFin = array();
    $arrayLocalisation = array();
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
		$sql2 = "SELECT * FROM experience WHERE ID_user = " .  $ID_user . "";

		// On envoit la requête
		$result2 = mysqli_query($db_handle, $sql2);

		// Si le tableau de resultat est vide
        while($data2 = mysqli_fetch_assoc($result2))    
	    {	          
            array_push($arrayID_user,$data2['ID_user']);
            array_push($arrayID_Experience,$data2['ID_experience']);
            array_push($arrayTypeExperience,$data2['TypeExperience']);
            array_push($arrayEntreprise,$data2['Entreprise']);
            array_push($arrayDateArrive,$data2['DateArrive']);
            array_push($arrayDateFin,$data2['DateFin']);
            array_push($arrayLocalisation,$data2['Localisation']);
            array_push($arrayCommentaires,$data2['Commentaires']);
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

  <body class="text-center" id="bckg">
    <form class="form-signin" action="ModifierExperiences.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Modifier vos Experiences</h1>
         
        <?php for($i=0;$i<$cpt;$i++){ ?>
        <div class="card text-center text-white bg-secondary mb-3" style="width: 500px; margin-left: -100px">
          <div class="card-header"><?php echo $arrayTypeExperience[$i]?> chez <?php echo $arrayEntreprise[$i]?> - <?php echo $arrayLocalisation[$i]?> </div>
          <div class="card-body">
            <p class="card-text">Du : <?php echo $arrayDateArrive[$i]?> au <?php echo $arrayDateFin[$i]?></p>
            <p class="card-text">Commentaires : <?php echo $arrayCommentaires[$i]?></p>
            <a href="#" class="btn btn-primary">Supprimer</a>
            <a href="#" class="btn btn-primary">Modifier</a>
          </div>
        </div>
        <?php } ?>
    <a href="#" class="btn btn-primary">Ajouter une Experience</a><br><br>
    <button class="btn btn-lg btn-block btngr egn " type="submit">Valider</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>

</html>