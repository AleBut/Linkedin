<?php
  // Démarre la session
  session_start();
  $ID_user = $_SESSION['ID_user'];

  // Récupérer les prénoms du correspondant
  $Prenom_post ="";
  $Photo_post ="";

  
  $array_Post = array();
  $array_Posteurs =  array();
 $array_Posteurs =  array();
  $arrayID_amis = array();

  // Identifier BDD
  $database = "linkedin";
  // Connecter utilisateur à MYSQL
  $db_handle = mysqli_connect('localhost', 'root', '');
  // Connecter l'utilisateur à la BDD
  $db_found = mysqli_select_db($db_handle, $database);


  // Si BDD existe
  if($db_found)
  { 
 // On stocke les résultats de la requête (recherches amis)
    $sql = "SELECT * FROM connexion WHERE ID_user_1 = " .$ID_user. " OR ID_user_2 = " .$ID_user;
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))    
    {
      if($data['ID_user_1']!=$ID_user)
          array_push($arrayID_amis, $data['ID_user_1']);
      else
          array_push($arrayID_amis, $data['ID_user_2']);
    }

    // On récupére les amis de nos amis
    $size = count($arrayID_amis);
    // Requete historique des messages entre l'utilisateur et le destinateur
    $sql = "SELECT * FROM post ORDER BY DatePublication DESC";
    $result = mysqli_query($db_handle, $sql);

    while($data = mysqli_fetch_assoc($result))    
    {
        array_push($array_Post, $data['Contenu']); // Si c'est envoyé par le destinataire
   
      array_push($array_Posteurs, $data['ID_user']);
    }
 echo' <div class="starter-template boxsuggestion">
        <h1>Publiez un post </h1>
          <form action="TraitementPost.php" method="post" enctype="multipart/form-data">
                  <textarea name="ameliorer" id="ameliorer" rows="3" cols="35">Publiez ce que vous voulez</textarea>     <br><br>
        <input type="file" name="fichier" />
              <br><br>
              <button class="boutona btn btngr" type="submit"> Publier </button>
          </form>
      </div><br>';
    for($i = 0; $i < sizeof($array_Post); $i++)
    {
     $sql = "SELECT PhotoProfil FROM description WHERE ID_user = ".$array_Posteurs[$i]."";
    $result = mysqli_query($db_handle, $sql);

    while($data = mysqli_fetch_assoc($result))    
    {
        $Photo_post=$data['PhotoProfil'];
    }  
       $sql = "SELECT Prenom FROM utilisateur WHERE ID_user = ".$array_Posteurs[$i]."";
    $result = mysqli_query($db_handle, $sql);

    while($data = mysqli_fetch_assoc($result))    
    {
        $Prenom_post=$data['Prenom'];
    }  
        for($f = 0; $f < sizeof($arrayID_amis); $f++){
            if($arrayID_amis[$f] == $array_Posteurs[$i]){
      echo '<div class="starter-template boxpost">
            <img src='.$Photo_post.' height="50" width="50" class="Afficher" style="float : left; margin-right:10px; margin-top : 10px; margin-left : 5px;" />
             <p class="texte" style="margin-top : 10px;"> '.$array_Post[$i].'</p>
            </div><br>';
            }
        }
        if($array_Posteurs[$i]==$ID_user){
             echo '<div class="starter-template boxpost">
            <img src='.$Photo_post.' height="50" width="50" class="Afficher" style="float : left; margin-right:10px; padding-top:10px; margin-left : 5px;" />
             <p class="texte" style="margin-top:10px;"> '.$array_Post[$i].'</p>
            </div><br>';
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
    <link href="CSSacc.css" rel="stylesheet">
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
          <!-- Bouton accueil ACTIVE -->
          <li class="nav-item active -brand bouton">
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

     

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  </body>
</html>