<?php session_start(); include("pdo.php"); 

	$pdo->query('DELETE FROM exams WHERE id='.$_POST["id"]);
	header('Location: exams.php'); 
?>
