<?php 
require_once('securite.php');
?>
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
            try {
            $req =$db->query("INSERT INTO droit(user,menu_droit) VALUES ('$user','$droit')");  
            }
            catch(Exception $e) {
               echo 'Message: '. $e->getMessage();
            }
         if($req){
            $_SESSION['message_r']='ok';
            header('Location: '.$_SERVER['HTTP_REFERER']);
            }
            else{
            $_SESSION['message_error']='error';
            header('Location: '.$_SERVER['HTTP_REFERER']);
            } 
      
      }  
}
else if($_POST['desafecter']){
      $user=$_POST['user'];
      for($i=0;$i<count($_POST['droit']);$i++){
         $droit=$_POST['droit'][$i];
         $reqdr =$db->prepare("DELETE from  droit Where user='$user' and menu_droit='$droit'");
         $good=$reqdr->execute();
         if($good){
            $_SESSION['message_r']='ok';
            header('Location: '.$_SERVER['HTTP_REFERER']);
            }
            else{
            $_SESSION['message_error']='error';
            header('Location: '.$_SERVER['HTTP_REFERER']);

            } 
      } 
}
