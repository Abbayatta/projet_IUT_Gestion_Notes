<?php

	function get_all_departments()
	{
		include("pdo.php");

		$req=$pdo->query('SELECT * FROM departments');
		while ($data=$req->fetch()) 
		{
			echo '<tr>';
			echo '<td>'.$data["name"].'</td>';
			$req_admin=$pdo->query('SELECT name FROM users WHERE id='.$data["admin_id"]);
			$data_admin=$req_admin->fetch();
			echo '<td>'.$data_admin["name"].'</td>';
			echo "<td style=\"padding-left: 45px;\"><form method=\"post\" action=\"delete_department.php\">
					<input type=\"hidden\" name=\"id\" value=".$data["id"].">
					<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"fa fa-trash-o\"></i></h4></a>
				</form>";
			echo '</tr>';
		}
	}
	
	function get_department($dept_id)
	{
		include("pdo.php");

		$req=$pdo->prepare('SELECT name FROM departments WHERE id= ?');
		$req->execute(array($dept_id));
		$data=$req->fetch();
		$name=$data["name"];
		return $name;
	}
	
	function get_departments_list()
	{
		include("pdo.php");
		$req=$pdo->query('SELECT id,name FROM departments');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["name"].'</option>';
			}
	}
?>