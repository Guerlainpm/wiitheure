<?php
   ob_start();
?>
    <header>
        <h1>Home page</h1>
    </header>
    <main>

    </main>

    <footer>
        <p>Created by Quentin, Colin, Guerlain, TomB at EDEN School</p>
    </footer>

<?php
$content = ob_end_clean();

require VIEWS . '/template.php';
