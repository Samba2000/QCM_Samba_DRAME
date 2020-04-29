<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> QUIZZ </title>
<link rel="stylesheet" type="text/css" href="./asset/css/style.css">
</head>
<body>
<div class="header">
<div class="logo "></div>
<div class="header-text">Le Plaisir De Jouer</div>
</div>
<div class="content">
	
<?php  
session_start();
require_once("./src/fonction.php");

if (isset($_GET['lien'])) 
{
	if ($_GET['lien']=='accueil')
	{
	 		require_once("php/admin.php");
	}
elseif ($_GET['lien']=='jeux')
	{
		require_once("php/jouer.php");
	 } 
	
}
else
{
	if (isset($_GET['statut']) && $_GET['statut']==="logout") 
	{
		deconnexion();
	}
	require_once("connexion.php");
}

?>

</div>
</body>
</html>