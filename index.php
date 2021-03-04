<?php
require('assets/head.php')
?>


<?php
if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<h1>Bienvenue sur l'espace administration</h1>";
} else {
   
}

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
            <div>
                <h4>Bienvenue !</h4>
                <p>════════════♫════════════</p>
            </div>
            <div>

            <p>Vous aimez le théâtre, la bande dessinée, la peinture, la sculpture, les courts métrages, les comédies musicales...</p>
                <p>Vous aimez le théâtre, la bande dessinée, la peinture, la sculpture, les courts métrages, les comédies musicales...</p>

                <p>Vous êtes au bon endroit !!!!</p>
                <p>Découvrez à travers ce site l'univers complet de Patrick DAY.</p>
                <p>Comédien ,metteur en scène, écrivain, illustrateur, peintre, sculpteur... Allez à la rencontre d'un artiste à multiples facettes.</p>
                <p>Regardez les principales archives de sa carrière en ligne.</p>
                <p>Vous voulez en savoir plus, son travail vous intéresse ?? Alors <a href="contact.php">contactez-le</a>.</p>

            </div>
    </div>

    <div class="stext">
            <div>
                
                <h4>Contenu du site</h4>

                <p>════════════♫════════════</p>
            </div>
            <div>
            <h1><a href="apropos.php">A propos</a></h1>
            <p>Découvrez le parcours artistique de Patrick DAY, ainsi toutes les facettes de son talent et les articles de presse.</p>
            <h1><a href="gallery.php">Galeries</a></h1>  
            <p>Retrouvez les principales illustrations de ses oeuvres, ses peintures, ses livres objets et quelques vidéos liées à ses films, courts métrages et comédies musicales.</p>
            <h1><a href="contact.php">Contacts</a></h1>
            <p>Des questions, des projets artistiques, ... ou tout simplement en voir plus ?? <br/>N'hésitez pas à remplir le formulaire de <a href="contact.php">contact</a>.</p>
            </div>
    </div>
</div>

<?php
require('assets/footer.php')
?>