<?php session_start(); include("pdo.php"); include("get_groups.php"); 
	
	if ($_SESSION["rank"]==2) 
	{
		
?>
<!-- ADMINISTRATEUR -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>

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
        <?php include("nav.php"); include ("get_profil.php");?>
	
		<div>
			<div class="row text-center">
				<h2>Modification</h2>
				
				<?php

					if (isset($_POST["login"])) 
					{

						$req = $pdo->prepare('UPDATE users SET name=:name, login=:login, phone=:phone, passwd=:passwd, mail=:mail, group_id=:group_id, rank=:rank WHERE id='.$_POST["id"]);
						$req->execute(array(
						'name' => $_POST["name"],
						'login' => $_POST["login"],
						'phone' => $_POST["phone"],
						'passwd' => md5($_POST["passwd"]),
						'mail' => $_POST["email"],
						'group_id' => $_POST["group"],
						'rank' => $_POST["rank"]
						));
						
						echo "<div class='alert alert-success' role='alert' align='center'>L'utilisateur a bien été modifié !</div>";
						
					}

					else
					{
					}
				?>
			</div>
			<form class="form-signin" method="post" action="">
			<div>
				<?php echo '<input type="hidden" name="id" value="'.$_POST["id"].'">'; ?>
				<label for="login" class="col-md-2">
					Login :
				</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="login" name="login" value="<?php echo (get_profil_element($_POST["id"], "login"))?>" required>
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
					<input type="text" class="form-control" id="name" name="name" value="<?php echo (get_profil_element($_POST["id"], "name"))?>" required>
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
					<input type="email" class="form-control" id="email" name="email" value="<?php echo (get_profil_element($_POST["id"], "mail"))?>" required>
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
					<input type="text" class="form-control" id="phone" name="phone" value="<?php echo (get_profil_element($_POST["id"], "phone"))?>">
				</div>
			</div>
			<div>
				<label for="passwd" class="col-md-2">
					Mot de passe :
				</label>
				<div class="col-md-9">
					<input type="password" class="form-control" id="passwd" name="passwd" value="" required>
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
					<?php
						$rank=$pdo->query('SELECT rank FROM users WHERE id='.$_POST["id"]);
						$rank2=$rank->fetch();
						if ($rank2[0]==0) {				
								echo '<option value="0">Elève</option>
									<option value="1">Professeur</option>
									<option value="2">Administrateur</option>';
						}
							
						else if ($rank2[0]==1){
								echo '<option value="0">Elève</option>
									<option value="1" selected>Professeur</option>
									<option value="2">Administrateur</option>';
						}
						
						else if ($rank2[0]==2){
								echo '<option value="0">Elève</option>
									<option value="1">Professeur</option>
									<option value="2" selected>Administrateur</option>';
						}
					?>
					</select>
				</div>          
			</div>
			<div>
				<label for="group" class="col-md-2">
					Groupe :
				</label>
				<div class="col-md-9">
					<select name="group" id="group" class="form-control">
						<?php get_groups_list_user($_POST["id"]); ?>
					</select>
				</div>
				<div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="image" class="col-md-2">
					Image de profil:
				</label>
				<div class="col-md-10">
					<input type="file" name="image" id="image">
					<p class="help-block">
						Formats autorisés: jpeg, jpg, gif, png
					</p>
				</div>          
			</div>
			<div class="row">
			</div>
			<div class="row center-block">
				<div class="text-center">
					<button type="submit" class="btn btn-info">
							Enregistrer
					</button>
				</div>
			</div>
			</form>
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

<?php
	}
else if ($_SESSION["rank"]==1) 
	{
		
?>
<!-- PROFESSEUR -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>

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
        <?php include("nav.php"); include ("get_profil.php"); ?>
	
		<div>
			<div class="row text-center">
				<h2>Modification</h2>
				
				<?php

					if (isset($_POST["passwd"]) && $_POST["passwd"] != "") 
					{

						$req = $pdo->prepare('INSERT INTO users(phone, passwd, mail) VALUES(:phone, :passwd, :mail)');
						$req->execute(array(
						'phone' => $_POST["phone"],
						'passwd' => md5($_POST["passwd"]),
						'mail' => $_POST["email"]
						));
						
						echo "<div class='alert alert-success' role='alert' align='center'>L'utilisateur a bien été modifié !</div>";
						
					}
					
					else if (isset($_POST["login"])) 
					{

						$req = $pdo->prepare('INSERT INTO users(phone, mail) VALUES(:phone, :mail)');
						$req->execute(array(
						'phone' => $_POST["phone"],
						'mail' => $_POST["email"]
						));
						
						echo "<div class='alert alert-success' role='alert' align='center'>L'utilisateur a bien été modifié !</div>";
						
					}

					else
					{
					}
				?>
			</div>
			<form class="form-signin" method="post" action="">     
			<div>
				<label for="email" class="col-md-2">
					Adresse mail :
				</label>
				<div class="col-md-9">
					<input type="email" class="form-control" id="email" name="email" value=<?php echo (get_profil_element($_POST["id"], "mail"))?> required>
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
					<input type="text" class="form-control" id="phone" name="phone" value=<?php echo (get_profil_element($_POST["id"], "phone"))?>>
				</div>
			</div>
			<div>
				<label for="passwd" class="col-md-2">
					Nouveau mot de passe :
				</label>
				<div class="col-md-9">
					<input type="password" class="form-control" id="passwd" name="passwd" value="">
				</div>
			</div>
			<div>
				<label for="image" class="col-md-2">
					Image de profil:
				</label>
				<div class="col-md-10">
					<input type="file" name="image" id="image">
					<p class="help-block">
						Formats autorisés: jpeg, jpg, gif, png
					</p>
				</div>          
			</div>
			<div class="row">
			</div>
			<div class="row center-block">
				<div class="text-center">
					<button type="submit" class="btn btn-info">
							Enregistrer
					</button>
				</div>
			</div>
			</form>
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

<?php
	}
else if ($_SESSION["rank"]==0) 
	{
		
?>
<!-- ELEVE -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>

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
        <?php include("nav.php"); include ("get_profil.php")?>
	
		<div>
			<div class="row text-center">
				<h2>Modification</h2>
				
				<?php

					if (isset($_POST["passwd"])) 
					{

						$req = $pdo->prepare('INSERT INTO users(phone, passwd, mail) VALUES(:phone, :passwd, :mail)');
						$req->execute(array(
						'phone' => $_POST["phone"],
						'passwd' => md5($_POST["passwd"]),
						'mail' => $_POST["email"]
						));
						
						echo "<div class='alert alert-success' role='alert' align='center'>L'utilisateur a bien été modifié !</div>";
						
					}
					
					else if (isset($_POST["login"])) 
					{

						$req = $pdo->prepare('INSERT INTO users(phone, mail) VALUES(:phone, :mail)');
						$req->execute(array(
						'phone' => $_POST["phone"],
						'mail' => $_POST["email"]
						));
						
						echo "<div class='alert alert-success' role='alert' align='center'>L'utilisateur a bien été modifié !</div>";
						
					}

					else
					{
					}
				?>
			</div>
			<form class="form-signin" method="post" action="">       
			<div>
				<label for="email" class="col-md-2">
					Adresse mail :
				</label>
				<div class="col-md-9">
					<input type="email" class="form-control" id="email" name="email" value=<?php echo (get_profil_element($_POST["id"], "mail"))?> required>
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
					<input type="text" class="form-control" id="phone" name="phone" value=<?php echo (get_profil_element($_POST["id"], "phone"))?>>
				</div>
			</div>
			<div>
				<label for="passwd" class="col-md-2">
					Mot de passe :
				</label>
				<div class="col-md-9">
					<input type="password" class="form-control" id="passwd" name="passwd" value="" required> <!--fonction php à faire-->
				</div>
				 <div class="col-md-1">
					<i class="fa fa-lock fa-2x"></i>
				</div>
			</div>
			<div>
				<label for="image" class="col-md-2">
					Image de profil:
				</label>
				<div class="col-md-10">
					<input type="file" name="image" id="image">
					<p class="help-block">
						Formats autorisés: jpeg, jpg, gif, png
					</p>
				</div>          
			</div>
			<div class="row">
			</div>
			<div class="row center-block">
				<div class="text-center">
					<button type="submit" class="btn btn-info">
							Enregistrer
					</button>
				</div>
			</div>
			</form>
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

<?php }?>