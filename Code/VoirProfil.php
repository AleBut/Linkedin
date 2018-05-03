<?php
  // Démarre la session
  session_start();
  $ID_user = isset($_GET["ID"])? $_GET["ID"]: "";

  // Variables utilisées
    // Table utilisateur
  $PrenomNom = "";
  $Mail = "";

    // Table description
  $Description = "Pas encore de description!";
  $PhotoProfil = "imageProfilDefault.jpg";
  $PhotoArrierePlan = "imageBackgroundDefault.jpg";

    // Table experience
  $Emploi = "";

  // Identifier BDD
  $database = "linkedin";
  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);


  // Si BDD existe
  if($db_found)
  {
    // Requete table utilisateur
    $sql = "SELECT * FROM utilisateur WHERE ID_user = " . $ID_user;
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);

    // On récupère Prenom et Nom pour le profil
    $PrenomNom = $data['Prenom'] . " " . $data['Nom'];

    // On récupère le mail
    $Mail = $data['Mail'];


    // Requete table Description
    $sql = "SELECT * FROM description WHERE ID_user = " . $ID_user;
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);

    if(!empty($data))
    {
      $Description = $data['Description'];
      $PhotoProfil = $data['PhotoProfil'];
      $PhotoArrierePlan = $data['ImageFond'];
    }


    // Requete table experience
    $sql = "SELECT * FROM experience WHERE ID_user = " . $ID_user . " ORDER BY DateFin DESC";
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);

    if(!empty($data))
      $Emploi = $data['Entreprise'];
    else
      $Emploi = "Sans emploi";
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
      
    <title>Profil</title>
      
    <!-- Bootstrap core CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Profil.css" rel="stylesheet">
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

    <main role="main" class="container">

      <!-- Photo background + photo profil + prenom/nom -->
      <section class = "background"  style = "background-image: url(<?php echo $PhotoArrierePlan?>);">
        <div >
          <img src= <?php echo $PhotoProfil?>  class = "arrondi pp" height="">
          <h2 class="nom"><?php echo $PrenomNom?></h2>
        </div>
      </section>

      <!-- Statut de la personne + boutons de modification + informations -->
      <section style="margin-top:25px;">
        <div class = "statut">
          <h3>À propos de moi</h3>
          <p>Emploi en cours: <?php echo $Emploi?></p>
        </div>

        <div class = "boutonsp">
          <button class="btn btn-lg  btn-block btngr  " type="submit">Photos</button>
        </div>
        
        <div class = "informations">
          <h3>Informations:</h3>
          <p>Email: <?php echo $Mail?></p>
          <p>CV:</p>
        </div>
      </section>

      <!-- Description de la personne -->
      <section>
         <p>Description: <?php echo $Description?></p>
       </section>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  </body>
</html>