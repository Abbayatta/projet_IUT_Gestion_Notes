<?php
	
	session_start();

	if ($_SESSION["rank"]==2) 
	{
		
?>
<!-- ADMINISTRATEUR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
	<link rel="stylesheet" type="text/css" href="css/dataTables-utilisateur.css" />

    <!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
	
	<!-- you need to include : pour travailler sur les tableaux -->
	<script type="text/javascript" src="js/dataTables-utilisateur.min.js"></script>  

	<style>
        td.highlight {
		color: red;
        <!--font-weight: bold;-->
    }
    </style>
</head>
<body>

    <div id="wrapper">
        <?php include("nav.php"); include("get_users.php");?>
		
		<div class="row text-center">
			<h2>Utilisateurs</h2>
		</div>
		<div class="row center-block">
            <div class="col-lg-12 ">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>	
							<th>Matricule</th>
							<th>Prénom - Nom</th>
							<th>Adresse mail</th>
							<th>Numéro de téléphone</th>
							<th>Département</th>
							<th>Classe</th>
							<th>Status</th>
							<th>Modifier</th>
							<th>Supprimer</th>
							<th>Consulter</th>
						</tr>
					</thead>
			 
					<tfoot>
						<tr>
							<th>Matricule</th>
							<th>Prénom - Nom</th>
							<th>Adresse mail</th>
							<th>Numéro de téléphone</th>
							<th>Département</th>
							<th>Classe</th>
							<th>Status</th>
							<th>Modifier</th>
							<th>Supprimer</th>
							<th>Consulter</th>
						</tr>
					</tfoot>
			 
					<tbody>
					<?php get_all_users(); ?>
					</tbody>
				</table>
            </div>
        </div>  
		<div class="row center-block">
			<div class="col-lg-6 text-left">
				<h4><a href="add_user.php"><i class="fa fa-plus"></i> Nouvel utilisateur</a></h4>
			</div>
		</div>
    </div>
	
	<script type="text/javascript">
	<!-- you need to include : pour travailler sur les tableaux -->
        jQuery(function ($) {
		$(document).ready(function() {
			$('#example').dataTable( {"createdRow": function ( row, data, index ) {}} );} );
		});
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
	<link rel="stylesheet" type="text/css" href="css/dataTables-utilisateur.css" />

    <!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
	
	<!-- you need to include : pour travailler sur les tableaux -->
	<script type="text/javascript" src="js/dataTables-utilisateur.min.js"></script>  

	<style>
        td.highlight {
		color: red;
        <!--font-weight: bold;-->
    }
    </style>
</head>
<body>

    <div id="wrapper">
        <?php include("nav.php"); include("get_users.php");?>
		
		<div class="row text-center">
			<h2>Utilisateurs</h2>
		</div>
		<div class="row center-block">
            <div class="col-lg-12 ">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>	
							<th>Matricule</th>
							<th>Prénom - Nom</th>
							<th>Adresse mail</th>
							<th>Numéro de téléphone</th>
							<th>Département</th>
							<th>Classe</th>
							<th>Status</th>
							<th>Consulter</th>
						</tr>
					</thead>
			 
					<tfoot>
						<tr>
							<th>Matricule</th>
							<th>Prénom - Nom</th>
							<th>Adresse mail</th>
							<th>Numéro de téléphone</th>
							<th>Département</th>
							<th>Classe</th>
							<th>Status</th>
							<th>Consulter</th>
						</tr>
					</tfoot>
			 
					<tbody>
					<?php get_prof_users($_SESSION["id"]); ?>
					</tbody>
				</table>
            </div>
        </div>  
    </div>
	
	<script type="text/javascript">
        jQuery(function ($) {
		
		<!-- you need to include : pour travailler sur les tableaux -->
		$(document).ready(function() {
			$('#example').dataTable( {
				"createdRow": function ( row, data, index ) {
				}
			} );
		} );
		});
    </script>

</body>
</html>
	
<?php	
}

// ELEVE
else
{
	header("Location: index.php");
	exit;
}
