<?php
session_start();

/*recupere le fichier des fonctions*/
require('assets/functions.php');
/*connexion à une base de donnees*/
$pdo=connexion('bdd_patrick');


$erreurs = [];
$success = null;
?>

<?php
  if(!empty($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $toEmail = "stalkergame@sfr.fr";
    $mailHeaders = "From: " . $name . "<". $email .">\r\n";
    if(mail($toEmail, $message, $mailHeaders)) {
      $mail_msg = "Vos informations de contact ont été reçues avec succés.";
      $type_mail_msg = "success";
    }else{
      $mail_msg = "Erreur lors de l'envoi de l'e-mail.";
      $type_mail_msg = "error";
    }
  }
?>

<?php
  if(!empty($_POST["send"])) {
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"]) ) {
    
      $name =htmlspecialchars($_POST["name"]);
      $email = htmlspecialchars($_POST["email"]);
      $message = htmlspecialchars($_POST["message"]);
      $connexion = mysqli_connect("localhost", "root", "", "bdd_patrick") or die("Erreur de connexion: " . mysqli_error($connexion));
      $result = mysqli_query($connexion, "INSERT INTO contact (name, email, message) VALUES ('" . $name. "', '" . $email. "','" . $message. "')");
      if($result){
        $db_msg = "Vos informations de contact sont enregistrées avec succés.";
        $type_db_msg = "success";

      }else{
        $db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
        $type_db_msg = "error";
      }
    }
    else {

      $infovide = "Ce champ est obligatoire";
      $type_info = "info";
    }
  }
?>



<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Integration du jQUERY par CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Integration du FONT AWESOME par CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <!-- Integration du GOOGLE FONTS par CDN -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@700&display=swap" rel="stylesheet">

    <!-- Integration du Animate.CSS par CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- this cssfile can be found in the jScrollPane package,lien pour changer la couleur de la scrollbar avec les navigateurs Firefox, IE, Opera-->
    <link rel="stylesheet" type="text/css" href="assets/jquery.jscrollpane.css" />

    <!-- Integration de fichier CSS -->
    <link rel="stylesheet" href="assets/style.css?v=<?php echo time(); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>patrickday.fr</title>
  </head>
  <body>

  <div class="container">
    
    <!-- Barre de navigation-->
      <div class="Cnavbar">
        <div class="Clogin">
        <?php
        if(isset($_SESSION['rang']) && $_SESSION['rang'] == 1) {
    echo "<a href='deconnexion.php'><em>Se déconnecter</em></a>";
    echo " <br /><a href='administration.php'><em> Administration</em></a>";
    } else {
      echo "<a href='connexion.php'><em>Se connecter</em></a>";
    }
    ?>
      </div>
        <div class="Cnav">
          <div class="Cnomsite"><a href="index.php"><p>Patrick DAY</p></a></div>
          <div id="Cnavbarmenu">
            <ul class="Cmenu">
              <li id="Ca"><a href="index.php">ACCUEIL</a></li>
              <li id="Ca"><a href="apropos.php">A PROPOS</a></li>
              <li id="Ca"><a href="gallery.php">GALERIES</a> </li>        
              <li id="Ca"><a href="contact.php">CONTACTS</a></li>  
            </ul> 
          </div> 
        </div>
      </div> 
  
    <!--Fin Barre de navigation-->

   


    <!--Btn scroll DOWN-->
    <a href="#scrollDown"><i class="fas fa-arrow-circle-down btn_scroll-down"></i></a>


    <!--Btn scroll UP-->
    <a href="#scrollUp"><i class="fas fa-arrow-circle-up btn_scroll-up not_show-container"></i></a>



