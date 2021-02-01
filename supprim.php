<?php

if(isset($_GET['id']) && !empty($_GET['id'])){

    require_once('conect.php');
    
    //on nettoie l'ID envoyer tous les codes rajouter ils vont être supprimer
    $id = strip_tags($_GET['id']);
    
    $bd = getPdo();
    
    $sql = 'DELETE FROM `annonce` WHERE `id` = :id;';
    
    //on prepare la requete
    $query = $bd->prepare($sql);
    
    //on accroche les paramètre (id) et constante de PDO pour savoir si entier
    $query->bindValue(':id', $id, PDO::PARAM_INT);
}
    //on excute la requête
    if($query->execute()){
        echo "produit supprimé";
        // header('location:index.php');
    }

?>
