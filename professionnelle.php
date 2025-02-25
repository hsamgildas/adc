<link href="styles.css" rel="stylesheet"><link rel="stylesheet" href="page.css">

<div class="card-container">
<?php session_start();?>
<?php include_once('BD.php'); ?>
<section class="envents">
    <div class=row>
<?php
try{
    foreach(get("posting WHERE type_publication=9 AND status=1") as $res){
              // Séparer les images par des virgules
        $images = explode(',', $res->nom_image); 
        
        // Déboguer : afficher le tableau des images pour voir son contenu
        // echo '<pre>'; print_r($images); echo '</pre>';
        
        // Vérifier si le tableau des images n'est pas vide et que la première image existe
        if (!empty($images) && !empty($images[0])) {
            echo ' <div class="card">';
            
            // Afficher seulement la première image (après avoir supprimé les espaces)
            $firstImage = trim($images[0]);
            
            // Vérifier si l'image est valide
            if ($firstImage !== '') {
                echo '<img src="./images/' . htmlspecialchars($firstImage) . '" alt="Image">';
            } else {
                echo 'Aucune image valide trouvée.';
            }
    
            $extension = ['pdf'];
            $file_extension = strtolower(pathinfo($firstImage, PATHINFO_EXTENSION));
            
            // Vérifier si l'extension est un PDF et afficher un lien de téléchargement
            if (in_array($file_extension, $extension)) {
                echo '<a href="./images/' . htmlspecialchars($firstImage) . '" download>' . htmlspecialchars($firstImage) . '</a>';
            }
            
            // Afficher les autres informations
            echo '<h4>' . htmlspecialchars(substr($res->titre, 0, 50)) . '</h4>';
            echo '<p>' . htmlspecialchars(substr($res->resume, 0, 200)) . '....</p>';
            
            echo '<a href="javascript:void(0)" class="btn" onclick="depa(' . $res->ids . ',\'' . addslashes($res->titre) . '\',\'' . addslashes($res->resume) . '\'),openWindow()">
                <i class="fas fa-plus" title="voir plus"></i></a>';
            
            echo '</div>';
        } else {
            // Si aucune image valide n'est présente, afficher un message de débogage
            echo 'Aucune image disponible pour cette publication.';
        }
    }
    
    
} 
catch (PDOException $e) {
echo "Erreur de requête : " . $e->getMessage(); // Gérer les erreurs de requête
}

?>
</div>
</section>