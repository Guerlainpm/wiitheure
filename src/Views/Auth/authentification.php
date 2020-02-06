<?php 
   ob_start();
?>
<main class="h-screen flex flex-col justify-center">
    <div class="container mx-auto py-40 border border-black flex justify-around">

        <div class="p-4 border border-black">
            <form class="flex flex-col p-4 px-12 text-center" action="/login" method="post">
                <h2 class="mb-12">Se connecter</h2>
                <label class="mb-2" for="username">Nom d'utilisateur</label>
                <input class="mb-2 p-2 border border-black" id="login-username" type="text" name="login-username">
                <label class="mb-2" for="password">Mot de passe</label>
                <input class="mb-12 p-2 border border-black" id="login-password" type="password" name="login-password">
                <button class="p-2 border border-black" type="submit">Envoyer</button>
            </form>
        </div>

        <div class="p-4 border border-black">
            <form class="flex flex-col p-4 px-12 text-center" action="/register" method="post">
                <h2 class="mb-12">S'enregistrer</h2>
                <label class="mb-2" for="username">Nom d'utilisateur</label>
                <input class="mb-2 p-2 border border-black" id="register-username" type="text" name="register-username">
                <label class="mb-2" for="password">Mot de passe</label>
                <input class="mb-2 p-2 border border-black" id="register-password" type="password" name="register-password">
                <label class="mb-2" for="confirm-password">Confirmer le mot de passe</label>
                <input class="mb-12 p-2 border border-black" id="confirm-password" type="password">
                <button class="p-2 border border-black" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</main>
<?php 
$content = ob_get_clean();

require VIEWS . '/template.php';