<?php
   ob_start();
?>
<main class="h-screen bg-light flex flex-col justify-center">
    <div class="container mx-auto py-32 flex justify-center">

        <div class="p-4 bg-white border border-black">
            <form class="flex flex-col p-4 px-12 text-center" action="/login" method="post">
                <h2 class="mb-8">Se connecter</h2>
                <label class="mb-2" for="username">Nom d'utilisateur</label>
                <input class="mb-2 p-2   rounded border border-black" id="login-username" type="text" name="login-username" value="<?php echo getOld("login-username");?>">
                <p><?php echo getErrors("login-username"); ?></p>

                <label class="mb-2" for="mail">Mail</label>
                <input class="mb-2 p-2 rounded border border-black" id="login-mail" type="text" name="login-mail" value="<?php echo getOld("login-mail");?>">
                <?php echo getErrors("login-mail"); ?>

                <label class="mb-2" for="password">Mot de passe</label>
                <input class="mb-12 p-2 rounded border border-black" id="login-password" type="password" name="login-password" value="<?php echo getOld("login-password");?>">
                <?php echo getErrors("login-password"); ?>

                <button class="p-2 rounded border border-black" type="submit">Envoyer</button>
            </form>
        </div>

        <div class="p-4 bg-white border border-black ">
            <form class="flex flex-col p-4 px-12 text-center" action="/register" method="post">
                <h2 class="mb-8">S'enregistrer</h2>
                <label class="mb-2" for="username">Nom d'utilisateur</label>
                <input class="mb-2 p-2  rounded border border-black" id="register-username" type="text" name="register-username" value="<?php echo getOld("register-username");?>">
                <?php echo getErrors("register-username"); ?>

                <label class="mb-2" for="mail">Mail</label>
                <input class="mb-2 p-2  rounded border border-black" id="mail" type="text" name="register-mail" value="<?php echo getOld("register-mail");?>">
                <?php echo getErrors("register-mail"); ?>

                <label class="mb-2" for="password">Mot de passe</label>
                <input class="mb-2 p-2  rounded border border-black" id="password" type="password" name="password" value="<?php echo getOld("password");?>">
                <?php echo getErrors("password"); ?>

                <label class="mb-2" for="passwordConfirm">Confirmer le mot de passe</label>
                <input class="mb-12 p-2 rounded border border-black" id="passwordConfirm" type="password" name="passwordConfirm" value="<?php echo getOld("passwordConfirm");?>">
                <?php echo getErrors("passwordConfirm"); ?>

                <button class="p-2 rounded border border-black" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</main>
<?php
$content = ob_get_clean();
unset($_SESSION["errors"]);
unset($_SESSION["old"]);
require VIEWS . '/template.php';
