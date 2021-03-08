<?php
require('assets/head.php');

?>
<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<h1>Bienvenue sur l'espace administration</h1>";
    echo "<p>Vous pouvez modifier le texte contenu dans les blocs</p>";
    echo '<div class="kh-container" id="apropos_admin">
    <ul id="admin_nav-items">
    <a href="accueil_afficher.php?" class="admin_nav-btn">Texte "Liste des blocs"</a>
    </ul>
  </div> ';}
    ?>
<!--Liste des blocs-->
<div class="kh-container list_of-presse">

    <div id="container">
      <table  class="table table-secondary table-striped">
        <thead class="table">
          <tr>
            <th scope="col">ID</th>
            <th scope="col" >Titre</th>
            <th scope="col">1er paragraphe</th>
            <th scope="col">2ème paragraphe</th>
            <th scope="col">3ème paragraphe</th>
          </tr>
        </thead>

    
          <tbody>
            <tr>
            <?php
            $sql= "SELECT id, titre, contenu ,second_contenu ,troisieme_contenu FROM text_accueil";
            $requete = $pdo->query($sql);
            while($donnees = $requete ->fetch()){
                ?>
              <td> <?= $donnees['id'];?> </td>  
              
              <td> <?= $donnees['titre'];?> </td>
                
              <td><?=$donnees['contenu'];?></td>     

              <td><?=$donnees['second_contenu'];?></td> 

              <td><?=$donnees['troisieme_contenu'];?></td>                
              <td>
                <a onclick="return confirm('Voulez-vous vraiment modifier cet élément ?')" 
                  href="modifier_accueil.php?id=<?= $donnees['id']; ?>">
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
</div>

<?php
require('assets/footer.php');
?>