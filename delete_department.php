<?php session_start(); include("pdo.php"); 

	$pdo->query('DELETE FROM departments WHERE id='.$_POST["id"]);
	header('Location: departments.php'); 
?>
