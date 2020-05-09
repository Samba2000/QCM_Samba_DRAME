<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
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
		<input type="text" id="nombre" name="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'];?>">
		<input type="submit" name="valider" id="valider" value="Ok"> <br/>
		<span id="miss"></span>
</div>
<script>
var nb = document.getElementById('nombre');
var ok = document.getElementById('valider');
var miss = document.getElementById('miss');
ok.addEventListener('click', valider);
function valider(e)
{
	if(nb.value=='')
	{
		e.preventDefault();
		nb.style.border="2px solid red";
	}
	else if(nb.value<5)
	{
		e.preventDefault();
		miss.textContent = "Le nombre doit etre supérieur à 5";
		miss.style.color = "orange";
	}
}
</script>
<?php 
if(!empty($_POST['nombre']))
{
    $nombre=file_get_contents("./asset/json/nombre.json");
    $nombre=json_decode($nombre, true);

            $membres_Admin['nombre'] = $_POST['nombre'];

            $nombre = $membres_Admin;

            $nombre = json_encode($nombre);
            
            file_put_contents("./asset/json/nombre.json", $nombre);
            
            echo "<h2 style='text-align: center;'> Nombre de Question modifiée</h2>";

}
?>
</body>
</html> 