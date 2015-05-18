<?php

	function get_lessons_list()
	{
		include("pdo.php");
		$req=$pdo->query('SELECT id,lesson_name FROM lessons');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["lesson_name"].'</option>';
			}
	}
?>