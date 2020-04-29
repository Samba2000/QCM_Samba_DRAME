<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="">
<div style=" margin-top: 2%;"">
<div style="margin-left: 50%; margin-top: 2%;">
		<strong > Nbre de questions/Jeu </strong>
		<input type="text" name="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'];?>">
		<input type="submit" name="Valider" value="Ok"> <br/>
</div>
<?php  
	if (isset($_POST['Valider']))
	{
		$n = $_POST['nombre'];
		if (empty($n)) 
		{
			echo "<br/><h2> champ obligatoire </h2>";		
		} 
		else
		{
		  $tab = array("Question 1" ,"Question 2","Question 3","Question 4","Question 5","Question 6","Question 7","Question 8","Question 9","Question 10");
		  //On définit le nombre d'éléments à afficher par page
		  $nbreParPage=$n;
		  //Cette variable détermine la taille du tableau 
		  $nbreElement=count($tab);
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

		       echo "<fieldset>";
		      for ($i=$indiceDebut; $i <= $indiceFin; $i++) 
		      { 
		        if (array_key_exists($i, $tab)) 
		        {
		          echo "<td>".$tab[$i]." </td> <br> <br>";
		          
		        }
		      }
		      echo "</fieldset>";
	
		  //On affiche le nombre de pages
		  echo "<br/>";
		  //On parcouris avec un boucle for le nbre de page
		    echo ' <a href="index.php?lien=accueil&nomv=2"><h3 style="float: right; background-color: darkturquoise; width: 63px;">Suivant</h3></a>';
		 	
	}
}
?>
</div>
</body>
</html>  