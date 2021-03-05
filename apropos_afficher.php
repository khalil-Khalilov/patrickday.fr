<?php
require('assets/head.php');

if(!empty($_GET['suppr'])){
    $suppr = (int)$_GET['suppr'];

    $sql = ('DELETE FROM `images_categorie` WHERE id = :id');

    $req = $pdo->prepare($sql);

    $resultat = $req->execute([
        'id' => $suppr
    ]);

    if($resultat){
      $success = "L'élément a bien été supprimé.";
      header('Location: apropos.php');
      exit();
    }
    else{
      $erreur[] = "Une erreur est survenue lors de la tentative de suppression de l'élément.";
    }
}

    if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1){
      $id=(int)$_GET['id'];?>
      <?php require('assets/headAdminApropos.php');?>  
    <?php }?>

<!--Liste des images-->
<div class="kh-container" id="affichage_apropos_admin">
<?php $sql = ('SELECT id, nom_categorie, titre_categorie FROM categorie_apropos WHERE id = :id');
            $titre=$pdo->prepare($sql);
            $titre->execute([
              'id'=>$id
            ]);
            $categorie_titre=$titre->fetch();
      ?>
    <h2><?=$categorie_titre['titre_categorie']?></h2>
    <div class="afficher_not_responsive" id="container">
      <?php if ($categorie_titre['id']==='5' || $categorie_titre['id']==='6'){         
            }
            else{?>
              <a href="apropos_ajouter.php" id="monBouton">Ajouter un nouvel élément</a>
            <?php }?>
      <table  class="table table-secondary table-striped">
        <thead class="table">
          <tr>
            <th scope="col">ID</th>
            <th scope="col" >Elément</th>
            <th scope="col">Titre de l'élément</th>
            <th scope="col">Nom de la catégorie</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <?php 
        $sql = ('SELECT id, adresse_image, titre_image, id_categorie FROM images_categorie WHERE id_categorie = :id_categorie ');
        $req = $pdo->prepare($sql); 
        $req->execute([
          'id_categorie'=>$id
        ]);          
        $i = 1;
        while($donnees = $req->fetch()){
          ?>
          <tbody>
            <tr>
              <td> <?= $i++; ?> </td>  
              <td>
                <?php if ($id===6){ 
                      echo $donnees['adresse_image'];
                      } 
                      else{ ?>
                        <img src="<?= $donnees['adresse_image'];?>" alt="<?= $donnees['titre_image'];?>" style="width:10em;"/></td>
                      <?php } ?>
              <td> <?= $donnees['titre_image'];?> </td>
                 <?php $reponse = $pdo->prepare('SELECT * FROM categorie_apropos WHERE id = :id');
                    $reponse->execute([
                      'id'=>$donnees['id_categorie']
                      ]);
                    $categorie=$reponse->fetch(); ?>
              <td><?=$categorie['titre_categorie'];?></td>                    
              <td>
                <a onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')" 
                  href="apropos_afficher.php?suppr=<?= $donnees['id']; ?>">
                  <i class="fas fa-trash-alt"></i>
                </a>
                <a onclick="return confirm('Voulez-vous vraiment modifier cet élément ?')" 
                  href="apropos_modifier.php?modifier=<?= $donnees['id']; ?>">
                  <i class="fas fa-wrench"></i>
                </a>
              </td>
            </tr> 
          </tbody>
          <?php
        }
          ?>
      </table>
    </div>
    <div class="afficher_responsive" id="container">
    <?php if ($categorie_titre['id']==='5' || $categorie_titre['id']==='6'){         
            }
            else{?>
              <a href="apropos_ajouter.php" id="monBouton">Ajouter un nouvel élément</a>
            <?php }?>
    <?php 
        $sql = ('SELECT id, adresse_image, titre_image, id_categorie FROM images_categorie WHERE id_categorie = :id_categorie ');
        $req = $pdo->prepare($sql); 
        $req->execute([
          'id_categorie'=>$id
        ]);          
        $i = 1;
        while($donnees = $req->fetch()){
          ?>
          <div class="card-body">
            <div class="row g-0">
              <div class="col-md-4">
              <?php if ($id===6){ 
                      echo $donnees['adresse_image'];
                      } 
                    else{ ?>
                      <img class="card-img-top" src="<?= $donnees['adresse_image'];?>" alt="<?= $donnees['titre_image'];?>" style="width:50%;"/></td>
              <?php } ?>
              </div>
              <div class="col-md-8">                    
              <div class="card-body">
                <p class="card-title"><?=$donnees['titre_image'];?>
                <a onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')" 
                  href="apropos_afficher.php?suppr=<?= $donnees['id']; ?>">
                  <i class="fas fa-trash-alt"></i>
                </a>
                <a onclick="return confirm('Voulez-vous vraiment modifier cet élément ?')" 
                  href="apropos_modifier.php?modifier=<?= $donnees['id']; ?>">
                  <i class="fas fa-wrench"></i>
                </a> </p>
              </div>                  
              </div>
            </div>
          </div>  
  <?php }?>  
    </div>
</div>

<?php
require('assets/footer.php');
?>