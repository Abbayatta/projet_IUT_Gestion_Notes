<?php session_start(); include("pdo.php"); 

	$pdo->query('DELETE FROM marks WHERE id='.$_POST["id"]);
	header('Location: notes.php'); 
?>