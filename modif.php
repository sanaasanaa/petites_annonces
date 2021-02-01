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

}

// verifie s il y a des donnees envoyees et qu elles sont pas nulles
if (isset($_POST) && !empty($_POST)) {

  // importation des images vers le fichier img
  $uploaddir = 'asset/img/';
  $uploadfile =  $uploaddir . basename($_FILES['photo']['name']);
  
  // mettre l'image dans un fichier temporaire 
  if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {
  
  
  } else {
  echo "Probleme avec ce fichier";
  }
// recupere le id envoye
    $id=$_GET['id'];
   
// on met les donnees rentrees dans des variables
    $intitule=$_POST['intitule'];
    $prix=$_POST['prix'];

  // appelle la methode pour modifier l annonce
    $annonce2 = $annonce->modif($uploadfile, $intitule, $prix, $id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><h1>formulaire modification</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>ajouter</title>
</head>

<body>
  <form action="#" method="post" enctype="multipart/form-data">
    
      <input type="hidden" name="id" value=<?=$annonce1['id']?>>

      <div class="mb-3">
        <img src="<?=$annonce1['photo']?>" alt="">
        <label for="formFileMultiple" class="form-label">Photo</label>
        <input class="form-control" type="file" name="photo" value=<?=$annonce1['photo']?> >
      </div>
      

        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">Intitulé</label>
          <input type="text" name="intitule" class="form-control" value=<?=$annonce1['intitule']?>>
        </div>
        

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Prix</label>
            <input type="text" name="prix" class="form-control" value=<?=$annonce1['prix']?>>
          </div>
          

              <button type="submit" class="btn btn-primary">modifier</button>
            
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
</body>
</html>