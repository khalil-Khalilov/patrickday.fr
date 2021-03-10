<?php
require('assets/head.php');
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<h1>Bienvenue sur l'espace administration</h1>";
    echo "<p>Vous pouvez modifier le texte contenu dans les blocs</p>";
    echo '<div class="kh-container" id="apropos_admin">
    <ul id="admin_nav-items">
    <a href="accueil_afficher.php" class="admin_nav-btn">Texte "Liste des blocs"</a>
    </ul>
  </div> ';}
  ?>

  <?php
if(!empty($_GET['id'])){
    $id =$_GET['id'];

    $sql = "SELECT * FROM text_accueil WHERE id = :id";
    $requete = $pdo -> prepare($sql);
   $requete ->execute(['id' => $id]);
    $donnees = $requete->fetch();
}

else{
    die('ERREUR 404');
}
?>

<?php
if(!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['second_contenu']) && !empty($_POST['troisieme_contenu'])){
  $titre = htmlspecialchars( $_POST['titre']);
  $contenu = htmlspecialchars($_POST['contenu']);
  $second_contenu = htmlspecialchars($_POST['second_contenu']);
  $troisieme_contenu = htmlspecialchars($_POST['troisieme_contenu']);

  $sql = ('UPDATE `text_accueil` SET  
  `titre`= :titre,
  `contenu` =:contenu,
  `second_contenu` =:second_contenu,
  `troisieme_contenu` =:troisieme_contenu
     WHERE id =:id');      
          
  $requete =$pdo->prepare($sql);
  $resultat =$requete->execute([
      'titre' => $titre,
      'contenu' => $contenu,
      'second_contenu' => $second_contenu,
      'troisieme_contenu' => $troisieme_contenu,
      'id' => $id 
  ]);

  
    if ($resultat) {
        echo "<div class='alert alert-success' role='alert'>L'article a été modifié<br></div>";
        header("refresh:2;url=index.php");
    }
    else{
        echo "<div class='alert alert-danger' role='alert'>Une erreur est survenue.</div>";
    }
}

?>

<div class="container-fluid">

    <div class="container">

            <form action="" method="POST" enctype="multipart/form-data" id="contenu">

                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input class="form-control" type="text" name="titre" value="<?php echo $donnees['titre'] ?>"/>
                </div>

                <div class="form-group">
                    <label for="contenu">1er paragraphe</label>
                    <textarea class="form-control" rows="3" name="contenu"><?php echo $donnees['contenu'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="contenu2">2ème paragraphe</label>
                    <textarea class="form-control"  rows="3" name="second_contenu"><?php echo $donnees['second_contenu'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="troisieme_contenu">3ème paragraphe</label>
                    <textarea class="form-control" rows="3" name="troisieme_contenu"><?php echo $donnees['troisieme_contenu'] ?></textarea>
                </div>

                <input type="submit" value="Modifier"/>

            </form>
    </div>
</div>

<?php
require('assets/footer.php');
?>