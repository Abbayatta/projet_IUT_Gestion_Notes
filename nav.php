<?php

if ($_SESSION["rank"]==2) 
{
	include ("get_messages_admin.php");
}

else if($_SESSION["rank"]==1)
{
	include ("get_messages_prof.php");
    
}

else if($_SESSION["rank"]==0)
{
	include ("get_messages_eleve.php");
	
}

else
{
    exit;
}

?>