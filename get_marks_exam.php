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

	function add_marks_exam($exam_id)
	{

		include("pdo.php");
		include("get_users.php");
		$req=$pdo->query("SELECT group_id from exams WHERE id=".$exam_id);
		$data=$req->fetch();
		$groupe=$data[0];
		$req2=$pdo->query("SELECT * FROM users WHERE id NOT IN(SELECT user_id FROM marks WHERE exam_id=".$exam_id.") AND rank=0 AND group_id=".$groupe);
		
		while ($data2=$req2->fetch()) 
		{
			$user=get_user($data2['id']);
			echo '<tr>';
			echo '<td>'.$user.'</td>';
			echo '<form action="add_note.php" method="post" name="form" id="form"><td><input type="text" name="note" id="note"></td>';
			echo "<td style=\"text-align: center;\">
				<input type=\"hidden\" name=\"user_id\" id=\"user_id\" value=".$data2["id"].">
				<input type=\"hidden\" name=\"exam_id\" id=\"exam_id\" value=".$exam_id.">
				<a href=\"javascript:{}\" onClick=form.submit()><i class=\"fa fa-check\"></i></a></td>
				</form>";
			echo '</tr>';
		}

	}

?>