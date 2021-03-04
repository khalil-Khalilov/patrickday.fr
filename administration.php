<?php
require('assets/head.php');
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<h1>Bienvenue sur l'espace administration</h1>";
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
    }
    else{
        $erreur[] = "Une erreur est survenue lors de la tentative de suppression de l'élément.";
    }
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
                    $erreurs[] = "L'extension d'image n'est pas autorisé !";
                }
            }
            else{
                $erreurs[] = 'La taille du fichier depasse 1 Mo !';
            }

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
        else:
            $erreurs[] = "Une erreur est survenue. Veuillez réessayer.";
        endif;
     }

?>

<?php


if(!empty($_POST['formulaire_envoyer'])){
    if(empty($_POST['new_nickname'])){
        $erreurs[] = "Le champ PSEUDONYME est VIDE !";
    }
    if(empty($_POST['new_password'])){
        $erreurs[] = "Le champ MOT DE PASSE est VIDE !";
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
            header("refresh:3;url=administration.php");
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


<!--Btns de navigation-->
<div class="kh-container" id="">
    <ul id="admin_nav-items">
        <li><button id="btn-list_of-images" class="admin_nav-btn">Voir la liste des images</button></li>
        <li><button id="btn-list_of-video" class="admin_nav-btn">Voir la liste des vidéos</button></li>
        <li><button id="btn-add_image" class="admin_nav-btn">Ajouter une image à la galerie</button></li>
        <li><button id="btn-add_video" class="admin_nav-btn">Ajouter une vidéo à la galerie</button></li>
        <li><button id="btn-modify-password" class="admin_nav-btn">Modifier Mot de passe</button></li>
    </ul>
</div>

<!--Modifier Mot de passe-->
<div class="kh-container formulaire_modify-password not_show-container"> 
    <h2>Modifier Mot de passe</h2>

    <!-- FORMULAIRE -->
    <div id="wrapper">
        <form action="" method="POST">
            <div class="form-group">
                <label for="pseudonyme">Nouveau Pseudonyme:</label>
                <input type="text" class="form-control" name="new_nickname" id="new_nickname" placeholder="Patrick">
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Nouveau Mot de passe:</label>
                <input type="password" class="form-control" name="new_password" id="new_password">
            </div>
            <br/>
            <input type="hidden" name="formulaire_envoyer" value="ghost_btn" />

            <button type="submit" class="btn" id="monBoutonRose">Valider</button>
        </form>
    </div>  
</div>

<!--Ajoute d'image-->
<div class="kh-container add_image not_show-container">
    <h2>Ajouter une image à la galerie</h2>
    <br/>
    <!-- FORMULAIRE -->
    <form action="" method="POST" enctype="multipart/form-data">

        <!--Button Select Type-->
        <select class="form-select" aria-label="Select picture type" name="type_image">
            <option selected>Sélectionner le type d'image</option>
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
            <input type="text" class="form-control"  name="titreImage" id="titreImage">
        </div>

        <!--Input UPLOAD IMAGE-->
        <div class="form-group">
            <label for="monImage">Image:</label>
            <input type="file" name="monImage" id="monImage" />
        </div>
        <br/>
        <button type="submit" class="btn" id="monBoutonRose">Valider</button>
    </form> 
</div>

<!--Liste des images-->
<div class="kh-container list_of-images ">
    <h2>Liste des images</h2>
    <div id="container">

        <table  class="table table-secondary table-striped">
            <thead class="table">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Type de galerie</th>
                    <th scope="col">Place dans la colonne</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php
                $sql = ('SELECT id, adresse_image, titre_image, gallery_column, type_image FROM images_categorie');
                $req = $pdo->query($sql);           
                $i = 1;
                while($donnees = $req->fetch()){
                    if($donnees['type_image'] == "Dessin" || $donnees['type_image'] == "Peinture"){
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
                            href="administration.php?suppr=<?= $donnees['id']; ?>">Supprimer
                            <i class="fas fa-trash-alt"></i>
                            </a>
                        <a onclick="return confirm('Voulez-vous vraiment modifier cet élément ?')" 
                        href="administration_modifier.php?modifier=<?= $donnees['id']; ?>">Modifier
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

<!--Ajoute de video-->
<div class="kh-container add_video not_show-container">
    <h2>Ajouter une vidéo</h2>
</div>

<!--Liste des videos-->
<div class="kh-container list_of-video not_show-container">
    <h2>Liste des vidéos</h2>
</div>


<?php
require('assets/footer.php');
?>















