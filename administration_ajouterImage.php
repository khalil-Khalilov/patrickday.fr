<?php
require('assets/head.php');
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<h1>Bienvenue sur l'administration</h1>";
} else {
    die("PAS DE HACK");
}

?>

<?php
    if(!empty($_POST['type_image']) && !empty($_POST['gallery_column']) && !empty($_POST['titreImage'])){

        $type_image = htmlspecialchars($_POST['type_image']);
        $gallery_column = (int)$_POST['gallery_column'];
        $titreImage = htmlspecialchars($_POST['titreImage']);

        if(!empty($_FILES['monImage']) && $_FILES['monImage']['error'] == 0){

            if($_FILES['monImage']['size'] <= 5000000){
                $infofichier = pathinfo($_FILES['monImage']['name']);
                $extension_upload = $infofichier['extension'];
    
                $extensions_autorisees = ['JPG', 'jpg', 'jpeg', 'png', 'gif'];
    
                if(in_array($extension_upload, $extensions_autorisees)){
                    $destination = "media/img/".$infofichier['filename'].time().'.'.$extension_upload;
    
                    move_uploaded_file($_FILES['monImage']['tmp_name'], $destination);
                }
                else{
                    echo '<div class="alert alert-danger" role="alert">L\'extension d\'image n\'est pas autorisée !</div>';
                }
            }
        }
        else{
            echo '<div class="alert alert-danger" role="alert">La taille du fichier dépasse la limite permise, 
            essayer de compresser l\'image ou  de convertir son extension en jpg, png ou webp</div>';
        }

        $sql = ('INSERT INTO `images_categorie`(`adresse_image`, `titre_image`, `gallery_column`, `type_image`) 
                VALUES (:adresse_image, :titre_image, :gallery_column, :type_image)');

        $req = $pdo->prepare($sql);

        $resultat = $req->execute([
            'adresse_image' => $destination,
            'titre_image' => $titreImage,
            'gallery_column' => $gallery_column,
            'type_image' => $type_image
        ]);

        // VERIFICATION -> Si la variable "$resultat" est bien executé
        if($resultat):
            $success = "L'élément a bien été ajouté.";
            header("refresh:1;url=administration.php");
        else:
            echo '<div class="alert alert-danger" role="alert">Une erreur est survenue. Veuillez réessayer.</div>';
        endif;
     }

?>



<?php
    require('assets/nav_administration.php');
    require('assets/affichage_erreur.php');
?>


<h1>Ajouter une image</h1>

<form class="was-validated" action="" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <select class="form-select" required aria-label="Select picture type"  name="type_image">
            <option value="">Sélectionner le type d'image</option>
            <option value="Dessin">Dessin</option>
            <option value="Peinture">Peinture</option>
            <option value="Sculpture">Sculpture</option>
            <option value="Livre Object">Livre Objet</option>
        </select>
        <div class="invalid-feedback">Sélectionner le type d'image</div>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" value="1" name="gallery_column" id="gallery_column1" required>
        <label class="form-check-label" for="gallery_column1">Première Colonne</label>
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
        <input type="text" class="form-control " name="titreImage" id="titreImage" required></input>
        <div class="invalid-feedback">Taper le titre de l'image</div>
    </div>

    <div class="mb-3">
        <input type="file" class="form-control" name="monImage" id="monImage" aria-label="monImage" required>
        <div class="invalid-feedback">Sélectionner l'image</div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit" >Valider</button>
    </div>
</form>




<?php
require('assets/footer.php');
?>