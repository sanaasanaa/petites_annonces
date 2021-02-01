<?php
// appel du fichier ou se trouve la class et la connexion a la base de donnees
require_once('annonce.php');

// verifie s il y a un id et qu il n est pas vide
if(isset($_GET['id']) && !empty($_GET['id'])){

//on nettoie l'ID envoyer tous les codes rajouter ils vont être supprimes
$id = strip_tags($_GET['id']);

// on instancie l:objet
$annonce = new annonce;

// appelle la methode pour afficher les detail de l annonce
$annonce1 = $annonce->detail($id);

// var_dump($annonce1);

}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detail.css">
    <title>Detail</title>
</head>

<body>
    <div>
        <h1><?= $annonce1['intitule']?></h1>
    </div>
    <div>
        <img src="<?= $annonce1['photo']?>" alt="">
    </div>
    <div>
        <h3><?= $annonce1['prix']?></h3>
    </div>
    <a href="modif.php?id=<?=$annonce1['id']?>">modifier</a>
    <a href="supprim.php?id=<?=$annonce1['id']?>">supprimer</a>
</body>

</html>