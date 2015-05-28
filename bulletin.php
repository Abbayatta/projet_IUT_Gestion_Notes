<?php
	session_start();
?>

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
				Semestre 3 FAP 2014 - 2015</h3>
			</div>
		</div>

        <div class="row">
			<div>
				<table class="table table-striped table-hover">
					<caption>Tableau des notes</caption>
					<thead>
						<tr>
						  <th>UE (WIP)</th>
						  <th>Module</th>
						  <th>Evaluation</th>
						  <th>Note/20</th>
						  <th>Coef</th>
						</tr>
					</thead>
					<tbody>
						<!--(tech):doc:cf http://twitter.github.io/bootstrap/base-css.html -->
						<tr class="lead info">
							<td colspan="3">Moyenne générale: </td>
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
							<td>??</td>
						</tr>
						<!--(tech):DEBUT Affichage les modules de UE -->
								  
						<?php
						$req = $pdo->prepare('SELECT lesson_name,lesson_coefficient FROM lessons,groups,users WHERE lessons.group_id=groups.id AND groups.id=users.group_id AND users.id= ?');
						$req->execute(array($_SESSION["id"]));

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

							$lesson_avg = lesson_avg_calculator($data['lesson_name'],$_SESSION["id"]);

							echo "<td>".$lesson_avg[0]."</td>";
							echo "<td>".$lesson_avg[1]."</td></tr>";
						}

						$req->closeCursor();

						?>
					</tbody>
				</table>
			</div>
		</div>      
	</div>