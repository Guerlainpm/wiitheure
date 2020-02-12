<?php
   ob_start();
?>
<div class="flex justify-center">

    <div class="p-10 px-40 border-r-2 border-dark">
        <form class="h-full flex flex-col justify-between" action="/login" method="post">
            <div class=" flex flex-col ">
            <h2 class="mb-6 xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl text-center">Se connecter</h2>
            <label class="mb-2 xl:text-base lg:text-base md:text-sm sm:text-sm" for="username">Nom
                    d'utilisateur</label>
                <input class="mb-2 w-64 h-12 p-4 rounded border border-black" id="login-username" type="text"
                    name="login-username" value="<?php echo getOld("login-username");?>">
                <p class="text-red-500"><?php echo getErrors("login-username"); ?></p>

                <label class="mb-2 xl:text-base lg:text-base md:text-sm sm:text-sm" for="mail">Mail</label>
                <input class="mb-2 w-64 h-12 p-4 rounded border border-black" id="login-mail" type="text"
                    name="login-mail" value="<?php echo getOld("login-mail");?>">
                <p class="text-red-500"><?php echo getErrors("login-mail"); ?></p>

                <label class="mb-2 xl:text-base lg:text-base md:text-sm sm:text-sm" for="password">Mot de
                    passe</label>
                <input class="w-64 h-12 p-4 rounded border border-black" id="login-password" type="password"
                    name="login-password" value="<?php echo getOld("login-password");?>">
                <p class="text-red-500"><?php echo getErrors("login-password"); ?></p>


            </div>
            <button class="w-64 h-12 rounded border border-black" type="submit">Envoyer</button>
        </form>
    </div>

    <div class="p-10 px-40">
        <form class="h-full flex flex-col justify-between" action="/register" method="post">
            <div class=" flex flex-col ">
                <h2 class="mb-6 xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl text-center">S'enregistrer</h2>
                <label class="mb-2 xl:text-base lg:text-base md:text-sm sm:text-sm" for="username">Nom
                d'utilisateur</label>
                <input class="mb-2 w-64 h-12 p-4 rounded border border-black" id="register-username" type="text"
                    name="register-username" value="<?php echo getOld("register-username");?>">
                <p class="text-red-500"><?php echo getErrors("register-username"); ?></p>

                <label class="mb-2 xl:text-base lg:text-base md:text-sm sm:text-sm" for="mail">Mail</label>
                <input class="mb-2w -64 h-12 p-4 rounded border border-black" id="mail" type="text"
                    name="register-mail" value="<?php echo getOld("register-mail");?>">
                <p class="text-red-500"><?php echo getErrors("register-mail"); ?></p>

                <label class="mb-2 xl:text-base lg:text-base md:text-sm sm:text-sm" for="password">Mot de
                    passe</label>
                <input class="mb-2 w-64 h-12 p-4 rounded border border-black" id="password" type="password"
                    name="password" value="<?php echo getOld("password");?>">
                <p class="text-red-500"><?php echo getErrors("password"); ?></p>

                <label class="mb-2 xl:text-base lg:text-base md:text-sm sm:text-sm" for="passwordConfirm">Confirmer
                    le
                    mot de passe</label>
                <input class="w-64 h-12 p-4 rounded border border-black" id="passwordConfirm" type="password"
                    name="passwordConfirm" value="<?php echo getOld("passwordConfirm");?>">
                <p class="mb-12 text-red-500"><?php echo getErrors("passwordConfirm"); ?></p>
            </div>
            <button class="w-64 h-12 rounded border border-black" type="submit">Envoyer</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';