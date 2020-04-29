<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
</head>
<body style="text-align: center;">
  <div style="background-color: black;
    height: 100px;">
<div style="background-image: url(../img/logo1.png);
    background-size: 40% ;
    height: 90px;
    width: 10%;
    margin-left: 30px;
    background-repeat: no-repeat;"></div>
<div style="color: white;
     position: absolute;
     top: 25px;
     left: 40%;
     font-size: 30px;
     font-weight: bold;">Le Plaisir De Jouer</div>
</div>
<div style="background-image: url(../img/fond.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    margin-top: -10%;
    height: 650px;">
  <form  method="POST" action="">
  	<div style=" text-align: center; width: 80%; margin-left: 10%; background-color: white; border-radius: 10px; height: 600px; margin-top: 10%;">
  		<div style="margin-left: -40%;">
  <div style="font-size: 25px; font-family: arial; margin-left: -23%;"><strong>S'inscrire</strong></div>
  <div style="font-size: 15px; font-family: arial ; margin-left: -9%"><strong>Pour tester votre niveau de culture générale</strong></div>
  <p style="margin-left: -26%">Prenom</p>
  <div style="width: 100%;margin-bottom: -1%">
  <input type="Text" name="prenom"  value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom']; ?>" placeholder="Abba" style="height: 35px; width: 30%;;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <p style="margin-left: -28%">Nom</p>
   <div style="width: 100%;margin-bottom: -1%">
  <input type="Text" name="nom"  value="<?php if (isset($_POST['nom'])) echo $_POST['nom']; ?>" placeholder="ABAB" style="height: 35px; width: 30%;;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <p style="margin-left: -28%">login</p>
  <div style="width: 100%;margin-bottom: -1%">
  <input type="text" name="login"  value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" placeholder="aabb" style="height: 35px; width: 30%;; margin-left: 0%; border-radius: 5px 5px 5px 5px;" required> <br/>
  </div>
  <p style="margin-left: -26%">Password</p>
   <div style="width: 100%;margin-bottom: -1%">
  <input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" style="height: 35px; width: 30%;;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <p style="margin-left: -20%">Confirmation password</p>
   <div style="width: 100%;margin-bottom: -1%">
  <input type="password" name="cpassword"  value="<?php if (isset($_POST['cpassword'])) echo $_POST['cpassword']; ?>" style="height: 35px; width: 30%;;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <div style=" margin-top: 2%;">
  <form method="POST" action="" enctype="multipart/form-data" >
   <b>Avatar</b> <input type="file" accept="image/*" onchange="loadFile(event)"  style="margin-left: 11%;" >
</form>
</div>
  <input type="submit" name=" valider" value="Créer compte" style="height: 35px; width:200px;  border-radius: 5px 5px 5px 5px; background-color: green;  margin-top: 2%; margin-left: 1%;" /> <br/>
</div>
  </div>
  <?php  
  include ('fonction.php');
  if (isset($_POST['login']) and isset($_POST['password'])) 
		{
			if (valid_Prenom($_POST['prenom']) && valid_Nom($_POST['nom']) && valid_password($_POST['password'], $_POST['cpassword'])) 
			{
			 $dossier = './asset/img/';
				//efectuer une action
				$data=file_get_contents("../json/user.json");
        $data=json_decode($data, true);

						$membres_Admin['prenom'] = $_POST['prenom'];
						$membres_Admin['nom'] = $_POST['nom'];
						$membres_Admin['login'] = $_POST['login'];
						$membres_Admin['password'] = $_POST['password'];
            $membres_Admin['profil'] = "joueur";
						$membres_Admin['date'] = date("d/m/Y  H:i");
            $membres_Admin['score'] = 0;
						$membres_Admin['photo'] = $dossier;

	 	for ($i=0; $i < count($data); $i++) 
        {
          if ($membres_Admin['login']!=$data[$i]['login']) 
          {
  
            $js = file_get_contents('../json/user.json');

            $js = json_decode($js, true);

            $js[] = $membres_Admin;

            $js = json_encode($js);
          
            file_put_contents("../json/user.json", $js);
          
          
          header("location: jouer.php");
          }
          else
          {
            echo "<h2>Ce login existe dèjà</h2>";
          }
           break;
        }
	
			}
		}
  ?>
</form>
</div>
</body>
</fieldset>
</form>
</html>
<div style="margin-top: -30%; margin-left: 45%;">
<h3>Avatar Joueur</h3>
<div style="margin-top: -35%; margin-left: 35% ;overflow: hidden; border-radius: 100px; -webkit-border-radius: 100px; -moz-border-radius: 70px; height: 200px; width: 200px;">
<img id="output"/>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
</div>
</div>
</div>
