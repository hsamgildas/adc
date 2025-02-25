<?php 
//inserer la publication
if($_SERVER['REQUEST_METHOD']==='POST'){ 
  if(isset($_POST['save_publication'])){
    $btntype=$_POST['save_publication'];
    switch($btntype){
        case'save_publication':
      
        $titre=htmlspecialchars($_POST['titre']);
          $resume=htmlspecialchars($_POST['resume']);
          $type=htmlspecialchars($_POST['typep']);


      if(isset($_FILES['fichier'])){
        $m=[];
        $extension=['jpg','png','jepg','pdf'];
        $size=5*1024*1024;
        $images='';
            for($i=0;$i<count($_FILES['fichier']['name']);$i++){
              $filename=basename($_FILES['fichier']['name'][$i]);
              $uploadfile=$_FILES['fichier']['tmp_name'][$i];
              $file_size=$_FILES['fichier']['size'][$i];
              $file_extension=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
              if(!in_array($file_extension,$extension) || ($file_size > $size)){
                echo '<alert("verifiez le fichier svp")'; 
              }
                else{
                  $targetpath="./images/".$filename;
                  if(move_uploaded_file($uploadfile,$targetpath)){
                    $m[]=$filename;
                    $images=implode(',',$m);
                  } 
                  else{
                    echo'<alert("telechargement echoue")';   
              }
                
              }
           }
            if(!empty($images)){
              $tableName="posting";
              $columns=" titre, nom_image,resume,type_publication,status";
              $values=[$titre,$images,$resume,$type,0];
              insertdata($tableName,$columns,$values);
            }
            else{
              echo'<alert("fichier non valider")';  
            }
      }
      break;
      default:
      echo "echec";
      break;
    }
  }
}
  //edit la publication 
  if(isset($_REQUEST['edit'])){
    $d=$_POST['id'];
    $titre=htmlspecialchars($_POST['titre']);
    $resume=htmlspecialchars($_POST['resume']);
    $type=htmlspecialchars($_POST['typep']);

       if(isset($_FILES['fichier'])){
        $m=[];
        $extension=['jpg','png','jepg','pdf'];
        $size=5*1024*1024;
        $images='';
        for($i=0;$i<count($_FILES['fichier']['name']);$i++){
          $filename=basename($_FILES['fichier']['name'][$i]);
          $uploadfile=$_FILES['fichier']['tmp_name'][$i];
          $file_size=$_FILES['fichier']['size'][$i];
          $file_extension=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
          if(!in_array($file_extension,$extension) || ($file_size > $size)){
            echo '<alert("verifiez le fichier svp")'; 
          }
            else{
              $targetpath="./images/".$filename;
              if(move_uploaded_file($uploadfile,$targetpath)){
                $m[]=$filename;
                $images=implode(',',$m);
              } 
              else{
                echo'<alert("telechargement echoue")';   
          }
            
          }
       }
       if(!empty($images)){
    $tableName="posting";
    $params=
    ["ids"=>$d,
    "titre"=>$titre,
    "nom_image"=>$images,
    "resume"=>$resume,
    "type_publication"=>$type,
    "status"=>0];
    update($tableName,$params,$d,"ids");
  }
  else{
    echo'<alert("fichier non valider")';  
  }
  }
  }

 //insert login

 if($_SERVER['REQUEST_METHOD']==='POST'){ 
  if(isset($_POST['save_login'])){
    $btntype=$_POST['save_login'];
    switch($btntype){
        case'save_login':
    $no=htmlentities(htmlspecialchars($_POST['lo']));
    $em=htmlentities(htmlspecialchars(password_hash($_POST['pa'],PASSWORD_DEFAULT)));
    $tableName="logine";
    $columns="userlo,passlo";
    $values=[$no,$em];
    insertdata($tableName,$columns,$values);
    break;
    default:
    echo "echec";
    break;
  }
}
}
   //modifier le login
   if(isset($_REQUEST['editelogin'])){
    $id=$_POST['idl'];
    $no=htmlentities(htmlspecialchars($_POST['lo']));
    $em=htmlentities(htmlspecialchars(password_hash($_POST['pa'],PASSWORD_DEFAULT)));
    $tableName="logine";
    $params=["idlo"=>$id,"userlo"=>$no,"passlo"=>$em];
    update($tableName,$params,$id,"idlo");
   }
//insert le profil
if($_SERVER['REQUEST_METHOD']==='POST'){ 
  if(isset($_POST['save_profile'])){
    $btntype=$_POST['save_profile'];
    switch($btntype){
        case'save_profile':
    $lo= trim($_POST['typep']);
    $no=htmlspecialchars($_POST['nom']);
    $em=htmlspecialchars($_POST['em']);
    $pho=trim($_POST['pho']);
    $tableName="tauhenifiaion";
    $columns="idlo,nom_prenom,email,telephone";
    $values=[$lo,$no,$em,$pho];
    insertdata($tableName,$columns,$values);
    break;
    default:
    echo "echec";
    break;
  }
}
}
//modifier le profil
if(isset($_REQUEST['modifierprofile'])){
  $id= trim($_POST['id']);
  $lo= trim($_POST['typep']);
  $no=htmlspecialchars($_POST['nom']);
  $em=htmlspecialchars($_POST['em']);
  $pho=trim($_POST['pho']);
  $tableName="tauhenifiaion";
  $params=["idlo"=>$lo,"nom_prenom"=>$no,"email"=>$em,"telephone"=>$pho];
  update($tableName,$params,$id,"idlo");
 }
  if(isset($_REQUEST['contact'])){
    $no=htmlspecialchars($_POST['no']);
    $em=htmlspecialchars($_POST['em']);
    $ms=htmlspecialchars($_POST['ms']);

    $tableName="commentaire";
    $columns=" nomprenom, emailco,messageco";
    $values=[$no,$em,$ms];
    insertdata($tableName,$columns,$values);
   }
   
   if(isset($_GET['id']) && isset($_GET['status'])){
    $id=$_GET['id'];
    $status=$_GET['status'];
    $tableName="posting";
    $params=["ids"=>$id,
              "status"=>$status];
    update($tableName,$params,$_GET['id'],"ids");
   }

   //recuper
  
  ?>