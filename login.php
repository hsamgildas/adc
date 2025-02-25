<?php
session_start();
require_once "securite.php";
include_once('BD.php'); 
include_once('function.php');
 //delete
 if(isset($_GET['id_login'])){
    $id=$_GET['id_login'];
    delete("logine",$id,"idlo");
  }
?>
<link rel="stylesheet" type="text/css" href="./fontawesome-free-5.15.4-web/css/all.css">  
<link rel="stylesheet" href="admin.css">
<div class="principal">
    <div class="containers">
            <div class="header-section">
                <h1>INSERRER l'identification</h1>
                <hr>
            </div>
            <div id="mesage"></div>
            
    
            <div class="col">
                <form id="myForm" enctype="multipart/form-data" autocomplete="off">
                
                <input type="hidden" name="id_login" id="id_login" class="sample_form"  autocomplete="off"><br><br>
                <input type="text" name="lo" id="da" class="form_data" placeholder="Entrez le nom d'un utilisateur"  autocomplete="off"><br><br>
                <input type="password" name="pa" id="td" class="form_data"  placeholder="Entre le mot de passe"  autocomplete="off"><br><br>
                
                <button type="button"  name="save_login" class="btne form_data" id="save_publication" value="save_login" onclick="save_meme()"><i class="fa fa-check">Enregistrer</i></button>
                <button type="submit"  name="editelogin" class="btne" id="login"><i class="fa fa-edit">Modifier</i></button>
                 <br><br>
                </form>
            </div>
            
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                <th>#</th>
                <th>Nom utilisateur</th>
                <th>Mot de passe</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
           <?php
           $i=0;
            foreach(get("logine") as $charg):
                $i++;
                $id=$charg->idlo;
                $ti=$charg->userlo;
                $st=$charg->passlo;
         ?>
                <tr>
                   <td><?php echo $i?></td>
                <td><?php echo $ti?></td>
                <td><?php echo $st?></td>
                <td  class="edit"><button class="btne"><a  href="javascript:void(0)" onclick="login(<?php echo $id ?>,'<?php echo $ti?>','<?php echo $st?>')"><i class="fa fa-edit"></i></a></button>
                <button class='btne supr' onclick="deletes(<?php echo $id?>)"><i class="fas fa-trash" title="Supprimer"></i></button></td>
            </tr>
            <?php endforeach;    ?>
            </tbody>
        </table>
        </div>  
    </div>