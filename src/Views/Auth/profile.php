<?php
   ob_start();
?>
<div class="flex flex-grow flex-wrap">

  <div class="p-8 w-1/3 flex flex-col flex-grow">
    <div class="border-r-2 border-dark flex flex-col flex-grow justify-between">
      <h2 class="text-3xl"><?php echo $_SESSION["user"]->getUsername(); ?></h2>
      <div class="p-4 flex flex-grow flex-col justify-between">
        <!-- <div class="flex flex-grow py-4 ">
          <a href="/"><button class="w-48 text-blue-500 bg-white border-2 border-blue-600 rounded-full uppercase py-2 px-4 transition duration-500 hover:bg-primary hover:text-white hover:border-white" type="submit" name="button">Your Wiits</button></a>
          <div class="py-4">
            <h3>Your folows</h3>
            <ul>
              <li>exemple</li>
              <li>exemple</li>
            </ul>
          </div>
        </div> -->
        <p>Created at : <?php echo $_SESSION['user']->getCreate_at(); ?></p>
      </div>
    </div>

  </div>

  <div class="p-8 w-2/3 flex flex-col justify-around">
    <div id="name-<?php echo $_SESSION["user"]->getId();?>" class="">
      <p class="text-light border-b-2 border-dark">Username</p>
      <p class="ml-4 pt-2"><?php echo $_SESSION["user"]->getUsername(); ?></p>
    </div>

    <div id="mail-<?php echo $_SESSION["user"]->getId();?>" class="">
      <p class="text-light border-b-2 border-dark">E-mail</p>
      <p class="ml-4 pt-2"><?php echo $_SESSION['user']->getMail(); ?></p>
    </div>

    <div id="bio-<?php echo $_SESSION["user"]->getId();?>" class="">
      <p class="text-light border-b-2 border-dark">Biographie</p>
      <p class="ml-4 pt-2"><?php echo $_SESSION['user']->getBio(); ?></p>
    </div>

    <form class="hidden flex-col flex-grow justify-around" id="update-<?php echo $_SESSION["user"]->getId();?>" action="/profile/<?php echo $_SESSION['user']->getId(); ?>/edit" method="post">
      <div class="flex flex-col">
        <label class="ml-4 text-light border-b-2 border-dark" for="username">Username</label>
        <input class="outline-none mt-2 rounded-lg p-4" type="text" name="username" value="<?php echo $_SESSION["user"]->getUsername();?>" placeholder="Username">
        <p><?php echo getErrors('username'); ?></p>
      </div>

      <div class="flex flex-col">
        <label class="ml-4 text-light border-b-2 border-dark" for="username">E-mail</label>
        <input class="outline-none mt-2 rounded-lg p-4" type="text" name="mail" value="<?php echo $_SESSION['user']->getMail(); ?>" placeholder="Mail">
        <p><?php echo getErrors('mail'); ?></p>
      </div>

      <div class="flex flex-col">
        <label class="ml-4 text-light border-b-2 border-dark" for="username">Biographie</label>
        <textarea class="outline-none mt-2 resize-none rounded-lg p-4" name="bio" rows="8" cols="80" placeholder="Bio"><?php echo $_SESSION['user']->getBio(); ?></textarea>
        <p><?php echo getErrors('bio'); ?></p>
      </div>

      <button class="outline-none" type="submit" name="button">Envoyer</button>
    </form>
    <button onclick="toggle(<?php echo $_SESSION['user']->getId();?>)" class="" id="toggleUser-<?php echo $_SESSION['user']->getId();?>">Edit</button>
  </div>

</div>

  <script type="text/javascript">
    function toggle(id) {
      document.getElementById("name-" + id).classList.toggle('hide');
      document.getElementById("update-" + id).classList.toggle('show');

      document.getElementById("mail-" + id).classList.toggle('hide');

      document.getElementById("bio-" + id).classList.toggle('hide');
    }
  </script>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';
