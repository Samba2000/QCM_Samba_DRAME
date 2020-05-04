<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	span{
		font-size:20px;
		font-weight: bold;
	}
	input{
		font-size:20px;
		font-weight: bold;
		margin-left: 3%;
	}
	</style>
</head>
<body>
	<form method="POST" action="">
<div style=" margin-top: 2%;">
<div style="margin-left: 25%; margin-top: 2%;">
		<strong > Nbre de questions/Jeu </strong>
		<input type="text" name="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'];?>">
		<input type="submit" name="Valider" value="Ok"> <br/>
</div>
<?php  
	if (isset($_POST['Valider']))
	{
		if (empty($_POST['nombre'])) 
		{
			echo "<br/><h2> champ obligatoire </h2>";		
		} 
		else
		{
			$data=file_get_contents("./asset/json/question.json");
			$data=json_decode($data, true);

			
			//On définit le nombre d'éléments à afficher par page
			$nbreParPage=$_POST['nombre'];;
			//Cette variable détermine la taille du tableau 
			$nbreElement=count($data);
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
					if (array_key_exists($i, $data)) 
					{
						if($data[$i]['Choix']=='multiple')
						{
							echo '<span>'.$i.'. '.$data[$i]['Question'].'<br></span>';
							foreach($data[$i]['ReponseCorrecte'] as $value)
							{
							echo '<input type="checkbox" checked="checked">'.$value.'<br>';
							}
							foreach($data[$i]['ReponseFausse'] as $value)
							{
							echo '<input type="checkbox">'.$value.'<br>';
							}
						}
						elseif($data[$i]['Choix']=='simple')
						{
							echo '<span>'.$i.'. '.$data[$i]['Question'].'<br></span>';
							foreach($data[$i]['ReponseCorrecte'] as $value)
							{
							echo '<input type="radio" checked="checked">'.$value.'<br>';
							}
							foreach($data[$i]['ReponseFausse'] as $value)
							{
							echo '<input type="radio">'.$value.'<br>';
							}
						}
						elseif($data[$i]['Choix']=='texte')
						{
							echo '<span>'.$i.'. '.$data[$i]['Question'].'<br></span>';
							
							echo '<input type="text"><br>';
							
						}
					}
				}
				echo "</fieldset>";
			if($PageEncour!=1)
			  {
				  $pre=$PageEncour-1;
				  echo ' <a href="index.php?lien=accueil&nomv=1&page='.$pre.'"><h3 style="float: left; background-color: darkturquoise; width: 80px;">Precedent</h3></a>';
			  }
			  if($PageEncour<$nbreDePage)
			  {
				  $suiv=$PageEncour+1;
				  echo ' <a href="index.php?lien=accueil&nomv=1&page='.$suiv.'"><h3 style="float: right; background-color: darkturquoise; width: 63px;">Suivant</h3></a>';
			  }
		}
	}
	?>
</div>
</body>
</html>  