<?php 
require('assets/head.php');
?>

<?php 
if(!empty($_POST['pseudonyme']) && !empty($_POST['mot_de_passe'])) {
    $pseudonyme = htmlspecialchars($_POST['pseudonyme']);
    $mot_de_passe = htmlspecialchars($_POST['mot_de_passe']);
    $password="ARGON2ID*V=19+M=65536,T=4,P=1*DZRZDNC3ZHN0VGRNMJV";
    
    
    $sql = ('SELECT mot_de_passe, rang FROM `user` WHERE pseudonyme=:pseudonyme');

    $req = $pdo->prepare($sql);

    $req->execute([
        'pseudonyme' => $pseudonyme
    ]);
    $donnees = $req->fetch();

    $decrypted_password=openssl_decrypt($donnees['mot_de_passe'],"AES-128-ECB", $password);   

    if($mot_de_passe === $decrypted_password) {
        $_SESSION['pseudonyme'] = $pseudonyme;
        $_SESSION['rang'] = $donnees['rang'];

        $success = "Vous êtes désormais connecté $pseudonyme.";
        
        header("refresh:2;url=administration.php");
    }
    else {
        echo '<div class="alert alert-danger" role="alert">Mauvais identifiants ! Veuillez réessayer.</div>';
    }
}

?>


<?php
require('assets/affichage_erreur.php');
?>

<?php if(empty($_SESSION['pseudonyme'])):?>

  <form class="was-validated" action="" method="POST" class="row g-3 needs-validation"  novalidate>
    <div class="col-md-4 position-relative">
      <label for="pseudonyme" class="form-label">Prénom</label>
      <input type="text" class="form-control" name="pseudonyme" id="pseudonyme" required>
    </div>

    <div class="col-md-4 position-relative">
      <label for="mot_de_passe" class="form-label">Mot de passe:</label>
      <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
    </div>
    <br/>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">se connecter</button>
    </div>
  </form>
  <br/>
<?php else:
    echo '<a href="administration.php"><button class="btn btn-outline-secondary" >Espace Admin</button></a><br/><br/>';
    ?>
<?php endif; ?>

<?php
require('assets/footer.php');
?>



