<?php
// appel du fichier connexion a la base de donnees
require_once('conect.php');

// instancie l'objet 
$bd = getPdo();

// selectionne les donnees dans la base pour dix annonces 
$sql = 'SELECT * FROM annonce LIMIT 10';

// requete des donnees
$query = $bd->query($sql);

// recupere les donnes sous forme de tableau 
$rst = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($rst);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/accueil.css">
    <title>annonces</title>
</head>

<body>

    <h1>Annonces</h1>

    <!-- <div class="container"> -->
    <div class="card-container row row-cols-2">

        <?php foreach ($rst as $val) : ?>
            <!-- <div class="card_gr"> -->
            <!-- <div> -->

            <div class="card" style="width: 18rem;">
                <img src="<?= $val['photo'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4><?= $val['intitule'] ?></h4>
                </div>
                <h4><?= $val['prix'] ?></h4>
                <a href="detail.php?id=<?= $val['id'] ?>" class="btn btn-dark">voir</a>
            </div>
        <?php endforeach ?>
        <!-- </div> -->
        <!-- </div> -->

    </div>
    </div>
    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>