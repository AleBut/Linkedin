<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];

  // Variables
  $demandeAmis = array(); // Demande en attente
  $demandeAmisPrenomNom = array(); // Nom Prenom
  $demandeAmisPhotoProfil = array(); // Photo profil

  $requeteAmis = array(); // Demande à approuver
  $requeteAmisPrenomNom = array(); // Nom Prenom
  $requeteAmisPhotoProfil = array(); // Photo profil


  // Identifier BDD
  $database = "linkedin";
  
  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);

  // Si BDD existe
  if($db_found)
  {
    // On stocke les résultats de la requête (recherches demandes amis à accepter)
    $sql = "SELECT * FROM demandeconnexion WHERE ID_destinataire = " .$ID_user . " ORDER BY Date";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))    
    {
      array_push($requeteAmis, $data['ID_expediteur']);
    }

    // On récupère le Prenom / Nom des demandes d'amis à accepter
    foreach ($requeteAmis as $value) 
    {
      $sql = "SELECT Prenom, Nom FROM utilisateur WHERE ID_user = " . $value;
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      array_push($requeteAmisPrenomNom, $data['Prenom'] . " " . $data['Nom']);
    }

    // On récupère les photos de profil des demandes d'amis à accepter
    foreach ($requeteAmis as $value) 
    {
      $sql = "SELECT * FROM description WHERE ID_user = " . $value;
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      if(!empty($data))
        array_push($requeteAmisPhotoProfil, $data['PhotoProfil']);
      else
        array_push($requeteAmisPhotoProfil,"imageProfilDefault.jpg");
    }


    // On stocke les résultats de la requête (demandes amis en attente)
    $sql = "SELECT * FROM demandeconnexion WHERE ID_expediteur = " .$ID_user . " ORDER BY Date";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))    
    {
      array_push($demandeAmis, $data['ID_destinataire']);
    }

    // On récupère le Prenom / Nom des demandes d'amis à accepter
    foreach ($demandeAmis as $value) 
    {
      $sql = "SELECT Prenom, Nom FROM utilisateur WHERE ID_user = " . $value;
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      array_push($demandeAmisPrenomNom, $data['Prenom'] . " " . $data['Nom']);
    }

    // On récupère les photos de profil des demandes d'amis à accepter
    foreach ($demandeAmis as $value) 
    {
      $sql = "SELECT * FROM description WHERE ID_user = " . $value;
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      if(!empty($data))
        array_push($demandeAmisPhotoProfil, $data['PhotoProfil']);
      else
        array_push($demandeAmisPhotoProfil,"imageProfilDefault.jpg");
    }
  }

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Notifications</title>

    <!-- Bootstrap core CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Notifications.css" rel="stylesheet">
  </head>

  <body>

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
          <!-- Bouton accueil  -->
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
          <!-- Bouton notifications ACTIVE -->
          <li class="nav-item active -brand bouton">
            <a class="nav-link" href="Notifications.php">Notifications</a>
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

    <div class="boxsuggestion">
      <h2 style="text-align: center; color:cadetblue"> Demandes envoyées: </h2><br>

      <?php for($i=0; $i<sizeof($demandeAmis); $i++) { ?>
        <img src=<?php echo $demandeAmisPhotoProfil[$i] ?> height="50" width="50"  class="Afficher"/>
        <p class="texte"><?php echo $demandeAmisPrenomNom[$i] ?></p>
        <a href="RefuserDemande.php?ID=<?php echo $demandeAmis[$i] ?>"><button class="boutona btn btngr  "> Annuler</button></a>
        <br><br>
      <?php } ?>
    </div><br>

    <div class="boxsuggestion">
      <h2 style="text-align: center; color:cadetblue"> Demandes à approuver: </h2><br>

      <?php for($i=0; $i<sizeof($requeteAmis); $i++) { ?>
        <img src=<?php echo $requeteAmisPhotoProfil[$i] ?> height="50" width="50"  class="Afficher"/>
        <p class="texte"><?php echo $requeteAmisPrenomNom[$i] ?></p>
        <a href="AccepterDemande.php?ID=<?php echo $requeteAmis[$i] ?>"><button class="boutona btn btngr  "> Accepter</button></a>
        <a href="RefuserDemande.php?ID=<?php echo $requeteAmis[$i] ?>"><button class="boutona btn btngr  "> Refuser</button></a>
        <br><br>
      <?php } ?>
    </div><br>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  </body>
</html>