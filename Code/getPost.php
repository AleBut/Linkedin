<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

	echo "Bienvenue dans votre accueil ! <br>";
	echo "Votre ID est " . $ID_user . "<br><br>";

  // Variables 
  $arrayID_user = array();
  $arrayPrenomNom = array();
  $arrayContenu = array();
  $arrayDatePublication = array();
  $arrayLieu = array();
  $arrayModeVisiblite = array();

  // Identifier BDD
  $database = "linkedin";

  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);

  // Si BDD existe
  if($db_found)
  {
    // On stocke les résultats de la requête
    $sql = "SELECT * FROM post";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))    
    {
      array_push($arrayID_user, $data['ID_user']);
      array_push( $arrayContenu, $data['Contenu']);
      array_push($arrayDatePublication, $data['DatePublication']);
      array_push( $arrayLieu, $data['Lieu']);
      array_push($arrayModeVisiblite, $data['ModeVisibilite']);
    }

    // On récupère le prénom et nom de l'auteur
    $size = count($arrayID_user);
    for($i=0; $i<$size; $i++)
    {
      $sql = "SELECT Prenom, Nom FROM utilisateur WHERE ID_user = " . $arrayID_user[$i];
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      array_push($arrayPrenomNom, $data['Prenom'] . " " . $data['Nom']);
    }

    // On affiche les résultats
    for($i=0; $i<$size; $i++)
    {
      echo "Posté par l'utilisateur: " . $arrayPrenomNom[$i] . "<br>";
      echo "Contenu: " . $arrayContenu[$i] . "<br>";
      echo "Date de publication: " . $arrayDatePublication[$i] . "<br>";
      echo "Lieu: " . $arrayLieu[$i] . "<br>";
      echo "ModeVisibilite: " . $arrayModeVisiblite[$i] . "<br><br>";
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

    <!-- >WHAT MATE???? -->
    <title>Votre poste est :</title>

    <!-- Bootstrap core CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Accueil.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

      <!-- Bouton à gauche -->
      <a class="navbar-brand logo" href="#" >ECE'IN</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <form class="form-inline my-2 my-lg-0" action="RechercheAmi.php" method="post">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="recherche" >
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav mr-auto -brand BarBoutons">
          <!-- Bouton accueil ACTIVE -->
          <li class="nav-item active -brand bouton">
            <a class="nav-link" href="Accueil.php">Accueil <span class="sr-only">(current)</span></a>
          </li>
            <!-- Bouton réseau -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="#">Réseau</a>
          </li>
          <!-- Bouton emplois -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="#">Emplois</a>
          </li>
          <!-- Bouton messagerie -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="#">Messagerie</a>
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
            <a class="nav-link" href="#">Deconnexion</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Publiez un post </h1>
          <form action="Accueil.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fichier" />
              <br><br>
              <button type="submit">Connexion</button>
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