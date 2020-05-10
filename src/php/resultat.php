<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Résultat</title>
</head>
<body>
<div style="width:500px; height:250px; margin-top: 2%; margin-left: 28%; background-color: white; border-radius: 5px 5px 5px 5px;">
<fieldset>
<?php	
$nombre=file_get_contents("./asset/json/nombre.json");
$nombre=json_decode($nombre, true);
$f = $nombre["nombre"]-$_SESSION['trouvé'];
echo "<div style=' margin-top: -2%;'>";
echo '<h3>'.$_SESSION['prenom'].' '.$_SESSION['nom']."</h3>";
echo '<h3>Votre avez trouvé(e)  : '.$_SESSION['trouvé'].'  / '.$nombre["nombre"].' questions</h3>';
echo '<h3>Votre avez faussé(e)  : '.$f.'  / '.$nombre["nombre"].' questions</h3>';
echo '<h3>Votre avez : '.$_SESSION['scores'].' points</h3>'; 
unset($_SESSION['scores']); 
unset($_SESSION['trouvé']);     
?>
</fieldset>
<h3 style="background-color: #3addd6; width: 120px; height: 35px; color: #f8fdfd; border-radius: 5px 5px 5px 5px; ">
      <a href="index.php?lien=jeux&mot=1" style="text-decoration: none; padding:10px; ">REJOUER</a></h3></strong>
	  <h3 style="float: right;  background-color: #3addd6; width: 120px; height: 35px; 
      margin-top: -11%; margin-right: 0%; color: #f8fdfd; border-radius: 5px 5px 5px 5px;">
      <a href="index.php" style="text-decoration: none; padding:10px; ">Deconnexion</a></h3></strong>
</div>
</body>
</html>