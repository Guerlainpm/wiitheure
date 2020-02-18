<?php
   ob_start();
   $posts = $data["posts"];
   $subs = $data["sub"];
 include VIEWS."/components/popup.php";
  ?>
<script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script><script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script>
<div class="container mx-auto flex flex-wrap h-screen">
    <div class="md:w-1/6">
        <div class=" border-r-2 border-dark md:border-r-0 mt-4 flex flex-wrap w-full md:flex flex-col">
            <a class='text-lg text-blue-600 md:w-full md:border-b-2 md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white' href="/"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-home"></i> <div class="font-bold hidden md:flex">Accueil</div> </button></a>
            <a class="text-lg text-blue-600 md:w-full md:border-b-2 md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white" href="/news"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-hashtag"></i><div class="font-bold hidden md:flex">Nouveautés</div></button> </a>
            <a class="text-lg text-blue-600 md:w-full md:border-b-2 md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white" href="/profile/<?php echo $_SESSION['user']->getId(); ?>"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-user"></i> <div class="font-bold hidden md:flex">Votre compte</div></button> </a>
            <div id="create" class="text-lg text-blue-600 md:w-full md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white"><button class="px-4 w-full flex justify-between items-center" ><i class="fas fa-plus-circle"></i><div class="font-bold hidden md:flex">Créer un wiit</div></button></div>
        </div>
    </div>

    <div class="w-64 md:w-3/6 px-2 h-full">
        <div class="w-full mt-4 px-2 h-full overflow-y-auto pb-56">
            <div class="w-full">
                <div class="py-1 mb-2 w-full h-full border-b-2 border-blue-600 font-bold	text-lg text-blue-600">Accueil</div>

            </div>
            <div id="posts h-full">
            <?php
              foreach ($posts as $key => $post) {
                  if ($key > 0) {
                      ?>
                        <div class="bg-light_3 p-4 border-l-2 border-light_2 h-40 mb-8 flex flex-col justify-between">
                          <div class="w-full flex justify-between">
                              <p class="mb-2 text-light border-b-2 border-dark"><a href="/profile/<?php echo $post["user"]->getId(); ?>"><?php echo $post["user"]->getUsername(); ?></a> :</p>
                              <form action="/follow" method="post">
                                  <input type="hidden" name="followed" value="<?php echo $post["user"]->getId(); ?>"/>
                                  <button type="submit">Suivre</button>
                              </form>
                          </div>
                            <p class="ml-8 text-sm overflow-y-auto max-h-full"><?php echo $post["post"]->getContent(); ?></p>
                            <div class="flex justify-between items-center">
                              <a href="/post/<?php echo $post["post"]->getId(); ?>"><i class="text-light fas fa-comments"></i></a>
                              <p class="text-right"><?php echo $post["post"]->getCreateAt();?></p>
                            </div>
                      </div>
                  <?php
                }
              }
            ?>
            </div>
        </div>
      </div>
      <div class="md:w-2/6">
        <div class="mt-4 flex flex-wrap w-full flex">
          <div class="h-screen overflow-y-auto w-full px-8 pb-64">
            <ul>
              <?php
                if (isset($_SESSION["user"])) {
                  foreach ($subs as $key => $value) {
                    ?>
                      <li class="flex justify-between text-lg text-blue-600 md:border-b-2 md:border-b-2 border-blue-600 py-1 px-2 transition"><p><?php echo $value->getUsername(); ?></p>
                          <form action="/unfollow" method="post">
                              <input type="hidden" name="followed" value="<?php echo $value->getId(); ?>"/>
                              <button class="duration-100 hover:text-red-500" type="submit"><i class="fas fa-trash"></i></button>
                          </form>
                      </li>
                    <?php
                  }
                }
              ?>
            </ul>
          </div>
        </div>
    </div>
</div>
<script src="./javascript/popup.js"></script>

<?php
$content = ob_get_clean();

require VIEWS . '/template.php';
