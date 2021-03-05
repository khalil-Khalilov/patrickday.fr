<?php
require('assets/head.php');

if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1){?>
    <?php require('assets/headAdminApropos.php');?>
<?php }?>

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

    $erreurs=[];

    if ($donnees['id_categorie']==='6'){
    }
    elseif ($donnees['id_categorie']==='5'){
        if($_FILES['monImage']['error']!=0){
            $erreurs[] = "Vous n'avez pas choisi d'image pour l'élément à modifier!";
        }
    }
    else{
        if($_POST['type_categorie']==="Sélectionner la catégorie de l'élément"){ 
            $erreurs[] = "Vous n'avez pas choisi la catégorie de l'élément !";
        }

        if($_FILES['monImage']['error']!=0){
            $erreurs[] = "Vous n'avez pas choisi d'image pour l'élément à modifier!";
        }
    }

    if(empty($erreurs)){
        
        $titreImage = htmlspecialchars($_POST['titreImage']);

        if ($donnees['id_categorie']==='6'){
            $nom_categorie='presentationText';
            $id_categorie=$donnees['id_categorie'];
            $destination=htmlspecialchars($_POST['monImage']);
        }
        else{
            if ($donnees['id_categorie']==='5'){
                $nom_categorie='presentationPhoto';
            }
            else{
                $nom_categorie = htmlspecialchars($_POST['type_categorie']);
            }
        
           $sql1='SELECT* FROM categorie_apropos WHERE nom_categorie =:nom_categorie';
           $req1=$pdo->prepare($sql1);
           $req1->execute([
             'nom_categorie'=>$nom_categorie
           ]);
           $reponse1=$req1->fetch(); 

           if ($donnees['id_categorie']==='5'){
                $id_categorie=$donnees['id_categorie']; 
           }
           else{
                 $id_categorie=$reponse1['id'];
           }

           if($_FILES['monImage']['size'] <=5000000){
              $infofichier = pathinfo($_FILES['monImage']['name']);
              $extension_upload = $infofichier['extension'];
              $extensions_autorisees = ['JPG', 'jpg', 'jpeg', 'png', 'gif'];

              if(in_array($extension_upload, $extensions_autorisees)){
                $destination = "media/images/images_modifiées/".$infofichier['filename'].time().'.'.$extension_upload;
    
                move_uploaded_file($_FILES['monImage']['tmp_name'], $destination);
              }
            }
            else{
              $erreurs[] = 'La taille du fichier dépasse 5 Mo !';
            }
        }
        $sql = ('UPDATE `images_categorie` SET `adresse_image`=:adresse_image,`titre_image`=:titre_image, `id_categorie`=:id_categorie WHERE id=:id');

        $req = $pdo->prepare($sql);

        $resultat = $req->execute([
            'adresse_image' => $destination,
            'titre_image' => $titreImage,
            'id_categorie' => $id_categorie,
            'id' => $modifier
        ]);

        if($resultat) {
            $success =  "L'élément a bien été modifié.";
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

    $sql = ('SELECT * FROM `categorie_apropos` WHERE id = :id'); 
    $req = $pdo->prepare($sql);
    $resultat = $req->execute([
       'id' => $donnees['id_categorie']
    ]);
    $reponse = $req->fetch();
?>

    <h2>Modifier l'élément "<?=$donnees['titre_image'];?>" de la catégorie "<?=$reponse['titre_categorie'];?>"</h2>
    <!-- FORMULAIRE -->
    <form action="" method="POST" enctype="multipart/form-data">

        <!--Button Select Type-->
        <?php if ($donnees['id_categorie']==='5'|| $donnees['id_categorie']==='6'){  
                }
              else{?>
                <select class="form-select" aria-label="Select picture type" name="type_categorie">
                  <option selected>Sélectionner la catégorie de l'élément</option>
                  <option value="articles">Les articles de presse</option>
                  <option value="affiches">Théâtre, Comédies musicales, Films</option>
                  <option value="comedien">Le Comédien</option>
                  <option value="metteurenscene">Le Metteur en scène</option>
                </select>
              <?php }?>  

        <!--Input TITRE IMAGE or TEXT-->
        <div class="form-group">
            <label for="titreImage">Titre:</label>
            <input type="text" class="form-control"  name="titreImage" id="titreImage" value="<?=$donnees['titre_image'];?>">
        </div>

        <!--Input UPLOAD IMAGE or TEXT-->
        <div class="form-group">
          <?php if ($donnees['id_categorie']==='6'){?>
                   <label for="monImage">Texte "QUI SUIS JE":</label>
                   <textarea name="monImage" id="monImage" value="" ><?=$donnees['adresse_image'];?></textarea>
                <?php }
                else{?>
                  <label for="monImage">Image:</label>
                  <input type="file" name="monImage" id="monImage" value="" />
                <?php }?>
        </div>

        <input type="hidden" name="formulaire_envoyer" value="ghost_btn" />
        <br/>
        <button type="submit" class="btn" id="monBoutonRose">Valider</button>
        
    </form>  
    <br/>
<?php
require('assets/footer.php');
?>















