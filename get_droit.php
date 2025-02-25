
<?php
@session_start();
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
   $user= @$_SESSION['log'];
   $d=array();
   $reqdr =$pdo->query("SELECT * from  droit Where user='$user'");
   while($res=$reqdr->fetch()){
   array_push($d,$res['menu_droit']); 
   }