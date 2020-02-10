<?php
   ob_start();
?>
<main class="flex flex-col justify-center">
    <div class="container mx-auto m-12 flex justify-center">

        <div class="border-r-2">
            <form class="flex flex-col p-4 px-12" action="/login" method="post">
                <h2 class="mb-8 xl:text-4xl lg:text-3xl md:text-2xl sm:text-xl">Se connecter</h2>
                <label class="mb-2 xl:text-lg lg:text-base md:text-base sm:text-sm" for="username">Nom d'utilisateur</label>
                <input class="mb-2 p-2 rounded border border-black" id="login-username" type="text" name="login-username">

                <label class="mb-2 xl:text-lg lg:text-base md:text-base sm:text-sm" for="password">Mot de passe</label>
                <input class="mb-12 p-2 rounded border border-black" id="login-password" type="password" name="login-password">
                <button class="p-2 rounded border border-black xl:text-lg lg:text-base md:text-base sm:text-sm" type="submit">Envoyer</button>
            </form>
        </div>

        <div class="">
            <form class="flex flex-col p-4 px-12" action="/register" method="post">
                <h2 class="mb-8 xl:text-4xl lg:text-3xl  md:text-2xl sm:text-xl">S'enregistrer</h2>
                    <label class="mb-2 xl:text-lg lg:text-base md:text-base sm:text-sm" for="username">Nom d'utilisateur</label>
                    <input class="mb-2 p-2 rounded border border-black" id="register-username" type="text" name="register-username">

                    <label class="mb-2 xl:text-lg lg:text-base md:text-base sm:text-sm" for="mail">Mail</label>
                    <input class="mb-2 p-2 rounded border border-black" id="mail" type="text" name="register-mail">

                    <label class="mb-2 xl:text-lg lg:text-base md:text-base sm:text-sm" for="password">Mot de passe</label>
                    <input class="mb-2 p-2 rounded border border-black" id="password" type="password" name="password">

                    <label class="mb-2 xl:text-lg lg:text-base md:text-base sm:text-sm" for="passwordConfirm">Confirmer le mot de passe</label>
                    <input class="mb-12 p-2 rounded border border-black" id="passwordConfirm" type="password" name="passwordConfirm">
                <button class="p-2 rounded border border-black xl:text-lg lg:text-base md:text-base sm:text-sm" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</main>
<?php
$content = ob_get_clean();

require VIEWS . '/template.php';
