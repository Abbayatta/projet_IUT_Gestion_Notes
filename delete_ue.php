<?php session_start(); include("pdo.php"); 

	$pdo->query('DELETE FROM teachingunit WHERE id='.$_POST["id"]);
	header('Location: ue.php'); 
?>
