<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZ</title>
    <style>
    .A {
     	width: 250px;
	     text-decoration: none;
	      font-size: 20px;
	      font-weight: bold;
          float:left;
          margin-left: -22%;
    }
    .sub-menu {
    height: 250px;
    width: 350px;
    color: black;
    margin-left: 76%;
    margin-top: -30%;
    float:left;
    }
    .h {
    height: 250px;
    width: 320px;
    color: black;
    margin-left: 72%;
    float:left;
    margin-top: -25%;
    }
    .point{
        width:6%; height:30px; 
        background-color:#B7BABA; 
        margin-left: 93.5%;
        margin-top: 2%;
        font-size: 20px;
        font-weight: bold;
        padding:2px;
        border-radius: 5px 5px 5px 5px;
    }
    .affiche{
        width: 350px;
	     text-decoration: none;
	      font-size: 20px;
	      font-weight: bold;
          float:left;
          margin-left: 5%;
    }
    </style>
</head>
<form action="#" id="form" method="POST">
<body>
<div style="width: 90%; background-color: #51bfd0; height: 120px; margin-left: 5%; border-radius: 5px 5px 0px 0px;
             margin-top: -1.3%; ">
  <h2 style="text-align:center; color: #f8fdfd; font-weight: bold; padding:2%;">
            BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br>
            JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</h2><br>
      <h3 style="float: right;  background-color: #3addd6; width: 120px; height: 35px; 
      margin-top: -9%; margin-right: 2%; color: #f8fdfd; border-radius: 5px 5px 5px 5px; ">
      <a href="index.php?statut=logout" style="text-decoration: none; padding:10px; ">Deconnexion</a></h3></strong>
   <div style="float: left; margin-top:-11.5%;">
   <?php est_connecté(); 
    $donnees=file_get_contents("./asset/json/user.json");
    $donnees=json_decode($donnees, true);

    echo "<div style='overflow: hidden; border-radius: 70px; -webkit-border-radius: 80px; -moz-border-radius: 50px; height: 100px; width: 100px;'>";
    echo '<img src="'.$_SESSION['photo'].'"  height="100"; width="100">';
    echo "</div>";

    echo "<div style=' margin-top: -20%;'>";
	echo '<h4>'.$_SESSION['prenom'].' '.$_SESSION['nom']."</h4>";
	echo "</div>";
?>
   </div>           
</div>
<div style="width:90%; height:600px; margin-left: 5%; background-color:white; margin-top:0.5%; border-radius: 5px 5px 5px 5px;">

<div style="width:70%; height:400px; ;border:2px solid #f8fdfd; border-radius: 5px 5px 5px 5px;">
<fieldset style="margin-top: 8%">
<div style="width:100%; height:100px; background-color:#B7BABA; border-radius: 5px 5px 5px 5px;">
<?php ob_start();
$data=file_get_contents("./asset/json/question.json");
$data=json_decode($data, true);

$nombre=file_get_contents("./asset/json/nombre.json");
$nombre=json_decode($nombre, true);

if(!isset($_SESSION['scores']) && !isset($_SESSION['trouvé']))
{
    $_SESSION['scores']=0;
    $_SESSION['trouvé']=0;
    $_SESSION['point']=0;
}
echo ($_SESSION['scores']).' points';
//On définit le nombre d'éléments à afficher par page
$nbreParPage=1;
//Cette variable détermine la taille du tableau 
$nbreElement=$nombre['nombre'];
//Cette variable détermine le nombre de pages.
//La fonction ceil arrondit le nombre à l'entier supérieur
$nbreDePage=ceil($nbreElement/$nbreParPage);
    if(isset($_GET['page'])) // Si la variable $PageEncour existe...
    {
    $PageEncour=intval($_GET['page']); 
    
        if($PageEncour>$nbreDePage) 
        // Si la valeur de $pagencour (le numéro de la page) est plus grande que $nbreDePage...
        {
        $PageEncour=$nbreDePage;
        }
    }
    else // Sinon
    {
        $PageEncour=1; // La page actuelle est la n°1    
    }
    $indiceDebut=($PageEncour-1)*$nbreParPage; 
    $indiceFin= $PageEncour*$nbreParPage-1;

    for ($i=$indiceDebut; $i <= $indiceFin; $i++) 
    { 
        if (array_key_exists($i, $data)) 
        {
            
            if($data[$i]['Choix']=='multiple')
						{
                            echo "<div style='font-size: 25px;font-weight: bold; text-align:center;'>Question ". $i.'/'.$nombre['nombre'].":<br>";
                            echo '<span style="">'.$data[$i]['Question'].'<br></span></div>';
                            echo "</div>";
                            echo "<div class='point'>".$data[$i]['Point']." pts </div>";
                            echo "<div class='affiche'>";
							foreach($data[$i]['Reponse'] as $value)
							{echo "<input type='checkbox' id='check' name='check[]' value='$value'>$value<br>";}
                            echo "</div>"; 
						}
						elseif($data[$i]['Choix']=='simple')
						{
                            echo "<div style='font-size: 25px;font-weight: bold; text-align:center;'>Question ". $i.'/'.$nombre['nombre'].":<br>";
                            echo '<span >'.$data[$i]['Question'].'<br></span></div>';
                            echo "</div>";
                            echo "<div class='point'>".$data[$i]['Point']." pts </div>";
                            echo "<div class='affiche'>";
							foreach($data[$i]['Reponse'] as $value)
							{
							echo "<input type='radio' id='radio' name='radio' value='$value'>$value<br>";
                            }
                            echo "</div>";   
						}
						elseif($data[$i]['Choix']=='texte')
						{
                            echo "<div style='font-size: 25px;font-weight: bold; text-align:center;'>Question ". $i.'/'.$nombre['nombre'].":<br>";
                            echo '<span style="">'.$data[$i]['Question'].'<br></span></div>';
                            echo "</div>";
                            echo "<div class='point'>".$data[$i]['Point']." pts </div>";
                            echo "<div class='affiche'>";
                        	echo '<input type="text" name="texte" id="texte" ><br>';
                            echo "</div>";
                        }
                        echo "</div>";
        }
    }      
?>
</form>
<?php 
ob_start();
if(!empty($_POST))
{
    for ($i=$indiceDebut; $i <= $indiceFin; $i++) 
    { 
        if (array_key_exists($i, $data)) 
        {
            if($data[$i]['Choix']=='simple')
            {
                foreach($data[$i]['ReponseCorrecte'] as $value)
                {
                    if($_POST['radio']==$value)
                    {
                    $_SESSION['scores']+=$data[$i]['Point'];
                    $_SESSION['trouvé']++;
                    }
                }
            }
            else if($data[$i]['Choix']=='texte')
            {
                foreach($data[$i]['ReponseCorrecte'] as $value)
                {
                    if($_POST['texte']==$value)
                    {
                    $_SESSION['scores']+=$data[$i]['Point'];
                    $_SESSION['trouvé']++;
                    }
                }
            }
            else if($data[$i]['Choix']=='multiple')
            {
                foreach($data[$i]['ReponseCorrecte'] as $value)
                {
                    foreach($_POST['check'] as $val)
                    {
                        if($val==$value)
                        {
                        $_SESSION['scores']+=$data[$i]['Point'];
                        $_SESSION['trouvé']++;
                        }
                    }
                }
            }   
        }    
    }
    if($PageEncour!=1)
    {
        $precedent=$PageEncour-1;
        header('location:index.php?lien=jeux&mot=1&page='.$precedent.'');
    }
    if($PageEncour<$nbreDePage)
    {
        $suivant=$PageEncour+1;
        header('location:index.php?lien=jeux&mot=1&page='.$suivant.'');
    }
else
    {
        header ('location: index.php?lien=jeux&mot=1&nom=2');
    }
}  
if($PageEncour!=1)
  {
    echo "<button type='submit' style='padding:5px;float:left; background-color: darkturquoise;border-radius: 5px 5px 5px 5px;width: 80px; height:30px; margin-top:-3%'>Précédent</button>";
  }
  if($PageEncour<$nbreDePage)
  {
    echo "<button type='submit' style='padding:5px;margin-left:63%; background-color: darkturquoise;border-radius: 5px 5px 5px 5px;width: 80px; height:30px; margin-top:-3%'>Suivant</button>";
  }
  else
  {
    echo "<button type='submit' style='padding:5px;margin-left:63%; background-color: darkturquoise;border-radius: 5px 5px 5px 5px;width: 80px; height:30px; margin-top:-4%'>Terminer</button>";
  }
ob_end_flush ();?>
</fieldset>
<div class="sub-menu">
          <div class="A">
           <a href="index.php?lien=jeux&mot=1&nom=1" style="margin-left: 5%; text-decoration: none;">Top score</a>
          </div>
          <div class="A">
            <a href="index.php?lien=jeux&mot=1&nom=2" style="margin-left: 5%; text-decoration: none;">Mon meileur score</a>
          </div>
</div>

<div class="h">
<?php   
if (isset($_GET['nom'])) 
    {    
        if ($_GET['nom']=="1") 
        {
            include_once("top.php");
        }
        elseif($_GET['nom']=="2") 
        {
            include_once("Mon_meilleur.php");
        }
    }
    ?>
</div>
<h3 style="background-color: #3addd6; width: 120px; height: 35px; color: #f8fdfd; border-radius: 5px 5px 5px 5px; ">
      <a href="index.php?lien=jeux&mot=2&stat=resultat" style="text-decoration: none; padding:10px; ">QUITTER</a></h3></strong>
   <div style=" margin-left: 20%; ">
   <?php 
   if (isset($_GET['stat']) && $_GET['stat']==="resultat") 
   {
    require_once("resultat.php");
   }
   ?>
   </div>
</div>
</div>
</body>
</html>