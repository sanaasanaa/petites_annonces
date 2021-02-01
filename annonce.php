<?php
require_once('conect.php');

class annonce {
    public function ajout($uploadfile, $intitule, $prix){
        
            $bd = getPdo(); 
            
            $query = $bd->prepare('INSERT INTO annonce( photo, intitule, prix ) VALUES (:photo,:intitule,:prix)');
            
            $query->bindValue(':photo', $uploadfile,PDO::PARAM_STR);
            $query->bindValue(':intitule', $intitule, PDO::PARAM_STR);
            $query->bindValue(':prix', $prix, PDO::PARAM_STR);
          
            $query->execute();
          
          }

    public function detail($id){
  
      $bd = getPdo();

      $sql = 'SELECT * FROM `annonce` WHERE `id` = :id;';
      
      //on prepare la requete
      $query = $bd->prepare($sql);
      
      //on accroche les paramètre (id) et constante de PDO pour savoir si entier
      $query->bindValue(':id', $id, PDO::PARAM_INT);
      
      //on excute la requête
      $query->execute();
      
      //on récupere le produit
      $rst= $query->fetch();

      return $rst;
    }
  

  public function modif($uploadfile, $intitule, $prix, $id){

  $bd = getPdo();

    $sql = "UPDATE annonce SET photo=?, intitule=?, prix=? WHERE id=? ";
    
    $query = $bd->prepare($sql);
  
    $query->execute(array($uploadfile, $intitule, $prix, $id));
  
  header('location:index.php');
  
  }

  public function suprim(int $id){
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
            // echo "produit supprimé";
            header('location:index.php');
        }
  }
}
?>