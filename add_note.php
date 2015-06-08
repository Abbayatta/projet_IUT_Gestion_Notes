<?php 
	session_start();
	include("pdo.php");
	$req=$pdo->prepare("INSERT INTO marks(exam_id, user_id, mark) VALUES(:exam_id, :user_id, :mark)");
	$req->execute(array(
    'exam_id' => $_POST['exam_id'],
    'user_id' => $_POST['user_id'],
    'mark' => $_POST['note']
    )); 

	header('Location: add_notes.php?controle='.$_POST['exam_id']);
	exit();
?>