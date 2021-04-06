<?php 
require('assets/head.php');
?>

<?php 
if(!empty($_POST['pseudonyme']) && !empty($_POST['mot_de_passe'])) {

    $pseudonyme = htmlspecialchars($_POST['pseudonyme']);
    $mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);
    
    $sql = ('SELECT * FROM `user`');

    $req = $pdo->query($sql);

    $donnees = $req->fetch();

    if($pseudonyme === $donnees['pseudonyme'] ){
      if(password_verify($mot_de_passe, $donnees['mot_de_passe'])){

        $_SESSION['rang'] = $donnees['rang'];
  
        $success = "Vous êtes désormais connecté.";
        
        header("refresh:2;url=administration.php");
      }
      else{
        echo '<div class="alert alert-danger" role="alert">Mauvais Mot de passe ! Veuillez réessayer.</div>';
      }
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Mauvais Pseudonyme ! Veuillez réessayer.</div>';
    }
}
?>


<?php
require('assets/affichage_erreur.php');
?>



  <form action="" method="POST" class="row g-3 needs-validation"  novalidate>
    <div class="col-md-4 position-relative">
      <label for="pseudonyme" class="form-label">Prénom</label>
      <input type="text" class="form-control" name="pseudonyme" id="pseudonyme" required>
    </div>

    <div class="col-md-4 position-relative">
      <label for="mot_de_passe" class="form-label">Mot de passe:</label>
      <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
    </div>
    
    <div class="col-12">
      <button class="btn btn-primary" type="submit">se connecter</button>
    </div>
  </form>


<?php
require('assets/footer.php');
?>



