<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

	// Variables utilisées
  $arrayIDJob = array();
  $arrayNomOffre = array();
	$arrayDescription = array();
  $arrayEntreprise = array();
  $arrayLocalisation = array();

	// Identifier BDD
	$database = "linkedin";
	// Connecter utilisateur à MYSQL
	$db_handle = mysqli_connect('localhost', 'root', '');
	// Connecter l'utilisateur à la BDD
	$db_found = mysqli_select_db($db_handle, $database);


	// Si BDD existe
	if($db_found)
	{
		// On stocke les résultats de la requête des jobs n'ayant pas trouvé preneur
	    $sql = "SELECT * FROM offre WHERE ID_user_salarie IS NULL";
	    $result = mysqli_query($db_handle, $sql);

	    while($data = mysqli_fetch_assoc($result))    
	    {
        array_push($arrayIDJob, $data['ID_offre']);
        array_push($arrayNomOffre,$data['Nom']);
        array_push($arrayDescription,$data['Description']);
        array_push($arrayEntreprise,$data['Entreprise']);
        array_push($arrayLocalisation,$data['Localisation']);
	    }

	    for($i=0; $i<sizeof($arrayNomOffre); $i++)
	    {
	    	echo "[" . $arrayIDJob[$i] . "] " . $arrayNomOffre[$i] . " chez " . $arrayEntreprise[$i] . " à " . $arrayLocalisation[$i] . "<br>Description: " . $arrayDescription[$i] . "<br>";
        echo "-----------------------<br>";
	    }
	}
	 mysqli_close($db_handle);
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
      
    <title>Messagerie</title>
      
    <!-- Bootstrap core CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Messagerie.css" rel="stylesheet">
  </head>

  <body>
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
          <!-- Bouton messagerie ACTIVE -->
          <li class="nav-item active -brand bouton">
            <a class="nav-link" href="Messagerie.php">Messagerie</a>
          </li>
          <!-- Bouton notifications -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="#">Notifications</a>
          </li>
          <!-- Bouton profil -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Profil.php">Profil</a>
          </li>
          <!-- Bouton Deconnexion -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Deconnexion.php">Deconnexion</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
    	<div class="starter-template">
	        <form method="POST" action="AccepterEmploi.php">
	        	<table>
					<tr>
						<td>ID emploi: </td>
						<td><input type="text" name="emploi"></td>
					</tr>
				</table>
				<input type="submit" name="Accepter l'emploi" value="Accepter l'emploi" >
			</form>
      </div>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  </body>
</html>