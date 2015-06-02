<?php

	function get_all_users()
	{
		include("pdo.php");
		include("get_departments.php");
		include("get_groups.php");
		$req=$pdo->query('SELECT * FROM users');

		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td style="text-align: center;">'.$data["id"].'</td>';
			echo '<td>'.$data["login"].'</td>';
			echo '<td>'.$data["name"].'</td>';
			echo '<td>'.$data["mail"].'</td>';
			echo '<td style="text-align: center;">'.$data["phone"].'</td>';
			echo '<td style="text-align: center;">'.get_department($data["dept_id"]).'</td>';
			echo '<td>'.get_group($data["group_id"]).'</td>';
			if ($data["rank"]==0)
			{
				echo '<td>Etudiant</td>';
			}
			else if($data["rank"]==1)
			{
				echo '<td>Professeur</td>';
			}
			else
			{
				echo '<td>Administrateur</td>';
			}
			echo "<td style=\"text-align: center;\"><form method=\"post\" action=\"modify_user.php\">
					<input type=\"hidden\" name=\"id\" value=".$data["id"].">
					<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"glyphicon-pencil\"></i></h4></a>
				</form>";
			echo '</tr>';
		}
	}
	
	function get_prof_users($user_id)
	{
		include("pdo.php");
		include("get_departments.php");
		include("get_groups.php");
		$req=$pdo->query('SELECT * FROM users WHERE dept_id=(SELECT dept_id FROM users WHERE id='.$user_id.')');

		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td>'.$data["id"].'</td>';
			echo '<td>'.$data["login"].'</td>';
			echo '<td>'.$data["name"].'</td>';
			echo '<td>'.$data["mail"].'</td>';
			echo '<td>'.$data["phone"].'</td>';
			echo '<td>'.get_department($data["dept_id"]).'</td>';
			echo '<td>'.get_group($data["group_id"]).'</td>';
			if ($data["rank"]==0)
			{
				echo '<td>Etudiant</td>';
			}
			else if($data["rank"]==1)
			{
				echo '<td>Professeur</td>';
			}
			else
			{
				echo '<td>Administrateur</td>';
			}
			echo '</tr>';
		}
	}
	
	function get_user($user_id)
	{
		include("pdo.php");
		$req=$pdo->prepare('SELECT name FROM users WHERE id= ?');
		$req->execute(array($user_id));
		$data=$req->fetch();
		$name=$data["name"];
		return $name;
	}

?>