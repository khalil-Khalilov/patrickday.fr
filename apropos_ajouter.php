<?php
require('assets/head.php');

 if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1){?>
    <?php require('assets/headAdminApropos.php');?>
<?php }?>

<?php
if(!empty($_POST['formulaire_envoyer'])){

    $erreurs=[];

    if(empty($erreurs)){

        $nom_categorie = htmlspecialchars($_POST['type_categorie']);
        $titreImage = htmlspecialchars($_POST['titreImage']);

        $sql1='SELECT* FROM categorie_apropos WHERE nom_categorie =:nom_categorie';
        $req1=$pdo->prepare($sql1);
        $req1->execute([
            'nom_categorie'=>$nom_categorie
        ]);
        $reponse1=$req1->fetch(); 
        $id_categorie=$reponse1['id'];

        if($_FILES['monImage']['size'] <= 5000000){
            $infofichier = pathinfo($_FILES['monImage']['name']);
            $extension_upload = $infofichier['extension'];
            $extensions_autorisees = ['JPG', 'jpg', 'jpeg', 'png', 'gif'];

            if(in_array($extension_upload, $extensions_autorisees)){
                $destination = "media/images/images_ajoutées/".$infofichier['filename'].time().'.'.$extension_upload;
    
                move_uploaded_file($_FILES['monImage']['tmp_name'], $destination);
            }

            $sql ='INSERT INTO `images_categorie` (adresse_image,titre_image,id_categorie) VALUES (:adresse_image,:titre_image,:id_categorie)';

            $req = $pdo->prepare($sql);
    
            $resultat = $req->execute([
                'adresse_image' => $destination,
                'titre_image' => $titreImage,
                'id_categorie' => $id_categorie
            ]);
    
            if($resultat) {
                $success =  "L'élément a bien été ajouté.";
            }
            else {
                $erreurs[] = "Une erreur est survenue.";
            }
        }
        else{
            $erreurs[] = 'La taille du fichier dépasse 5 Mo !';
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

    <h2>Ajouter un élément</h2>
    <!-- FORMULAIRE -->
    <form class="was-validated" action="" method="POST" enctype="multipart/form-data">

        <!--Button Select Type-->
        <select class="form-select" aria-label="Select picture type" name="type_categorie" required>
            <option value="">Sélectionner la catégorie de l'élément</option>
            <option value="articles">Les articles de presse</option>
            <option value="affiches">Théâtre, Comédies musicales, Films</option>
            <option value="comedien">Le Comédien</option>
            <option value="metteurenscene">Le Metteur en scène</option>
        </select>

        <!--Input TITRE IMAGE-->
        <div class="form-group">
            <label for="titreImage">Titre:</label>
            <input type="text" class="form-control"  name="titreImage" id="titreImage" value="" required>
        </div>

        <!--Input UPLOAD IMAGE-->
        <div class="form-group">
            <label for="monImage">Image:</label>
            <input type="file" class="form-control" name="monImage" id="monImage" value="" required/>
            <div class="invalid-feedback">Attention à la taille de l'image et à l'extension('JPG', 'jpg', 'jpeg', 'png', 'gif')</div>
        </div>

        <input type="hidden" name="formulaire_envoyer" value="ghost_btn" />
        <br/>
        <button type="submit" class="btn" id="monBoutonRose">Valider</button>
        <p>Si après validation du formulaire d'ajout, le message suivant <span style="color:green;">"L'élément a bien été ajouté"</span> ne s'affiche pas, c'est que la taille de votre image est trop importante ou que l'extension n'est pas la bonne.</p>
    </form>  
    <br/>
    
<?php
require('assets/footer.php');
?>















