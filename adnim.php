<?php
session_start();
require_once "securite.php";
include_once('BD.php'); 
 include_once('function.php'); 
 //delete
 if(isset($_GET['id_admin'])){
    $id=$_GET['id_admin'];
    delete("posting",$id,"ids");
  }
?>
<link rel="stylesheet" type="text/css" href="./fontawesome-free-5.15.4-web/css/all.css">  
<link rel="stylesheet" href="admin.css">
<div class="principal">
    <div class="containers">
            <div class="header-section">
                <h1>INSERRER LES INFORMATION A PUBLIER</h1>
                <hr>
            </div>
            <div id="message"></div>
            <div class="col">
                <form  id="myForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_admin" id="id_admin">
                    <?php if(isset($_SESSION['log'])){?>
                <input type="hidden" id="secion" name="sesso" value="<?php echo $_SESSION['log'] ?>">
            <?php }?>
                <select name="typep" id="typep" class="form_data">
                    <option value>Choisissez l'option a poster</option>
                    <option value="1">Securite-alimentaire</option>
                    <option value="2">nutrition</option>
                    <option value="3">WASH</option>
                    <option value="4">Prevention des maladies</option>
                    <option value="5">Acces aux soins de sante</option>
                    <option value="6">Promotion de la sante maternelle et infantile</option>
                    <option value="7">Soutien a l'education des enfants</option>
                    <option value="8">Formation professionnelle</option>
                    <option value="9">Alphabetisation des adultes</option>
                    <option value="10">Construction d'ecoles</option>
                    <option value="11">Creation des petites entreprises</option>
                    <option value="12">Microcredits</option>
                    <option value="13">Developpement de competences</option>
                    <option value="14">Aide humanitaire dans les conditions d'urgence</option>
                    <option value="15">Protection des enfants</option>
                    <option value="16">Soutien aux personnes agees</option>
                    <option value="17">Lutte contre les violences basees sur le genre</option>
                </select><br><br>  
                <input type="file" name="fichier[]"  id="fi" class="form_data" placeholder="Entrez image" multiple ><br><br>
                <textarea name="titre"  id="ti" placeholder="entrez le titre de 50 mots" rows="2" maxlength="50" oninput="limite()"  class="form_data"></textarea><br><br>
                <textarea name="resume" id="re" placeholder="entrez votre resume de 100 mots" rows="5" maxlength="100" oninput="limiter()"   class="form_data"></textarea><br><br>
                <button type="button" name="save_publication"  class="btne form_data" id="save_publication" value="save_publication" onclick="save_meme()">Enregistrer</button>
                <button type="submit" name="edit_publication" id="edit_publication" class="btne" id="edit_publication">Modifier</button>
                <br><br>
                </form>
            </div>
    </div>
    <div class="table" id=table>
        <table>
            <thead>
                <tr>
                <th>#</th>
                <th style="width:30%;">TITRE</th>
                <th style="width:30%;">Resume</th>
                <th style="width:10%;">Etat</th>
                <th style="width:15%;">Publier</th>
                <th style="width:15%;">Action</th>
                </tr>
            </thead>
            <tbody>
           <?php
           $i=0;
            foreach(get("posting ORDER BY ids DESC") as $charg):
                $i++;
                $id=$charg->ids;
                $ti=$charg->titre;
                $re=$charg->nom_image;
                $st=$charg->resume;
                switch($ty=$charg->type_publication){
                    case 1:
                    $typ = "Securite-alimentaire";
                    break;
                
                case 2:
                    $typ = "nutrition";
                    break;
                
                case 3:
                    $typ = "WASH";
                    break;
                
                case 4:
                    $typ = "Prevention des maladies";
                    break;
                
                case 5:
                    $typ = "Acces aux soins de sante";
                    break;
                
                case 6:
                    $typ = "Promotion de la sante maternelle et infantile";
                    break;
                
                case 7:
                    $typ = "Soutien a l'education des enfants";
                    break;
                
                case 8:
                   $typ = "Formation professionnelle";
                    break;
               
                case 9:
                    $typ = "Alphabetisation des adultes";
                    break;
               
                case 10:
                    $typ = "Construction d'ecoles";
                    break;
                
                case 11:
                    $typ = "Creation des petites entreprises";
                    break;
                
                case 12:
                    $typ = "Microcredits";
                    break;
                
                case 13:
                    $typ = "Developpement de competences";
                    break;
                
                case 14:
                    $typ = "Aide humanitaire dans les conditions d'urgence";
                    break;
               
                case 15:
                    $typ = "Protection des enfants";
                    break;
               
                case 16:
                    echo"Soutien aux personnes agees";
                    break;
                
                case 17:
                    $typ = "Lutte contre les violences basees sur le genre";
                    break;
                
                default:
                    $typ = "Aucun";
                }
                $date=$charg->date_publication;
                $statu=$charg->status;
         ?>
                <tr>
                   <td><?php echo $i?></td>
                    <td><?php echo substr($ti,0,100)?></td>
                    <td><?php echo substr($st,0,100)?></td>
                    <!-- <td><?php //echo $st ?></td> -->
                    <td id="publier" ><?php if($statu==0){ echo "non publier"; } elseif($statu==1){ echo "publier"; } ?></td>
                    <td style="width:12em;"><select name="status" id="status" onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $id ?>')" >
                        <option value=""></option>
                        <option value="1">activer</option>
                        <option value="0">desactiver</option>
                    </select></td>
                    <td  class="edit"><button class="btne"><a  href="javascript:void(0)" onclick="admin(<?php echo  $id ?>,'<?php echo  addslashes($ty)?>','<?php echo  addslashes($ti)?>','<?php echo  addslashes($st)?>')" ><i class="fa fa-edit"></i></a></button>
                    <button class='btne supr' onclick="deletes(<?php echo $id?>)"><i class="fas fa-trash" title="Supprimer"></i></button></td>
                
                </tr>
            <?php endforeach;    ?>
            </tbody>
        </table>
        </div>  
    </div>
   