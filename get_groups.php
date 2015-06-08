<?php

	function get_all_groups()
	{
		include("pdo.php");

		$req=$pdo->query('SELECT * FROM groups');

		while ($data=$req->fetch()) 
		{

			echo '<tr>';
			echo '<td>'.$data["group_name"].'</td>';
			echo '<td></td>';

			$req2=$pdo->query('SELECT name FROM departments WHERE id='.$data["dept_id"].'');
			$data2=$req2->fetch();
			$dept_name=$data2["name"];
			echo '<td>'.$dept_name.'</td>';

			$req3=$pdo->query('SELECT COUNT(*) as count FROM users WHERE group_id='.$data["id"].' AND rank=0');
			$data3=$req3->fetch();
			$stud_count=$data3["count"];
			echo '<td >'.$stud_count.'</td>';
			echo "<td style=\"padding-left: 45px;\"><form method=\"post\" action=\"delete_group.php\">
					<input type=\"hidden\" name=\"id\" value=".$data["id"].">
					<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"fa fa-trash-o\"></i></h4></a>
				</form>";
			echo '</tr>';

		}
	}
	
	function get_prof_groups($user_id)
	{
		include("pdo.php");

		$req=$pdo->query('SELECT * FROM groups WHERE id=(SELECT group_id FROM users WHERE id='.$user_id.')');

		while ($data=$req->fetch()) 
		{

			echo '<tr>';
			echo '<td>'.$data["group_name"].'</td>';
			echo '<td></td>';

			$req2=$pdo->query('SELECT name FROM departments WHERE id='.$data["dept_id"].'');
			$data2=$req2->fetch();
			$dept_name=$data2["name"];
			echo '<td>'.$dept_name.'</td>';

			$req3=$pdo->query('SELECT COUNT(id) as count FROM users WHERE group_id='.$data["id"].'');
			$data3=$req3->fetch();
			$stud_count=$data3["count"];
			echo '<td>'.$stud_count.'</td>';

			echo '</tr>';

		}
	}
	
	function get_group($group_id)
	{
		include("pdo.php");
		$req=$pdo->prepare('SELECT group_name FROM groups WHERE id= ?');
		$req->execute(array($group_id));
		$data=$req->fetch();
		$name=$data["group_name"];
		return $name;
	}
	
	function get_groups_list()
	{
		include("pdo.php");
		$req=$pdo->query('SELECT id,group_name FROM groups');

		while ($data=$req->fetch()) 
			{
				echo '<option value="'.$data["id"].'">'.$data["group_name"].'</option>';
			}
	}
	
	function get_groups_list_user($user_id)
	{
		include("pdo.php");
		$group_id=$pdo->query('SELECT group_id FROM users WHERE id='.$user_id);
		$group_id2=$group_id->fetch();
		
		$req=$pdo->query('SELECT id,group_name FROM groups');

		while ($data=$req->fetch()) 
			{	if ($data["id"]==$group_id2[0]) {				
					echo '<option value="'.$data["id"].'" selected>'.$data["group_name"].'</option>';
				}
				
				else {
					echo '<option value="'.$data["id"].'">'.$data["group_name"].'</option>';
				}
			}
	}
?>