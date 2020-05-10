<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Meilleur Score</title>
</head>
<body>
<?php	
if ($_SESSION['scores']>$_SESSION['score']) 
{
	$_SESSION['score']=$_SESSION['scores'];
}
else
{
	$_SESSION['score'] = $_SESSION['score'];
}
$donnees=file_get_contents("./asset/json/user.json");
$donnees=json_decode($donnees, true);

foreach ($donnees as $key) 
{

	if($key['login']!=$_SESSION['login'])
	{
		$exc[]=$key;  
	}
	else
	{
		if($key['score']<$_SESSION['scores'])
		{
		$goo["nom"]=$key["nom"];
		$goo["prenom"]=$key["prenom"];
		$goo["login"]=$key["login"];
		$goo["joueur"]=$key["joueur"];
		$goo["password"]=$key["password"];
		$goo["score"]=ceil($_SESSION['score']);
		$goo["photo"]=$key["photo"];
		$exc[]=$goo;
	   }
	   else 
	   {
		$exc[]=$key;
	   }
	}
}
$exc = json_encode($exc);
file_put_contents('asset/json/user.json',$exc); 
echo "<fieldset>";
echo '<h2>Mon meilleur score est : '.$_SESSION['score'].'</h2>';
echo "</fieldset>";     
?>
</body>
</html>