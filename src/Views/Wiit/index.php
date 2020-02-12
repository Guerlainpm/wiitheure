<?php
   ob_start();
   $posts = $data["posts"];
   $subs = $data["sub"];
?>
<?php include VIEWS."/components/popup.php"; ?>
<main class="container mx-auto flex flex-wrap">
    <div class="md:w-1/6">
        <div class="mt-4 flex flex-wrap w-full">
            <button class="p-2 border-t border-l border-grey w-full bg-primary_2">acceuil</button>
            <button class="p-2 w-full border-t bg-primary_2 border-l border-grey">lorem</button>
            <button class="p-2 w-full border-t bg-primary_2 border-l border-grey">ipsum</button>
            <button id="create" class="p-2 w-full border-t bg-primary_2 border-l border-grey">create a wiit</button>
        </div>
    </div>
    <div class="md:w-3/6 px-2">
        <div class="w-full mt-4 px-2">
            <div class="w-full">
                <ul class="flex">
                    <li id="sub" class="p-2 text-white bg-primary_2"><a href="/">abo</a></li>
                    <li id="news" class="ml-2 p-2 text-white bg-primary_2"><a href="/news">news</a></li>
                </ul>
            </div>
            <div id="posts">
            <?php
                if (isset($_SESSION["user"])) {
                    foreach ($posts as $key => $post) {
                        if ($key > 0) {
                            ?>
                                <div class="mt-2 bg-red-500 px-4 py-2 bg-blue-500 flex flex-col ">
                            <?php
                        } else {
                            ?>
                                <div class="bg-red-500 px-4 py-2 bg-blue-500 flex flex-col ">
                            <?php
                        }
                        ?>
                                <div class="w-full">
                                    <p><a href="/user/<?php echo $post["user"]->getId(); ?>"><?php echo $post["user"]->getUsername(); ?></a> :</p>
                                </div>
                                <div class="w-full">
                                    <p><?php echo $post["post"]->getContent(); ?></p>
                                </div>
                                <div class="w-full">
                                    <p><?php echo $post["post"]->getCreateAt(); ?></p>
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
<script src="./javascript/popup.js"></script>

<?php
$content = ob_get_clean();

require VIEWS . '/template.php';
