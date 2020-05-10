<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
    .partie{
        background-color: #3addd6;
         width: 120px; height: 35px;
          color: #f8fdfd;
           border-radius: 5px 5px 5px 5px;
           float: left;
           margin-left: 20%;
           padding: 5px;
           font-size: 25px; 
    }
    .jeux{
        width:800px;
        margin-left: 20%;
    }
    </style>
</head>
<body>
<div>
<div class="jeux">
          <div class="partie">
           <a href="index.php?lien=jeux&mot=1" style="margin-left: 5%; text-decoration: none;">JOUER</a>
          </div>
          <div class="partie">
            <a href="index.php?lien=jeux&mot=2" style="margin-left: 5%; text-decoration: none;">RECAP</a>
          </div>
</div>
<br><br>
<div class="lien">
<?php   
if (isset($_GET['mot'])) 
    {    
        if ($_GET['mot']=="1") 
        {
            include_once("teste.php");
        }
        elseif($_GET['mot']=="2") 
        {
            include_once("resultat.php");
        }
    }
    ?>
</div>
</div>
</body>
</html>