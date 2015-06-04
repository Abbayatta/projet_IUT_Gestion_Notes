<?php
	session_start();
	include("pdo.php");
	include("get_users.php");
	$id_msg=$_GET['id_msg'];
	$req=$pdo->query('SELECT * FROM messages WHERE id='.$id_msg.' AND recipient_id='.$_SESSION["id"]);
	$data=$req->fetch();
	$sender=get_user($data[5]);
	$date=$data[3];
	$sujet=$data[1];
	$body=$data[2];
	$pdo->exec('UPDATE messages SET state=1 WHERE id='.$id_msg.' AND recipient_id='.$_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scodoc - Lecture message</title>

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

            	<div class="col-lg-4">
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Sujet :</span>
					  <?php 
					 	echo "<input type='text' class='form-control' placeholder='".$sujet."' aria-describedby='basic-addon1' disabled>" ?>
					</div>
            	</div>
            	<br><br>

            	<div class="col-lg-2">
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Auteur :</span>
					  <?php 
					 	echo "<input type='text' class='form-control' placeholder='".$sender."' aria-describedby='basic-addon1' disabled>";
					 	?>
					</div>
            	</div>
            	<div class="col-lg-2">
					<div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Date :</span>
					  <?php 
					 	echo "<input type='text' class='form-control' placeholder='".$date."' aria-describedby='basic-addon1' disabled>" ?>
					</div>
            	</div>
            	<br><br>

            	<div class="col-lg-5">
					<div class="input-group">
						<?php 
						 	echo "<label>Message</label>";
						 	echo "<br>";
						 	echo "<textarea cols='100' rows='25' readonly>".$body."</textarea>";
						?>
					</div>
            	</div>

            </div>
    </div>
</body>
</html>
