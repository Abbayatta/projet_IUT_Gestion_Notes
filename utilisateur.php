<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scodoc - Deep Blue Admin</title>

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
        <?php include("nav.php"); ?>
		
		<div class="row center-block">
            <div class="col-lg-8">
				<div class="panel panel-default ">
				  <!-- Default panel contents -->
				  <div class="panel-heading text-center"><h1 class="panel-title">Fiche élève</h1></div>
				  <div class="panel-body"><img class="thumbnail img-responsive" alt="Bootstrap template" src="images/photo.jpg" /></div> 

				  <!-- List group -->
				  <table class="table">
					  <!--<th>Product</th><th>Price </th>-->
					  <tr><th>ID</th><td>1234567</td></tr>
					  <tr><th>Nom</th><td>Nixon</td></tr>
					  <tr><th>Prénom</th><td>Scott</td></tr>
					  <tr><th>Date de naissance</th><td>10/10/2010</td></tr>
					  <tr><th>Adresse mail</th><td>NixonScott@iut-velizy.fr</td></tr>
					  <tr><th>Numéro de téléphone</th><td>0123456789</td></tr>
					  <tr><th>Classe</th><td>Scott</td></tr>
					  <tr><th>Bac</th><td>Bac S</td></tr>
				   </table>
				</div>	
			</div>
		</div>
		
		<div class="row center-block">
			<div class="col-lg-6 text-left">
				<h4><a href="modifier_utilisateur.php"><i class="glyphicon-pencil"></i> Modifier utilisateur</a></h4>
			</div>
			<div class="col-lg-6 text-right">
				<h4><a href="note.php"><i class="fa fa-plus"></i> Bulletin de notes</a></h4>
			</div>
		</div>
    </div>
</body>
</html>

