
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scodoc - Project</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>        
</head>
<body>

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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> François Hollande<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
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
          <h1 class="text-left">M. François HOLLANDE</h1>
	</div>
	<div class="span4">
	  <!--(tech):FIXME:reformater affichage date -->
	  <h3 class="text-right">
	    Semestre 3 FAP 2014 - 2015	  </h3>
	</div>
      </div>

              <div class="row">
	<div>
	<table class="table table-striped table-hover">
	    <caption>Tableau des notes</caption>
	  <thead>
	    <tr>
      <th>UE</th>
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
	    <td>10</td>
	    <td></td>
	  </tr>
		<!--(tech):DEBUT Affichage UE -->
         	 	  <tr> 
	    <td><i class="icon-plus-sign"></i>UE 31</td>
	    <td></td>
	    <td></td>
	    <td>10</td>
	    <td>4</td>
	  </tr>
<!--(tech):DEBUT Affichage les modules de UE -->
         	  
	  <tr> 
	    <td></td>
	    <td>M3101 Principes des systèmes d'exploitation</td>
	    <td></td>
	    <td>-</td>
	    <td>2.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3102 Services réseaux</td>
	    <td></td>
	    <td>-</td>
	    <td>1.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3103 Algorithmique avançée</td>
	    <td></td>
	    <td>10</td>
	    <td>1.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3104 Programmation Web côté serveur</td>
	    <td></td>
	    <td>10</td>
	    <td>2.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3105 Conception et programmation objet avançées</td>
	    <td></td>
	    <td>-</td>
	    <td>2.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3106C Bases de données avançées</td>
	    <td></td>
	    <td>-</td>
	    <td>1.5</td>
	  </tr>
          	    	  
	  	  	  <!--(tech):FIN Affichage les modules de UE -->
	  	 	  <tr> 
	    <td><i class="icon-plus-sign"></i>UE 32</td>
	    <td></td>
	    <td></td>
	    <td>10</td>
	    <td>8.5</td>
	  </tr>
<!--(tech):DEBUT Affichage les modules de UE -->
         	  
	  <tr> 
	    <td></td>
	    <td>M3201 Probabilités et statistiques</td>
	    <td></td>
	    <td>10</td>
	    <td>2.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3202C Modélisations mathématiques</td>
	    <td></td>
	    <td>10</td>
	    <td>1.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3203 Droit des TIC</td>
	    <td></td>
	    <td>10</td>
	    <td>2.0</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3204 Gestion des systèmes d'information</td>
	    <td></td>
	    <td>-</td>
	    <td>2.0</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3205 Expression-Communication - Communication professionnelle</td>
	    <td></td>
	    <td>-</td>
	    <td>1.5</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3206 Collaborer en anglais</td>
	    <td></td>
	    <td>10</td>
	    <td>2.5</td>
	  </tr>
          	    	  
	  	  	  <!--(tech):FIN Affichage les modules de UE -->
	  	 	  <tr> 
	    <td><i class="icon-plus-sign"></i>UE 33</td>
	    <td></td>
	    <td></td>
	    <td>NA</td>
	    <td>0</td>
	  </tr>
<!--(tech):DEBUT Affichage les modules de UE -->
         	  
	  <tr> 
	    <td></td>
	    <td>M3301 Méthodologie de la production d'applications</td>
	    <td></td>
	    <td>-</td>
	    <td>3.0</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3302 Projet tutoré - Mise en situation professionnelle</td>
	    <td></td>
	    <td>-</td>
	    <td>2.0</td>
	  </tr>
          	    	  
	  	  	  
	  <tr> 
	    <td></td>
	    <td>M3303 PPP - Préciser son projet</td>
	    <td></td>
	    <td>-</td>
	    <td>1.0</td>
	  </tr>
          	    	  
	  	  	  <!--(tech):FIN Affichage les modules de UE -->
	  	  <!--(tech):FIN Affichage les modules de UE -->	 
      </tbody>
	</table>
	</div>
      </div>       
	</div>
</body>
</html>
