<?php

	function get_all_exams()
	{
		include("pdo.php");
		include("get_users.php");
		include("get_groups.php");
		$req=$pdo->query('SELECT * FROM exams');

		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td>'.$data["title"].'</td>';
			echo '<td>'.$data["date"].'</td>';
			echo '<td>'.$data["begins"].'</td>';
			echo '<td>'.$data["ends"].'</td>';
			echo '<td>'.get_user($data["user_id"]).'</td>';
			echo '<td>'.get_group($data["group_id"]).'</td>';
			echo '<td>'.$data["exam_coefficient"].'</td>';
			if ($data["locked"]==0)
			{
				echo '<td>Non</td>';
			}
			else
			{
				echo '<td>Oui</td>';
			}
			echo '</tr>';
		}
	}
	
	function get_prof_exams($user_id)
	{
		include("pdo.php");
		include("get_users.php");
		include("get_groups.php");
		$req=$pdo->query('SELECT * FROM exams WHERE user_id='.$user_id);

		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td>'.$data["title"].'</td>';
			echo '<td>'.$data["date"].'</td>';
			echo '<td>'.$data["begins"].'</td>';
			echo '<td>'.$data["ends"].'</td>';
			echo '<td>'.get_user($data["user_id"]).'</td>';
			echo '<td>'.get_group($data["group_id"]).'</td>';
			echo '<td>'.$data["exam_coefficient"].'</td>';
			if ($data["locked"]==0)
			{
				echo '<td>Non</td>';
			}
			else
			{
				echo '<td>Oui</td>';
			}
			echo '</tr>';
		}
	}

?>