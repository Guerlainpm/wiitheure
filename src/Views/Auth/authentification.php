<?php
   ob_start();
?>
<div class="sm:flex flex-grow justify-center">

    <div class="flex p-6 xl:px-32 lg:px-20 md:px-4 sm:border-r-2 border-dark pr-13">
        <div class="xl:mt-28 lg:mt-24 md:mt-24 mt-20">
            <p class="xl:mb-18 lg:mb-20 md:mb-16 mb-8 pr-8 text-red-500"><?php echo getErrors("login-username"); ?></p>
            <p class="xl:mb-16 lg:mb-16 md:mb-16 mb-12 pr-8 text-red-500"><?php echo getErrors("login-mail"); ?></p>
            <p class="pr-8 text-red-500"><?php echo getErrors("login-password"); ?></p>
        </div>
        <form class="h-full flex flex-col justify-between mx-auto" action="/login" method="post">
            <div class=" flex flex-col ">
                <h2 class=" mb-4 xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl text-center">Se connecter</h2>
                <label class=" mb-2 lg:w-64 md:w-48 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="username">Nom
                    d'utilisateur</label>
                <input class="mb-2 lg:w-64 md:w-48 h-12 p-4 rounded-lg " id="login-username" type="text" name="login-username"
                    value="<?php echo getOld("login-username");?>">

                <label class=" mb-2 lg:w-64 md:w-48 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="mail">Mail</label>
                <input class="mb-2 lg:w-64 md:w-48 h-12 p-4 rounded-lg" id="login-mail" type="text" name="login-mail"
                    value="<?php echo getOld("login-mail");?>">

                <label class=" mb-2 lg:w-64 border-b-2 md:w-48 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="password">Mot de
                    passe</label>
                <input class="mb-2 lg:w-64 h-12 p-4 md:w-48 rounded-lg " id="login-password" type="password" name="login-password"
                    value="<?php echo getOld("login-password");?>">


            </div>
            <button class=" lg:w-64 h-12 md:w-48 rounded-lg border border-black" type="submit">Envoyer</button>
        </form>
    </div>

    <div class="flex p-6 xl:px-32 lg:px-20 md:px-4 pl-13">
        <form class="h-full flex flex-col justify-between md:items-end mx-auto" action="/register" method="post">
            <div class=" flex flex-col ">
                <h2 class=" mb-4 xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl text-center">S'enregistrer</h2>
                <label class="lg:w-64 mb-2 md:w-48 border-b-2 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="username">Nom
                    d'utilisateur</label>
                <input class="mb-2 lg:w-64 md:w-48 h-12 p-4 rounded-lg " id="register-username" type="text"
                    name="register-username" value="<?php echo getOld("register-username");?>">
    
                <label class="lg:w-64 mb-2 border-b-2 md:w-48 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="mail">Mail</label>
                <input class="mb-2 lg:w-64 h-12 p-4 md:w-48 rounded-lg " id="mail" type="text" name="register-mail"
                    value="<?php echo getOld("register-mail");?>">


                <label class="lg:w-64 mb-2 border-b-2 md:w-48 border-dark xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="password">Mot de
                    passe</label>
                <input class="mb-2 lg:w-64 h-12 p-4 md:w-48 rounded-lg " id="password" type="password" name="password"
                    value="<?php echo getOld("password");?>">
            
                <label class="lg:w-64 mb-2 border-b-2 border-dark md:w-48 xl:text-base lg:text-base md:text-sm sm:text-sm"
                    for="passwordConfirm">Confirmer
                    le
                    mot de passe</label>
                <input class="mb-2 lg:w-64 h-12 p-4 rounded-lg md:w-48 " id="passwordConfirm" type="password"
                    name="passwordConfirm" value="<?php echo getOld("passwordConfirm");?>">
            </div>
            <button class=" lg:w-64 h-12 md:w-48 rounded-lg border border-black" type="submit">Envoyer</button>
        </form>

        <div>
        <p class="xl:mt-28 lg:mt-24 md:mt-24 xl:mb-18 lg:mb-20 md:mb-16 mt-20 mb-8 pl-8 text-red-500"><?php echo getErrors("register-username"); ?></p>
        <p class="xl:mb-16 lg:mb-16 md:mb-16 mb-12 pl-8 text-red-500"><?php echo getErrors("register-mail"); ?></p>
        <p class="xl:mb-16 lg:mb-16 md:mb-16 mb-12 pl-8 text-red-500"><?php echo getErrors("password"); ?></p>
        <p class="pl-8 text-red-500"><?php echo getErrors("passwordConfirm"); ?></p>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';