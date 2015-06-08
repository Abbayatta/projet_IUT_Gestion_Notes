<?php

	function get_all_exams()
	{
		include("pdo.php");
		include("get_users.php");
		include("get_groups.php");
		$req=$pdo->query('SELECT *, DATE_FORMAT(date, \'%d/%m/%Y\') AS prettyDate FROM exams');

		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td>'.$data["title"].'</td>';
			echo '<td>'.$data["prettyDate"].'</td>';
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
			echo "<td style=\"padding-left: 45px;\"><form method=\"post\" action=\"delete_exam.php\">
					<input type=\"hidden\" name=\"id\" value=".$data["id"].">
					<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"fa fa-trash-o\"></i></h4></a>
				</form>";
			echo '</tr>';
		}
	}

	function get_exams_list($user_id)
	{
		include("pdo.php");
		$req=$pdo->query('SELECT id,title,date FROM exams WHERE user_id='.$user_id.' ORDER BY title');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["title"].' du '.$data["date"].'</option>';
			}
	}

	function get_all_exams_list()
	{
		include("pdo.php");
		$req=$pdo->query('SELECT id,title,date FROM exams ORDER BY title');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["title"].' du '.$data["date"].'</option>';
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