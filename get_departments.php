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
	
	function get_departments_list()
	{
		include("pdo.php");
		$req=$pdo->query('SELECT id,name FROM departments');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["name"].'</option>';
			}
	}
?>