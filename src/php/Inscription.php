
<!DOCTYPE html>
<html>
<head>
	<title>Creer Admin</title>
	<meta charset="utf-8">
</head>
<body >
  <form  method="POST" action="">
    <div style="margin-left: 2%;">
  <div style="font-size: 35px; font-family: arial;">S'inscrire</div>
  <div style="font-size: 15px; font-family: arial">Pour proposer des QUIZZ</div><br>
  <b>Prenom</p>
  <div style="width: 100%;margin-bottom: 1%">
  <input type="Text" name="prenom"  value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom']; ?>" placeholder="Abba" style="height: 35px; width: 40%;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <b>Nom</p>
   <div style="width: 100%;margin-bottom: 1%">
  <input type="Text" name="nom"  value="<?php if (isset($_POST['nom'])) echo $_POST['nom']; ?>" placeholder="ABAB" style="height: 35px; width: 40%;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <b>Login</p>
  <div style="width: 100%;margin-bottom: 1%">
  <input type="text" name="login"  value="<?php if (isset($_POST['Login'])) echo $_POST['login']; ?>" placeholder="aabb" style="height: 35px; width: 40%; margin-left: 0%; border-radius: 5px 5px 5px 5px;" required> <br/>
  </div>
  <b>Password</p>
   <div style="width: 100%;margin-bottom: 1%">
  <input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" style="height: 35px; width: 40%;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <b>Confirmation password</p>
   <div style="width: 100%;margin-bottom: 1%">
  <input type="password" name="cpassword"  value="<?php if (isset($_POST['cpassword'])) echo $_POST['cpassword']; ?>" style="height: 35px; width: 40%;margin-left: 0%;border-radius: 5px 5px 5px 5px" required> <br/>
  </div>
  <div style="">
  <form method="POST" action="" enctype="multipart/form-data" >
  <b>Avatar  </b>    <input type="file" accept="image/*" onchange="loadFile(event)"  style="margin-left: 20%;" >
</form>
</div>
  <input type="submit" name=" valider" value="Créer compte" style="height: 35px; width:200px; float: left; border-radius: 5px 5px 5px 5px; background-color: green;  margin-top: 1%; margin-left: 4.5%;" /> <br/>
  </div>
  <?php  
  include ('fonction.php');
  if (isset($_POST['login']) and isset($_POST['password'])) 
		{
			if (valid_Prenom($_POST['prenom']) && valid_Nom($_POST['nom']) && valid_password($_POST['password'], $_POST['cpassword'])) 
			{
        $dossier = './asset/img/';
				//efectuer une action
				$data=file_get_contents("./asset/json/user.json");
        $data=json_decode($data, true);
        $membres_Admin['prenom'] = $_POST['prenom'];
            $membres_Admin['nom'] = $_POST['nom'];
            $membres_Admin['login'] = $_POST['login'];
            $membres_Admin['password'] = $_POST['password'];
            $membres_Admin['profil'] = "user";
            $membres_Admin['photo'] = $dossier."mounass.jpg";

        for ($i=0; $i < count($data); $i++) 
        {
          if ($membres_Admin['login']!=$data[$i]['login']) 
          {
	
						$js = file_get_contents('./asset/json/user.json');

						$js = json_decode($js, true);

						$js[] = $membres_Admin;

						$js = json_encode($js);
					
            file_put_contents("./asset/json/user.json", $js);
          
				  
        	echo "<h2>Vous etes inscrit maintenant</h2>";
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
</body>
</fieldset>
</form>
</html>
<!DOCTYPE html>
<html>
<div style="margin-top: -35%; margin-left: 45%;">
<h3 style="margin-left: 25%; margin-top: -15%;">Avatar Admin</h3>
<div style="margin-top: -60%; margin-left: 14% ;overflow: hidden; border-radius: 100px; -webkit-border-radius: 100px; -moz-border-radius: 70px; height: 200px; width: 200px;">
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
</html>
