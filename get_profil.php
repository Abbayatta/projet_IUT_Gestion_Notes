<?php

	function get_profil_element($user_id, $element)
	{
		include("pdo.php");
		$req=$pdo->prepare('SELECT * FROM users WHERE id= ?');
		$req->execute(array($user_id));
		$data=$req->fetch();
		$retour=$data[$element];
		return $retour;
	}

?>