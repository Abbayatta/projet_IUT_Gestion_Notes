<?php

function overall_avg_calculator($user_id)
{
	include("pdo.php");
	$req = $pdo->prepare('SELECT lesson_name,lesson_coefficient FROM lessons,groups,users WHERE lessons.group_id=groups.id AND groups.id=users.group_id AND users.id= ?');
	$req->execute(array($user_id));

	$tot=0;
	$tot_coef=0;

	while ($data=$req->fetch()) 
	{
		$lesson_avg = lesson_avg_calculator($data['lesson_name'],$user_id);
		$tot+=$lesson_avg[0]*$lesson_avg[1];
		$tot_coef+=$lesson_avg[1];
	}

	if($tot==0)
	{
		return '-';
	}
	else
	{
		$overall_avg=$tot/$tot_coef;
		$req->closeCursor();
		return number_format((float)$overall_avg, 2, '.', '');
	}
}

?>