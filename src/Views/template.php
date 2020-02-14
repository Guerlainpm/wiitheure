
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
    <body class="flex flex-col justify-between min-h-screen bg-grey overflow-y-hidden">
      <nav class="fixed w-full">
        <?php
          include VIEWS . "components/navbar.php";
        ?>
      </nav>
      <main class="py-32 h-full flex-grow container mx-auto">
        <?php echo $content; ?>
      </main>

      <footer class="fixed bottom-0 w-full bg-footer text-white py-2">
        <div class="container mx-auto">
          <?php
            include VIEWS . "components/footer.php";
          ?>
        </div>
      </footer>
    </body>
    </html>
