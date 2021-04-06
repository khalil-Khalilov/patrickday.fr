<?php
require('assets/head.php');
//header("refresh:3;url=https://google.com");
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<h1>Bienvenue sur l'espace administration</h1><br/>";
} else {
    die("<p id='msg_error-404'>Page Web inaccessible</p>");
}
?>

<?php
if(!empty($_GET['modifier'])){
    $modifier = (int)$_GET['modifier'];

    $sql = ('SELECT * FROM `images_categorie` WHERE id = :id');

    $req = $pdo->prepare($sql);

    $resultat = $req->execute([
        'id' => $modifier
    ]);

    $donnees = $req->fetch();
}
else{
    die('ERREUR 404');
}
?>

<?php

if(!empty($_POST['formulaire_envoyer'])){
    if(empty($_POST['gallery_column'])){
        $erreurs[] = "Vous n'avez pas choisi la colonne !";
    }
    if(empty($_POST['type_image'])){
        $erreurs[] = "Vous n'avez pas choisi le type d'image !";
    }

    if(count($erreurs) === 0){

        $type_image = htmlspecialchars($_POST['type_image']);
        $gallery_column = (int)$_POST['gallery_column'];
        $titreImage = htmlspecialchars($_POST['titreImage']);
        
        if($_FILES['monImage']['size'] <= 5000000){
            $infofichier = pathinfo($_FILES['monImage']['name']);
            $extension_upload = $infofichier['extension'];
            $extensions_autorisees = ['JPG', 'jpg', 'jpeg', 'png', 'gif'];

            if(in_array($extension_upload, $extensions_autorisees)){
                $destination = "media/img/".$infofichier['filename'].time().'.'.$extension_upload;
    
                move_uploaded_file($_FILES['monImage']['tmp_name'], $destination);
            }
            else{
                echo '<div class="alert alert-danger" role="alert">L\'extension d\'image n\'est pas autorisé !</div>';
            }
        }
        else{
            echo '<div class="alert alert-danger" role="alert">Le taille du fichier dépassé la limite permise, 
            esseyer de compresses l\'image ou convertire son extension en jpg, png ou webp</div>';
        }
        

        $sql = ('UPDATE `images_categorie` SET `adresse_image`=:adresse_image,`titre_image`=:titre_image, `gallery_column`=:gallery_column, 
            `type_image`=:type_image WHERE id=:id');

        $req = $pdo->prepare($sql);

        $resultat = $req->execute([
            'adresse_image' => $destination,
            'titre_image' => $titreImage,
            'gallery_column' => $gallery_column,
            'type_image' => $type_image,
            'id' => $modifier
        ]);

        if($resultat) {
            $success =  "L'article a bien été modifié.";
            header("refresh:1;url=administration.php");
        }
        else {
            $erreurs[] = "Une erreur est survenue.";
        }
    }
}

?>

<?php
    require('assets/nav_administration.php');
    require('assets/affichage_erreur.php');
?>


<h2>Modifier l'image "<?=$donnees['titre_image'];?>" de la galerie</h2>
<!-- FORMULAIRE -->
<form class="was-validated" action="" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <select class="form-select" required aria-label="Select picture type"  name="type_image">
            <option value="">Selectionner le type d'image</option>
            <option value="Dessin">Dessin</option>
            <option value="Peinture">Peinture</option>
            <option value="Sculpture">Sculpture</option>
            <option value="Livre Object">Livre Object</option>
        </select>
        <div class="invalid-feedback">Selectionner le type d'image</div>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" value="1" name="gallery_column" id="gallery_column1" required>
        <label class="form-check-label" for="gallery_column1">Premier Colonne</label>
    </div>

    <div class="form-check ">
        <input class="form-check-input" type="radio" value="2" name="gallery_column" id="gallery_column2" required>
        <label class="form-check-label" for="gallery_column2">Deuxième Colonne</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" value="3" name="gallery_column" id="gallery_column3" required>
        <label class="form-check-label" for="gallery_column3">Troisième Colonne</label>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" value="4" name="gallery_column" id="gallery_column4" required>
        <label class="form-check-label" for="gallery_column4">Quatrième Colonne</label>
        
    </div>


    <div class="mb-3">
        <label for="titreImage" class="form-label">Titre Image:</label>
        <input type="text" class="form-control " name="titreImage" id="titreImage" value="<?=$donnees['titre_image'];?>" required></input>
        <div class="invalid-feedback">Tape le titre de l'image</div>
    </div>

    <div class="mb-3">
        <input type="file" class="form-control" name="monImage" id="monImage" aria-label="monImage" required>
        <div class="invalid-feedback">Selectionner l'image</div>
    </div>

    <input type="hidden" name="formulaire_envoyer" value="ghost_btn" />

    <div class="mb-3">
        <button class="btn btn-primary" type="submit" >Valider</button>
    </div>
</form>

<?php
require('assets/footer.php');
?>















