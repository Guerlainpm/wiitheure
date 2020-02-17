<?php
   ob_start();
?>
  <div class="flex flex-wrap justify-center">
    <div class="md:w-1/3 w-2/3 h-screen overflow-y-auto border-r-2 border-dark flex-col md:flex hidden" id="profil-<?php echo $_SESSION["user"]->getId();?>">
      <h2 class="text-3xl text-light"><?php echo $_SESSION["user"]->getUsername(); ?></h2>
      <p>Créé le : <?php echo $_SESSION['user']->getCreate_at(); ?></p>

      <div class="w-full p-4 flex flex-col">
        <div class="w-full flex flex-col py-4 items-center">
          <div class="w-full flex flex-col flex-grow py-4">
            <div class="flex flex-col justify-around">
              <div id="name-<?php echo $data["user"]->getId();?>" class="mb-8">
                <p class="text-light border-b-2 border-dark">Pseudo</p>
                <p class="ml-4 pt-2"><?php echo $data["user"]->getUsername(); ?></p>
                <p class="ml-4 text-red-500"><?php echo getErrors('username'); ?></p>
              </div>

              <div id="mail-<?php echo $data["user"]->getId();?>" class="mb-8">
                <p class="text-light border-b-2 border-dark">E-mail</p>
                <p class="ml-4 pt-2"><?php echo $data['user']->getMail(); ?></p>
                <p class="ml-4 text-red-500"><?php echo getErrors('mail'); ?></p>

              </div>

              <div id="bio-<?php echo $data["user"]->getId();?>" class="mb-8">
                <p class="text-light border-b-2 border-dark">Biographie</p>
                <p class="ml-4 pt-2"><?php echo $data['user']->getBio(); ?></p>
                <p class="ml-4 text-red-500"><?php echo getErrors('bio'); ?></p>

              </div>
          <!-- form -->
              <form class="hidden flex-col justify-around" id="update-<?php echo$data["user"]->getId();?>" action="/profile/<?php echo $_SESSION['user']->getId(); ?>/edit" method="post">
                  <div class="flex flex-col mb-8">
                    <label class="text-light border-b-2 border-dark" for="username">Pseudo</label>
                    <input class="outline-none mt-2 rounded-lg p-4" type="text" name="username" value="<?php echo $data["user"]->getUsername();?>" placeholder="Username">
                    <p class="ml-4 text-red-500"><?php echo getErrors('username'); ?></p>
                  </div>

                  <div class="flex flex-col mb-8">
                    <label class="text-light border-b-2 border-dark" for="username">E-mail</label>
                    <input class="outline-none mt-2 rounded-lg p-4" type="text" name="mail" value="<?php echo $data['user']->getMail(); ?>" placeholder="Mail">
                    <p class="ml-4 text-red-500"><?php echo getErrors('mail'); ?></p>
                  </div>

                  <div class="flex flex-col mb-8">
                    <label class="text-light border-b-2 border-dark" for="username">Biographie</label>
                    <textarea class="outline-none mt-2 resize-none rounded-lg p-4" name="bio" rows="8" cols="80" placeholder="Bio"><?php echo $_SESSION['user']->getBio(); ?></textarea>
                    <p class="ml-4 text-red-500"><?php echo getErrors('bio'); ?></p>
                  </div>
                  <div class="flex justify-center mb-2">
                    <button class="outline-none px-4 py-2 rounded-full bg-dark text-white transition duration-100 hover:bg-light" type="submit" name="button">Envoyer</button>
                  </div>
                </form>
<<<<<<< HEAD
                <div class="flex justify-center">
                  <button class="outline-none h-10 w-10 rounded-full bg-dark text-white transition duration-100 hover:bg-light" onclick="toggle(<?php echo $_SESSION['user']->getId();?>)" id="toggleUser-<?php echo $_SESSION['user']->getId();?>"><i class="fas fa-pencil-alt"></i></button>
                </div>
                <?php 
                  if($data["user"]->getId() == $_SESSION["user"]->getId()){
                    ?>
                    <div class="flex justify-center">
                      <button class="outline-none h-10 w-10 rounded-full bg-dark text-white transition duration-100 hover:bg-light"onclick="toggle(<?php echo $_SESSION['user']->getId();?>)" id="toggleUser-<?php echo $_SESSION['user']->getId();?>"><i class="fas fa-pencil-alt"></i></button>
                    </div>
                    <?php
                  }
                ?>

=======

                <div class="flex justify-center">
                  <button class="outline-none h-10 w-10 rounded-full bg-dark text-white transition duration-100 hover:bg-light" onclick="toggle(<?php echo $_SESSION['user']->getId();?>)" id="toggleUser-<?php echo $_SESSION['user']->getId();?>"><i class="fas fa-pencil-alt"></i></button>
                </div>

>>>>>>> 6ffc5458cb2492e7250eaff1d9b344b21d69f907
              </div>
            </div>
            <div class="w-full pt-24">
              <h3 class="mb-2 text-xl text-light border-b-2 border-dark">Vos abonnements</h3>
              <div class="h-64 overflow-auto">
                <ul class="list-disc ml-8">
                  <?php
                  foreach ($data["sub"] as $key => $sub) {
                    ?>
                    <li><?php echo $sub->getUsername(); ?></li>
                    <?php
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>
      <!-- Wiits -->
      <div class="text-2xl md:hidden flex mt-4" onclick="toggle(<?php echo $_SESSION['user']->getId();?>)" id="bar-<?php echo $_SESSION["user"]->getId();?>"><i class="far fa-user cursor-pointer h-6"></i></div>
      <div class="w-2/3 pb-48 pl-8 h-screen overflow-y-auto" id="wiit-<?php echo $_SESSION["user"]->getId();?>">
        <?php foreach ($data['wiit'] as $wiit) {
          ?>
          <div class="bg-white p-4 rounded-lg border-2 border-light_2 h-48 mb-8 flex flex-col justify-between">
              <p class="mb-2 text-light border-b-2 border-dark"><?php echo $data['user']->getUsername(); ?></p>
              <div class="ml-8 text-sm overflow-y-auto max-h-full">
                <?php echo $wiit["content"]; ?>
              </div>
              <p class="text-right"><?php echo $wiit["create_at"]; ?></p>
          </div>
          <?php
        } ?>
      </div>

  </div>


<!-- here start the form area -->

  <script type="text/javascript">
    function toggle(id) {
      document.getElementById("name-" + id).classList.toggle('hide');
      document.getElementById("update-" + id).classList.toggle('show');

      document.getElementById("mail-" + id).classList.toggle('hide');

      document.getElementById("bio-" + id).classList.toggle('hide');

      document.getElementById("bar-" + id).classList.toggle('hide');
      document.getElementById("profil-" + id).classList.toggle('show');
      document.getElementById("wiit-" + id).classList.toggle('hide');

    }
  </script>

  <script src="https://kit.fontawesome.com/5653f67af0.js" crossorigin="anonymous"></script>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';
