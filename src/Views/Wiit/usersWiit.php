<?php
  ob_start();

  ?>
  <div class="">
    <?php foreach ($data['wiit'] as $wiit) {
      ?>
      <div class="h-64 bg-red-500">
        <div class="">
          <?php echo $wiit["content"]; ?>
        </div>
      </div>
      <?php
    } ?>
  </div>

  <?php

  $content = ob_get_clean();
  require VIEWS . '/template.php';
