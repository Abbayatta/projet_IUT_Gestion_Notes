<?php

	function get_marks_exam($exam_id)
	{

		include("pdo.php");
		include("get_users.php");
		$req=$pdo->query("SELECT * from marks WHERE exam_id=".$exam_id);
		
		while ($data=$req->fetch()) 
		{
			$user=get_user($data['user_id']);
			echo '<tr>';
			echo '<td>'.$user.'</td>';
			echo '<td>'.$data["mark"].'</td>';
			echo '</tr>';
		}

	}

?>