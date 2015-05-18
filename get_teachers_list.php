<?php

	function get_teachers_list()
	{
		include("pdo.php");
		$req=$pdo->query('SELECT id,name FROM users WHERE rank=1');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["name"].'</option>';
			}
	}
?>