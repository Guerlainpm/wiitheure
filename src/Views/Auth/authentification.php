<?php
   ob_start();
?>
<div class="flex flex-grow justify-center">

    <div class="flex p-6 px-32 border-r-2 border-dark">
        <div class="mt-28">
            <p class="mb-18 pr-8 text-red-500"><?php echo getErrors("login-username"); ?></p>
            <p class="mb-16 pr-8 text-red-500"><?php echo getErrors("login-mail"); ?></p>
            <p class="pr-8 text-red-500"><?php echo getErrors("login-password"); ?></p>
        </div>
        <form class="h-full flex flex-col justify-between" action="/login" method="post">
            <div class=" flex flex-col ">
                <h2 class=" mb-4 xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl text-center">Se connecter</h2>
                <label class=" mb-2 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="username">Nom
                    d'utilisateur</label>
                <input class="mb-2 w-64 h-12 p-4 rounded-lg " id="login-username" type="text" name="login-username"
                    value="<?php echo getOld("login-username");?>">

                <label class=" mb-2 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="mail">Mail</label>
                <input class="mb-2 w-64 h-12 p-4 rounded-lg" id="login-mail" type="text" name="login-mail"
                    value="<?php echo getOld("login-mail");?>">

                <label class=" mb-2 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="password">Mot de
                    passe</label>
                <input class="mb-2 w-64 h-12 p-4 rounded-lg " id="login-password" type="password" name="login-password"
                    value="<?php echo getOld("login-password");?>">


            </div>
            <button class=" w-64 h-12 rounded-lg border border-black" type="submit">Envoyer</button>
        </form>
    </div>

    <div class="flex p-6 px-32">
        <form class="h-full flex flex-col justify-between" action="/register" method="post">
            <div class=" flex flex-col ">
                <h2 class=" mb-4 xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl text-center">S'enregistrer</h2>
                <label class=" mb-2 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="username">Nom
                    d'utilisateur</label>
                <input class="mb-2 w-64 h-12 p-4 rounded-lg " id="register-username" type="text"
                    name="register-username" value="<?php echo getOld("register-username");?>">
    
                <label class=" mb-2 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="mail">Mail</label>
                <input class="mb-2 w-64 h-12 p-4 rounded-lg " id="mail" type="text" name="register-mail"
                    value="<?php echo getOld("register-mail");?>">


                <label class=" mb-2 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="password">Mot de
                    passe</label>
                <input class="mb-2 w-64 h-12 p-4 rounded-lg " id="password" type="password" name="password"
                    value="<?php echo getOld("password");?>">
            
                <label class=" mb-2 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="passwordConfirm">Confirmer
                    le
                    mot de passe</label>
                <input class="mb-2 w-64 h-12 p-4 rounded-lg " id="passwordConfirm" type="password"
                    name="passwordConfirm" value="<?php echo getOld("passwordConfirm");?>">
            </div>
            <button class=" w-64 h-12 rounded-lg border border-black" type="submit">Envoyer</button>
        </form>

        <div>
        <p class="mt-28 mb-18 pl-8 text-red-500"><?php echo getErrors("register-username"); ?></p>
        <p class="mb-16 pl-8 text-red-500"><?php echo getErrors("register-mail"); ?></p>
        <p class="mb-16 pl-8 text-red-500"><?php echo getErrors("password"); ?></p>
        <p class="pl-8 text-red-500"><?php echo getErrors("passwordConfirm"); ?></p>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';