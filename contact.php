<?php
require('assets/head.php')
?>

<div class="ContainerApropos">
    <h1>CONTACT</h1>
    <p>════════════♫════════════</p>
    <ul>
        <li><a href="index.php" ><em>Accueil</em></a></li>
        <li><em>/ Contact</em></li>
    </ul>
  </div>

<div id="box">
      <form id="souheil-formulaire" enctype="multipart/form-data" onsubmit="return validate()" method="post">
        <h3>Formulaire de contact</h3>
        <label>Nom:</label>
        <input type="text" id="name" name="name" placeholder="Nom"/><br />
        <?php if (! empty($infovide)) { ?>
              <p class='<?php echo $type_info; ?>Message'><?php echo $infovide; ?></p>
            <?php } ?>
        <label>Email:</label><span id="info" class="info"></span>
        <input type="text" id="email" name="email" placeholder="Email"/><br />
        <?php if (! empty($infovide)) { ?>
              <p class='<?php echo $type_info; ?>Message'><?php echo $infovide; ?></p>
            <?php } ?>
        <label>Message:</label>
        <textarea id="message" name="message" placeholder="Message..."></textarea>
        <?php if (! empty($infovide)) { ?>
              <p class='<?php echo $type_info; ?>Message'><?php echo $infovide; ?></p>
            <?php } ?>
        <input type="submit" name="send" value="Envoyer le message"/>
      <div id="statusMessage"> 
            <?php if (! empty($db_msg)) { ?>
              <p class='<?php echo $type_db_msg; ?>Message'><?php echo $db_msg; ?></p>
            <?php } ?>
            <?php if (! empty($mail_msg)) { ?>
              <p class='<?php echo $type_mail_msg; ?>Message'><?php echo $mail_msg; ?></p>
            <?php } ?>
            
            </div>
      </form>
      </div>

<?php
require('assets/footer.php')
?>