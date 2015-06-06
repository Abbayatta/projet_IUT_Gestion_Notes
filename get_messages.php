<?php

	function get_all_messages($user_id)
	{
		include("pdo.php");
		include("get_users.php");
		$req=$pdo->query("SELECT * FROM messages WHERE recipient_id=$user_id ORDER BY id DESC");

		while ($data=$req->fetch()) 
		{
			$sender=get_user($data["recipient_id"]);
			echo '<tr>';
			echo "<td><a href='read_message.php?id_msg=".$data[0]."''>".$data["subject"]."</td>";
			echo '<td>'.$sender.'</td>';
			echo '<td>'.$data["date"].'</td>';

			if($data["state"]==0){echo '<td>Non lu</td>';}
			else{echo '<td>Lu</td>';}

			echo '</tr>';
		}
	}