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
?>