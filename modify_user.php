
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification utilisateur</title>

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
			</div>
			<form class="form-signin">
			<div>
				<label for="id_utilisateur" class="col-md-2">
					ID:
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="id_utilisateur" placeholder="Entrer votre ID" required autofocus>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div> 
			<div>
				<label for="firstname" class="col-md-2">
					Nom:
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="firstname" placeholder="Entrer votre nom" required>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>        
			<div>
				<label for="lastname" class="col-md-2">
					Prénom:
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="lastname" placeholder="Entrer votre prenom" required>
				</div>
				 <div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="datedenaissance" class="col-md-2">
					Date de naissance:
				</label>
				<div class='col-md-9'>
					 <div class='input-group date' id='datetimepicker'>
						<input id="date" type='text' class="form-control" placeholder="01/12/2000" required/>
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
				<label for="emailaddress" class="col-md-2">
					Adresse mail:
				</label>
				<div class="col-md-9">
					<input type="email" class="form-control" id="emailaddress" placeholder="Entrer votre adresse mail" required>
					<p class="help-block">
						Exemple: votrenom@domaine.com
					</p>
				</div>
				 <div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="numberphone" class="col-md-2">
					Téléphone:
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="numberphone" placeholder="0123456789">
				</div>
			</div>
			<div>
				<label for="password" class="col-md-2">
					Mot de passe:
				</label>
				<div class="col-md-9">
					<input type="password" class="form-control" id="password" placeholder="Entrer votre mot de passe" required>
					<p class="help-block">
						Min: 6 caractères
					</p>
				</div>
				 <div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="sex" class="col-md-2">
					Sexe:
				</label>
				<div class="col-md-10">
					<label class="radio">
						<input type="radio" name="sex" id="sex" value="male" checked>
						Homme
					</label>
					<label class="radio">
						<input type="radio" name="sex" id="Radio1" value="female">
						Femme
					</label>
					<label class="radio">
						<input type="radio" name="sex" id="Radio2" value="Autre">
						Autre
					</label>
				</div>             
			</div>
			<div>
				<label for="Fonction" class="col-md-2">
					Fonction:
				</label>
				<div class="col-md-10">
					<label class="radio">
						<input type="radio" name="fonction" id="fonction" value="eleve" checked>
						Elève
					</label>
					<label class="radio">
						<input type="radio" name="fonction" id="Radio1" value="professeur">
						Professeur
					</label>
					<label class="radio">
						<input type="radio" name="fonction" id="Radio2" value="administrateur">
						Administrateur
					</label>
				</div>             
			</div>
			<div>
				<label for="country" class="col-md-2">
					Classe:
				</label>
				<div class="col-md-9">
					<select name="classe" id="classe" class="form-control">
						<option>--Selectionner--</option>
						<option>Info2-FA</option>
						<option>Info2-FI-A</option>
						<option>CInfo2-FI-B</option>
						<option>Info1-A</option>
						<option>Autres</option>
					</select>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="uploadimage" class="col-md-2">
					Uploader une image de profil:
				</label>
				<div class="col-md-10">
					<input type="file" name="uploadimage" id="uploadimage">
					<p class="help-block">
						Formats autorisés: jpeg, jpg, gif, png
					</p>
				</div>          
			</div>
			<div>
				<div class="col-md-2">
				</div>
				<div class="col-md-10">
					<label>
						<input type="checkbox"> J'accepte les termes et les conditions d'utilisation de ce site.</label>
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
		</div>
    </div>
	<script>
		$(function (){
		   $('#date').datepicker();
		});
	</script>
</body>
</html>
