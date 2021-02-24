
<?php
require('assets/head.php');

$sql = ('SELECT adresse_image, titre_image, gallery_column, type_image FROM images_categorie');

$req = $pdo->query($sql);


$dessinGalleryColmn1 = [];
$dessinGalleryColmn2 = [];
$dessinGalleryColmn3 = [];
$dessinGalleryColmn4 = [];

$peinturesGalleryColmn1 = [];
$peinturesGalleryColmn2 = [];
$peinturesGalleryColmn3 = [];
$peinturesGalleryColmn4 = [];


while($donnees = $req->fetch()){

    if($donnees['type_image'] == "Dessin") {
        if($donnees['gallery_column'] == 1){
            $dessinGalleryColmn1[] = $donnees;
        }
        if($donnees['gallery_column'] == 2){
            $dessinGalleryColmn2[] = $donnees;
        }
        if($donnees['gallery_column'] == 3){
            $dessinGalleryColmn3[] = $donnees;
        }
        if($donnees['gallery_column'] == 4){
            $dessinGalleryColmn4[] = $donnees;
        }
    }
    elseif($donnees['type_image'] == "Peinture"){
        if($donnees['gallery_column'] == 1){
            $peinturesGalleryColmn1[] = $donnees;
        }
        if($donnees['gallery_column'] == 2){
            $peinturesGalleryColmn2[] = $donnees;
        }
        if($donnees['gallery_column'] == 3){
            $peinturesGalleryColmn3[] = $donnees;
        }
        if($donnees['gallery_column'] == 4){
            $peinturesGalleryColmn4[] = $donnees;
        }
    }
}
?>


<div class="ContainerApropos">
    <h1>Galeries</h1>
    <p>════════════♫════════════</p>
    <ul>
        <li><a href="index.php" ><em>Accueil</em></a></li>
        <li><em>/ Galeries</em></li>
    </ul>
  </div>

<!---->
<!--Categories bar-->
<div class="kh-container" id="kh-categories-container">
    <ul id="kh-categories">
        <li class="">Categories:</li>
        <li id="category-dessin"><a class="kh-items" href="#">Dessins</a></li>
        <li id="category-peintures"><a class="kh-items" href="#">Peintures</a></li>
        <li id="category-nature"><a class="kh-items" href="#">...</a></li>
        <li id="category-city"><a class="kh-items" href="#">...</a></li>
        <li id="category-animal"><a class="kh-items" href="#">...</a></li>
        <li id="category-car"><a class="kh-items" href="#">...</a></li>
    </ul>
</div>



<!--Affichage container Dessin-->
<div class="kh-container gallery-container-dessin not_show-container"> 
    <div class="row">
        <div class="column">
            <?php
                foreach($dessinGalleryColmn1 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($dessinGalleryColmn2 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($dessinGalleryColmn3 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($dessinGalleryColmn4 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
    </div>
</div>


<!--Affichage container Peintures-->
<div class="kh-container gallery-container-peintures not_show-container">
    <div class="row">
    <div class="column">
            <?php
                foreach($peinturesGalleryColmn1 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($peinturesGalleryColmn2 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($peinturesGalleryColmn3 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($peinturesGalleryColmn4 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img src="" class="modal-image" id="ModalImg">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>

<?php
require('assets/footer.php');
?>
