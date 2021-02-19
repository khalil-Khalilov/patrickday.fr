<?php
require('assets/head.php')
?>

<?php
    unset($_SESSION['pseudonyme']);
    echo 'Vous avez bien été déconnecté';

?>

<a href="connexion.php">Log in</a><br />
<a href="index.php">Retour a la page d'accueil</a>

<?php
require('assets/footer.php')
?>