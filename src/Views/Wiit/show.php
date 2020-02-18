<?php
   ob_start();
   $post = $data["post"]["post"];
   $userPost = $data["post"]["user"];
   $subs = $data["sub"];
   $comments = $data["comments"];
?>
<?php include VIEWS."/components/popup.php"; ?>
<script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script><script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script>

<main class="mb-4 container mx-auto flex flex-wrap">
    <div class="md:w-1/6">
        <div class="mt-4 flex flex-wrap w-full">
            <button class="p-2 border-t border-l border-grey w-full bg-primary_2"><a href="/">acceuil</a></button>
            <button id="create" class="p-2 w-full border-t bg-primary_2 border-l border-grey">create a wiit</button>
        </div>
    </div>
    <div class="md:w-3/6 px-2 mt-4">
    <div class="h-screen overflow-y-auto bg-light_3 p-4 border-l-2 border-light_2 mb-8 flex flex-col justify-between">
        <div class="w-full mt-4 px-2">
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
                            <form action="/comment/create/<?php echo $post->getId(); ?>" method="POST">
                                <?php global $router; ?>
                                <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>" />
                                <div class="flex">
                                    <input class="text-black bg-white w-1/3 border-t-2 border-b-2 border-l-2 border-blue-600 rounded-l-lg py-1 px-2" placeholder="écrire un commentaire" name="content"/>
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
                                                    </li>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </ul>
                                    <?php
                                        if (isset($_SESSION["user"])) {
                                            ?>
                                                <form action="/comment/rep/create/<?php echo $post->getId(); ?>" method="POST">
                                                    <input type="hidden" name="comment_id" value="<?php echo $value["comment"]->getId(); ?>" />
                                                    <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>" />
                                                    <div class="pl-4 flex">
                                                        <input class="text-black bg-white w-1/3 border-t-2 border-b-2 border-l-2 border-blue-600 rounded-l-lg py-1 px-2" placeholder="répondre au commentaire" name="content"/>
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
            <div class="w-1/2 p-2">
                <p>latest tag</p>
                <ul id="popular">
                    
                </ul>
            </div>
            <div class="w-1/2 p-2">
                <p>sub</p>
                <ul>
                    <?php
                        foreach ($subs as $key => $value) {
                            ?>
                                <li class="flex justify-between w-full"><p><?php echo $value->getUsername(); ?></p> <button>unsub</button></li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            
        </div>
    </div>
</main>
<script src="/javascript/popup.js"></script>

<?php
$content = ob_get_clean();

require VIEWS . '/template.php';
