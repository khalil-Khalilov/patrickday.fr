<?php 
require('assets/head.php');
$message = null;

if(!empty($_POST['pseudonyme']) && !empty($_POST['mot_de_passe'])) {
    $pseudonyme = htmlspecialchars($_POST['pseudonyme']);
    $mot_de_passe = sha1($_POST['mot_de_passe']);

    $sql = "SELECT mot_de_passe, rang FROM user WHERE pseudonyme=:pseudonyme";
    $requete = $pdo->prepare($sql);
    $requete->execute([
        'pseudonyme' => $pseudonyme
    ]);

    $donnees = $requete->fetch();
    if($mot_de_passe === $donnees['mot_de_passe']) {
        $_SESSION['pseudonyme'] = $pseudonyme;
        $_SESSION['rang'] = $donnees['rang'];
        $message = "Vous êtes désormais connecté $pseudonyme, <a href='index.php'>revenir à l'accueil du site</a>.";
    }
    else {
        $message = "Mauvais identifiants ! Veuillez réessayer.";
    }
}
?>

<?php 
if(isset($message)) {
    echo $message;
}
?>

<?php if(empty($_SESSION['pseudonyme'])) : ?>
<form class="sconnexion" action="" method="post">
    Pseudonyme <input class="spseudonyme" type="text" name="pseudonyme" /><br />
    Mot de passe <input class="smdp" type="password" name="mot_de_passe" /><br />
    <input type="submit" value="Valider" />
</form>
<?php endif; ?>
<?php
require('assets/footer.php');
?>