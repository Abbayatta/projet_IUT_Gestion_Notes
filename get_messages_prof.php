<?php

		include("pdo.php");
        //include("get_users.php");
		$req=$pdo->query('SELECT id,subject,sender_id FROM messages WHERE recipient_id='.$_SESSION["id"]);
		
		echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="exams.php">SCODOC</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="users.php"><i class="fa fa-user"></i> Utilisateurs</a></li>
                    <li><a href="groups.php"><i class="fa fa-list-ol"></i> Groupes</a></li>
                    <li><a href="exams.php"><i class="fa fa-list-ol"></i> Evaluations</a></li>
                    <li><a href="stats.php"><i class="fa fa-tasks"></i> Statistiques</a></li>					
                </ul>
                 <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">'.get_nb_messages($_SESSION["id"]).'</span> <b class="caret"></b></a>
						
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">'.get_nb_messages($_SESSION["id"]).' Nouveau(x) message(s)</li>';
	
        while ($data=$req->fetch()) 
        {
            //$sender=get_user($data[2]);
            echo '<hr><li class="message-preview">';
            echo '<a href="read_message.php?id_msg='.$data[0].'">';
            echo '<span class="avatar"><i class="fa fa-bell"></i></span>';
            echo '<span class="message">'.$data[1].'</span></a></li>';
            //echo '<span class="">De : '.$sender.'</span></a></li>';
        }
		
        echo  '<hr><li><a href="#">Boîte mail <span class="badge">'.get_nb_all_messages($_SESSION["id"]).'</span></a></li>
                        </ul>
                    </li>
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '.$_SESSION["name"].'<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>
                            <li class="divider"></li>
                            <li><a href="logoff.php"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>';
	
	function get_nb_messages($user_id)
	{
		include("pdo.php");
		$req=$pdo->query('SELECT count(*) FROM messages WHERE state=0 AND recipient_id='.$user_id);

		while ($data=$req->fetch()) 
		{
			return $data[0];
		}
	}
	
	function get_nb_all_messages($user_id)
	{
		include("pdo.php");
		$req=$pdo->query('SELECT count(*) FROM messages WHERE recipient_id='.$user_id);

		while ($data=$req->fetch()) 
		{
			return $data[0];
		}
	}

?>