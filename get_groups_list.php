<?php

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