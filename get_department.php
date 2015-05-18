<?php

	function get_department($dept_id)
	{
		include("pdo.php");

		$req=$pdo->prepare('SELECT name FROM departments WHERE id= ?');
		$req->execute(array($dept_id));
		$data=$req->fetch();
		$name=$data["name"];
		return $name;
	}

?>