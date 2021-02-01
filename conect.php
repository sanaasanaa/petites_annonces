<?php 
// essaie de se connecter à la base de données sinon il trouve l'erreur et envoie un message d'erreur
 function getPdo(): PDO
{
try {
    $pdo = new PDO('mysql:host=localhost; dbname=siteannonce', 'root', '');


} catch (PDOException $error) {

   echo 'erreur:' . $error->getMessage();
   die();
}

return $pdo;

}

?>