<?php  


function connexion($login,$pwd)
{
	$users=chargement();
	foreach ($users as $user) 
	{
		if ($user["login"]==$login && $user["password"]===$pwd) 
		{

			$_SESSION['nom']=$user['nom'];
			$_SESSION['prenom']=$user['prenom'];
			$_SESSION['user'] = $user;
			$_SESSION['photo']=$user['photo'];
			$_SESSION['score']=$user['score'];
			$_SESSION['statut']="login";
			if ($user["profil"]==="user") 
			{
				return "accueil";

			}
			else
			{
				return "jeux";
			}

		}
	}

return "error"; 
}

function est_connecté()// évite les accents pour le nom des fonctions
{
	if (!$_SESSION['statut']) 
	{
		header("location: index.php");
	}
}

function deconnexion(){
	unset($_SESSION['user']);
	unset($_SESSION['statut']);
	session_destroy();
}


function chargement($file="user")
{
	$data=file_get_contents("./asset/json/user.json");
	$data=json_decode($data, true);
	return $data;
}
?>