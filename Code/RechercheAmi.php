<?php
	// Démarre la session
	session_start();
	$ID_user = $_SESSION['ID_user'];
 $Recherche = isset($_POST["recherche"])? $_POST["recherche"]: "" ;
  // Variables 
$arrayID_amisamis=array(); // ID suggestions
  $arrayID_amisamis1=array(); // ID suggestions
$arrayID_amis=array(); // ID suggestions
  $arrayPrenomSuggestions =array(); // Prenom des suggestions
  $arrayPhotoProfilSuggestions = array(); // Photo de profil des suggestions

  // Identifier BDD
  $database = "linkedin";
  
  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);

  // Si BDD existe
  if($db_found)
  {
       $sql = "SELECT * FROM connexion WHERE ID_user_1 = " .$ID_user. " OR ID_user_2 = " .$ID_user;
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))    
    {
      if($data['ID_user_1']!=$ID_user)
          array_push($arrayID_amis, $data['ID_user_1']);
      else
          array_push($arrayID_amis, $data['ID_user_2']);
    }
if($Recherche!=""){
    // On stocke les résultats de la requête (recherches demandes amis)
    $sql = "SELECT ID_user FROM utilisateur WHERE Prenom LIKE '".$Recherche."%'";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))   
    {
          if($data['ID_user']!=$ID_user)
          array_push($arrayID_amisamis1, $data['ID_user']);
    }
     $sql = "SELECT ID_user FROM utilisateur WHERE Nom LIKE '".$Recherche."%'";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))   
    {
        if($data['ID_user']!=$ID_user)
          array_push($arrayID_amisamis1, $data['ID_user']);
    }
    $arrayID_amisamis1 = array_unique($arrayID_amisamis1);
     $arrayID_amisamis1 = array_diff($arrayID_amisamis1, $arrayID_amis);
 
    foreach ($arrayID_amisamis1 as $value) 
    {
        array_push($arrayID_amisamis,$value);
      $sql = "SELECT * FROM utilisateur WHERE ID_user = " . $value;
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      array_push($arrayPrenomSuggestions, $data['Prenom'] . " " . $data['Nom']);
    }

    // On récupère leur photo de profil
    foreach ($arrayID_amisamis as $value) 
    {
      $sql = "SELECT * FROM description WHERE ID_user = " . $value;
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);

      if(!empty($data))
        array_push($arrayPhotoProfilSuggestions, $data['PhotoProfil']);
      else
        array_push($arrayPhotoProfilSuggestions,"imageProfilDefault.jpg");
    }
    
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

    <title>Accueil</title>

    <!-- Bootstrap core CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="AfficherAmis.css" rel="stylesheet">
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
          <!-- Bouton accueil -->
          <li class="nav-item -brand bouton">
            <a class="nav-link" href="Accueil.php">Accueil <span class="sr-only">(current)</span></a>
          </li>
            <!-- Bouton réseau ACTIVE -->
          <li class="nav-item active -brand bouton">
            <a class="nav-link" href="AfficherAmis.php">Réseau</a>
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

    <div class="boxsuggestion">
      <h2 style="text-align: center; color:cadetblue"> Votre Recherche</h2><br>

      <?php for($i=0; $i<sizeof($arrayID_amisamis); $i++) { ?>
        
        <img src=<?php echo $arrayPhotoProfilSuggestions[$i] ?> height="50" width="50"  class="Afficher"/>
        <p class="texte"><?php echo $arrayPrenomSuggestions[$i] ?></p>
        
        <a href="AjouterAmi.php?ID=<?php echo $arrayID_amisamis[$i] ?>"><button class="boutona btn btngr  "> Ajouter</button></a>
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
