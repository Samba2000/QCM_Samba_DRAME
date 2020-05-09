<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des questions</title>
    <style>
   .Am {
     	width: 250px;
	    text-decoration: none;
	    font-size: 24px;
        border: 2px solid gray;
        border-radius: 5px 5px 5px 5px;
        background-color: gray;
	    font-weight: bold;
        color: gray;
        float:left;
        margin-left: 5%;
    }
    .gor {
    height: 50px;
    width: 800px;
    float:left;
    margin-left: 20%;
    }
    .ho {
        width: 800px;
    }
    .ba {
        float:left;
        width: 800px;
    }
    </style>
</head>
<body>
<div class="ba">
<div class="gor">
          <div class="Am">
           <a href="index.php?lien=accueil&nomv=1&nom=1" style="margin-left: 5%; text-decoration: none;">Nbre questions par jeu</a>
          </div>
          <div class="Am">
            <a href="index.php?lien=accueil&nomv=1&nom=2" style="margin-left: 5%; text-decoration: none;">Modifier</a>
          </div>
</div>
<div class="ho">
<?php   
if (isset($_GET['nom'])) 
    {    
        if ($_GET['nom']=="1") 
        {
            include_once("creer_questions.php");
        }
        elseif($_GET['nom']=="2") 
        {
            include_once("modifier.php");
        }
    }
?>
</div> 
</div>
</body>
</html>