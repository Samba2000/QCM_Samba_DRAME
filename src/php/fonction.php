<?php  
function valid_Nom($donnees)
{
	if (preg_match("#^[A-Z][A-Z]+$#",$donnees)) 
	{				
		if (strlen($donnees)>=2) 
		{
			return $donnees;
		}
		else
		{
			echo "<h3>le nom doit au moins 2 caracteres</h3>";
		}
	}
	else
	{
		echo "<h3>le nom doit contenir que des lettres majuscules</h3>";
	}	
}
function valid_Prenom($donnees)
{
	if (preg_match("#^[A-Z][A-Za-z\è\é\-]+$#",$donnees)) 
	{				
		if (strlen($donnees)>=2) 
		{
			return $donnees;
		}
		else
		{
			echo "<h3>le prénom doit au moins 2 caracteres</h3>";
		}
	}
	else
	{
		echo "<h3>le prénom doit commencé par une lettre majuscule</h3>";
	}	
}
function valid_password($mdp,$cmdp)
{
	if (strlen($mdp)>=6) 
			{
				if (preg_match("#^[A-Za-z0-9]#", $mdp))
				{
					if ($mdp==$cmdp) 
					{
						return $mdp;
					} else {
						echo "<h3>Les password ne correspondent pas</h3>";
					}
				}
			}
			else
			{
				echo "<h3>Le mdp doit contenir au moins 6 caracteres</h3>";
			}
}


?>