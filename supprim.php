<?php
// appel du fichier ou se trouve la class et la connexion a la base de donnees
require_once('annonce.php');

// verifie s il y a un id et qu il n est pas vide
if(isset($_GET['id']) && !empty($_GET['id'])){

    //on nettoie l'ID envoyer tous les codes rajouter ils vont être supprimes
    $id = strip_tags($_GET['id']);

    // on instancie l:objet
    $annonce = new annonce;

    // appelle la methode pour supprimer l annonce
    $annonce1 = $annonce->supprim($id);
    
    }
    

?>
