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

    $decrypted_password=openssl_decrypt($donnees['mot_de_passe'],"AES-128-ECB",$password);

    if($mot_de_passe === $decrypted_password) {
        $_SESSION['pseudonyme'] = $pseudonyme;
        $_SESSION['rang'] = $donnees['rang'];

        $success = "Vous êtes désormais connecté $pseudonyme, <a href='index.php' style='color:#8E0754;'>revenir à l'accueil du site</a>.";
    }
    else {
        $erreurs[] = "Mauvais identifiants ! Veuillez réessayer.";
    }
}

?>

<!-- AFFICHAGE D'ERREUR -->
<?php 
    if($success) {
        echo '<div class="alert alert-secondary" role="alert">'.$success.'</div>';
        header("refresh:2;url=administration.php");
    }

    if(count($erreurs) > 0) {
        foreach($erreurs as $err) {
            echo '<div class="alert alert-danger" role="alert">'.$err.' </div>';
        }
    }
?>

<?php if(empty($_SESSION['pseudonyme'])) : ?>

<div id="wrapper">
    <form action="" method="POST">
    <div class="form-group">
        <label for="pseudonyme">Pseudonyme:</label>
        <input type="text" class="form-control" name="pseudonyme" id="pseudonyme">
    </div>
    <div class="form-group">
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe">
    </div>
    <br/>
    <button type="submit" class="btn btn-primary">Valider</button>
    </form>
    <br/>
</div>
<?php else:
    echo '<a href="administration.php"><button class="btn btn-outline-secondary" >Espace Admin</button></a><br/><br/>';
    ?>
<?php endif; ?>

<?php
require('assets/footer.php');
?>