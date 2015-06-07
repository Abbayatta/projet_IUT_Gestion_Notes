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
			echo "<td style=\"text-align: center;\"><form method=\"post\" action=\"delete_mark.php\">
				<input type=\"hidden\" name=\"id\" value=".$data["id"].">
				<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"fa fa-trash-o\"></i></h4></a>
				</form>";
			echo '</tr>';
		}

	}

?>