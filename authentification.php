<?php
session_start();
require_once('db.php');
if (isset($_POST['contact'])) {
    // Nettoyage des entrées pour éviter les attaques XSS
    $pass = trim(htmlentities(htmlspecialchars($_POST['pass'])));
    $pseudo = trim(htmlentities(htmlspecialchars($_POST['log'])));

    // Préparer la requête SQL pour vérifier l'utilisateur et le mot de passe
    $sql1 = 'SELECT * FROM logine WHERE userlo = ?'; // Pas besoin de "AND passlo=? ici"
    $statement = $pdo->prepare($sql1);
    $para = array($pseudo); // On ne passe que le pseudo pour la recherche
    $statement->execute($para);

    // Vérifier si l'utilisateur existe dans la base de données
    if ($statement->rowCount() == 1) {
        // Récupérer les données de l'utilisateur
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe en utilisant password_verify
        if (password_verify($pass, $row['passlo'])) {
            // Si le mot de passe est correct, démarrer la session et rediriger vers admin.php
            session_start();
            $_SESSION['log'] = $row['userlo']; // Enregistrer le pseudo dans la session
            header('Location: admin.php'); // Redirection vers la page d'administration
            exit();
        } else {
            // Si le mot de passe est incorrect, rediriger avec un message d'erreur
            header("Location: authentification.php");
            $error = "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.";
            exit();
        }
    } else {
        // Si l'utilisateur n'existe pas, rediriger avec un message d'erreur
        header("Location: authentification.php");
        $error = "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.";
        exit();
    }
}


	?>


<link rel="stylesheet" type="text/css" href="./fontawesome-free-5.15.4-web/css/all.css">   

<style>
    #mover{
        width: 50vw;
        margin-left:25vw;
        margin-top:5em;
        height:45%;
        background:#222;
    }
    #mover-header{
        background:brown;
        color:#fff;
    }
    #mover form input{
        width: 98%;
        margin:outo;
       height:5em;
    }
</style>
                <div id="mover">
                    <div id="mover-header">ADCOV : +257 69 69 69 90</div>
                        <span>
                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                <input type="text" name="log" id="log" placeholder="saisissez nom utilisateur" autocomplete="off"><br><br>
                                <input type="password" name="pass" id="pass" placeholder="saisissez le mot de passe" autocomplety='new-password'><br><br>
                                <i class="fas fa-valid"></i><input type="submit" name="contact" value="Envoyer" class="btn">
                            </form>
                        </span>
                </div>