<?php

	function lesson_avg_calculator($lesson_name,$user_id)
	{
		include("pdo.php");
		$avg_query = $pdo->prepare('SELECT mark,exam_coefficient FROM marks,exams,lessons WHERE marks.exam_id=exams.id AND exams.lesson_id=lessons.id AND lessons.lesson_name= ? AND marks.user_id= ?');
		$avg_query->execute(array($lesson_name,$user_id));
		$i=0;
		$tot=0;
		while ($answer = $avg_query->fetch())
		{
			$tot+=$answer['mark']*$answer['exam_coefficient'];
			$i+=$answer['exam_coefficient'];
		}
		
		if($i==0)
		{
			return(array('-','-'));
		}
		else
		{
		$avg=$tot/$i;
		$avg_query->closeCursor();
		return(array(number_format((float)$avg, 2, '.', ''),$i));
		}
	}