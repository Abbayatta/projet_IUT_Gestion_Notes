<?php session_start(); include("pdo.php"); 

	$pdo->query('DELETE FROM groups WHERE id='.$_POST["id"]);
	header('Location: groups.php'); 
?>
