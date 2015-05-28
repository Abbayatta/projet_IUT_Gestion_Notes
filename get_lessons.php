<?php

	function get_all_lessons()
	{
		include("pdo.php");
		include("get_users.php");
		include("get_groups.php");
		$req=$pdo->query('SELECT * FROM lessons');

		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td>'.$data["lesson_name"].'</td>';
			echo '<td>'.get_user($data["user_id"]).'</td>';
			echo '<td>'.get_group($data["group_id"]).'</td>';
			echo '<td>'.$data["lesson_coefficient"].'</td>';
			echo '</tr>';
		}
	}
	
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