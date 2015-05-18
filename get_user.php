<?php

	function get_user($user_id)
	{
		include("pdo.php");
		$req=$pdo->prepare('SELECT name FROM users WHERE id= ?');
		$req->execute(array($user_id));
		$data=$req->fetch();
		$name=$data["name"];
		return $name;
	}

?>