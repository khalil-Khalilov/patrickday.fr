<?php
require('assets/head.php');
?>

<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "Bienvenue sur l'administration.";
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
        //header("refresh:1;url=administration.php");
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Une erreur est survenue lors de la tentative de suppression de l\'élément.</div>';
    }
}

$sql = ('SELECT id, adresse_image, titre_image, gallery_column, type_image FROM images_categorie');

$req = $pdo->query($sql);

$i = 1;
?>



<?php
    require('assets/nav_administration.php');
    require('assets/affichage_erreur.php');
?>




<!--Liste des images-->
<div class="kh-container">
    <h1>Liste des images</h1>
    <div id="container">

        <table  class="table table-success table-striped">
            <thead class="table">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Type de galerie</th>
                    <th scope="col">Numero de la colonne</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php
                while($donnees = $req->fetch()){
                    if($donnees['type_image'] == "Dessin" || $donnees['type_image'] == "Peinture" || $donnees['type_image'] == "Sculpture" || $donnees['type_image'] == "Livre Object"){
            ?>
            <tbody class="wow animate__animated animate__fadeIn">
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


<?php
require('assets/footer.php');
?>















