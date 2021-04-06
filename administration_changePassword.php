<?php
require('assets/head.php');
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<h1>Bienvenue sur l'administration</h1>";
} else {
    die("<p id='msg_error-404'>Page Web inaccessible</p>");
}

?>

<?php
if(!empty($_POST['formulaire_envoyer'])){
    if(empty($_POST['new_nickname'])){
        echo '<div class="alert alert-danger" role="alert">Le champ PSEUDONYME est VIDE !</div>';
    }
    if(empty($_POST['new_password'])){
        echo '<div class="alert alert-danger" role="alert">Le champ MOT DE PASSE est VIDE !</div>';
    }

    if(count($erreurs) === 0){

        $new_nickname = htmlspecialchars($_POST['new_nickname']);
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $rang = 1;
        

        $sql = ('UPDATE `user` SET `pseudonyme`=:pseudonyme,`mot_de_passe`=:mot_de_passe WHERE rang=:rang');

        $req = $pdo->prepare($sql);

        $resultat = $req->execute([
            'pseudonyme' => $new_nickname,
            'mot_de_passe' => $new_password,
            'rang' => $rang
        ]);

        if($resultat) {
            $success =  "Le mot de passe et le pseudonyme ont bien été modifiés.";
            //header("refresh:3;url=index.php");
        }
        else {
            echo '<div class="alert alert-danger" role="alert">Une erreur est survenue.</div>';
        }
    }
}

?>



<?php
    require('assets/nav_administration.php');
    require('assets/affichage_erreur.php');
?>


<!--Modiffier Mot de passe-->
<div class="kh-container"> 
    <h1>Modifier Mot de passe</h1>

    <!-- FORMULAIRE -->
    <div id="wrapper">
        <form class="was-validated" action="" method="POST">
            <div class="mb-3">
                <label for="pseudonyme" class="form-label">Nouveau Pseudonyme:</label>
                <input type="text" class="form-control " name="new_nickname" id="new_nickname" placeholder="Patrick" required></input>

            </div>

            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Nouveau Mot de passe:</label>
                <input type="password" class="form-control " name="new_password" id="new_password" required></input>

            </div>

            <input type="hidden" name="formulaire_envoyer" value="ghost_btn" />

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>  
</div>


<?php
require('assets/footer.php');
?>