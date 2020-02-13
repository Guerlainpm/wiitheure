<?php
   ob_start();
   $posts = $data["posts"];
   $subs = $data["sub"];
 include VIEWS."/components/popup.php";
  ?>
<script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script><script src="https://kit.fontawesome.com/24b7d06377.js" crossorigin="anonymous"></script>
<div class="container mx-auto flex flex-wrap">
    <div class="md:w-1/6">
        <div class="mt-4 flex flex-wrap w-full md:flex flex-col">
            <a class='text-lg text-blue-500 md:w-full md:border-b md:border-b border-r md:border-r-0 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white hover:border-white       ' href="/"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-home"></i> <div class="font-bold hidden md:flex">Accueil</div> </button></a>
            <a class="text-lg text-blue-500 md:w-full md:border-b md:border-b border-r md:border-r-0 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white hover:border-white       " href="/profile/<?php echo $_SESSION['user']->getId(); ?>"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-user"></i> <div class="font-bold hidden md:flex">Account</div></button> </a>
            <a class="text-lg text-blue-500 md:w-full md:border-b md:border-b border-r md:border-r-0 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white hover:border-white       " href="/news"><button class="px-4 w-full flex justify-between items-center"> <i class="fas fa-hashtag"></i><div class="font-bold hidden md:flex">News</div></button> </a>
            <div id="create" class="text-lg text-blue-500 md:w-full md:border-b border-r md:border-r-0 border-blue-600 py-1 px-2 transition duration-500 hover:bg-blue-600 hover:text-white hover:border-white     "><button class="px-4 w-full flex justify-between items-center" ><i class="fas fa-plus-circle"></i><div class="font-bold hidden md:flex"> Wiiter</div></button></div>
        </div>
    </div>
    <div class="w-64 md:w-3/6 h-5 px-2">
        <div class="w-full mt-4 px-2">
            <div class="w-full">
                <div class="w-full border-b border-blue-600 font-bold	text-lg">Acceuil</div>
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
                                <div class="w-full flex justify-between">
                                    <p><a href="/profile/<?php echo $post["user"]->getId(); ?>"><?php echo $post["user"]->getUsername(); ?></a> :</p>
                                    <form action="/follow" method="post">
                                        <input type="hidden" name="followed" value="<?php echo $post["user"]->getId(); ?>"/>
                                        <button type="submit">follow</button>
                                    </form>
                                </div>
                                <div class="w-full">
                                    <p><a href="/post/<?php echo $post["post"]->getId(); ?>"><?php echo $post["post"]->getContent(); ?></a></p>
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

                <ul id="popular">

                </ul>
            </div>
            <div class="w-1/2 p-2">

                <ul>
                    <?php
                        if (isset($_SESSION["user"])) {
                            foreach ($subs as $key => $value) {
                                ?>
                                    <li class="flex justify-between w-full"><p><?php echo $value->getUsername(); ?></p>
                                        <form action="/unfollow" method="post">
                                            <input type="hidden" name="followed" value="<?php echo $value->getId(); ?>"/>
                                            <button type="submit">unfollow</button>
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
