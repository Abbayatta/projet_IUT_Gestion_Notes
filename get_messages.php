<?php

	function get_all_messages($user_id)
	{
		include("pdo.php");
		include("get_users.php");
		$req=$pdo->query("SELECT *, DATE_FORMAT(date, '%d/%m/%Y à %h:%i') AS prettyDate FROM messages WHERE recipient_id=$user_id ORDER BY id DESC");

		while ($data=$req->fetch()) 
		{
			$sender=get_user($data["recipient_id"]);
			echo '<tr>';
			echo '<td>'.$data["prettyDate"].'</td>';
			echo "<td><a href='read_message.php?id_msg=".$data[0]."''>".$data["subject"]."</td>";
			echo '<td>'.$sender.'</td>';			

			if($data["state"]==0){echo '<td>Non lu</td>';}
			else{echo '<td>Lu</td>';}

			echo "<td style=\"text-align: center;\"><form method=\"post\" action=\"delete_message.php\">
			<input type=\"hidden\" name=\"id\" value=".$data["id"].">
			<a href=\"javascript:;\" onclick=\"parentNode.submit();\"><h4><i class=\"fa fa-trash-o\"></i></h4></a>
			</form>";

			echo '</tr>';
		}
	}