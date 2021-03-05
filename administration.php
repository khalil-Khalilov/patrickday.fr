<?php
require('assets/head.php');
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "Bienvenue sur l'administration.";
} else {
    die("PAS DE HACK");
}

?>

<?php
if(!empty($_GET['suppr'])){
    $suppr = (int)$_GET['suppr'];

    $sql = ('DELETE FROM `images_categorie` WHERE id = :id');

    $req = $pdo->prepare($sql);

    $resultat = $req->execute([
        'id' => $suppr
    ]);

    if($resultat){
        $success = "L'élément a bien été supprimé.";
        header("refresh:1;url=administration.php");
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors de la tentative de suppression de l\'élément.</div>';
    }
}

$sql = ('SELECT id, adresse_image, titre_image, gallery_column, type_image FROM images_categorie');

$req = $pdo->query($sql);

$i = 1;
?>

<?php
    var_dump($_POST);
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
                    echo '<div class="alert alert-danger" role="alert">L\'extension d\'image n\'est pas autorisé !</div>';
                }
            }
        }
        else{
            echo '<div class="alert alert-danger" role="alert">Le taille du fichier dépassé la limite permise, 
            esseyer de compresses l\'image ou convertire son extension en jpg, png ou webp</div>';
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


if(!empty($_POST['formulaire_envoyer'])){
    if(empty($_POST['new_nickname'])){
        echo '<div class="alert alert-danger" role="alert">Le champ PSEUDONYME est VIDE !</div>';
    }
    if(empty($_POST['new_password'])){
        echo '<div class="alert alert-danger" role="alert">Le champ MOT DE PASSE est VIDE !</div>';
    }

    if(count($erreurs) === 0){

        $new_nickname = htmlspecialchars($_POST['new_nickname']);
        $new_password = htmlspecialchars($_POST['new_password']);
        $password="ARGON2ID*V=19+M=65536,T=4,P=1*DZRZDNC3ZHN0VGRNMJV";
        $rang = 1;
        

        $encrypted_password=openssl_encrypt($new_password,"AES-128-ECB",$password);

        $sql = ('UPDATE `user` SET `pseudonyme`=:pseudonyme,`mot_de_passe`=:mot_de_passe WHERE rang=:rang');

        $req = $pdo->prepare($sql);

        $resultat = $req->execute([
            'pseudonyme' => $new_nickname,
            'mot_de_passe' => $encrypted_password,
            'rang' => $rang
        ]);

        if($resultat) {
            $success =  "Le mot de passe et pseudonyme ont bien été modifié.";
            header("refresh:3;url=index.php");
        }
        else {
            echo '<div class="alert alert-danger" role="alert">Une erreur est survenue.</div>';
        }
    }
}

?>


<?php
require('assets/affichage_erreur.php');
?>

<!--Btns de navigation-->
<div class="kh-container" id="">
    <ul id="admin_nav-items">
        <li><button id="btn-list_of-images" class="admin_nav-btn">Voir la liste des images</button></li>
        <li><button id="btn-add_image" class="admin_nav-btn">Ajouter une image à la gallery</button></li>
        <li><button id="btn-modify-password" class="admin_nav-btn">Modifier Mot de passe</button></li>
    </ul>
</div>



<!--Modiffier Mot de passe-->
<div class="kh-container formulaire_modify-password not_show-container"> 
    <h1>Modiffier Mot de passe</h1>

    <!-- FORMULAIRE -->
    <div id="wrapper">
        <form class="was-validated" action="" method="POST">
            <div class="mb-3">
                <label for="pseudonyme" class="form-label">Nouveau Pseudonyme:</label>
                <input type="text" class="form-control " name="new_nickname" id="new_nickname" placeholder="Patrick" required></input>
                <div class="invalid-feedback">Tape le nouveau Pseudonyme</div>
            </div>

            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Nouveau Mot de passe:</label>
                <input type="password" class="form-control " name="new_password" id="new_password" required></input>
                <div class="invalid-feedback">Tape le nouveau Mot de passe</div>
            </div>

            <input type="hidden" name="formulaire_envoyer" value="ghost_btn" />

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>  
</div>




<!--Ajoute d'image-->
<div class="kh-container add_image not_show-container">
    <h1>Ajouter une image</h1>
    
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
            <input type="text" class="form-control " name="titreImage" id="titreImage" required></input>
            <div class="invalid-feedback">Tape le titre de l'image</div>
        </div>

        <div class="mb-3">
            <input type="file" class="form-control" name="monImage" id="monImage" aria-label="monImage" required>
            <div class="invalid-feedback">Selectionner l'image</div>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit" >Valider</button>
        </div>
    </form>
</div>



<!--Liste des images-->
<div class="kh-container list_of-images ">
    <a href="#scrollDown">Scroll Down Please</a>
    <h1>Liste des images</h1>
    <div id="container">

        <table  class="table table-success table-striped">
            <thead class="table">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Type de galerie</th>
                    <th scope="col">Place de la colonne</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php
                while($donnees = $req->fetch()){
                    if($donnees['type_image'] == "Dessin" || $donnees['type_image'] == "Peinture" || $donnees['type_image'] == "Sculpture" || $donnees['type_image'] == "Livre Object"){
            ?>
            <tbody>
                <tr>
                    <td> <?= $i++; ?> </td>  
                    <td> <img src="<?= $donnees['adresse_image'];?>" alt="<?= $donnees['titre_image'];?>" style="width:10em;"/></td>
                    <td> <?= $donnees['titre_image'];?> </td>
                    <td> <?= $donnees['type_image'];?> </td>
                    <td> <?= $donnees['gallery_column'];?> </td>
                    
                    <td>
                        <a onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')" 
                            href="administration.php?suppr=<?= $donnees['id']; ?>">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        <a onclick="return confirm('Voulez-vous vraiment modifier cet élément ?')" 
                        href="administration_modifier.php?modifier=<?= $donnees['id']; ?>">
                            <i class="fas fa-wrench"></i>
                        </a>
                    </td>
                </tr> 
            </tbody>
            <?php
                }
            }
            ?>
        </table>

    </div>
</div>


<?php
require('assets/footer.php');
?>















