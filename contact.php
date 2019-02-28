<?php
// On vérifie que tous les champs du formulaire sont bien remplis
if (!empty($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['object']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    
    // On récupère chacun des champs du formulaire en se protegeant contre les failles XSS avec htmlspecialchars()
    
    $name    = htmlspecialchars($_POST['name']);
    $object  = htmlspecialchars($_POST['object']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // On se connecte à la base de données MySQL
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=pia;charset=utf8', 'root', '');
        
    }
    catch (Exception $e) {
        // En cas d'erreur, on s'arrête là et on affiche l'erreur "SQLSTATE[HY000] [1049] Base '...' inconnue"
        die('Erreur : ' . $e->getMessage());
    }
    
    echo 'Envoi du message... ';
    
    // On envoie les données à la base de données. On fait ça en 2 temps pour éviter les failles SQL (injection SQL) :
    // Donc d'abord on prépare la requete, mais on met pas directement les vraies valeurs, on les nomme juste (avec le :).
    
    $req = $bdd->prepare('INSERT INTO messages(pseudo, object, email, message) VALUES (:name, :object, :email, :message)');
    // Ensuite, on envoie vraiment la requete, en précisant que tel paramètre a telle valeur.
    $res = $req->execute(array(
        'name' => $name,
        'object' => $object,
        'email' => $email,
        'message' => $message
    ));
    
    // On vérifie que l'envoi de données s'est bien passé
    if ($res) {
        echo 'Message envoyé !';
        // On redirige sur la page "contact.html"
        header("Location: contact.html");
    } else {
        // Si je veux que ça redirige aussi en cas d'erreur, j'enlève le if / else et je garde juste le 'header(...)'
        echo 'Echec de l\'envoi du message';
    }
}
