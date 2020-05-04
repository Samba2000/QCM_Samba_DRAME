<!DOCTYPE >
<html>
<head>
	<title> Liste des joueurs</title>
	<meta charset="utf-8">
</head>
<body>
	<h2 style="text-align: center; margin-top: 1%;"><i>LISTE DES JOUEURS PAR SCORE</i></h2>
<fieldset>
<?php  
    $data=file_get_contents("./asset/json/user.json");
        $data=json_decode($data, true);
         $joueur=[];
		      for ($i=0; $i < count($data); $i++) { 
		      	if ($data[$i]['profil']=="joueur") {
		      		array_push($joueur, $data[$i]);
		      	}
		      }



     echo "<h2><pre>Prenom               Nom                score </pre></h2></tr>";
    //On définit le nombre d'éléments à afficher par page
		  $nbreParPage=15;
		  //Cette variable détermine la taille du tableau 
		  $nbreElement=count($joueur);
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



		    foreach ($joueur as $key => $value) 
		    {
		    	$score[$key]=$value['score'];
		    }
		      array_multisort($score, SORT_DESC,$joueur);


		     	
		     	for ($i=$indiceDebut; $i <= $indiceFin; $i++) 
			      { 
			        if (array_key_exists($i, $joueur)) 
			        {
			          echo "<td>".$joueur[$i]['prenom']."</td> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <td>".$joueur[$i]['nom']."</td> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <td>".$joueur[$i]['score']." </td> <br>";
			        }
			      }
		    echo "</fieldset>";
			  //On parcouris avec un boucle for le nbre de page
			  if($PageEncour!=1)
			  {
				  $pre=$PageEncour-1;
				  echo ' <a href="index.php?lien=accueil&nomv=3&page='.$pre.'"><h3 style="float: left; background-color: darkturquoise; width: 80px;">Precedent</h3></a>';
			  }
			  if($PageEncour<$nbreDePage)
			  {
				  $suiv=$PageEncour+1;
				  echo ' <a href="index.php?lien=accueil&nomv=3&page='.$suiv.'"><h3 style="float: right; background-color: darkturquoise; width: 63px;">Suivant</h3></a>';
			  }
		    	
  ?>
</body>
</html>