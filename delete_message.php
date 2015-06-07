<?php 
	session_start(); 
	include("pdo.php"); 

	$pdo->query('DELETE FROM messages WHERE id='.$_POST["id"]);
	header('Location: inbox.php'); 
?>
