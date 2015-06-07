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
			echo '<td>'.get_lessons_ue($data["teachingunit_id"]).'</td>';
			echo '<td >'.$data["lesson_coefficient"].'</td>';
			echo "<td style=\"padding-left: 45px;\"><form method=\"post\" action=\"delete_lesson.php\">
					<input type=\"hidden\" name=\"id\" value=".$data["id"].">
					<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"fa fa-trash-o\"></i></h4></a>
				</form>";
			echo '</tr>';
		}
	}
	
	function get_prof_lessons($id) {
		include("pdo.php");
		include("get_users.php");
		include("get_groups.php");
		$req=$pdo->query('SELECT * FROM lessons WHERE user_id='.$id);

		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td>'.$data["lesson_name"].'</td>';
			echo '<td>'.get_user($data["user_id"]).'</td>';
			echo '<td>'.get_group($data["group_id"]).'</td>';
			echo '<td>'.get_lessons_ue($data["teachingunit_id"]).'</td>';
			echo '<td >'.$data["lesson_coefficient"].'</td>';
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
	
	function get_lessons_ue($id_ue)
	{
		include("pdo.php");
		$req=$pdo->query('SELECT name, description FROM teachingunit');

		$data=$req->fetch();
		
		return $data[1]." [".$data[0]."]";
	}
?>