
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue des évaluations</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
	<link rel="stylesheet" type="text/css" href="css/dataTables-utilisateur.css" />

    <!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
	
	<!-- you need to include : pour travailler sur les tableaux -->
	<script type="text/javascript" src="js/dataTables-utilisateur.min.js"></script>  

</head>
<body>

    <div id="wrapper">
        <?php include("nav.php"); include("get_all_exams.php");?>

		<div class="row text-center">
			<h2>Evaluations</h2>
		</div>
		<div class="row center-block">
            <div class="col-lg-12 ">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>	
							<th>Intitulé</th>
							<th>Date de l'évaluation</th>
							<th>Heure début</th>
							<th>Heure de fin</th>
							<th>Créateur</th>
							<th>Classe</th>
							<th>Coefficient</th>
							<th>Terminée</th>
						</tr>
					</thead>
			 
					<tfoot>
						<tr>
							<th>Intitulé</th>
							<th>Date de l'évaluation</th>
							<th>Heure début</th>
							<th>Heure de fin</th>
							<th>Créateur</th>
							<th>Classe</th>
							<th>Coefficient</th>
							<th>Terminée</th>
						</tr>
					</tfoot>
			 
					<tbody>
						<?php get_all_exams(); ?>
					</tbody>
				</table>
            </div>
        </div>  
		<div class="row center-block">
			<div class="col-lg-6 text-left">
				<h4><a href="add_exam.php"><i class="fa fa-plus"></i> Nouvelle évaluation</a></h4>
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
