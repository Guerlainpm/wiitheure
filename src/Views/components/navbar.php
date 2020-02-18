<?php
ob_start();
?>
<div class="text-white bg-primary p-2 md:flex md:items-center md:justify-between lg:px-24 md:px-16">
  <div class="container mx-auto flex justify-between items-center">
    <a href="/" class="hidden md:block w-20 md:w-24 lg:w-20 rounded-full bg-white h-full">
      <img src="/logo.png" alt="logo">
    </a>
      <?php
        if (isset($_SESSION["user"])) {
          ?>
          <div class="md:flex md:justify-between md:px-40 w-full">
            <form class="md:w-64 w-full" action="/search" method="post">
              <label for="search" class="md:block hidden text-white">search</label>
              <div class="flex">
                <input id="search" class="text-black bg-white w-full border-t-2 border-b-2 border-l-2 border-blue-600 rounded-l-lg py-1 px-2" name="search"/>
                <button class="text-blue-500 bg-white px-2 rounded-r-lg border-t-2 border-b-2 border-r-2 border-blue-600" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </form>
            <div class="md:w-64 w-full md:h-20 justify-between flex flex-col items-center">
              <h2 class="flex flex-wrap items-center text-white hidden md:block">Connecter en tant que: <a href="/profile/<?php echo $_SESSION['user']->getId(); ?>" class="ml-2 underline"><?php echo $_SESSION["user"]->getUsername(); ?></a></h2>
              <form class="w-full" action="/logout" method="post">
                <button class="text-xs md:text-base  text-blue-500 bg-white w-full border-2 border-blue-600 rounded-lg uppercase py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white hover:border-white" type="submit" name="button">Se déconnecter</button>
              </form>
            </div>
          </div>
          <?php
        }
      ?>
  </div>
</div>
