<?php
require('assets/head.php')
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


<!--Slider--> 
<div id="carousel">

    <ul>
        <li><img src="media\images/carrousel/carrousel1.jpg"/></li>
        <li><img src="media\images/carrousel/carrousel2.jpg"/></li>
        <li><img src="media\images/carrousel/carrousel3.jpg"/></li>
        <li><img src="media\images/carrousel/carrousel4.jpg"/></li>
        <li><img src="media\images/carrousel/carrousel5.jpg"/></li>
        <li><img src="media\images/carrousel/carrousel6.jpg"/></li>
    </ul>

    <i class="fas fa-chevron-circle-right next"></i>
    <i class="fas fa-chevron-circle-left prev"></i>

</div>





<div class="scontainer">
    <div class="stext">
    <?php
            $sql= "SELECT * FROM text_accueil WHERE id= 1";
            $requete = $pdo->query($sql);
            while($donnees = $requete ->fetch()){
                ?>
            <div>
                <h4><?= $donnees['titre'] ?></h4>
                <p>════════════♫════════════</p>
            </div>
            <div>
                <p><?= $donnees['contenu'] ?></p>
                <p><?= $donnees['second_contenu'] ?></p>
                <p><?= $donnees['troisieme_contenu'] ?></p>

            </div>
    </div>
    <?php
           }
    ?>


            <?php
                $sql= "SELECT * FROM text_accueil WHERE id= 2";
                $requete = $pdo->query($sql);
                while($donnees = $requete ->fetch()){
            ?>

            <div class="stext">
                    <div>

                        <h4><?= $donnees['titre'] ?></h4>

                        <p>════════════♫════════════</p>
                    </div>
                    <div>
                    <h1><a href="apropos.php">A propos</a></h1>
                    <p><?= $donnees['contenu'] ?></p>
                    <h1><a href="gallery.php">Galeries</a></h1>  
                    <p><?= $donnees['second_contenu'] ?></p>
                    <h1><a href="contact.php">Contacts</a></h1>
                    <p><?= $donnees['troisieme_contenu'] ?></p>
                    </div>
            </div>
        </div>
                    <?php
                    }
            ?>

<?php
require('assets/footer.php')
?>