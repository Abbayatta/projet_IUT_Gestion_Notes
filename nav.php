<?php

// Il faut compter les messages de l'utilisateur connecté
// Modifier le '2' et mettre la variable contenant le nombre de message puis afficher les messages avec une fonction PHP à la place de 'annonce 1' et 'annonce 2'

if ($_SESSION["rank"]==2) 
{

echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SCODOC</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="users.php"><i class="fa fa-list-ol"></i> Utilisateurs</a></li>
                    <li><a href="groups.php"><i class="fa fa-globe"></i> Groupes</a></li>
                    <li><a href="ue.php"><i class="fa fa-font"></i> UE</a></li>
                    <li><a href="lessons.php"><i class="fa fa-font"></i> Matières</a></li>
                    <li><a href="exams.php"><i class="fa fa-list-ol"></i> Evaluations</a></li>
                    <li><a href="marks.php"><i class="fa fa-font"></i> Notes</a></li>  
					<li><a href="stats.php"><i class="fa fa-tasks"></i> Statistiques</a></li>					
                </ul>
                 <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
						
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">2 Nouveau(x) message(s)</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Annonce 1</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Annonce 2</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Boîte mail <span class="badge">2</span></a></li>
                        </ul>
                    </li>
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '.$_SESSION["name"].'<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>
                            <li><a href="options.php"><i class="fa fa-gear"></i> Options</a></li>
                            <li class="divider"></li>
                            <li><a href="logoff.php"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>';
}

else if($_SESSION["rank"]==1)
{
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">? Nouveau(x) message(s)</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Annonce</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Annonce</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Boîte mail <span class="badge">2</span></a></li>
                        </ul>
                    </li>
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '.$_SESSION["name"].'<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>
                            <li><a href="options.php"><i class="fa fa-gear"></i> Options</a></li>
                            <li class="divider"></li>
                            <li><a href="logoff.php"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>';
}

else
{
    exit;
}

?>