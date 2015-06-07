<?php 
	session_start();
	include("pdo.php");
	if (isset($_GET["controle"]) && !empty($_GET["controle"])) 
	{
		$controle=$_GET["controle"];
	}
	else{
		$controle='';
	}
?>

<!-- PROFESSEUR -->

<?php if ($_SESSION['rank']==1) 
{ ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des notes</title>

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
        <?php include("nav.php"); include("get_exams.php"); include("get_marks_exam.php");

        	if ($controle=='') 
        	{ ?>
        		<div class="row text-center">
					<h2>Veuillez choisir une évaluation</h2>
				</div>
				<div class="row center-block">

				<form action="" method="GET">
                <div class="col-lg-3">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Evaluation :</span>
                        <select name="controle" id="controle" class="form-control" required>
                            <?php get_exams_list($_SESSION['id']); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-1">
                    <button type="submit" class="btn btn-info">
                        Valider
                    </button>
                </div>
        		</form>
        		</div>
        	<?php }

        	else{

        ?>
		
		<div class="row text-center">
			<h2>Notes de l'évaluation</h2>
		</div>
		<div class="row center-block">
            <div class="col-lg-12">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>	
							<th>Elève</th>
							<th>Résultat</th>
							<th>Supprimer</th>
						</tr>
					</thead>
			 
					<tfoot>
						<tr>
							<th>Elève</th>
							<th>Résultat</th>
							<th>Supprimer</th>
						</tr>
					</tfoot>
			 
					<tbody>
					<?php get_marks_exam($controle); ?>
					</tbody>
				</table>
            </div>
        </div>

        <?php } ?>

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
else if($_SESSION['rank']==2)
{ ?>

<!-- ADMINISTRATEUR -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des notes</title>

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
        <?php include("nav.php"); include("get_exams.php"); include("get_marks_exam.php");

        	if ($controle=='') 
        	{ ?>
        		<div class="row text-center">
					<h2>Veuillez choisir une évaluation</h2>
				</div>
				<div class="row center-block">

				<form action="" method="GET">
                <div class="col-lg-3">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Evaluation :</span>
                        <select name="controle" id="controle" class="form-control" required>
                            <?php get_all_exams_list(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-1">
                    <button type="submit" class="btn btn-info">
                        Valider
                    </button>
                </div>
        		</form>
        		</div>
        	<?php }

        	else{

        ?>
		
		<div class="row text-center">
			<h2>Notes de l'évaluation</h2>
		</div>
		<div class="row center-block">
            <div class="col-lg-12">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>	
							<th>Elève</th>
							<th>Résultat</th>
							<th>Supprimer</th>
						</tr>
					</thead>
			 
					<tfoot>
						<tr>
							<th>Elève</th>
							<th>Résultat</th>
							<th>Supprimer</th>
						</tr>
					</tfoot>
			 
					<tbody>
					<?php get_marks_exam($controle); ?>
					</tbody>
				</table>
            </div>
        </div>

        <?php } ?>

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
else
{
	header('Location: index.php'); 
}
?>