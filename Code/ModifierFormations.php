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
    <form class="form-signin" action="ModifierFormations.php" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Modifier vos Formations</h1>
      <label for="inputEmail" class="sr-only">Votre Adresse mail</label>
      <input type="email" class="form-control" placeholder="Adresse Email" value="<?php echo $email?>" required autofocus name="email">
        <br>
      <label for="inputText" class="sr-only">Votre Nom </label>
      <input type="text" class="form-control" placeholder="Votre nom" value="<?php echo $nom?>" required autofocus name="nom">
        <br>
        <label for="inputText" class="sr-only">Votre Prénom </label>
      <input type="text" class="form-control" placeholder="Votre Prénom" value="<?php echo $prenom?>" required autofocus name="prenom">
        <br>
      <label for="inputPassword" class="sr-only">Mot de Passe</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Mot de Passe" value="<?php echo $password?>" required name="MDP">
        <br>
      <input type="date" name="date" placeholder="jj/mm/aaaa" value="<?php echo $date?>" style="text-align : right;">
        <br> <br>
        <div>
            <button class="btn btn-primary" href="ModifierExperiences.php" type="submit">Link</button>
            <button class="btn btn-primary" href="ModifierFormations.php" type="submit">Link</button> 
        </div>
        
      <button class="btn btn-lg btn-block btngr egn " type="submit">Valider</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>
</html>