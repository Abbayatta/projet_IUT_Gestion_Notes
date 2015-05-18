<?php

	function get_group($group_id)
	{
		include("pdo.php");
		$req=$pdo->prepare('SELECT group_name FROM groups WHERE id= ?');
		$req->execute(array($group_id));
		$data=$req->fetch();
		$name=$data["group_name"];
		return $name;
	}

?>