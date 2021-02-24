<?php
require('assets/head.php');
//header("refresh:3;url=https://google.com");
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "Bienvenue sur l'administration.";
} else {
    die("PAS DE HACK");
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
        $erreurs[] = "Vous n'avais pas choisi la colonne !";
    }
    if(empty($_POST['type_image'])){
        $erreurs[] = "Vous n'avais pas choisi le type d'image !";
    }

    if(count($erreurs) === 0){

        $type_image = htmlspecialchars($_POST['type_image']);
        $gallery_column = (int)$_POST['gallery_column'];
        $titreImage = htmlspecialchars($_POST['titreImage']);

        if($_FILES['monImage']['size'] <= 1000000){
            $infofichier = pathinfo($_FILES['monImage']['name']);
            $extension_upload = $infofichier['extension'];
            $extensions_autorisees = ['JPG', 'jpg', 'jpeg', 'png', 'gif'];

            if(in_array($extension_upload, $extensions_autorisees)){
                $destination = "media/img/".$infofichier['filename'].time().'.'.$extension_upload;
    
                move_uploaded_file($_FILES['monImage']['tmp_name'], $destination);
            }
        }
        else{
            $erreurs[] = 'La taille du fichier depasse 1 Mo !';
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
            header("refresh:3;url=index.php");
        }
        else {
            $erreurs[] = "Une erreur est survenue.";
        }
    }
}

?>





<!-- AFFICHAGE D'ERREUR -->
<?php 
    if($success) {
        echo '<div class="alert alert-success" role="alert">'.$success.'</div>';
    }

    if(count($erreurs) > 0) {
        foreach($erreurs as $err) {
            echo '<div class="alert alert-danger" role="alert">'.$err.' </div>';
        }
    }
?>

    <!-- FORMULAIRE -->
    <form action="" method="POST" enctype="multipart/form-data">

        <!--Button Select Type-->
        <select class="form-select" aria-label="Select picture type" name="type_image">
            <option selected>Selectionner le type d'image</option>
            <option value="Dessin">Dessin</option>
            <option value="Peinture">Peinture</option>
        </select>

        <!--Button RADIOS-->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="1" name="gallery_column" id="gallery_column1">
            <label class="form-check-label"  for="gallery_column1">1</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="2" name="gallery_column" id="gallery_column2" >
            <label class="form-check-label" for="gallery_column2">2</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="3" name="gallery_column" id="gallery_column3">
            <label class="form-check-label" for="gallery_column3">3</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="4" name="gallery_column" id="gallery_column4">
            <label class="form-check-label" for="gallery_column4">4</label>
        </div>

        <!--Input TITRE IMAGE-->
        <div class="form-group">
            <label for="titreImage">Titre:</label>
            <input type="text" class="form-control"  name="titreImage" id="titreImage" value="<?=$donnees['titre_image'];?>">
        </div>

        <!--Input UPLOAD IMAGE-->
        <div class="form-group">
            <label for="monImage">Image:</label>
            <input type="file" name="monImage" id="monImage" />
        </div>

        <input type="hidden" name="formulaire_envoyer" value="ghost_btn" />

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>  

<?php
require('assets/footer.php');
?>















