<?php
session_start();
require_once "securite.php";
include_once('BD.php'); 
 include_once('function.php'); 
  //delete
  if(isset($_GET['id_profil'])){
    $id=$_GET['id_profil'];
    delete("tauhenifiaion",$id,"idprofil");
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
            <div id="message"></div>
            <div class="col">
                <form id="myForm" enctype="multipart/form-data">
                    <input type="hidden" name="id_profil" id="id_profil">
                <select name="typep" id="typep"  class="form_data">
                    <option value>Choisissez le compte</option>
                   <?php foreach(get(" logine") as $charg):
                        $pho=$charg->idlo;
                        $user=$charg->userlo;  
                        ?>
                        <option value="<?php echo $pho ?>"><?php echo $user ?></option>
                  <?php endforeach; ?>
                </select><br><br>  
                <!-- <input type="file" name="photo" placeholder="Entrez Zone" multiple><br><br> -->
                <input type="text" name="nom" id="nom"  class="form_data" placeholder="Entrez nom et prenom"><br><br>
                <input type="email" name="em" id="em"  class="form_data" placeholder="Entrez email"><br><br>
                <input type="number" name="pho" id="pho"  class="form_data" placeholder="phone"><br><br>
                <button type="button"  name="save_profile" class="btne form_data" id="save_publication" onclick="save_meme()" value="save_profile"><i class="fa fa-check">Enregistrer</i></button>
                <button type="submit"  name="modifierprofile" class="btne" id="profile" ><i class="fa fa-edit">Modifier</i></button>
                <br><br>
                </form>
            </div>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                <th>#</th>
                <th>Nom et Prenom</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
           <?php
           $i=0;
            foreach(get("tauhenifiaion") as $charg):
                $i++;
                $id=$charg->idprofil;
                $sess=$charg->idlo;
                $ti=$charg->nom_prenom;
                $st=$charg->email;
                $ty=$charg->telephone;
         ?>
                <tr>
                   <td><?php echo $i?></td>
                <td><?php echo $ti?></td>
                <td><?php echo $st?></td>
                <td><?php echo $ty?></td>
                <td  class="edit"><button class="btne"><a  href="javascript:void(0)" onclick="de(<?php echo  $id?>,'<?php echo  $sess?>','<?php echo  $ti?>','<?php echo  $st?>','<?php echo  $ty?>')" ><i class="fa fa-edit"></i></a></button>
                <button class='btne supr' onclick="deletes(<?php echo $id?>)"><i class="fas fa-trash" title="Supprimer"></i></button></td>
                
                </tr>
            <?php endforeach;    ?>
            </tbody>
        </table>
        </div>  
    </div>