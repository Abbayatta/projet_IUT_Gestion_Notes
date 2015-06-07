<?php session_start(); include("pdo.php"); 

	$pdo->query('DELETE FROM users WHERE id='.$_POST["id"]);
	header('Location: users.php'); 
?>
