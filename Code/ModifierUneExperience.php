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
		$sql = "SELECT * FROM experience WHERE ID_experience = " .$_GET['ID'];
		// On envoit la requête
        $result = mysqli_query($db_handle, $sql);
        $data=mysqli_fetch_assoc($result);
        if(empty($data)){
           echo"error";
            }
        
        else{
            $TypeExperience = $data['TypeExperience'];
            $Entreprise = $data['Entreprise'];
            $DateArrive = $data['DateArrive'];
            $DateFin = $data['DateFin'];
            $Localisation = $data['Localisation'];
            $Commentaires = $data['Commentaires'];
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

  <body class="text-center" id="bckg">
    <form class="form-signin" action="AppliquerModifExperience.php?ID=<?php echo $_GET['ID'] ?>" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Modifier votre Experience</h1>
      <label for="inputText" class="sr-only">Type d'Experience</label>
      <input type="text" class="form-control" placeholder="Type d'Experience" value="<?php echo $TypeExperience?>" required autofocus name="TypeExperience">
        <br>
      <label for="inputText" class="sr-only">Entreprise</label>
      <input type="text" class="form-control" placeholder="Entreprise" value="<?php echo $Entreprise?>" required autofocus name="Entreprise">
        <br>
    <label for="inputText" class="sr-only">Localisation</label>
      <input type="text" class="form-control" placeholder="Localisation" value="<?php echo $Localisation?>" required autofocus name="Localisation">
        <br>
      <input type="date" name="DateArrive" placeholder="Date d'arrivee" value="<?php echo $DateArrive?>" style="text-align : right;">
        <br><br>
      <input type="date" name= "DateFin" placeholder="Date de fin" value="<?php echo $DateFin?>" style="text-align : right;">
        <br><br>
      <label for="inputText" class="sr-only">Commentaires</label>
      <input type="text" class="form-control" placeholder="Commentaires" value="<?php echo $Commentaires?>" required autofocus name="Commentaires">
        <br>
        
      <button class="btn btn-lg btn-block btngr egn " type="submit">Valider</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>
</html>