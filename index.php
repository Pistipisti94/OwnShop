<?php
//-- a visszaküldendő fájl tartalmának a beállítása
header('Content-Type: text/html; charset=utf-8');
session_start(); //-- munkamenet adatinak tárolására $_SESSION[]
require_once './classes/Database.php';
$db = new Database("localhost", "root", "", "ownshop"); //-- Az adatbázis változó létrehozása

if (!isset($_SESSION['login'])){$_SESSION['login'] = false;}

require_once './layout/head.php';
$menu = filter_input(INPUT_GET, "menu");
?>
<body>

    <?php
    require_once './layout/menu.php';
    ?>
    <!--
        <ul>
        <li style="--i:6;" data-icon="&#xf015">
            <a href="./pages/home.php">Home</a>
        </li>
        <li style="--i:5;" data-icon="&#xf2bb">
            <a href="#">About</a>
        </li>
        <li style="--i:4;" data-icon="&#xf03a">
            <a href="#">Service</a>
        </li>
        <li style="--i:3;" data-icon="&#xf07c">
            <a href="#">Portfolio</a>
        </li>
        <li style="--i:2;" data-icon="&#xe533">
            <a href="#">Our Team</a>
        </li>
        <li style="--i:1;" data-icon="&#x40">
            <a href="#">Contact</a>
        </li>
    </ul>
    -->
    <?php
    require_once './tartalom.php';
    require_once './layout/footer.php';
    ?>
    <script src="./bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
