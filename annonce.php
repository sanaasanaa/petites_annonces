<?php
// appel fichier connection
require_once('conect.php');

// class pour le crud des annonces
class annonce
{
  // methode pour ajouter les annonces
  public function ajout($uploadfile, $intitule, $prix)
  {

    // connexion a la base de donnee
    $bd = getPdo();

    // insertion des donnees dans la base
    $query = $bd->prepare('INSERT INTO annonce( photo, intitule, prix ) VALUES (:photo,:intitule,:prix)');

    $query->bindValue(':photo', $uploadfile, PDO::PARAM_STR);
    $query->bindValue(':intitule', $intitule, PDO::PARAM_STR);
    $query->bindValue(':prix', $prix, PDO::PARAM_STR);

    if ($query->execute()) {
      header('location:index.php');
    }
  }

  public function detail($id)
  {

    $bd = getPdo();

    $sql = "SELECT * FROM annonce WHERE id=?";

    $query = $bd->prepare($sql);

    $query->execute(array($id));

    $rst = $query->fetch();

    return $rst;
  }


  public function modif($uploadfile, $intitule, $prix, $id)
  {

    $bd = getPdo();

    $sql = "UPDATE annonce SET photo=?, intitule=?, prix=? WHERE id=? ";

    $query = $bd->prepare($sql);

    if ($query->execute(array($uploadfile, $intitule, $prix, $id))) {



      header('location:index.php');
    }
  }

  public function supprim(int $id)
  {

    require_once('conect.php');

    $bd = getPdo();

    $sql = "DELETE FROM annonce WHERE id=?";

    //on prepare la requete
    $query = $bd->prepare($sql);

    //on excute la requête
    if ($query->execute(array($id))) {

      header('location:index.php');
    }
  }
}
