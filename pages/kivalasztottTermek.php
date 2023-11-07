<?php
//Módosítás
if (filter_input(INPUT_POST, "Adatmodositas", FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE)) {
    $adatok = $_POST;
    $termekid = filter_input(INPUT_POST, "termekid", FILTER_SANITIZE_NUMBER_INT);
    $termekfajta = htmlspecialchars(filter_input(INPUT_POST, "termekfajta"));
    $marka = filter_input(INPUT_POST, "marka");
    $tipus = filter_input(INPUT_POST, "tipusSelect");
    $megjelenes = filter_input(INPUT_POST, "megjelenes");
    $beerkezes = filter_input(INPUT_POST, "beerkezes");
    $megjegyzes = filter_input(INPUT_POST, "megjegyzes");
    if ($db->setKivalasztottTermek($termekfajta, $marka, $tipus, $megjelenes, $beerkezes, $megjegyzes,$termekid)) {
        echo '<p>Az adatok módosítása sikeres</p>';
        header("Location: index.php?menu=home");
    } else {
        echo '<p>Az adatok módosítása sikertelen!</p>';
    }
} else {
    $adatok=$db->getKivalasztottTermek($id);
}
if (filter_input(INPUT_POST, "Torles", FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE)) {
    $adatok = $_POST;
    $termekid = filter_input(INPUT_POST, "termekid", FILTER_SANITIZE_NUMBER_INT);
    $termekfajta = htmlspecialchars(filter_input(INPUT_POST, "termekfajta"));
    $marka = filter_input(INPUT_POST, "marka");
    $tipus = filter_input(INPUT_POST, "tipusSelect");
    $megjelenes = filter_input(INPUT_POST, "megjelenes");
    $beerkezes = filter_input(INPUT_POST, "beerkezes");
    $megjegyzes = filter_input(INPUT_POST, "megjegyzes");
    if ($db->setTermekTorles($termekid)) {
        echo '<p>Az adatok módosítása sikeres</p>';
        header("Location: index.php?menu=home");
    } else {
        echo '<p>Az adatok módosítása sikertelen!</p>';
    }
} else {
    $adatok=$db->getKivalasztottTermek($id);
}
?>
<form method="post" action="index.php?menu=home&id=<?php echo $adatok['termekid']; ?>" enctype="multipart/form-data">
    <input type="hidden" name="termekid" value="<?php echo $adatok['termekid']; ?>">
    <div class="mb-3">
        <label for="termekfajta" class="form-label">Termék típusa</label>
        <input type="text" class="form-control" name="termekfajta" id="termekfajta" value="<?php echo $adatok['termekfajta']; ?>">
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="marka" class="form-label">Márka</label>
            <select id="marka" name="marka" class="form-select">
                <?php
                foreach ($db->getMarkak() as $value) {
                    if ($adatok['marka'] == $value[0]) {
                        echo '<option selected value="' . $value[0] . '">' . $value[0] . '</option>';
                    } else {
                        echo '<option value="' . $value[0] . '">' . $value[0] . '</option>';
                    }
                }
                ?>

            </select>
        </div>
        <div class="mb-3 col-6">
            <label for="tipusSelect" class="form-label">Típus</label>
            <select id="tipusSelect" name="tipusSelect" class="form-select">
                <?php
                foreach ($db->getTipus() as $value) {
                    if ($adatok['tipus'] == $value[0]) {
                        echo '<option selected value="' . $value[0] . '">' . $value[0] . '</option>';
                    } else {
                        echo '<option value="' . $value[0] . '">' . $value[0] . '</option>';
                    }
                }
                ?>

            </select>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="megjelenes" class="form-label">Megjelenés éve</label>
            <input type="number" class="form-control" name="megjelenes" id="megjelenes" min="1970" max="<?php echo date("Y"); ?>" value="<?php echo $adatok['megjelenes']; ?>">
        </div>
        <div class="mb-3 col-6">
            <label for="beerkezes" class="form-label">Beérkezett</label>
            <input type="date" class="form-control" name="beerkezes" id="beerkezes" max="<?php echo date("Y-m-d"); ?>" value="<?php echo $adatok['beerkezes']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="megjegyzes" class="form-label">Megjegyzés</label>
            <input type="text" class="form-control" name="megjegyzes" id="megjegyzes" value="<?php echo $adatok['megjegyzes']; ?>">
        </div>

    </div>
<?php
        if ($_SESSION['login']) {
        echo '<button type="submit" class="btn btn-success" value="1" name="Adatmodositas">Módosítás</button>';
        echo '<a href="index.php?menu=megrendeles&termekid='.$adatok['termekid'].'"class="btn btn-primary">Megrendelem</a>';
        echo '<button type="submit" class="btn btn-danger" value="1" name="Torles">Törlés</button>';
    }
    
        ?>
</form>