<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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

echo "<fieldset>";
echo '<h2>Mon meilleur score est : '.($donnees[1]['score']).'</h2>';
echo "</fieldset>";

            $donnees[1]['score'] = $_SESSION['score'];

            $donnees = json_encode($donnees);
            
            file_put_contents("./asset/json/user.json", $donnees);
            
?>
</body>
</html>