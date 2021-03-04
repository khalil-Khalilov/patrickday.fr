<?php

//Ce code nous permet de nous connecter à notre base de donnée MySQL
function connexion($bdd) {
    $pdo = new PDO('mysql:host=localhost;dbname='.$bdd.';charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pdo) {
        return $pdo;
        //echo 'Connexion réussie';
    }
    else {
        echo 'Connexion échouée';
    }
}

?>