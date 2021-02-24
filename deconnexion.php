<?php
require('assets/head.php')
?>

<?php 
unset($_SESSION['pseudonyme']);
unset($_SESSION['rang']);
echo '<div class="alert alert-success" role="alert"> Vous avez bien été deconnecté </div>';
header("refresh:2;url=index.php");
?>

<?php
require('assets/footer.php')
?>