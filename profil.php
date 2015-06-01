<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
	<!-- you need to include : pour travailler sur les images -->
	<link rel="stylesheet" type="text/css" href="css/utilisateur.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>    
	<!-- you need to include : pour travailler sur les tableaux -->
	<script type="text/javascript" src="js/dataTables-utilisateur.min.js"></script>  
	
</head>
<body>

    <div id="wrapper">
        <?php include("nav.php"); include("get_profil.php");?>
		
		<div class="row center-block" style="width:80%;">
            <div>
				<div class="panel panel-default">
				  <div class="panel-heading text-center"><h1 class="panel-title">Votre profil</h1></div>
				  <div class="panel-body"><img class="thumbnail img-responsive" alt="Bootstrap template" src="images/photo.jpg" /></div> 

				  <!-- Profil -->
				  <table class="table">
					  <tr><th>ID</th><td><?php echo (get_profil_element($_SESSION["id"], "id"))?></td></tr>
					  <tr><th>Prénom NOM</th><td><?php echo (get_profil_element($_SESSION["id"], "name"))?></td></tr>
					  <tr><th>Adresse mail</th><td><?php echo (get_profil_element($_SESSION["id"], "mail"))?></td></tr>
					  <tr><th>Numéro de téléphone</th><td><?php echo (get_profil_element($_SESSION["id"], "phone"))?></td></tr>
					  <tr><th>Département</th><td><?php echo (get_profil_element($_SESSION["id"], "dept_id"))?></td></tr>
					  <tr><th>Classe</th><td><?php echo (get_profil_element($_SESSION["id"], "group_id"))?></td></tr>
				   </table>
				</div>	
			</div>
		</div>
		
		<div class="row center-block">
			<div class="text-center">
				<?php
				echo ("<form method=\"post\" action=\"modify_user.php\">
					<input type=\"hidden\" name=\"id\" value=".$_SESSION["id"].">
					<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"glyphicon-pencil\"></i> Modifier votre profil</h4></a>
				</form>")?>
			</div>
		</div>
    </div>
</body>
</html>

