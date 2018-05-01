<!--Source GetBootstrap-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>LinkedInECE</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center" id="bckg">
    <form class="form-signin" action="Accueil.php" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Inscrivez vous</h1>
      <label for="inputEmail" class="sr-only">Votre Adresse mail</label>
      <input type="email" class="form-control" placeholder="Adresse Email" required autofocus name="email">
        <br>
    <label for="inputText" class="sr-only">Votre Nom </label>
      <input type="text" class="form-control" placeholder="Votre nom" required autofocus name="nom">
        <br>
        <label for="inputText" class="sr-only">Votre Prénom </label>
      <input type="text" class="form-control" placeholder="Votre Prénom" required autofocus name="prenom">
        <br>
      <label for="inputPassword" class="sr-only">Pseudo</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Mot de Passe" required name="MDP">
        <br>
        <input type="date" name="date" placeholder="jj/mm/aaaa" style="text-align : right;">
        <br> <br>
      <button class="btn btn-lg btn-block btngr egn " type="submit">Inscription</button>
        <div class="alternative">
      <a href="Login.php" style="text-decoration : none; color : darkgrey;"> Connexion </a>
      </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
      
  </body>
</html>