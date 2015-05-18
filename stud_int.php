<?php

	include("pdo.php");
	include("average_calculator.php");
	include("overall_average_calculator.php");
?>

	<div id="wrapper">		
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand" href="index.html">Projet Scodoc</span>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tasks"></i> Semestres </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Semestre 1 </a></li>
                            <li class="divider"></li>
                            <li><a href="#">Semestre 2 </a></li>
                            <li class="divider"></li>
                            <li><a href="#">Semestre 3 </a></li>
                        </ul>
                    </li>
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo ' '.$_SESSION["name"]; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Mon profil</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Options</a></li>
                            <li class="divider"></li>
                            <li><a href="logoff.php"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
  </div>
  
  <div class="container">
      <div class="row" style='background-color: #033c73; color: #fff;'>
	<div class="span8">
	  <!--(tech):201306:FIXME tag "br"-->
	  <!-- <br /> -->
	  <br />
	  	  <h1 class="text-center">Bulletin de notes</h1>
	  <br />
	</div>
      </div>
    </div>
     <!--OK   ; 
       -->
    <div class="container" style="margin-bottom: 20px;">
                        
      <!--(tech):FIXME:alignement -->
      <div class="row well">
	<div class="span7">
          <h1 class="text-left"><?php echo $_SESSION["name"]; ?></h1>
	</div>
	<div class="span4">
	  <!--(tech):FIXME:reformater affichage date -->
	  <h3 class="text-right">
	    Semestre 3 FAP 2014 - 2015</h3>
	</div>
      </div>

              <div class="row">
	<div>
	<table class="table table-striped table-hover">
	    <caption>Tableau des notes</caption>
	  <thead>
	    <tr>
      <th>UE (WIP)</th>
      <th>Module</th>
      <th>Evaluation</th>
      <th>Note/20</th>
      <th>Coef</th>
    </tr>
      </thead>
      <tbody>
		<!--(tech):doc:cf http://twitter.github.io/bootstrap/base-css.html -->
	  <tr class="lead info">
	    <td colspan="3">Moyenne générale: </td>
	    <?php
	    echo "<td>".overall_avg_calculator($_SESSION["id"])."</td>";
	    ?>
	 	<td></td>
	  </tr>
		<!--(tech):DEBUT Affichage UE -->
      <tr> 
	    <td><i class="icon-plus-sign"></i>UE 31</td>
	    <td></td>
	    <td></td>
	    <td>??</td>
	    <td>??</td>
	  </tr>
<!--(tech):DEBUT Affichage les modules de UE -->
         	  
	<?php
	$req = $pdo->prepare('SELECT lesson_name,lesson_coefficient FROM lessons,groups,users WHERE lessons.group_id=groups.id AND groups.id=users.group_id AND users.id= ?');
	$req->execute(array($_SESSION["id"]));

	while ($data = $req->fetch())
	{
		$i=0;
		$tot=0;
		$avg=0;
		?>

		<tr> 
	    <td><?php echo $data['lesson_name']; ?></td>
	    <td></td>
	    <td></td>
	    <?php

	    $lesson_avg = lesson_avg_calculator($data['lesson_name'],$_SESSION["id"]);

	    echo "<td>".$lesson_avg[0]."</td>";
		echo "<td>".$lesson_avg[1]."</td></tr>";
	}

	$req->closeCursor();

	?>
      </tbody>
	</table>
	</div>
   </div>      
</div>