<?php

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