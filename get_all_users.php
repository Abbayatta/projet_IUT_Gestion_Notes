<?php

	function get_all_users()
	{
		include("pdo.php");
		include("get_department.php");
		include("get_group.php");
		$req=$pdo->query('SELECT * FROM users');

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

?>