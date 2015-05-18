<?php

	session_start();

	include("pdo.php");

	if (isset($_POST["title"])) 
	{

		$req = $pdo->prepare('INSERT INTO exams(title, date, begins, ends, exam_coefficient,lesson_id, group_id, user_id) VALUES(:title, :date, :begins, :ends, :exam_coefficient, :lesson_id, :group_id, :user_id)');
		$req->execute(array(
		'title' => $_POST["title"],
		'date' => $_POST["date"],
		'begins' => $_POST["begins"],
		'ends' => $_POST["ends"],
		'exam_coefficient' => $_POST["coef"],
		'lesson_id' => $_POST["lesson"],
		'group_id' => $_POST["group"],
		'user_id' => $_SESSION["id"]
		));
		echo "<div class="alert alert-success" role="alert">La nouvelle évaluation a bien été ajoutée !</div>";
		exit;
	}
	else
	{
		header("Location: add_exam.php");
		exit;
	}
?>