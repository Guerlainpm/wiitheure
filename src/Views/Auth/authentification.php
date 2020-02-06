<?php 
   ob_start();
?>
    <header>
        <h1>Login And Register</h1>
    </header>
    <main>
        <div>
            <form action="/login" method="post">
                <label for="username">Username</label>
                <input id="username" type="text">
                <label for="password">Password</label>
                <input id="password" type="password">
                <button type="submit">Submit</button>
            </form>
        </div>

        <div>
            <form action="/register" method="post">
                <label for="username">Username</label>
                <input id="username" type="text" name="username">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
                <label for="confirm-password">Password</label>
                <input id="confirm-password" type="password">
                <button type="submit">Submit</button>
            </form>
        </div>
    </main>

    <footer>
        <p>Created by Quentin, Colin, Guerlain, TomB at EDEN School</p>
    </footer>

<?php 
$content = ob_get_clean();

require VIEWS . '/template.php';