<?php
   ob_start();
?>
  <p>Accueil</p>

<?php
$content = ob_get_clean();

require VIEWS . '/template.php';
