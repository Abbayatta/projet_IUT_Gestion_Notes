<?php
	
	session_start();

	if ($_SESSION["rank"]==2 || $_SESSION["rank"]==1) 
	{

		include("pdo.php"); include("get_groups.php"); include("get_lessons.php"); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un examen</title>

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
				<h2>Nouvelle évaluation</h2>
				<?php

					if (isset($_POST["title"])) 
					{

						$req = $pdo->prepare('INSERT INTO exams(title, date, begins, ends, exam_coefficient,lesson_id, group_id, user_id) VALUES(:title, :date, :begins, :ends, :exam_coefficient, :lesson_id, :group_id, :user_id)');
						$req->execute(array(
						'title' => $_POST["title"],
						'date' => $_POST["date"],
						'begins' => $_POST["begins"],
						'ends' => $_POST["ends"],
						'exam_coefficient' => $_POST["coef"],
						'lesson_id' => $_POST["lesson"],
						'group_id' => $_POST["group"],
						'user_id' => $_SESSION["id"]
						));
						echo "<div class='alert alert-success' role='alert' align='center'>La nouvelle évaluation a bien été ajoutée !</div>";
					}

					else
					{
						echo "<div class='alert alert-info' role='alert' align='center'>Veuillez compléter les champs pour ajouter une évaluation.</div>";
					}
				?>
			</div>
			<form class="form-signin" method="post" action="">
			<div>
				<label for="title" class="col-md-2">
					Intitulé :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="title" name="title" placeholder="Entrer le titre de l'évaluation" required autofocus>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>     
			<div>
				<label for="date" class="col-md-2">
					Date de l'évaluation :
				</label>
				<div class='col-md-9'>
					 <div class='input-group date' id='datetimepicker'>
						<input id="date" name="date" type="date" class="form-control" placeholder="Double-cliquez pour choisir une date" required/>
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"> </span>
						</span>
					</div>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="begins" class="col-md-2">
					Heure de début :
				</label>
				<div class="col-md-9">
					<input type="time" class="form-control" id="begins" name="begins" placeholder="Double-cliquez pour choisir l'heure de début" required>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div> 
			<div>
				<label for="ends" class="col-md-2">
					Heure de fin:
				</label>
				<div class="col-md-9">
					<input type="time" class="form-control" id="ends" name="ends" placeholder="Double-cliquez pour choisir l'heure de fin" required>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="coef" class="col-md-2">
					Coefficient :
				</label>
				<div class="col-md-9">
					<input type="number" class="form-control" id="coef" name="coef" placeholder="Entrez le coefficient" required>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="lesson" class="col-md-2">
					Cours :
				</label>
				<div class="col-md-9">
					<select name="lesson" id="lesson" class="form-control" required>
						<?php get_lessons_list(); ?>
					</select>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="group" class="col-md-2">
					Groupe :
				</label>
				<div class="col-md-9">
					<select name="group" id="group" class="form-control" required>
						<?php get_groups_list(); ?>
					</select>
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
			</div>>
			</form>
		</div>
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
<?php
}

else
{
	header("Location: index.php");
	exit;
}
