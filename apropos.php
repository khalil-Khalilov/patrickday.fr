<?php
require('assets/head.php');

if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1){
     echo "<h1>Bienvenue sur l'espace administration</h1>";
     echo "<p>Vous pouvez ajouter, modifier, supprimer des éléments de cette page en choisissant la bonne catégorie.</p>"
    ?>
    <?php require('assets/headAdminApropos.php');?>
<?php }?>

  <div class="ContainerApropos">
    <h1>A PROPOS</h1>
    <p>════════════♫════════════</p>
    <ul>
        <li><a href="index.php" ><em>Accueil</em></a></li>
        <li><a href="apropos.php" style="color:#767575;"><em>/ A propos</em></a></li>
    </ul>
  </div>

  <div class="ContenuApropos">
    <!--affichage uniquement en mode responsive-->
    <div class="Contenudroit2">
      <h1>APERCU </h1>
      <p>════════════♫════════════</p>
      <ul class="Capercu">
        <li><a href="#articles">Les articles de presse</a></li>  
        <li><a href="#affiches">Théatre, Comédies musicales, Films</a></li>
        <li><a href="#comedien">Le Comédien</a></li>
        <li><a href="#metteurenscene">Le Metteur en scène</a></li>
        <li><a href="gallery.php">Le Plasticien</a></li>
      </ul>
    </div>
    <!--fin-->
    <div class="Contenugauche">
      <h1>QUI </h1>
      <p>════════════♫════════════</p>
      <?php $sql = "SELECT * FROM images_categorie WHERE id_categorie = 5";
            $photo = $pdo->prepare($sql);
            $photo->execute();
            $presentationPhoto=$photo->fetch();?>
      <img src="<?=$presentationPhoto['adresse_image'];?>" alt="" class="Cphoto"/>
      <?php $sql = "SELECT * FROM images_categorie WHERE id_categorie = 6";
            $texte = $pdo->prepare($sql);
            $texte->execute();
            $presentationText=$texte->fetch();?>
      <p class="Cpresentation"><?=$presentationText['adresse_image'];?></p>
    </div>
    <!--affichage uniquement en mode écran classique-->
    <div class="Contenudroit1">
      <h1>APERCU </h1>
      <p>════════════♫════════════</p>
      <ul class="Capercu">
        <li><a href="#articles">Les articles de presse</a></li>  
        <li><a href="#affiches">Théatre, Comédies musicales, Films</a></li>
        <li><a href="#comedien">Le Comédien</a></li>
        <li><a href="#metteurenscene">Le Metteur en scène</a></li>
        <li><a href="gallery.php">Le Plasticien</a></li>
      </ul>
    </div>
    <!--fin-->
  </div>

  <?php $categories=$pdo->query('SELECT * FROM categorie_apropos');
        while($donnees=$categories->fetch()){
        ?>
          <div class="ContainerApropos" id="<?=$donnees['nom_categorie'];?>">
            <h1><?=$donnees['titre_categorie'];?></h1>
            <p>════════════♫════════════</p>
            <ul>
              <li><a href="index.php" ><em>Accueil</em></a></li>
              <li><a href="apropos.php" style="color:#767575;"><em>/ A propos</em></a></li>
            </ul>
          </div>

          <div class="ContainerApropos">

              <ul class="Clisteimages">
                <?php $requete = "SELECT * FROM images_categorie WHERE id_categorie = :id_categorie";
                      $images = $pdo->prepare($requete);
                      $images->execute(['id_categorie' => $donnees['id']]);
                      while($reponses=$images->fetch()){
                    ?>
                      <li><img src="<?=$reponses['adresse_image'];?>" alt="<?=$reponses['titre_image'];?>" class="Cimage"/></li>
                    <?php } ?>        
              </ul>

              <!-- The Modal -->
              <div id="myModal" class="modal">

                <!-- The Close Button -->
                <span class="close">&times;</span>

                <!-- Modal Content (The Image) -->
                <img src=""class="modal-image" id="ModalImg">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
              </div>
    
          </div>  

  <?php } ?>

<?php
require('assets/footer.php');
?>