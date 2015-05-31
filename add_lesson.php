<?php session_start(); include("pdo.php"); include("get_groups.php"); include("get_teachers_list.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un cours</title>

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
				<h2>Nouveau cours</h2>
				<?php

					if (isset($_POST["lesson_name"])) 
					{

						$req = $pdo->prepare('INSERT INTO lessons(lesson_name, user_id, group_id, lesson_coefficient) VALUES(:lesson_name, :user_id, :group_id, :lesson_coefficient)');
						$req->execute(array(
						'lesson_name' => $_POST["lesson_name"],
						'user_id' => $_POST["user_id"],
						'group_id' => $_POST["group_id"],
						'lesson_coefficient' => $_POST["lesson_coefficient"]
						));
						echo "<div class='alert alert-success' role='alert' align='center'>Le nouveau cours a bien été ajouté !</div>";
					}

					else
					{
						echo "<div class='alert alert-info' role='alert' align='center'>Veuillez compléter les champs pour ajouter un cours.</div>";
					}
				?>
			</div>
			<form class="form-signin" method="post" action="">
			<div>
				<label for="lesson_name" class="col-md-2">
					Intitulé :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="lesson_name" name="lesson_name" placeholder="Entrer l'intitulé du cours" required autofocus>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="user_id" class="col-md-2">
					Professeur :
				</label>
				<div class="col-md-9">
					<select name="user_id" id="user_id" class="form-control" required>
						<?php get_teachers_list(); ?>
					</select>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="group_id" class="col-md-2">
					Groupe :
				</label>
				<div class="col-md-9">
					<select name="group_id" id="group_id" class="form-control" required>
						<?php get_groups_list(); ?>
					</select>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="lesson_coefficient" class="col-md-2">
					Coefficient :
				</label>
				<div class="col-md-9">
					<input type="number" class="form-control" id="lesson_coefficient" name="lesson_coefficient" placeholder="Entrez le coefficient" required>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
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
