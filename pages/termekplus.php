<?php
if (filter_input(INPUT_POST, "Termekfeltoltes", FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE)) {
    $adatok = $_POST;
    var_dump($adatok);
    $termekid = filter_input(INPUT_POST, "termekid", FILTER_SANITIZE_NUMBER_INT);
    $termekfajta = htmlspecialchars(filter_input(INPUT_POST, "termekfajta"));
    $marka = filter_input(INPUT_POST, "marka");
    $tipus = filter_input(INPUT_POST, "tipus");
    $megjelenes = filter_input(INPUT_POST, "megjelenes");
    $beerkezes = filter_input(INPUT_POST, "beerkezes");
    $megjegyzes = filter_input(INPUT_POST, "megjegyzes");
    $from = null;
    $to = null;
    
    //$termekfajta, $marka, $tipus, $megjelenes, $beerkezes, $megjegyzes
if ($db->setFeltoltes($termekfajta, $marka, $tipus, $megjelenes, $beerkezes, $megjegyzes)) {
        echo '<p>Az adatok módosítása sikeres</p>';
        header("Location: index.php?menu=home");
    } else {
        echo '<p>Az adatok módosítása sikertelen!</p>';
    }    
}else {
    //$adatok = $db->getFeltoltes($id);
    $adatok["termekid"] = "";
    $adatok["termekfajta"] = "";
    $adatok["marka"] = "";
    $adatok["tipus"] = "";
    $adatok["megjelenes"] = "";
    $adatok["beerkezes"] = "";
    $adatok["megjegyzes"] = "";
}
?>
<h1>Plus</h1>

<form method="post" action="index.php?menu=plus" enctype="multipart/form-data">
    <input type="hidden" name="termekid" value="">
    <div class="mb-3">
        <label for="termekfajta" class="form-label">Termék típusa</label>
        <input type="text" class="form-control" name="termekfajta" id="termekfajta" value="" placeholder="Telefon" required="">
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="marka" class="form-label">Márka</label>
            <input type="text" class="form-control" name="marka" id="marka" value="Samsung" required="">
        </div>
        <div class="mb-3 col-6">
            <label for="tipus" class="form-label">Típus</label>
            <input type="text" class="form-control" name="tipus" id="tipus" value="" placeholder="Galaxy Z Flip5" required="">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="megjelenes" class="form-label">Megjelenés éve</label>
            <input type="number" class="form-control" name="megjelenes" id="megjelenes" min="1970" max="<?php echo date("Y"); ?>" value="" placeholder="2020" required="">
        </div>
        <div class="mb-3 col-6">
            <label for="beerkezes" class="form-label">Beérkezett</label>
            <input type="date" class="form-control" name="beerkezes" id="beerkezes" max="<?php echo date("Y-m-d"); ?>" value="" placeholder="2020-10-10" required="">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="megjegyzes" class="form-label">Megjegyzés</label>
            <input type="text" class="form-control" name="megjegyzes" id="megjegyzes" value="">
        </div>

    </div>
  

    </div>
    <button type="submit" class="btn btn-success" value="1" name="Termekfeltoltes">Feltöltés</button>
</form>