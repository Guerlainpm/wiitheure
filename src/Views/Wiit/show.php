<?php
   ob_start();
   $post = $data["post"]["post"];
   $userPost = $data["post"]["user"];
   $subs = $data["sub"];
   $comments = $data["comments"];
?>
<?php include VIEWS."/components/popup.php"; ?>
<main class="container mx-auto flex flex-wrap">
    <div class="md:w-1/6">
        <div class="mt-4 flex flex-wrap w-full">
            <button class="p-2 border-t border-l border-grey w-full bg-primary_2"><a href="/">acceuil</a></button>
            <button class="p-2 w-full border-t bg-primary_2 border-l border-grey">lorem</button>
            <button class="p-2 w-full border-t bg-primary_2 border-l border-grey">ipsum</button>
            <button id="create" class="p-2 w-full border-t bg-primary_2 border-l border-grey">create a wiit</button>
        </div>
    </div>
    <div class="md:w-3/6 px-2">
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
                <form action="/comment/create/<?php echo $post->getId(); ?>" method="POST">
                    <?php global $router; ?>
                    <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>" />
                    <input name="content"/>
                    <input type="submit" value="submit"/>
                </form>
                <ul>
                <?php
                    foreach ($comments as $key => $value) {
                        if ($value["comment"]->getComment_id() == null) {
                            ?>
                                <li>
                                    <p><a href="/profile/<?php echo $value["user"]->getId(); ?>"><?php echo $value["user"]->getUsername(); ?></a>: <?php echo $value["comment"]->getContent(); ?></p>
                                    <form action="/comment/rep/create/<?php echo $post->getId(); ?>" method="POST">
                                        <input type="hidden" name="comment_id" value="<?php echo $value["comment"]->getId(); ?>" />
                                        <input type="hidden" name="url" value="<?php echo $router->getUrl(); ?>" />
                                        <input name="content"/>
                                        <input type="submit" value="submit"/>
                                    </form>
                                    <ul>
                                    <?php
                                        foreach ($comments as $repK => $reponse) {
                                            if ($value["comment"]->getId() == $reponse["comment"]->getComment_id()) {
                                                ?>
                                                    <li class="pl-2"><a href="/profile/<?php echo $reponse["user"]->getId(); ?>"><?php echo $reponse["user"]->getUsername(); ?></a>: <?php echo $reponse["comment"]->getContent(); ?></li>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </ul>
                                </li>
                            <?php
                        }
                    }
                ?>
                </ul>
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
