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

			$req3=$pdo->query('SELECT COUNT(id) as count FROM users WHERE group_id='.$data["id"].'');
			$data3=$req3->fetch();
			$stud_count=$data3["count"];
			echo '<td>'.$stud_count.'</td>';

			echo '</tr>';

		}
	}
	
	function get_prof_groups($user_id)
	{
		include("pdo.php");

		$req=$pdo->query('SELECT * FROM groups WHERE group_id=(SELECT group_id FROM users WHERE id='.$user_id.')');

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
?>