<!DOCTYPE html>
<html>

<head>
  <title></title>
  <meta charset="utf-8">
   <style type="text/css">
    * {
      box-sizing: border-box;
    }
  
     .A {
     	width: 350px;
	     text-decoration: none;
	      font-size: 25px;
	      font-weight: bold;
	      margin-top: 30px;
	      display: inline-block;
	      vertical-align: top;
	      position: relative;
    }
    .sub-menu {
    height: 250px;
    width: 350px;
    background-color: white;
     float: left;
      color: black;
      position: absolute;
    }
  </style>
</head>
<body>
 <?php est_connecté(); ?>
<div style="width: 90%; background-color: #51bfd0; height: 80px; margin-left: 5%; border-radius: 5px 5px 0px 0px; margin-top: 1%;">
  <h2 style="float: left;  margin-left: 32%; color: #f8fdfd">CREER ET PARAMETRER VOS QUIZZ</h2> <br>
      <h3 style="float: right;  background-color: #3addd6; width: 120px; height: 35px; margin-top: 2px; margin-right: 2%; color: #f8fdfd; border-radius: 2px 2px 2px 2px; "><a href="index.php?statut=logout" style="text-decoration: none;">Deconnexion</a></h3></strong>
              
<div>
<?php

echo "<div style='width: 350px; height: 120px; background-color: #51bfd0; border-radius: 10px 10px 0px 0px; margin-lef: 2%; margin-top: 11.5%;'>";

echo "<div style='overflow: hidden; border-radius: 50px; -webkit-border-radius: 100px; -moz-border-radius: 70px; height: 120px; width: 120px;'>";
echo '<img src="'.$_SESSION['photo'].'"  height="120"; width="120">';
echo "</div>";

echo "<div style='margin-left: 35%; margin-top: -24%;'>";
	echo $_SESSION['prenom']."<br>";
	echo $_SESSION['nom']."<br>";
	echo "</div>";
	echo "</div>";
?>

        <div class="sub-menu">
          <div class="A">
           <a href="index.php?lien=accueil&nomv=1" style="margin-left: 5%; text-decoration: none;">Liste Questions</a>
            <img src="./asset/img/ic-liste-active.png" style="margin-left: 35%;">
          </div>
          <div class="A">
            <a href="index.php?lien=accueil&nomv=2" style="margin-left: 5%; text-decoration: none;">Créer Admin</a>
            <img src="./asset/img/ic-ajout-active.png" style="margin-left: 41%;">
          </div>
           <div class="A">
            <a href="index.php?lien=accueil&nomv=3" style="margin-left: 5%; text-decoration: none;">Liste Joueurs</a>
             <img src="./asset/img/ic-liste-1.png" style="margin-left: 41%;">
          </div>
          <div class="A">
            <a href="index.php?lien=accueil&nomv=4" style="margin-left: 5%; text-decoration: none;">Creer Question</a>
             <img src="./asset/img/ic-ajout.png" style="margin-left: 35%;">
          </div>
        </div>


<div style="width: 800px; margin-left: 34%; background-color: white; margin-top: -16%; border-radius: 5px; height: 550px;">
    <?php  
    //echo "<h1>NOMV = ".$_GET['nomv']." </h1>";
    if (isset($_GET['nomv'])) 
    	{    		if ($_GET['nomv']=="1") {
    				include_once("creer_questions.php");
    			}
    			elseif($_GET['nomv']=="2") 
    			{
    				include_once("Inscription.php");
    			}
    			elseif($_GET['nomv']=="3")
    			{
    				include_once('liste.php');
    			}
    			elseif($_GET['nomv']=="4") 
    			{
    				include_once('question.php');	
    			}
    }
    ?>
</div>
</body>
</html>