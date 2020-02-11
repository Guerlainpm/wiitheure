<?php
ob_start();
?>
<div class="text-white bg-primary p-2 md:flex md:items-center md:justify-between md:px-40">
  <div class="container mx-auto flex justify-between items-center">
    <div class="w-32 rounded-full bg-white h-full">
      <img src="/logo.png" alt="logo">
    </div>
      <input class="border-2 border-grey rounded-full outline-none py-1 px-2 w-64" type="search" placeholder="Rechercher" name="search">
      <?php
        if (isset($_SESSION["user"])) {
          ?>
            <div class="h-20 justify-between flex flex-col items-center">
              <h2 class="text-white">Connecter en tant que <?php echo $_SESSION["user"]->getUsername(); ?></h2>
              <form class="w-full" action="/logout" method="post">
                <button class=" text-blue-500 bg-white w-full border-2 border-blue-600 rounded-full uppercase py-1 px-2 transition duration-500 hover:bg-primary hover:text-white hover:border-white" type="submit" name="button">Logout</button>
              </form>
            </div>
          <?php
        }
      ?>
  </div>
</div>
