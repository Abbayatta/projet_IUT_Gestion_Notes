<?php

	function get_all_ue()
	{
		include("pdo.php");

		$req=$pdo->query('SELECT * FROM teachingunit');

		while ($data=$req->fetch()) 
		{
			include("pdo.php");

			$req=$pdo->query('SELECT * FROM teachingunit');

			while ($data=$req->fetch()) 
			{

				echo '<tr>';
				echo '<td>'.$data["name"].'</td>';
				echo '<td></td>';

				$req2=$pdo->query('SELECT name FROM departments WHERE id='.$data["dept_id"].'');
				$data2=$req2->fetch();
				$dept_name=$data2["name"];
				echo '<td>'.$dept_name.'</td>';

				echo '<td>'.$data["description"].'</td>';
				echo "<td style=\"padding-left: 45px;\"><form method=\"post\" action=\"delete_ue.php\">
					<input type=\"hidden\" name=\"id\" value=".$data["id"].">
					<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"fa fa-trash-o\"></i></h4></a>
				</form>";
				echo '</tr>';

			}
		}
	}
	
	function get_ue_list()
	{
		include("pdo.php");
		$req=$pdo->query('SELECT * FROM teachingunit');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["description"]." [".$data["name"]."]".'</option>';
			}
	}
?>