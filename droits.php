 <?php
 @session_start();
require_once "securite.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script rsc="js/jquery.js"></script>
  <title></title>
</head>
<?php
      define('DB_HOST', 'localhost');
      define('DB_NAME', 'site_web');
      define('DB_USERNAME','root');
      define('DB_PASSWORD', '');
      try{
          $pdo= new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e){

          die('erreur:'.$e->getMessage());
      }
    if(isset($_GET['p'])){
        $req =$pdo->query('SELECT * FROM tauhenifiaion au INNER JOIN logine lo ON lo.idlo=au.idlo where userlo ="'.$_GET['p'].'"');
        $data=$req->fetch();
        if($data){
        $nom = $data['nom_prenom'] ;
          $prenom = $data['telephone'] ;
        $matricule = $data['email'] ;
    $user=$_GET['p'];
    $a=array();
    $reqd =$pdo->query("SELECT * from  droit Where user='$user'");
    while($ress=$reqd->fetch()){
    array_push($a,$ress['menu_droit']);
    } 
    }
   
?>
<form action="savedroit.php" method="post" style="margin-left: 20px;"><br>
          <input hidden type="user" name="user" value="<?php echo $_GET['p']?>" id="">
             <div class="col-md-12"  style="width:50%;margin-left:20%;margin-top:-7%;">
               <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title" style="font-size: 16; color:white">
              
                      <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                  </div>
                  <div class="card-body" style='background-color:skyblue'>
                    <fieldset class="scheduler-border">
                      <legend class="scheduler-border">AFFECTER LES DROITS A:
                         <img src="../images/mi.jpg" height="60" width="60px" class="img-circle" alt="" style="border-radius:50%;">
                         <?php if(isset($_SESSION['log'])) echo $_SESSION['log']?>
                      </legend>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                             <center style="margin-top:0px;"><input type="checkbox"  id="alldroits"><label for=""><h5> Affecter Tous les droits</h5></label> 
                               <a href="manager_user.php">Retour</a>
                             </center>
                             <?php if(isset($_GET['message'])){ echo $_GET['message']; }?>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">
                                  <label class="btn btn-sm" onclick="hideshowinfoUser()"   id="labinfoUser"  for="">+</label>
                                  <input type="checkbox" name="droit[]" value="1-0" <?php if(in_array('1-0',$a)) echo 'checked' ?>  id="droit_user">Admin(e)
                                </legend>
                                <div id="infoUser" style="display: none;">
                                  <table class="table borderless">
                                    <tr><td>
                                      <input type="checkbox" name="droit[]" value="1-1-0" <?php if(in_array('1-1-0',$a)) echo 'checked' ?>   class="droit_u" id=""> Droits
                                      </td>
                                      <td>
                                        <input type="checkbox" name="droit[]" value="1-2-0" <?php if(in_array('1-2-0',$a)) echo 'checked' ?>   class="droit_u"   id="droit_u">modifier droit 
                                      </td>
                                      </tr>
                                  </table>
                                </div>
                            </fieldset>

                          </div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<fieldset class="scheduler-border">
    <legend class="scheduler-border"><label class="btn btn-sm" onclick="hideshowinfoCli()"   id="labinfoCli"  for="">+</label>
    <input type="checkbox" name="droit[]" value="2-0" <?php if(in_array('2-0',$a)) echo 'checked' ?>  id="droit_g">
    Securite_Allimentaire_Nutrition</legend>
    <div id="infoCli" style="display: none;">

    <table class="table borderless">
       <tr><td>
        <input type="checkbox" name="droit[]" value="2-1-0" <?php if(in_array('2-1-0',$a)) echo 'checked' ?>   class="droit_g" id=""> modifier
        </td>
        <td>
        <input type="checkbox" name="droit[]" value="2-2-0" <?php if(in_array('2-2-0',$a)) echo 'checked' ?>  class="droit_g" id=""> affecter droits
        </tr>
        <tr><td>
        </td>
        
        <td>
        </td>
        </tr>
        </table>
       </div>
</fieldset>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<fieldset class="scheduler-border">
    <legend class="scheduler-border"><label class="btn btn-sm" onclick="hideshowinfoArt()"   id="labinfoArt"  for="">+</label>
    <input type="checkbox" name="droit[]" value="3-0" <?php if(in_array('3-0',$a)) echo 'checked' ?>  id="droit_art">
    Sante</legend>
    <div id="infoArt" style="display: none;">
    
    </div>
</fieldset>

</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<fieldset class="scheduler-border">
    <legend class="scheduler-border"><label class="btn btn-sm" onclick="hideshowinfoBon()"   id="labinfoBon"  for="">+</label>
    <input type="checkbox" name="droit[]" value="4-0" <?php if(in_array('4-0',$a)) echo 'checked' ?> id="droit_bon">
    Education </legend>
    <div id="infoBon" style="display: none;">
    <table class="table borderless">
       <tr><td>
        <input type="checkbox" name="droit[]" value="4-1-0" <?php if(in_array('4-1-0',$a)) echo 'checked' ?>  class="droit_bon"> Ajouter
        </td>
        <td>
        <input type="checkbox" name="droit[]" value="4-2-0" <?php if(in_array('4-2-0',$a)) echo 'checked' ?>  class="droit_bon"> Modifier 
        </td>
       
        </tr>
        
        </table>
        
    </div>
   
</fieldset>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<fieldset class="scheduler-border">
    <legend class="scheduler-border"><label class="btn btn-sm" onclick="hideshowNum()"   id="labinfoNum"  for="">+</label>
    <input type="checkbox" name="droit[]" value="5-0" <?php if(in_array('5-0',$a)) echo 'checked' ?> id="droit_num">
    Autonomisation_Economique </legend>
    <div id="infoNum" style="display: none;">
    <table class="table borderless">
       <tr><td>
        <input type="checkbox" name="droit[]" value="5-1-0" <?php if(in_array('5-1-0',$a)) echo 'checked' ?>  class="droit_num"> Ajouter
        </td>
        <td>
        <input type="checkbox" name="droit[]" value="5-2-0" <?php if(in_array('5-2-0',$a)) echo 'checked' ?>  class="droit_num"> Modifier 
        </td>
        </tr>
        
        </table>
        
    </div>
   
</fieldset>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<fieldset class="scheduler-border">
    <legend class="scheduler-border"><label class="btn btn-sm" onclick="hideshowinfoanalyse()"   id="labinfoanalyse"  for="">+</label>
    <input type="checkbox" name="droit[]" value="6-0" <?php if(in_array('6-0',$a)) echo 'checked' ?> id="droit_analyse">
    Protection_Sociale </legend>
    <div id="infoanalyse" style="display: none;">
    <table class="table borderless">
       <tr><td>
        <input type="checkbox" name="droit[]" value="6-1-0" <?php if(in_array('6-1-0',$a)) echo 'checked' ?>  class="droit_analyse"> Ajouter
        </td>
        <td>
        <input type="checkbox" name="droit[]" value="6-2-0" <?php if(in_array('6-2-0',$a)) echo 'checked' ?>  class="droit_analyse"> Modifier 
        </td>
        </tr>
        
        </table>
        
    </div>
   
</fieldset>
</div>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<fieldset class="scheduler-border">
    <legend class="scheduler-border"><label class="btn btn-sm" onclick="hideshowinfoanalyse()"   id="labinfoanalyse"  for="">+</label>
    <input type="checkbox" name="droit[]" value="6-0" <?php if(in_array('7-0',$a)) echo 'checked' ?> id="droit_analyse">
    droits </legend>
    <div id="infoanalyse" style="display: none;">
    <table class="table borderless">
       <tr><td>
        <input type="checkbox" name="droit[]" value="6-1-0" <?php if(in_array('7-1-0',$a)) echo 'checked' ?>  class="droit_analyse"> Ajouter
        </td>
        <td>
        <input type="checkbox" name="droit[]" value="6-2-0" <?php if(in_array('7-2-0',$a)) echo 'checked' ?>  class="droit_analyse"> Modifier 
        </td>
        </tr>
        
        </table>
        
    </div>
   
</fieldset>
</div>



 <center><input type="submit" name="affecter" class="btn btn-success " value='Affecter les droits'>
 <input type="submit" name="desafecter" class="btn btn-danger " value='Désaffecter les droits'>
 </center>
</fieldset>
</div>
<?php  } ?>
</form>
<style>
    fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.6em 1.6em 1.6em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
    box-shadow:  0px 0px 0px 0px #000;
}

/*legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
}*/


legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
table.borderless td,table.borderless th{
     border: none !important;
}                      
</style>


<script>

$(document).on('click', '#droit_user', function() {          	
		$(".droit_u").prop("checked", this.checked);
	});	

    $(document).on('click', '#droit_g', function() {          	
		$(".droit_g").prop("checked", this.checked);
	});	

    $(document).on('click', '#droit_art', function() {          	
		$(".droit_art").prop("checked", this.checked);
	});	

    $(document).on('click', '#droit_bon', function() {          	
		$(".droit_bon").prop("checked", this.checked);
	});	

    $(document).on('click', '#droit_imp', function() {          	
		$(".droit_imp").prop("checked", this.checked);
	});	


    $(document).on('click', '#droit_num', function() {          	
		$(".droit_num").prop("checked", this.checked);
	});	

    $(document).on('click', '#droit_liv', function() {          	
		$(".droit_liv").prop("checked", this.checked);
	});	

    $(document).on('click', '#droit_fact', function() {          	
		$(".droit_fact").prop("checked", this.checked);
	});	

  $(document).on('click', '#droit_analyse', function() {          	
		$(".droit_analyse").prop("checked", this.checked);
	});	

   $(document).on('click', '#droit_publication', function() {           
    $(".droit_publication").prop("checked", this.checked);
  });
   $(document).on('click', '#droit_affecte', function() {           
    $(".droit_affecte").prop("checked", this.checked);
  });



    $(document).on('click', '#alldroits', function() {          	
		$(".droit_fact").prop("checked", this.checked);
        $(".droit_liv").prop("checked", this.checked);
        $(".droit_num").prop("checked", this.checked);
        $(".droit_u").prop("checked", this.checked);
        $(".droit_g").prop("checked", this.checked);
        $(".droit_bon").prop("checked", this.checked);
        $(".droit_art").prop("checked", this.checked);
        $(".droit_imp").prop("checked", this.checked);
        $(".droit_analyse").prop("checked", this.checked);
        $(".droit_affecte").prop("checked", this.checked);
        $("#droit_fact").prop("checked", this.checked);
        $("#droit_liv").prop("checked", this.checked);
        $("#droit_num").prop("checked", this.checked);
        $("#droit_user").prop("checked", this.checked);
        $("#droit_g").prop("checked", this.checked);
        $("#droit_bon").prop("checked", this.checked);
        $("#droit_art").prop("checked", this.checked);
        $("#droit_imp").prop("checked", this.checked);
        $("#droit_anayse").prop("checked", this.checked);
        $("#droit_publication").prop("checked", this.checked);
        $("#droit_affecte").prop("checked", this.checked);

	});
    function hideshowinfoUser() {
  var x = document.getElementById("infoUser");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoUser").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoUser").innerHTML = "+";
  }
}


function hideshowinfoCli() {
  var x = document.getElementById("infoCli");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoCli").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoCli").innerHTML = "+";
  }
}


function hideshowinfoArt() {
  var x = document.getElementById("infoArt");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoArt").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoArt").innerHTML = "+";
  }
}







    function hideshowinfoBon() {
  var x = document.getElementById("infoBon");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoBon").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoBon").innerHTML = "+";
  }
}


function hideshowinfoanalyse() {
  var x = document.getElementById("infoanalyse");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoanayse").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoanayse").innerHTML = "+";
  }
}

function hideshowNum() {
  var x = document.getElementById("infoNum");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoNum").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoNum").innerHTML = "+";
  }
}


function hideshowImp() {
  var x = document.getElementById("infoImp");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoImp").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoImp").innerHTML = "+";
  }
}
function hideshowLiv() {
  var x = document.getElementById("infoLiv");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoLiv").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoLiv").innerHTML = "+";
  }
}

function hideshowFact() {
  var x = document.getElementById("infoFact");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labinfoFact").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labinfoFact").innerHTML = "+";
  }
}


function hideshowPub() {
  var x = document.getElementById("infoPub");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labPub").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labPub").innerHTML = "+";
  }
}

function hideshowaffecte() {
  var x = document.getElementById("infoaffecte");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("labaffecte").innerHTML = "-";
  } else {
    x.style.display = "none";
    document.getElementById("labaffecte").innerHTML = "+";
  }
}



</script>