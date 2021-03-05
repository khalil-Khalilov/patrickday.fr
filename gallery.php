
<?php
require('assets/head.php');

$sql = ('SELECT adresse_image, titre_image, gallery_column, type_image FROM images_categorie');

$req = $pdo->query($sql);


$dessinGalleryColmn1 = [];
$dessinGalleryColmn2 = [];
$dessinGalleryColmn3 = [];
$dessinGalleryColmn4 = [];



$sculptureGalleryColmn1 = [];
$sculptureGalleryColmn2 = [];
$sculptureGalleryColmn3 = [];
$sculptureGalleryColmn4 = [];

$livreObjectGalleryColmn1 = [];
$livreObjectGalleryColmn2 = [];
$livreObjectGalleryColmn3 = [];
$livreObjectGalleryColmn4 = [];


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
    elseif($donnees['type_image'] == "Sculpture"){
        if($donnees['gallery_column'] == 1){
            $sculptureGalleryColmn1[] = $donnees;
        }
        if($donnees['gallery_column'] == 2){
            $sculptureGalleryColmn2[] = $donnees;
        }
        if($donnees['gallery_column'] == 3){
            $sculptureGalleryColmn3[] = $donnees;
        }
        if($donnees['gallery_column'] == 4){
            $sculptureGalleryColmn4[] = $donnees;
        }
    }
    elseif($donnees['type_image'] == "Livre Object"){
        if($donnees['gallery_column'] == 1){
            $livreObjectGalleryColmn1[] = $donnees;
        }
        if($donnees['gallery_column'] == 2){
            $livreObjectGalleryColmn2[] = $donnees;
        }
        if($donnees['gallery_column'] == 3){
            $livreObjectGalleryColmn3[] = $donnees;
        }
        if($donnees['gallery_column'] == 4){
            $livreObjectGalleryColmn4[] = $donnees;
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
        <li id="category-sculpture"><a class="kh-items" href="#">Sculpture</a></li>
        <li id="category-livreObject"><a class="kh-items" href="#">Livre Object</a></li>
        <li id="category-videos"><a class="kh-items" href="#">Vidéos</a></li>
    </ul>
</div>



<!--Affichage container Dessin-->
<div class="kh-container gallery-container-dessin "> 
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



<!--Affichage container Sculpture-->
<div class="kh-container gallery-container-sculpture not_show-container">
    <div class="row">
    <div class="column">
            <?php
                foreach($sculptureGalleryColmn1 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($sculptureGalleryColmn2 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($sculptureGalleryColmn3 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($sculptureGalleryColmn4 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
    </div>
</div>



<!--Affichage container Livre Oject-->
<div class="kh-container gallery-container-livreObject not_show-container">
    <div class="row">
    <div class="column">
            <?php
                foreach($livreObjectGalleryColmn1 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($livreObjectGalleryColmn2 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($livreObjectGalleryColmn3 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
        <div class="column">
            <?php
                foreach($livreObjectGalleryColmn4 as $galleryImage){
                ?>
                    <img class="gallery-img" src="<?=$galleryImage['adresse_image'];?>" alt="<?=$galleryImage['titre_image'];?>">
            <?php
                }
            ?>
        </div>
    </div>
</div>



<!--Affichage container Videos-->
<div class="kh-container gallery-container-video not_show-container">

    <div class="inner-container-video">
        <h4>Avant-première Strasbourg Christophe Colomb</h4>
        <video src="media/videos/Avant-première Strasbourg Christophe Colomb.mp4" controls ></video>

        <h4>Mon clip pour Christophe Colomb</h4>
        <video src="media/videos/Mon clip pour Christophe Colomb.mp4" poster="media/videos/img/christophe-colomb.JPG" controls ></video>

        <h4>Paroles d'hommes</h4>
        <video src="media/videos/paroles d'hommes.mp4" poster="media/videos/img/paroles-hommes.JPG"controls></video>

        <h4>Projet comédiens de fin d'année - L'Echange</h4>
        <video src="media/videos/Projet comédiens de fin d'année L'Echange.mp4" poster="media/videos/img/echange.JPG" controls ></video>

        <h4>Projet comédiens de fin d'année - Le Joueur</h4>
        <video src="media/videos/Projet comédiens de fin d'année Le Joueur.mp4" poster="media/videos/img/le-joueur.JPG" controls ></video>
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
