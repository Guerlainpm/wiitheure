<?php
ob_start();
?>
<div class="text-white bg-primary p-2 md:flex md:items-center md:justify-between lg:px-24 md:px-16">
  <div class="container mx-auto flex justify-between items-center">
    <a href="/" class="w-20 md:w-24 lg:w-20 rounded-full bg-white h-full">
      <img src="/logo.png" alt="logo">
    </a>
      <?php
        if (isset($_SESSION["user"])) {
          ?>
            <div class="w-64 h-20 justify-between flex flex-col items-center">
              <h2 class="flex flex-wrap items-center text-white">Connected as : <a href="/profile/<?php echo $_SESSION['user']->getId(); ?>" class="ml-2 underline"><?php echo $_SESSION["user"]->getUsername(); ?></a></h2>
              <form class="w-full" action="/logout" method="post">
                <button class=" text-blue-500 bg-white w-full border-2 border-blue-600 rounded-lg uppercase py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white hover:border-white" type="submit" name="button">Logout</button>
              </form>
            </div>
          <?php
        }
        else {
          ?>
          <div class="lg:w-64 w-24 h-20 flex items-center">
            <a href="/authentification" class="text-center text-blue-500 bg-white w-full border-2 border-blue-600 rounded-full uppercase py-1 px-2 transition duration-500 hover:bg-primary hover:text-white hover:border-white" type="submit" name="button">Login</a>
          </div>
          <?php
        }
      ?>
  </div>
</div>
