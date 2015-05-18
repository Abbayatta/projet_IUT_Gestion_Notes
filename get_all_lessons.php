<?php

	function get_all_lessons()
	{
		include("pdo.php");
		include("get_user.php");
		include("get_group.php");
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

?>