<?php

  ?>
    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, user-scalable=no">
      <link rel="stylesheet" href="/css/tailwind.css">
      <link rel="stylesheet" href="/css/style.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
      <title></title>
    </head>
    <body>
      <nav>
      <?php
        include VIEWS . "components/navbar.php";
        ?>
      </nav>
        <?php echo $content; ?>
    </body>
    </html>
  <?php
