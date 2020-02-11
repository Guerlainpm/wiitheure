<?php
ob_start();
?>
<div class="text-white bg-primary p-2 md:flex md:items-center md:justify-between md:px-40">
  <div class="container mx-auto flex justify-between items-center">
    <a href="/" class="w-24 rounded-full bg-white h-full">
      <img src="/logo.png" alt="logo">
    </a>
      <input class="text-dark border-2 border-grey rounded-full outline-none py-2 px-4 w-1/3" type="search" placeholder="Rechercher" name="search">
      <?php
        if (isset($_SESSION["user"])) {
          ?>
            <div class="w-64 h-20 justify-between flex flex-col items-center">
              <h2 class="flex flex-wrap items-center text-white">Connecter en tant que: <a href="/profile/<?php echo $_SESSION['user']->getId(); ?>" class="ml-2 underline"><?php echo $_SESSION["user"]->getUsername(); ?></a></h2>
              <form class="w-full" action="/logout" method="post">
                <button class=" text-blue-500 bg-white w-full border-2 border-blue-600 rounded-full uppercase py-1 px-2 transition duration-500 hover:bg-primary hover:text-white hover:border-white" type="submit" name="button">Logout</button>
              </form>
            </div>
          <?php
        }
        else {
          ?>
          <div class="w-64 h-20 flex items-center">
            <a href="/authentification" class="text-center text-blue-500 bg-white w-full border-2 border-blue-600 rounded-full uppercase py-1 px-2 transition duration-500 hover:bg-primary hover:text-white hover:border-white" type="submit" name="button">Login</a>
          </div>
          <?php
        }
      ?>
  </div>
</div>
