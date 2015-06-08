<?php
	session_start();
	
	if ($_SESSION["rank"]==0) 
	{
?>
<!-- ELEVE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin</title>

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

	<div id="wrapper">	
		<!-- Includes -->
		<?php include("nav.php"); include("pdo.php"); include("average_calculator.php"); include("overall_average_calculator.php");?>
	</div>
  
	<div class="container">
		<div class="row" style='background-color: #033c73; color: #fff;'>
	<div class="span8">
	  <br />
	  	  <h1 class="text-center">Bulletin de notes</h1>
	  <br />
	</div>
      </div>
    </div>

    <div class="container" style="margin-bottom: 20px;">
        <div class="row well">
			<div class="span7">
				  <h1 class="text-left"><?php echo $_SESSION["name"]; ?></h1>
			</div>
			<div class="span4">
			  <!--(tech):FIXME:reformater affichage date -->
			  <h3 class="text-right">
				Semestre 3 2014 - 2015</h3>
			</div>
		</div>

        <div class="row">
			<div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
						  <th>UE </th>
						  <th>Module</th>
						<!--  <th>Evaluation</th> -->
						  <th>Note/20</th>
						  <th>Coef</th>
						</tr>
					</thead>
					<tbody>
						<!--(tech):doc:cf http://twitter.github.io/bootstrap/base-css.html -->
						<tr class="lead info">
							<td colspan="2">Moyenne générale: </td>
							<?php
							echo "<td>".overall_avg_calculator($_SESSION["id"])."</td>";
							?>
							<td></td>
						</tr>
						<!--(tech):DEBUT Affichage UE -->
						<tr> 
							<td><i class="icon-plus-sign"></i>UE 31</td>
							<td></td>
							<td></td>
							<td>??</td>
						</tr>
						<!--(tech):DEBUT Affichage les modules de UE -->
								  
						<?php
						$req = $pdo->query('SELECT lesson_name,lesson_coefficient FROM lessons,users WHERE users.id = '.$_SESSION['id']);

						while ($data = $req->fetch())
						{
							?>
							<tr> 
								<td><i class="fa fa-plus-circle"></i></td>
								<td><?php echo $data['lesson_name']; ?></td>
								<td><?php $note = $pdo->query('SELECT AVG(mark) FROM marks, lessons, exams WHERE marks.exam_id = exams.id AND exams.lesson_id = lessons.id'); 
								while ($taux = $note->fetch()) { echo $taux[0]; } ?></td>
								<td><?php echo $data['lesson_coefficient']; ?></td>
							 </tr>
							 <?php
						}

						$req->closeCursor();

						?>
					</tbody>
				</table>
			</div>
		</div>      
	</div>
<?php
	}
	
	else {
?>
<!-- PROF & ADMINISTRATEUR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
	<link rel="stylesheet" type="text/css" href="css/dataTables-utilisateur.css" />

    <!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  
	
	<!-- you need to include : pour travailler sur les tableaux -->
	<script type="text/javascript" src="js/dataTables-utilisateur.min.js"></script> 

	<script type="text/javascript" src="js/tableExport.js"></script>
	<script type="text/javascript" src="js/jquery.base64.js"></script>
	<script type="text/javascript" src="js/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="js/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="js/jspdf/libs/base64.js"></script> 

	<style>
        td.highlight {
		color: red;
        <!--font-weight: bold;-->
    }
    </style>
</head>

	<div id="wrapper">	
		<!-- Includes -->
		<?php include("nav.php"); include("pdo.php"); include("average_calculator.php"); include("overall_average_calculator.php");?>
	
  
	<div class="container">
		<div class="row center-block" style='background-color: #033c73; color: #fff;'>
	<div class="span8">
	  <br />
	  	  <h1 class="text-center">Bulletin de notes</h1>
	  <br />
	</div>
      </div>
    </div>

    <div class="container" style="margin-bottom: 20px;">
        <div class="row well center-block">
			<div class="span7">
				  <h1 class="text-left"><?php echo $_POST["name"]; ?></h1>
			</div>
			<div class="span4">
			  <!--(tech):FIXME:reformater affichage date -->
			  <h3 class="text-right">
				Semestre 3 2014 - 2015</h3>
			</div>
		</div>

        <div class="row center-block">
			<div>
<<<<<<< HEAD
				<table class="table table-striped table-hover">
=======
				<table class="table table-striped table-hover" id="bulletin">
					<caption>Tableau des notes</caption>
>>>>>>> origin/master
					<thead>
						<tr>
						  <th>UE</th>
						  <th>Evaluation</th>
						  <th>Note</th>
						  <th>Coef</th>
						</tr>
					</thead>
					<tbody>
						<!--(tech):doc:cf http://twitter.github.io/bootstrap/base-css.html -->
						<tr class="lead info">
							<td colspan="3">Moyenne générale : </td>
							<?php
							echo "<td>".overall_avg_calculator($_POST["id"])."</td>";
							?>
							<td></td>
						</tr>
						<!--(tech):DEBUT Affichage UE -->
						<tr> 
							<td><i class="icon-plus-sign"></i>UE 31</td>
							<td></td>
							<td></td>
							<td>??</td>
							<td>??</td>
						</tr>
						<!--(tech):DEBUT Affichage les modules de UE -->
								  
						<?php
						$req = $pdo->prepare('SELECT lesson_name,lesson_coefficient FROM lessons,groups,users WHERE lessons.group_id=groups.id AND groups.id=users.group_id AND users.id= ?');
						$req->execute(array($_POST["id"]));

						while ($data = $req->fetch())
						{
							$i=0;
							$tot=0;
							$avg=0;
							?>

							<tr> 
							<td><?php echo $data['lesson_name']; ?></td>
							<td></td>
							<td></td>
							<?php

							$lesson_avg = lesson_avg_calculator($data['lesson_name'],$_POST["id"]);

							echo "<td>".$lesson_avg[0]."</td>";
							echo "<td>".$lesson_avg[1]."</td></tr>";
						}

						$req->closeCursor();

						?>
					</tbody>
				</table>
			</div>
		</div> 

		<a onClick ="$('#bulletin').tableExport({type:'pdf',escape:'false'});" href="#"><button>Exporter en PDF</button></a>

		<a onClick ="$('#bulletin').tableExport({type:'csv',escape:'false'});" href="#"><button>Exporter en CSV</button></a>

	</div>
	</div>
<?php 
	}
?>