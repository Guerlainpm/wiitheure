<?php
   ob_start();
?>
  <div class="flex flex-grow flex-wrap">

  <div class="p-8 w-1/3 flex flex-col flex-grow">
    <div class="border-r-2 border-dark flex flex-col flex-grow justify-between">
      <h2 class="text-3xl text-light"><?php echo $_SESSION["user"]->getUsername(); ?></h2>
      <div class="p-4 flex flex-grow flex-col justify-between">
        <div class="flex flex-col flex-grow py-4 items-center">
          <a href="/"><button class="w-48 text-blue-500 bg-white border-2 border-blue-600 rounded-lg uppercase py-2 px-4 transition duration-500 hover:bg-blue-600 hover:text-white hover:border-white" type="submit" name="button">Your Wiits</button></a>
          <div class="mt-12 flex flex-col flex-grow py-4 w-full">
            <h3 class="mb-2 text-xl text-light border-b-2 border-dark">Your folows</h3>
            <div class="h-64 overflow-auto">
              <ul class="list-disc ml-8">

              </ul>
            </div>
          </div>
        </div>
        <p>Created at : <?php echo $_SESSION['user']->getCreate_at(); ?></p>
      </div>
    </div>
  </div>


<!-- here start the form area -->
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


<!-- form -->
    <form class="hidden flex-col flex-grow justify-around" id="update-<?php echo $_SESSION["user"]->getId();?>" action="/profile/<?php echo $_SESSION['user']->getId(); ?>/edit" method="post">
        <div class="flex flex-col">
          <label class="text-light border-b-2 border-dark" for="username">Username</label>
          <input class="outline-none mt-2 rounded-lg p-4" type="text" name="username" value="<?php echo $_SESSION["user"]->getUsername();?>" placeholder="Username">
          <p><?php echo getErrors('username'); ?></p>
        </div>

        <div class="flex flex-col">
          <label class="text-light border-b-2 border-dark" for="username">E-mail</label>
          <input class="outline-none mt-2 rounded-lg p-4" type="text" name="mail" value="<?php echo $_SESSION['user']->getMail(); ?>" placeholder="Mail">
          <p><?php echo getErrors('mail'); ?></p>
        </div>

        <div class="flex flex-col">
          <label class="text-light border-b-2 border-dark" for="username">Biographie</label>
          <textarea class="outline-none mt-2 resize-none rounded-lg p-4" name="bio" rows="8" cols="80" placeholder="Bio"><?php echo $_SESSION['user']->getBio(); ?></textarea>
          <p><?php echo getErrors('bio'); ?></p>
        </div>
        <div class="flex justify-center">
          <button class="outline-none px-4 py-2 rounded-full bg-dark text-white transition duration-100 hover:bg-light" type="submit" name="button">Envoyer</button>
        </div>
      </form>
      <div class="flex justify-center">
        <button class="outline-none h-10 w-10 rounded-full bg-dark text-white transition duration-100 hover:bg-light"onclick="toggle(<?php echo $_SESSION['user']->getId();?>)" id="toggleUser-<?php echo $_SESSION['user']->getId();?>"><i class="fas fa-pencil-alt"></i></button>
      </div>
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

  <script src="https://kit.fontawesome.com/5653f67af0.js" crossorigin="anonymous"></script>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';
