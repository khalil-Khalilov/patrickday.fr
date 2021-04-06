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


<div class="kh-container" id="affichage_apropos_admin">
<?php $sql = ('SELECT id, nom_categorie, titre_categorie FROM categorie_apropos WHERE id = :id');
            $titre=$pdo->prepare($sql);
            $titre->execute([
              'id'=>$id
            ]);
            $categorie_titre=$titre->fetch();
      ?>
    <h2><?=$categorie_titre['titre_categorie']?></h2>

    <!--Affichage mode not responsive-->
    <div class="afficher_not_responsive" id="container">
      <?php if ($categorie_titre['id']==='5' || $categorie_titre['id']==='6'){         
            }
            else{?>
              <a href="apropos_ajouter.php" class="btn" id="monBouton">Ajouter un nouvel élément</a>
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
          <tbody class="wow animate__animated animate__fadeIn">
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
                  href="apropos_afficher.php?suppr=<?= $donnees['id']; ?>">Supprimer
                  <i class="fas fa-trash-alt"></i>
                </a>
                <a onclick="return confirm('Voulez-vous vraiment modifier cet élément ?')" 
                  href="apropos_modifier.php?modifier=<?= $donnees['id']; ?>">Modifier
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

  <!--Affichage en mode responsive-->  
    <div class="afficher_responsive" id="container">
    <?php if ($categorie_titre['id']==='5' || $categorie_titre['id']==='6'){         
            }
            else{?>
              <a href="apropos_ajouter.php" class="btn" id="monBouton">Ajouter un nouvel élément</a><br/>
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
          <div class="card mb-3">                  
              <?php if ($id===6){ ?>
                      <p style="color:#767575;"><?=$donnees['adresse_image'];?></p>
             <?php  } 
                    else{ ?>
                      <img class="card-img-top" src="<?= $donnees['adresse_image'];?>" alt="<?= $donnees['titre_image'];?>" style="width:100%;"/></td>
              <?php } ?>                                               
              <div class="card-body">
                <ul class="menu-card">
                  <li class="card-title"><?=$donnees['titre_image'];?><li>
                  <li class="lien-card"><a onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')" 
                     href="apropos_afficher.php?suppr=<?= $donnees['id']; ?>">
                     <i class="fas fa-trash-alt"></i></a>
                  </li>
                  <li class="lien-card"><a onclick="return confirm('Voulez-vous vraiment modifier cet élément ?')" 
                    href="apropos_modifier.php?modifier=<?= $donnees['id']; ?>">
                    <i class="fas fa-wrench"></i></a>
                  </li>
                </ul>
              </div>                                            
          </div>  
  <?php }?>  
    </div>
</div>

<?php
require('assets/footer.php');
?>