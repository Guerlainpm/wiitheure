<?php
   ob_start();
?>
<div class="flex flex-grow flex-wrap">

  <div class="p-8 w-1/3 flex flex-col flex-grow">
    <div class="border-r-2 border-dark flex flex-col flex-grow">
      <h2 class="text-3xl"><?php echo $_SESSION["user"]->getUsername(); ?></h2>
      <div class="ml-4">
        <p>Created at : <?php echo $_SESSION['user']->getCreate_at(); ?></p>
      </div>
    </div>

  </div>

  <div class="p-8 w-2/3 flex flex-col justify-around">
    <p id="name-<?php echo $_SESSION["user"]->getId();?>"><?php echo $_SESSION["user"]->getUsername(); ?></p>
    <p id="mail-<?php echo $_SESSION["user"]->getId();?>"><?php echo $_SESSION['user']->getMail(); ?></p>
    <p id="bio-<?php echo $_SESSION["user"]->getId();?>"><?php echo $_SESSION['user']->getBio(); ?></p>

    <form class="hidden flex-col flex-grow justify-around" id="update-<?php echo $_SESSION["user"]->getId();?>" action="/profile/<?php echo $_SESSION['user']->getId(); ?>/edit" method="post">
      <div class="flex flex-col">
        <label class="ml-4 text-light" for="username">Nom d'utilisateur</label>
        <input class="rounded-lg p-4" type="text" name="username" value="<?php echo $_SESSION["user"]->getUsername();?>" placeholder="Username">
        <p><?php echo getErrors('username'); ?></p>
      </div>

      <div class="flex flex-col">
        <label class="ml-4 text-light" for="username">E-mail</label>
        <input class="rounded-lg p-4" type="text" name="mail" value="<?php echo $_SESSION['user']->getMail(); ?>" placeholder="Mail">
        <p><?php echo getErrors('mail'); ?></p>
      </div>

      <div class="flex flex-col">
        <label class="ml-4 text-light" for="username">Biographie</label>
        <textarea class="resize-none rounded-lg p-4" name="bio" rows="8" cols="80" placeholder="Bio"><?php echo $_SESSION['user']->getBio(); ?></textarea>
        <p><?php echo getErrors('bio'); ?></p>
      </div>

      <button type="submit" name="button">Envoyer</button>
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
