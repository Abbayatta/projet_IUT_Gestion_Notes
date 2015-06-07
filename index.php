<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Scodoc - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/local.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/index.css" rel="stylesheet">
  </head>

  <body>

<?php

  session_start();

  include("pdo.php");

  if (isset($_SESSION["login"]))
  {
      if ($_SESSION["rank"]==2) 
      {
        header("Location: users.php");
        exit;
      }

      else if ($_SESSION["rank"]==1) 
      {
        header("Location: exams.php");
        exit;        
      }

      else
      {
        header("Location: bulletin.php");
      }
  }
  
	else if (isset($_SESSION["fail"]))
	{
	?>	
	<!-- ERREUR -->
	<div class="container">

      <div class="starter-template">
        <h1>Scodoc</h1>
        <p class="lead">Connectez-vous à l'application Scodoc avec votre numéro d'étudiant</p>
      </div>
    </div><!-- /.container -->
	<div class='alert alert-danger' role='alert' align='center'>Veuillez entrer une nom d'utilisateur ou un mot de passe valide.</div>
	<div class="container">

      <form class="form-signin" method="post" action="verif.php">
        <h2 class="form-signin-heading"></h2>
        <label for="inputAccount" class="sr-only">Compte</label>
        <input type="text" id="inputAccount" name="inputAccount" class="form-control" placeholder="Compte" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
      </form>

    </div> <!-- /container -->
	<?php	
	}
	
  else
  {

  ?>

	 <div class="container">

      <div class="starter-template">
        <h1>Scodoc</h1>
        <p class="lead">Connectez-vous à l'application Scodoc avec votre numéro d'étudiant</p>
      </div>
    </div><!-- /.container -->
	
	<div class="container">

      <form class="form-signin" method="post" action="verif.php">
        <h2 class="form-signin-heading"></h2>
        <label for="inputAccount" class="sr-only">Compte</label>
        <input type="text" id="inputAccount" name="inputAccount" class="form-control" placeholder="Compte" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
      </form>

    </div> <!-- /container -->
	<?php
  }

  ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
