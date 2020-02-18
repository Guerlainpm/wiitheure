<?php
   ob_start();
   $post = $data["post"]["post"];
   $userPost = $data["post"]["user"];
   $subs = $data["sub"];
   $comments = $data["comments"];
?>
<?php include VIEWS."/components/popup.php"; ?>
<script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script><script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script>

<div class="container mx-auto flex flex-wrap">
    <div class="md:w-1/6">
        <div class=" border-r-2 border-dark md:border-r-0 mt-4 flex flex-wrap w-full md:flex flex-col">
            <a class='text-lg text-blue-600 md:w-full md:border-b-2 md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white' href="/"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-home"></i> <div class="font-bold hidden md:flex">Accueil</div> </button></a>
            <a class="text-lg text-blue-600 md:w-full md:border-b-2 md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white" href="/news"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-hashtag"></i><div class="font-bold hidden md:flex">Nouveautés</div></button> </a>
            <a class="text-lg text-blue-600 md:w-full md:border-b-2 md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white" href="/profile/<?php echo $_SESSION['user']->getId(); ?>"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-user"></i> <div class="font-bold hidden md:flex">Votre compte</div></button> </a>
            <div id="create" class="text-lg text-blue-600 md:w-full md:border-b-2 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white"><button class="px-4 w-full flex justify-between items-center" ><i class="fas fa-plus-circle"></i><div class="font-bold hidden md:flex">Créer un wiit</div></button></div>
        </div>
    </div>
    <div class="h-screen md:w-3/6 px-2 mb-56 pb-56">
    <div class="h-full mt-4 overflow-y-auto bg-light_3 p-4 border-l-2 border-light_2 mb-8 flex flex-col justify-between">
        <div class="w-full px-2">
            <div id="post">
                <div>
                    <div>
                        <p><?php echo $userPost->getUsername(); ?></p>
                    </div>
                    <div>
                        <p><?php echo $post->getContent(); ?></p>
                    </div>
                    <div>
                        <p><?php echo $post->getCreateAt(); ?></p>
                    </div>
                </div>
            </div>
            <div>
                <?php
                    if (isset($_SESSION["user"])) {
                        ?>
                            <form class="mt-6" action="/comment/create/<?php echo $post->getId(); ?>" method="POST">
                                <?php global $router; ?>
                                <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>" />
                                <div class="flex">
                                    <input class="text-black bg-white w-1/3 border-t-2 border-b-2 border-l-2 border-blue-600 rounded-l-lg py-1 px-2" placeholder="commenter" name="content"/>
                                    <input class="text-blue-500 bg-white px-2 rounded-r-lg border-t-2 border-b-2 border-r-2 border-blue-600" type="submit" value="submit"/>
                                </div>
                            </form>
                        <?php
                    }
                ?>
                <ul>
                <?php
                    foreach ($comments as $key => $value) {
                        if ($value["comment"]->getComment_id() == null) {
                            ?>
                                <li class="mt-2">
                                    <div class="p-1 bg-white">
                                        <p><a href="/profile/<?php echo $value["user"]->getId(); ?>"><?php echo $value["user"]->getUsername(); ?></a>:</p>
                                        <p><?php echo $value["comment"]->getContent(); ?></p>
                                        <?php 

                                        if ($_SESSION["user"]->getId() == $value["user"]->getId()) {

                                        ?>
                                            <form action="/delete/comment" method="post">
                                                <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>"/>
                                                <input type="hidden" name="comment_id" value="<?php echo $value["comment"]->getId(); ?>"/>
                                                <button type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        <?php 
                                        }
                                        ?>
                                    </div>
                                    <ul>
                                    <?php
                                        foreach ($comments as $repK => $reponse) {
                                            if ($value["comment"]->getId() == $reponse["comment"]->getComment_id()) {
                                                ?>
                                                    <li class="pl-4 mt-2">
                                                        <div class="p-1 bg-white">
                                                            <a href="/profile/<?php echo $reponse["user"]->getId(); ?>"><?php echo $reponse["user"]->getUsername(); ?></a>:
                                                            <p><?php echo $reponse["comment"]->getContent(); ?></p>
                                                        </div>
                                                        <?php
                                                        if ($_SESSION["user"]->getId() == $reponse["user"]->getId()) {
                                                        ?>
                                                            <form action="/delete/comment" method="post">
                                                            <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>"/>
                                                            <input type="hidden" name="comment_id" value="<?php echo $reponse["comment"]->getId(); ?>"/>
                                                            <button type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        <?php
                                                        }
                                                        ?>
                                                    </li>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </ul>
                                    <?php
                                        if (isset($_SESSION["user"])) {
                                            ?>
                                                <form class="mt-2" action="/comment/rep/create/<?php echo $post->getId(); ?>" method="POST">
                                                    <input type="hidden" name="comment_id" value="<?php echo $value["comment"]->getId(); ?>" />
                                                    <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>" />
                                                    <div class="pl-4 flex">
                                                        <input class="text-black bg-white w-1/3 border-t-2 border-b-2 border-l-2 border-blue-600 rounded-l-lg py-1 px-2" placeholder="répondre" name="content"/>
                                                        <input class="text-blue-500 bg-white px-2 rounded-r-lg border-t-2 border-b-2 border-r-2 border-blue-600" type="submit" value="submit"/>
                                                    </div>
                                                </form>
                                            <?php
                                        }
                                    ?>
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
    <div class="md:w-2/6">
        <div class="mt-4 flex flex-wrap w-full flex">
          <div class="h-screen overflow-y-auto w-full px-8 pb-64">
            <ul>
              <?php
                if (isset($_SESSION["user"])) {
                    if (count($subs) == 0) {
                        ?>
                            <li class="text-lg text-black w-full text-center border-blue-600 border-b-2">vous ne suivez actuellement personne</li>
                        <?php
                    }
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
<script src="/javascript/popup.js"></script>

<?php
$content = ob_get_clean();

require VIEWS . '/template.php';
