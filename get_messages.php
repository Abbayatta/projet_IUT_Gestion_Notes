<?php

	function get_user_messages_subject($user_id)
	{
		include("pdo.php");
		$req=$pdo->query('SELECT subject FROM messages WHERE recipient_id='.$user_id);
		
		while ($data=$req->fetch()) 
		{
			echo "<li class=\"message-preview\">";
			echo "<a href=\"#\">";
			echo "<span class=\"avatar\"><i class=\"fa fa-bell\"></i></span>";
			echo "<span class=\"message\">".$data[0]."</span></a></li>";
		}
	}
	
	function get_nb_messages($user_id)
	{
		include("pdo.php");
		$req=$pdo->query('SELECT count(*) FROM messages WHERE recipient_id='.$user_id);

		while ($data=$req->fetch()) 
		{
			return $data[0];
		}
	}

?>