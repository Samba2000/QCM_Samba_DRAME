<?php
  if (isset($_POST['valider'])) 
  {
        //efectuer une action
        $data=file_get_contents("./asset/json/question.json");
        $data=json_decode($data, true);
        $membres_Admin['nbp'] = $_POST['nbp'];
        $membres_Admin['choix'] = $_POST['choix'];
        $membres_Admin['question'] = $_POST['question'];


        $js = file_get_contents('./asset/json/question.json');

        $js = json_decode($js, true);

        $js[] = $membres_Admin;

        $js = json_encode($js);
              
      file_put_contents("./asset/json/question.json", $js);
    
            
      echo "<h2>Qustion enregistrée</h2>";
    }
?>

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
        margin-left: 10%;
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
	<textarea name="question" rows="2" cols="60" class="t" id="question" ></textarea><span id="error1" ></span>
	<div style="margin-top: 4%;"><h2>choixbre de Points</h2></div>
	<div style="margin-left: 25%; margin-top: -10%;">
    <input type="number" name="nbp" id="nbp" style=" width: 15%;background-color: silver;" class="input1" ><br></div>
    <span id="error2" ></span>
	<div style="margin-bottom: 5%"><h2>Type de réponse</h2>
    <div  style="margin-left:25%; margin-top: -7%">
    
    <select name="choix" id="weather" style="width:200px; height:40px; background-color:silver" onclick="choix(this.value)"  >
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

var start = document.getElementById('button_envoi');
var quesiton = document.getElementById('question');
var nb = document.getElementById('nbp');
var choix = document.getElementById('weather');
var texte =  document.getElementById('texte');
var simple =  document.getElementById('simple');
var check =  document.getElementById('check');
var validQuestion = /[a-zA-Zéè]\?$/;
start.addEventListener('click', valider);

function valider(e)
{

if(question.value == '')
{
    e.preventDefault();
    error1.textContent = 'Ce champ est obligatoire';
    error1.style.color = 'gray';
}
else if(validQuestion.test(question.value) == false)
{
    e.preventDefault();
    error1.textContent = 'format incorrect';
    error1.style.color = 'orange';
}
if(nb.value == '')
{
    e.preventDefault();
    error2.textContent = 'Donner le choixbre de points svp!!!';
    error2.style.color = 'gray';
}
else if(nb.value<=1)
{
    e.preventDefault();
    error2.textContent = 'Le choixbre de points doit etre supérieur ou égal à 1';
    error2.style.color = 'orange';
}
if(choix.value == '')
{
    e.preventDefault();
    error3.textContent = 'Veuillez faire votre choix';
    error3.style.color = 'gray';
}
if(!check.checked)
{
    e.preventDefault();
    error4.textContent = 'Veuillez cocher au moins une case';
    error4.style.color = 'gray';
}
if(texte.value == '')
{
    e.preventDefault();
    error5.textContent = 'Ce champ est obligatoire';
    error5.style.color = 'gray';
}
if()
{
    e.preventDefault();
    error6.textContent = 'Veuillez cocher une case';
    error6.style.color = 'gray';
}
}


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
            <input type="text" class="te" name="reponse[]" id="texte"><span id="error5"></span>
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
            <input type="text" class="tes" name="reponse[]" id="texte">
            <input type="radio" value="`+(nbsam)+`" name="check[]" id="simple"><span id="error6"></span>
           <img src="./asset/img/ic-supprimer.PNG" onclick="onDeleteInput(${nbsam})">
            `;
        divInputs.appendChild(newInput);
        }
        var nbsam=0
        function onAddcheckbox()
        {
        nbsam++;
        if(nbsam<=2){
        var divInputs = document.getElementById('inputs');
        var newInput = document.createElement('div');
        newInput.setAttribute('class', "sam");
        newInput.setAttribute('id', "sam_"+nbsam);
        newInput.innerHTML = `
        <label class="lab">Reponse `+nbsam+` </label>
        <input type="text" class="tes" name="reponse[]" id="texte>
        <input type="checkbox" value="`+(nbsam)+`" name="check[]" id="check"><span id="error4"></span>
       <img src="./asset/img/ic-supprimer.PNG" onclick="onDeleteInput(${nbsam})">
        `;
        divInputs.appendChild(newInput);
        }
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

</fieldset>
</body>
</html>