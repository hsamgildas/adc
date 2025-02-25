<link rel="stylesheet" href="eau.css">
<link rel="stylesheet" href="modal.css">
<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.css">


<?php session_start();?>
<?php include_once('BD.php'); ?>
<div class=container>
<div class=row>
        
<?php
if(isset($_GET['k'])){
  $id=$_GET['k'];
  delete("commentaire",$id,"idco");
}
try{
    foreach(get("commentaire ORDER BY dateenvo DESC")  as $res){
                        echo ' <div class="card">';
                        echo '<h4>' . htmlspecialchars($res->nomprenom) . '</h4>';
                        // echo '<p>' . htmlspecialchars($res->emailco) . '</p>';
                        echo '<p>' . htmlspecialchars($res->messageco) . '</p>';
                        echo '<p>' . htmlspecialchars($res->dateenvo) . '</p>'; 
                        
                        echo ' <button type="button" class="btn"><i class="fas fa-trash"></i></button>';
                        echo '</div>';

        }

} 
catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage(); // Gérer les erreurs de requête
}


?>



</div>
</div>