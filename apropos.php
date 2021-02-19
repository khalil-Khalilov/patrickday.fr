<?php
require('assets/head.php')
?>
<div class="container">

  <div class="ContainerApropos">
    <h1>A PROPOS</h1>
    <p>════════════♫════════════</p>
    <ul>
        <li><a href="index.php" ><em>Accueil</em></a></li>
        <li><a href="apropos.php" style="color:#767575;"><em>/ A propos</em></a></li>
    </ul>
  </div>

  <div class="ContenuApropos">
    <div class="Contenugauche">
      <h1>QUI </h1>
      <p>════════════♫════════════</p>
      <img src="media\images/Patrick Day.jpg" alt="" class="Cphoto"/>
      <p class="Cpresentation">
        Après le Conservatoire d’art dramatique de Nancy et en alternance à l’Ecole des Beaux-Arts, je poursuis plusieurs formations à l’écriture filmique et mise-en scène. Je réalise plusieurs courts-métrages, et obtiens le grand prix du court-métrage pour « Ira Dei ». J' écris et réalise ensuite le long-métrage « Désordres ».
        J' enseigne et donne des cours de théâtre et prépare les jeunes comédiens pour le concours d’entrée du TNS.
        Je suis l’auteur d’ouvrages divers dont plusieurs romans et pièces de théâtre. 
        Je suis également enseignant théâtre pour les jeunes enfants pour la Communauté de Communes de Ribeauvillé. 
        Plasticien, j'ai été représenté en son temps par la galerie du Rhin et la galerie Broglin de Colmar.
        J'ai réalisé plusieurs spectacles que j'ai écrit et mis en scène (Théâtre-dansé et pièces de théâtre avec différentes troupes au cours des années précédentes).
      </p>
    </div>
    <div class="Contenudroit">
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
                      <li><img src="<?=$reponses['adresse_image'];?>" alt="<?=$reponses['titre_image'];?>" class="Cphotoapercu"/></li>
                    <?php } ?>        
              </ul>


              <!-- The Modal -->
              <div id="myModal" class="modal">
                  <!-- The Close Button -->
                  <span class="close">&times;</span>

                  <!-- Modal Content (The Image) -->
                  <img src="" class="modal-image" id="ModalImg">

                  <!-- Modal Caption (Image Text) -->
                  <div id="caption"></div>
              </div>
              
            </div>
          </div>  
  <?php } ?>

<?php
require('assets/footer.php')
?>