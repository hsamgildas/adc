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
if($_POST['affecter']){
$user=$_POST['user'];
for($i=0;$i<count($_POST['droit']);$i++){
$droit=$_POST['droit'][$i];
$reqdr =$pdo->query("SELECT count(*) as d from  droit Where user='$user' and menu_droit='$droit'");
$res=$reqdr->fetch();
$n=$res['d'];
if($n==0){

$req =$pdo->prepare("INSERT INTO droit(user,menu_droit)
VALUES ('$user','$droit')");  
$good=$req->execute();
if($good){
   $message='<div class="col-md-8 col-md-offset-2 alert-success">Droits bien affectés</div>';
   header('Location:droits.php?p='.$user.'&message='.$message.'');
   }
   else{
   $message='<div class=" col-md-8 col-md-offset-2 alert-danger">Echec </div>';

   header('Location:droits.php?p='.$user.'&message="'.$message.'"');

   } 
} 
}  }else if($_POST['desafecter']){
   $user=$_POST['user'];
for($i=0;$i<count($_POST['droit']);$i++){
$droit=$_POST['droit'][$i];
$reqdr =$pdo->prepare("DELETE from  droit Where user='$user' and menu_droit='$droit'");
$good=$reqdr->execute();
if($good){
   $message='<div class="col-md-8 col-md-offset-2 alert-success">Droits bien des affectés</div>';
   header('Location:droits.php?p='.$user.'&message='.$message.'');
   }
   else{
   $message='<div class=" col-md-8 col-md-offset-2 alert-danger">Echec </div>';

   header('Location:droits.php?p='.$user.'&message="'.$message.'"');

   } 
} 
}