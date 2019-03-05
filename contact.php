<?php
// On vérifie que tous les champs du formulaire sont bien remplis
if (!empty($_POST['name']) && !empty($_POST['object']) && !empty($_POST['email']) && !empty($_POST['message']))
{

    // On récupère chacun des champs du formulaire en se protegeant contre les failles XSS avec htmlspecialchars()

    $name    = htmlspecialchars($_POST['name']);
    $object  = htmlspecialchars($_POST['object']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // On se connecte à la base de données MySQL
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=pia;charset=utf8', 'root', ''); //On aurait pû aussi mettre les identifiants de connexion à la bdd dans un fichier à part puis de faire un include.
    }
    // Si la connexion échoue (try) on affiche le débuguage
    catch (Exception $e)
    {
        // En cas d'erreur, on s'arrête là et on affiche l'erreur "SQLSTATE[HY000] [1049] Base '...' inconnue"
        die('Erreur : ' . $e->getMessage());
    }

    // On utilise la methode PDO puis on envoie les données à la base de données. On fait ça en 2 temps (prepare et execute) pour éviter les injection SQL.

    // d'abord on prépare la requete, mais on met pas directement les vraies valeurs, on les nomme juste (avec le :)

    $req = $bdd->prepare('INSERT INTO messages(pseudo, object, email, message) VALUES (:name, :object, :email, :message)');
    // Ensuite, on envoie vraiment la requete, en précisant que tel paramètre a telle valeur.
    $req->execute(array(
        'name' => $name,
        'object' => $object,
        'email' => $email,
        'message' => $message
    ));

    // On redirige sur la page "contact.html" après quelques secondes
    //en cas de succes : 
    header('Refresh: 3;URL=contact.html');
    echo "<p>Votre message à bien été envoyé !</p>
    <p>&nbsp;Redirection...</p>";
}

else
{
  // ou en cas d'erreur : 
  header('Refresh: 2;URL=contact.html');
  echo "<p style=\"color:#bd1c1d; font-weight: 900; font-size:1.3rem;\">/!\&nbsp;Merci de remplir tous les champs du formulaire !&nbsp;/!\</p>";
}
