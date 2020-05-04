<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
   .input1{
    width:280px;
    height:50px;
    padding:5px;
    margin:20px 0 10px;
    border-radius:5px;
    border:4px solid #acbfa5
	}
	.inputs{
    width:150px;
    height:40px;
    background-color: #00BFFF;
    border-radius:5px;
    border:2px solid #00BFFF;
	color:#fff;
	}
	.t{
    margin-left: 20%;
    background-color: silver;
    width:600px;
    height:70px;
    margin-top:-15%;
    border-radius:5px;
    border:4px solid #acbfa5"
    }
    .samba{
        width:760px;
        float:left;
    }
    .te{
        background-color: silver;
        width:300px;
        height:50px;
        top:5%;
        border-radius:5px;
        border:4px solid #acbfa5"
    }
    .lab
    {
        font-size: 25px;
     font-weight: bold;
    }
    .tes
    {
        background-color: silver;
        width:200px;
        height:40px;
        top:5%;
        border-radius:5px;
        border:4px solid #acbfa5"
    }
    span
    {
        font-size: 25px;
        font-weight: bold;
        margin-left:25%;
    }
</style>
</head>
<body>
<h2 style="margin-left: 2%; margin-top: 1%; color: blue;">PARAMETRER VOTRE QUESTION</h2>
<fieldset>
<form action="" id="mainform" method="POST" name="mainform">
	<div style=" float: left; margin-right:5%;"><h2>Questons</h2></div>
	<textarea name="question" rows="2" cols="60" class="t" id="question" required><?php  echo @$_POST['question'];?></textarea><span id="error1" ></span>
	<div style="margin-top: 4%;"><h2>Nbre de Points</h2></div>
	<div style="margin-left: 25%; margin-top: -10%;">
    <input type="number" name="nbp" id="nbp" style=" width: 15%;background-color: silver;" class="input1" required><br></div>
    <span id="error2" ></span>
	<div style="margin-bottom: 5%"><h2>Type de réponse</h2>
    <div  style="margin-left:25%; margin-top: -7%">
    
    <select name="choix"  id="weather" style="width:200px; height:40px; background-color:silver" onclick="choix(this.value)" required >
    <option value="">Donnez le type de réponse</option>
    <option value="multiple">choix mutiple</option>
    <option value="simple">choix simple</option>
    <option value="texte">choix texte</option>
    </select>
    <div style=" float:right; margin-right:58%;">
    <img src="./asset/img/ic-ajout-réponse.PNG" alt="image" onclick="Add()"></div>
    </div>
    <span id="error3" ></span>
    </div>
    <div>
    <div id="inputs" class="samba">
    </div>
    <div style="float: right; margin-right:2%;">
        <input type="submit" class="inputs" id="button_envoi" value="Enregistrer" name="valider">
    </div>
</form>
<script>


var nbsam = 0;
        function onAddInput()
        {
            nbsam++; 
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            newInput.setAttribute('class', "sam");
            newInput.setAttribute('id', "sam_"+nbsam);
            newInput.innerHTML = `
            <label class="lab">Reponse `+nbsam+` </label>
            <input type="text" class="te" name="reponse" required>
            <input type="hidden" value="type texte" name="type">
           <img src="./asset/img/ic-supprimer.PNG" onclick="onDeleteInput(${nbsam})">
            `;
        divInputs.appendChild(newInput);
        }


        var nbsam = 0;
        function onAddradio()
        {
            nbsam++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            newInput.setAttribute('class', "sam");
            newInput.setAttribute('id', "sam_"+nbsam);
            newInput.innerHTML = `
            <label class="lab">Reponse `+nbsam+` </label>
            <input type="text" class="tes" name="reponse[]" required>
            <input type="radio" value="${nbsam-1}" name="rep1[]" required>
            <input type="hidden" value="type radio" name="type">
           <img src="./asset/img/ic-supprimer.PNG" onclick="onDeleteInput(${nbsam})">
            `;
        divInputs.appendChild(newInput);
        }
        var nbsam=0
        function onAddcheckbox()
        {
            nbsam++;
            var divInputs = document.getElementById('inputs');
            var newInput = document.createElement('div');
            newInput.setAttribute('class', "sam");
            newInput.setAttribute('id', "sam_"+nbsam);
            newInput.innerHTML = `
            <label class="lab">Reponse `+nbsam+` </label>
            <input type="text" class="tes" name="reponse[]" required>
            <input type="checkbox" name="rep2[]" value="${nbsam-1}">
            <input type="hidden" value="type checkbox" name="type">
           <img src="./asset/img/ic-supprimer.PNG" onclick="onDeleteInput(${nbsam})">
            `;
        divInputs.appendChild(newInput);
        }
function Add() {
    var select = document.getElementById('weather');
    if(select.value=='texte')
    {
        return onAddInput();
    }
    else if(select.value=='simple')
    {
        return onAddradio();
    }
    else if(select.value=='multiple')
    {
        return onAddcheckbox();
    }
}
function onDeleteInput(n)
    {
        var target = document.getElementById('sam_'+n);
            target.remove();
       FadeOut('sam_'+n);
    }

    function FadeOut(idTarget)
    {
        var target = document.getElementById(idTarget);
        var effect = setInterval(function(){
            if(!target.style.opacity)
            {
                target.style.opacity = 1;
            }
            if(target.style.opacity>0)
            {
                target.style.opacity-=0.1;
            }
            else
            {
                clearInterval(effect);
            }
        },200)
    }    
</script>

<?php
  
$reponsecorrecte=[];
$reponsefausse=[];
$data=file_get_contents("./asset/json/question.json");
$data=json_decode($data, true);
if(isset($_POST['valider']))
{
    $quest=$_POST['question'];
    $nbp=$_POST['nbp'];
    $choix=$_POST['choix'];
if($_POST['nbp']>=1)
{
    if($choix=='multiple')
    {
        if(isset($_POST['rep2']))
        {
            foreach($_POST['rep2'] as $value)
            {
                if(!empty($_POST['reponse'][$value]))
                {
                    array_push($reponsecorrecte, $_POST['reponse'][$value]);
                }
            }
            $reponsefausse=array_diff($_POST['reponse'], $reponsecorrecte);
            if(file_exists("./asset/json/question.json"))
            {
                $liste=array(
                    "Question" => $quest,
                    "Point" => $nbp,
                    "Choix" => $choix,
                    "ReponseCorrecte" => $reponsecorrecte,
                    "ReponseFausse" => $reponsefausse
                );
                array_push($data, $liste);
                $final_data=json_encode($data);
                file_put_contents("./asset/json/question.json", $final_data);
                echo "<h2>Question enregistrée avec succes</h2>";
            }
        }
    }
    elseif($choix=='simple')
    {
        if(isset($_POST['rep1']))
        {
            foreach($_POST['rep1'] as $value)
            {
                if(!empty($_POST['reponse'][$value]))
                {
                    array_push($reponsecorrecte, $_POST['reponse'][$value]);
                }
            }
            $reponsefausse=array_diff($_POST['reponse'], $reponsecorrecte);
            if(file_exists("./asset/json/question.json"))
            {
                $liste=array(
                    "Question" => $quest,
                    "Point" => $nbp,
                    "Choix" => $choix,
                    "ReponseCorrecte" => $reponsecorrecte,
                    "ReponseFausse" => $reponsefausse
                );
                array_push($data, $liste);
                $final_data=json_encode($data);
                file_put_contents("./asset/json/question.json", $final_data);
                echo "<h2>Question enregistrée avec succes</h2>";
                
            }
        }
    }
    elseif($choix=='texte')
    {
        if(isset($_POST['reponse']))
        {
            array_push($reponsecorrecte,$_POST['reponse']);
            if(file_exists("./asset/json/question.json"))
            {
                $liste=array(
                    "Question" => $quest,
                    "Point" => $nbp,
                    "Choix" => $choix,
                    "ReponseCorrecte" => $reponsecorrecte,
                    "ReponseFausse" => $reponsefausse
                );
                array_push($data, $liste);
                $final_data=json_encode($data);
                file_put_contents("./asset/json/question.json", $final_data);
                echo "<h2>Question enregistrée avec succes</h2>";
            }
        }
    }
}
else
{
    echo "<h2> Le nombre de points doit etre supérieur ou égal à 1 </h2>";
}
    
}
?>

</fieldset>
</body>
</html>