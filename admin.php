<?php
@session_start();
require_once "securite.php";
include 'get_droit.php';
 include_once('BD.php'); 
 include_once('function.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin(e)</title>
    <link rel="stylesheet" type="text/css" href="./fontawesome-free-5.15.4-web/css/all.css">   
    <link href="styles.css" rel="stylesheet">
   
</head>
<body>
<!--Nav markup goes here-->
<header class="container">
    <nav>
        <div class="menu-icons">
            <i class="fas fa-bars"></i>
            <i class="fas fa-window-close"></i>
        </div>

        <a href="index.php" class="logo">
         <img src="./images/adcov.jpg" alt="" srcset="">
        </a>

        <ul class="nav-list">
            <?php if(in_array('1-0',$d)){ ?>
            <li> <a href="javascript:void(0)" >Admin(e)<i class="icon icon-md-arrow-dropdown"></i></a> 
                <?php } ?>  
                <ul class="sub-menu">
                    <li><a  href="javascript:void(0)" onclick="getPage('login.php')">login</a></li><hr>
                    <li><a  href="javascript:void(0)" onclick="getPage('profil.php')">Profil</a></li><hr>
                    <li><a  href="javascript:void(0)" onclick="getPage('adnim.php')">Publier</a></li><hr>
                    <li><a  href="javascript:void(0)" onclick="getPage('message.php')">Commentaire</a></li><hr>
                    <?php if(in_array('1-1-0',$d)){ ?>
                    <li><a  href="javascript:void(0)" onclick="getPage('aff.php')">Droits</a></li><hr>
                    <?php } ?>  
            </ul>
        </li>
        <li><a  href="javascript:void(0)" onclick="getPage('deconnexion.php')">deconnecter</a></li><hr>
        </ul>
    </nav>
</header>
<!--End nav-->

<!--Hero-->
<section class="hero" id="reponseserveur">
   
</section>


<script type="text/javascript">
		function getPage(UrlPage){
			  if(window.XMLHttpRequest)
        {
            oXhr = new XMLHttpRequest(); 
            
        }
        else if(window.ActiveXObject)
        { 
            oXhr = new ActiveXObject("Microsoft.XMLHTTP");
            
        }       
        else 
        {
            alert("Votre navigateur n'est pas compatible avec AJAX..."); 
            return;
        }
			
			 oXhr.onreadystatechange = function()
        { 
			
			if(oXhr.readyState==4 && oXhr.status==200){
				document.getElementById("reponseserveur").innerHTML=oXhr.responseText;
			}
			else if( oXhr.readyState==4){
				document.getElementById("reponseserveur").innerHTML="<h1> la page n'est pas disponible.</h1><br/>Error !"+oXhr.status+"<br/>";
			}
		}
		oXhr.open("GET",UrlPage+"?rand="+Math.random(),false);
		oXhr.send(null);

    
       }
       
       function status_update(value,id){
        var xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4 && xhr.status==200){
                var publi=document.getElementByid("publier");
                publi.innerHTML = xhr.responseText;
            }
        };
            xhr.open("GET","http://localhost/ADCOV.org/adnim.php?id="+encodeURIComponent(id)+"&status="+encodeURIComponent(value),true);
            xhr.send(null);
       }
  
       function login(idd,da,td){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else{
                xmlhttp=new activeXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (this.readyState==4 && this.status==200) {
                    document.getElementById('id_login').value=idd;
                    document.getElementById('da').value=da;
                    document.getElementById('td').value=td;
                    
                }
            }
            xmlhttp.open("POST","login.php",true)
            xmlhttp.send();
            
        }


        function admin(id,idd,td,mn){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else{
                xmlhttp=new activeXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (this.readyState==4 && this.status==200) {
                    document.getElementById('id_admin').value=id;
                    document.getElementById('typep').value=idd;
                    document.getElementById('ti').value=td;
                    document.getElementById('re').value=mn;
                    
                }
            }
            xmlhttp.open("POST","adnim.php",true);
            xmlhttp.send();
        }

        function de(id,typep,nom,em,pho){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else{
                xmlhttp=new activeXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (this.readyState==4 && this.status==200) {
                    document.getElementById('id_profil').value=id;
                    document.getElementById('typep').value=typep;
                    document.getElementById('nom').value=nom;
                    document.getElementById('em').value=em;
                    document.getElementById('pho').value=pho;
                    
                }
            }
            xmlhttp.open("POST","profil.php",true)
            xmlhttp.send();
        }
        //limite textarea
        function limite(){
            var titre=document.getElementById("ti");
            var t=500;
            if(titre.value.length > t){
                 alert("ne depassez pas 500 caracteres");
                titre.value=titre.value.substring(0,t);
            }
        }
        function limiter(){
            var resume=document.getElementById("re");
            var r=1000;
            if(resume.value.length > r){
                alert("ne depassez pas 1000 caracteres");
                resume.value=resume.value.substring(0,r);
            }
        }
 //Create function to select elements
const selectElement=(element)=>document.querySelector(element);
//Open and close nav on click
selectElement('.menu-icons').addEventListener('click',()=>{
event.preventDefault();
selectElement('nav').classList.toggle('active');
});

function save_data(){
            var form_element=document.getElementsByClassName('form_data');
            var form_data=new FormData();

            for(var count=0;count < form_element.length;count++){
                var element=form_element[count];

                if(element.type==='file'){
                    for(i=0;i < element.files.length;i++){
                form_data.append('fichier[]',element.files[i]);
            }
        }
            else{
                form_data.append(element.name,element.value);
            }
        }
            document.getElementById('save_publication').disabled=true;
            var ajax_request=new XMLHttpRequest();
            ajax_request.open('POST','http://localhost/adcov.org/adnim.php',true);
            ajax_request.send(form_data);

            ajax_request.onreadystatechange=function(){
                if(ajax_request.readyState==4 && ajax_request.status==200){
                    document.getElementById('save_publication').disabled=false;
                    document.getElementById('myForm').reset();
                    document.getElementById('message').innerHTML='Bien enregistrez';
                    document.getElementById('message').style.background='#407';
                        document.getElementById('message').style.color='#fff';
                        document.getElementById('message').style.size='1.8em';
                        document.getElementById('message').style.width='100vw';
                        document.getElementById('message').style.height='5vh';
                    setTimeout(() => {
                        document.getElementById('message').innerHTML='';
                    }, 2000);
                }
                
            };
           
           
        }
        /*1ere*/
        function save_dodo() {
    var form_element = document.getElementsByClassName('form_data');
    var form_data = new FormData();
    var form_id = document.getElementById('save_publication') ? 'savepublication' : 'saveprofile'; // Vérification de l'ID du bouton ou du formulaire
    
    // Collecter les données du formulaire
    for (var count = 0; count < form_element.length; count++) {
        var element = form_element[count];
        if (element.type === 'file') {
            // Si c'est un champ de fichier, vérifier si un fichier est sélectionné
            if (element.files.length > 0) {
                for (i = 0; i < element.files.length; i++) {
                    form_data.append('fichier[]', element.files[i]);
                }
            } else {
                // Si aucun fichier n'est sélectionné, envoyer une valeur vide ou une valeur par défaut
                form_data.append(element.name, '');
            }
        } else if (element.type === 'text' || element.type === 'email' || element.type === 'password') {
            // Si c'est un champ de texte, email, ou mot de passe, envoyer la valeur même si elle est vide
            form_data.append(element.name, element.value || ''); // Utilisation de '' si la valeur est vide
        } else {
            // Pour les autres types de champs (comme les radio, checkbox), ajouter de manière facultative
            form_data.append(element.name, element.value || ''); // Assurez-vous d'envoyer une valeur vide si rien n'est sélectionné
        }
    }

    document.getElementById('save_publication').disabled = true;

    var ajax_request = new XMLHttpRequest();

    // Choisir l'URL de la requête en fonction du formulaire
    if (form_id === 'savepublication') {
        ajax_request.open('POST','http://localhost/adcov.org/adnim.php', true);
    } else if (form_id === 'saveprofile') {
        ajax_request.open('POST','http://localhost/adcov.org/profile.php', true);
    }

    // Envoyer la requête
    ajax_request.send(form_data);

    // Traiter la réponse
    ajax_request.onreadystatechange = function() {
        if (ajax_request.readyState == 4 && ajax_request.status == 200) {
            document.getElementById('save_publication').disabled = false;
            document.getElementById('myForm').reset();
            document.getElementById('message').innerHTML = 'Bien enregistrez';
            document.getElementById('message').style.background = '#407';
            document.getElementById('message').style.color = '#fff';
            document.getElementById('message').style.fontSize = '1.8em';  // Fixe la taille de police
            document.getElementById('message').style.width = '100vw';
            document.getElementById('message').style.height = '5vh';

            // Effacer le message après 2 secondes
            setTimeout(() => {
                document.getElementById('message').innerHTML = '';
            }, 2000);
        }
    };
}
/*2eme*/
function save_meme() {
    var form_element = document.getElementsByClassName('form_data');
    var form_data = new FormData();
    var form_id = document.getElementById('save_publication') ? 'save_publication' : 'save_profile'; // Vérification de l'ID du bouton ou du formulaire
    
    // Collecter les données du formulaire
    for (var count = 0; count < form_element.length; count++) {
        var element = form_element[count];
        if (element.type === 'file') {
            // Si c'est un champ de fichier, vérifier si un fichier est sélectionné
            if (element.files.length > 0) {
                for (i = 0; i < element.files.length; i++) {
                    form_data.append('fichier[]', element.files[i]);
                }
            } else {
                // Si aucun fichier n'est sélectionné, envoyer une valeur vide ou une valeur par défaut
                form_data.append(element.name, '');
            }
        } else if (element.type === 'text' || element.type === 'email' || element.type === 'password'|| element.type === 'file'|| element.type === 'textearea') {
            // Si c'est un champ de texte, email, ou mot de passe, envoyer la valeur même si elle est vide
            form_data.append(element.name, element.value || ''); // Utilisation de '' si la valeur est vide
        } else {
            // Pour les autres types de champs (comme les radio, checkbox), ajouter de manière facultative
            form_data.append(element.name, element.value || ''); // Assurez-vous d'envoyer une valeur vide si rien n'est sélectionné
        }
    }

    // document.getElementById('save_publication').disabled = true;

    var ajax_request = new XMLHttpRequest();

    // Choisir l'URL de la requête en fonction du formulaire
    if (form_id === 'save_publication') {
        ajax_request.open('POST','http://localhost/adcov.org/adnim.php', true);
    } else if (form_id === 'save_profile') {
        ajax_request.open('POST','http://localhost/adcov.org/profil.php', true);
    }
    else if (form_id === 'save_login') {
        ajax_request.open('POST','http://localhost/adcov.org/login.php', true);
    }

    // Envoyer la requête
    ajax_request.send(form_data);

    // Traiter la réponse
    ajax_request.onreadystatechange = function() {
        if (ajax_request.readyState == 4 && ajax_request.status == 200) {
            document.getElementById('save_publication').disabled = false;
            document.getElementById('myForm').reset();
            document.getElementById('message').innerHTML = 'Bien enregistrez';
            document.getElementById('message').style.background = '#407';
            document.getElementById('message').style.color = '#fff';
            document.getElementById('message').style.fontSize = '1.8em';  // Fixe la taille de police
            document.getElementById('message').style.width = '100vw';
            document.getElementById('message').style.height = 'auto';

            // Effacer le message après 2 secondes
            setTimeout(() => {
                document.getElementById('message').innerHTML = '';
            }, 2000);
        }
    };
}

function deletes(id){
        if(document.getElementById('id_admin')){
        form_id='id_admin'; 
    } else if(document.getElementById('id_profil')){
        form_id='id_profil'; 
    }else if(document.getElementById('id_login')){
        form_id='id_login'; 
    }


      let xhr=new XMLHttpRequest();
      if (form_id === 'id_admin') {
      xhr.open("GET","adnim.php?id_admin="+id,true);
      }
      else if (form_id === 'id_profil') {
        xhr.open("GET","profil.php?id_profil="+id,true);
      }
      else if (form_id === 'id_login') {
        xhr.open("GET","login.php?id_login="+id,true);
      }
      xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      xhr.onreadystatechange=function(){
        if(xhr.readyState===4 && xhr.status===200){
            alert("bien supprimer");
        }
        else if(xhr.readyState===4){
        alert("erreur de suppression");
      }
      };
      xhr.send();
    }

        //chager image
//         function charger(){
//             var lesImg=document.getElementsByTagName("img");
//             for(var i=0;i<lesImg.length;i++){
//                 if(lesImg[i].setAttribute("data-src")){
//                     lesImg[i].setAttribute("src",lesImg[i].getAttribute("data-src"));
//                 }
//             }
//         }
// document.addEventListener("DOMContentLoaded",charger);

//

/*(function(x){
	    var lib={}

        lib.getQS = function(data){
            var qs = []
            for (k in data) qs.push(k + '=' + data[k])
            return qs.join('&')
        }

        lib.get=function(url,data,success,error,progress){
            var _this=this
            return new Promise(function(resolve,reject){})
            data=data||{}
            success=success||function(){}
            error=error||function(){}
            progress=progress||function(){}
            progress(true)
            var xhr = new XMLHttpRequest()
            url = url + '?' + _this.getQS(data)
            xhr.open('get',url)
            xhr.onreadystate=function(evt){
                if (xhr.onreadystate == 4) {
                if (xhr.status >= 200 && xhr.status < 300) {
                    success(xhr.responseText)
                    resolve(xhr.responseText)
                    progress(false)
                }
        else{
            reject(xhr.state)
            error(xhr.status,xhr.statusText,xhr)
        }

        }
        }
            xhr.send()
        }
       // //post
        lib.post=function(url,data,success,error){
            // document.getElementById('save_parente').disabled=true;
            var xhr = new XMLHttpRequest()
            xhr.open('post',url)
            xhr.setRequestHeader('content','application/x-www-form-urlencoded')
            xhr.onreadystate=function(evt){
                if (xhr.onreadystate == 4) {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // document.getElementById('save_parente').disabled=false;
                    success(xhr.responseText)
                }
            else{
                error(xhr.status,xhr.statusText,xhr)
            }

            }
            }
                xhr.send(this.getQS(data))
        }

        lib.post2=function(url,form,success,error){
            // document.getElementById('save_parente').disabled=true;
            var xhr = new XMLHttpRequest()
            xhr.open('post',url)
            xhr.onreadystate=function(evt){
                if (xhr.onreadystate == 4) {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // document.getElementById('save_parente').disabled=false;
                    success(xhr.responseText)
                    // document.querySelector('sample_form').reset();

                }
        else{
            error(xhr.status,xhr.statusText,xhr)
        }

        }
        }
            xhr.send( new FormData(form))
        }
       window[x] = lib

})('ajax')
// function charger(){
//     var data={a:23,nom:"dodo"}
//     ajax.get('http://localhost/adcov.org/adnim.php',data).then(success).catch(error)
//     alert('ok')
// }

    function uploadlog(frm){
    ajax.post2('http://localhost/adcov.org/adnim.php',frm,success,error,progress);
    let inputs = document.querySelectorAll('input');
    inputs.forEach (input =>input.value = '');

}
function success(data){
            document.querySelector('dodo').innerHTML=data
        }
        function error(error,txt){
            console.log(error,txt)
        }
        function progress(state){}*/

       
            </script>

</body>
</html>
