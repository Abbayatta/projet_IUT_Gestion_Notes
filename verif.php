<?php

session_start();

include("pdo.php");

$req="SELECT * FROM users WHERE login like '".$_POST["inputAccount"]."' AND passwd like '".md5($_POST["inputPassword"])."'";
$res = $pdo->query($req);
$donnees=$res->fetch();

if (!empty($donnees)) 
{
   $_SESSION["login"]=$donnees["login"];
   $_SESSION["id"]=$donnees["id"];
   $_SESSION["name"]=$donnees["name"];
   $_SESSION["rank"]=$donnees["rank"];
   header("Location: index.php");
   exit();
}

else
{
	$_SESSION["fail"]="fail";
   header("Location: index.php");
   exit();
}
?>

