<?php
   ob_start();
?>
<div class="flex">

  <div class="px-8 py-4 h-full w-1/3">
    <div class="h-full border-r-2 border-dark ">
      <h2 class="text-3xl"><?php echo $_SESSION["user"]->getUsername(); ?></h2>
      <p><?php echo $_SESSION['user']->getCreate_at(); ?></p>
    </div>

  </div>

  <div class="px-8 py-4 h-full w-2/3">
    <p id="name-<?php echo $_SESSION["user"]->getId();?>"><?php echo $_SESSION["user"]->getUsername(); ?></p>
    <p id="mail-<?php echo $_SESSION["user"]->getId();?>"><?php echo $_SESSION['user']->getMail(); ?></p>
    <div class="">

    </div>

    <form id="UserUpdate-<?php echo $_SESSION["user"]->getId();?>" class="hidden" action="/profile/<?php echo $_SESSION['user']->getId(); ?>/edit" method="post">
      <input type="text" name="username" value="<?php echo $_SESSION["user"]->getUsername();?>" placeholder="Username">
      <p><?php echo getErrors('username'); ?></p>

      <input type="text" name="mail" value="<?php echo $_SESSION['user']->getMail(); ?>" placeholder="Mail">
      <p><?php echo getErrors('mail'); ?></p>

      <textarea name="bio" rows="8" cols="80" placeholder="Bio"><?php echo $_SESSION['user']->getBio(); ?></textarea>
      <p><?php echo getErrors('bio'); ?></p>

      <button type="submit" name="button">Envoyer</button>
    </form>
    <button onclick="toggle(<?php echo $_SESSION['user']->getId();?>)" class="" id="toggleUser-<?php echo $_SESSION['user']->getId();?>">Edit</button>
  </div>
</div>

  <script type="text/javascript">
    function toggle(id) {
      document.getElementById("name-" + id).classList.toggle('hide');
      document.getElementById("UserUpdate-" + id).classList.toggle('show');

      document.getElementById("mail-" + id).classList.toggle('hide');
      document.getElementById("mailUpdate-" + id).classList.toggle('show');
    }
  </script>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';
