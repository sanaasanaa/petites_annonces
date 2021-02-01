<?php
require_once('annonce.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

  $id=$_GET['id']; 

$annonce = new annonce;
$annonce1 = $annonce->detail($id);

}


if (isset($_POST) && !empty($_POST)) {

  $uploaddir = 'asset/img/';
  // var_dump($_FILES);
  $uploadfile =  $uploaddir . basename($_FILES['photo']['name']);
  
  // mettre l'image dans un fichier temporaire 
  
  if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {
  
  // echo  "<img src=$uploadfile>";
  
  // echo '<img src=' . $uploadfile . '>';
  
  } else {
  echo "Probleme avec ce fichier";
  }

    $id=$_GET['id'];
    $intitule=$_POST['intitule'];
    $prix=$_POST['prix'];

    $annonce2 = $annonce->modif($uploadfile, $intitule, $prix, $id);
}
    



 //pour savoir si l'ID existe et si il est pas vide dans l'url

//  if(isset($_GET['id']) && !empty($_GET['id'])){
//     // importation du chemin fichier image 
// $uploaddir = 'asset/img/';
// // var_dump($_FILES);
// $uploadfile =  $uploaddir . basename($_FILES['photo']['name']);

// // mettre l'image dans un fichier temporaire 

// if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {

// // echo  "<img src=$uploadfile>";

// // echo '<img src=' . $uploadfile . '>';

// } else {
// echo "Probleme avec ce fichier";
// }

//   if (isset($_POST) && !empty($_POST)) {
//     $id=$_GET['id'];
//     $intitule=$_POST['intitule'];
//     $prix=$_POST['prix'];
    

  
  
// $annonce = new annonce;

// $annonce1 = $annonce->modif($id, $uploadfile, $intitule, $prix);

//  }
// }

// //pour savoir si l'ID existe et si il est pas vide dans l'url

// if(isset($_GET['id']) && !empty($_GET['id'])){
//   require_once('conect.php');
  
//   //on nettoie l'ID envoyer tous les codes rajouter ils vont être supprimer
//   $id = strip_tags($_GET['id']);
  
//   $bd = getPdo();
  
//   $sql = 'SELECT * FROM `annonce` WHERE `id` = :id;';
  
//   //on prepare la requete
//   $query = $bd->prepare($sql);
  
//   //on accroche les paramètre (id) et constante de PDO pour savoir si entier
//   $query->bindValue(':id', $id, PDO::PARAM_INT);
  
//   //on excute la requête
//   $query->execute();
  
//   //on récupere le produit
//   $rst= $query->fetch();

//   }

//  // importation du chemin fichier image 
// $uploaddir = 'asset/img/';
// // var_dump($_FILES);
// $uploadfile =  $uploaddir . basename($_FILES['photo']['name']);

// // mettre l'image dans un fichier temporaire 

// if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {

// // echo  "<img src=$uploadfile>";

// // echo '<img src=' . $uploadfile . '>';

// } else {
// echo "Probleme avec ce fichier";
// }

//   if (isset($_POST) && !empty($_POST)) {
//     $id=$_GET['id'];
//     $intitule=$_POST['intitule'];
//     $prix=$_POST['prix'];
    
    
  
  
//   require_once('conect.php'); 

//     $bd = getPdo(); 
  
//     $sql = "UPDATE annonce SET photo=?, intitule=?, prix=? WHERE id=? ";
    
//     $query = $bd->prepare($sql);
  
//     $query->execute(array($uploadfile, $intitule, $prix, $id));
  
//   header('location:index.php');
  
  
  
  
//   }
  


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