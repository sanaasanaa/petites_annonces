<?php
require_once('annonce.php');

if (isset($_POST) && !empty($_POST)) {

  // importation du chemin fichier image 
  $uploaddir = 'asset/img/';
  // var_dump($_FILES);
  $uploadfile =  $uploaddir . basename($_FILES['photo']['name']);
  
  echo $uploadfile;
  echo '<pre>';
  
  // mettre l'image dans un fichier temporaire 
  
  if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {
  
  
  } else {
  echo "Probleme avec ce fichier";
  }
  
   
    $intitule = $_POST['intitule'];
    $prix = $_POST['prix'];
  

$annonce = new annonce;

$annonce1 = $annonce->ajout($uploadfile, $intitule, $prix);
}

// if (isset($_POST) && !empty($_POST)) {

//   require_once('conect.php');

// // importation du chemin fichier image 
// $uploaddir = 'asset/img/';
// // var_dump($_FILES);
// $uploadfile =  $uploaddir . basename($_FILES['photo']['name']);

// echo $uploadfile;
// echo '<pre>';

// // mettre l'image dans un fichier temporaire 

// if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {

// // echo  "<img src=$uploadfile>";

// // echo '<img src=' . $uploadfile . '>';

// } else {
// echo "Probleme avec ce fichier";
// }

//    // $email = $_POST['email'];
//   $intitule = $_POST['intitule'];
//   $prix = $_POST['prix'];

//   $bd = getPdo(); 
  
//   $query = $bd->prepare('INSERT INTO annonce( photo, intitule, prix ) VALUES (:photo,:intitule,:prix)');
  
//   $query->bindValue(':photo', $uploadfile,PDO::PARAM_STR);
//   $query->bindValue(':intitule', $intitule, PDO::PARAM_STR);
//   $query->bindValue(':prix', $prix, PDO::PARAM_STR);

//   $query->execute();



// }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>ajouter</title>
</head>

<body>
  <form action="#" method="post" enctype="multipart/form-data">
    
      <!-- <legend>Ajouter une annonce</legend>
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
      </div> -->
      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Photo</label>
        <input class="form-control" type="file" name="photo">
      </div>
      

        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">Intitulé</label>
          <input type="text" name="intitule" class="form-control">
        </div>
        

          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Prix</label>
            <input type="text" name="prix" class="form-control">
          </div>
          

              <button type="submit" class="btn btn-primary">ajouter</button>
            
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>