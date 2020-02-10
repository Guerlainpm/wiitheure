<?php 
   ob_start();
?>
<main>
    <p>Accueil</p>
</main>
<?php 
$content = ob_get_clean();

require VIEWS . '/template.php';