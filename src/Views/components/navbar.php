<?php
ob_start();
?>
<div class="text-white bg-primary p-2 md:flex md:items-center md:justify-between md:px-40">
  <div class="container mx-auto flex justify-between items-center">
    <div class="w-32 rounded-full bg-white h-full">
      <img src="/logo.png" alt="logo">
    </div>
    <div class="flex-wrap text-blue-800">
      <input class="w-full border-2 border-grey rounded-full outline-none py-1 px-2 w-64" type="search" placeholder="Rechercher" name="search">
      <?php
        if (isset($_SESSION["user"])) {
          ?>
            <div class="mt-2 w-full flex items-center">
              <h2 class="text-white ml-2">conncter en tant que <?php echo $_SESSION["user"]->getUsername(); ?></h2>
              <form action="/logout" method="post">
                <input class="ml-2 border-2 border-grey rounded-full uppercase py-1 px-2" type="submit" value="logout"/>
              </form>
            </div>
          <?php
        }
      ?>
    </div>
  </div>
</div>

