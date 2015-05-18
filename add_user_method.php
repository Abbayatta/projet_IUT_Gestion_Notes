<?php

	include("pdo.php");

	if (isset($_POST["login"])) 
	{

		$req = $pdo->prepare('INSERT INTO users(name, login, phone, passwd, mail, group_id, rank) VALUES(:name, :login, :phone, :passwd, :mail, :group_id, :rank)');
		$req->execute(array(
		'name' => $_POST["name"],
		'login' => $_POST["login"],
		'phone' => $_POST["phone"],
		'passwd' => md5($_POST["passwd"]),
		'mail' => $_POST["email"],
		'group_id' => $_POST["group"],
		'rank' => $_POST["rank"]
		));
		echo "L'utilisateur a bien été ajouté.";
		exit;
	}
	else
	{
		header("Location: add_user.php");
		exit;
	}
?>