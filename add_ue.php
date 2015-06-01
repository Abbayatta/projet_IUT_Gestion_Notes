<?php session_start(); include("pdo.php"); include("get_departments.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'une unité d'enseignement</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
	<!-- you need to include : pour travailler sur les calendrier-->
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>   
	<!-- you need to include : pour travailler sur le calendrier -->
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/2.9.0/moment-with-locales.js"></script>
		
	<style>

        form div{
            padding-bottom:20px;
        }
		

    </style>
</head>
<body>
<?php include("nav.php"); ?>
    <div id="wrapper">
	
		<div>
			<div class="row text-center">
				<h2>Nouvelle unité d'enseignement</h2>
				<?php

					if (isset($_POST["name"])) 
					{

						$req = $pdo->prepare('INSERT INTO `teachingunit`(`name`, `description`, `dept_id`) VALUES (:name, :description, :dept_id)');
						$req->execute(array('name' => $_POST["name"],'description' => $_POST["description"],'dept_id' => $_POST["dept_id"]));
						echo "<div class='alert alert-success' role='alert' align='center'>La nouvelle unité d'enseignement a bien été créée !</div>";
					}

					else
					{
						echo "<div class='alert alert-info' role='alert' align='center'>Veuillez compléter les champs pour ajouter une unité d'enseignement.</div>";
					}
				?>
			</div>
			<form class="form-signin" method="post" action="">
			<div>
				<label for="name" class="col-md-2">
					Numéro :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="name" name="name" placeholder="Entrez le numéro de l'unité d'enseignement" required autofocus>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="description" class="col-md-2">
					Description :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="description" name="description" placeholder="Entrez la description de l'unité d'enseignement" required autofocus>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="dept_id" class="col-md-2">
					Département :
				</label>
				<div class="col-md-9">
					<select name="dept_id" id="dept_id" class="form-control" required>
						<?php get_departments_list(); ?>
					</select>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div class="row">
			</div>
				<div class="col-md-9">
					<i class="fa fa-lock fa-2x"></i> Ces champs sont obligatoires
			</div>
			<div class="row">
			</div>
			<div class="row center-block">
				<div class="text-center">
					<button type="reset" class="btn btn-info">
						Annuler
					</button>
					<button type="submit" class="btn btn-info">
						Enregistrer
					</button>
				</div>
			</div>
			</form>     
    </div>
	<!--<script>
		$(function (){
		   $('#date').datepicker();
		});
	</script>-->
	<!-- cdn for modernizr, if you haven't included it already -->
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
	<!-- polyfiller file to detect and load polyfills -->
	<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
	<script>
	  webshims.setOptions('waitReady', false);
	  webshims.setOptions('forms-ext', {types: 'date'});
	  webshims.polyfill('forms forms-ext');
	</script>
</body>
</html>
