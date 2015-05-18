<?php session_start(); include("pdo.php"); include("get_groups_list.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout utilisateur</title>

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

    <div id="wrapper">
        <?php include("nav.php"); ?>
	
		<div>
			<div class="row text-center">
				<h2>Nouvel utilisateur</h2>
				<?php

					if (isset($_POST["login"])) 
					{

						$req = $pdo->prepare('INSERT INTO users(name, login, phone, passwd, mail, group_id, rank) VALUES(:name, :login, :phone, :passwd, :mail, :group_id, :rank)');
						$req->execute(array(
						'name' => $_POST["name"],
						'login' => $_POST["login"],
						'phone' => $_POST["phone"],
						'passwd' => md5($_POST["passwd"]),
						'mail' => $_POST["email"],
						'group_id' => $_POST["group"],
						'rank' => $_POST["rank"]
						));
						
						echo "<div class='alert alert-success' role='alert' align='center'>Le nouvel utilisateur a bien été ajouté !</div>";
						
					}

					else
					{
						echo "<div class='alert alert-info' role='alert' align='center'>Veuillez compléter les champs pour ajouter un utilisateur.</div>";
					}
				?>
			</div>
			<form class="form-signin" method="post" action="">
			<div>
				<label for="login" class="col-md-2">
					Login :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="login" name="login" placeholder="Entrer un login (ex : numéro d'étudiant)" required>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>        
			<div>
				<label for="name" class="col-md-2">
					Prénom NOM :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="name" name="name" placeholder="Ex : Jean DUPONT" required>
				</div>
				 <div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="date" class="col-md-2">
					Date de naissance :
				</label>
				<div class='col-md-9'>
					 <div class='input-group date' id='datetimepicker'>
						<input id="date" name="date" type='date' class="form-control" placeholder="01/12/2000" required/>
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
				<label for="email" class="col-md-2">
					Adresse mail :
				</label>
				<div class="col-md-9">
					<input type="email" class="form-control" id="email" name="email" placeholder="Entrer une adresse mail" required>
					<p class="help-block">
						Exemple: votrenom@uvsq.fr
					</p>
				</div>
				 <div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="phone" class="col-md-2">
					Téléphone :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="phone" name="phone" placeholder="0123456789">
				</div>
			</div>
			<div>
				<label for="passwd" class="col-md-2">
					Mot de passe :
				</label>
				<div class="col-md-9">
					<input type="password" class="form-control" id="passwd" name="passwd" placeholder="Entrer un mot de passe" required>
				</div>
				 <div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="fonction" class="col-md-2">
					Fonction:
				</label>
				<div class="col-md-9">
					<select id="rank" name="rank" class="form-control">
						<option value="0">Elève</option>
						<option value="1">Professeur</option>
						<option value="2">Administrateur</option>
					</select>
				</div>          
			</div>
			<div>
				<label for="group" class="col-md-2">
					Groupe :
				</label>
				<div class="col-md-9">
					<select name="group" id="group" class="form-control">
						<?php get_groups_list(); ?>
					</select>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="image" class="col-md-2">
					Uploader une image de profil:
				</label>
				<div class="col-md-10">
					<input type="file" name="image" id="image">
					<p class="help-block">
						Formats autorisés: jpeg, jpg, gif, png
					</p>
				</div>          
			</div>
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-10">
					<button type="cancel" class="btn btn-info">
						Annuler
					</button>
					<button type="submit" class="btn btn-info">
						Enregistrer
					</button>
				</div>
			</div>
			</form>
			<div class="col-md-9">
					<i class="fa fa-lock fa-2x"> Ces champs sont obligatoires</i>
			</div>
		</div>
    </div>
	<!--<script>
		$(function (){
		   $('#date').datepicker();
		});
	</script>-->
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
