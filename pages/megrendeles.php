<h1>Megrendelés</h1>
<?php
$userid = $_SESSION['user']['userid'];
$termekid = filter_input(INPUT_GET, "termekid");
$termek = $db->getKivalasztottTermek($termekid);
$feltetel = filter_input(INPUT_POST, "rendeles", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

if ($feltetel) {
    $termekid = filter_input(INPUT_POST, "termekid", FILTER_VALIDATE_INT);
    $userid = $_SESSION['user']['userid'];
    echo '<p>A rendelés megérkezett és feldolgozás alatt áll</p>';
    if ($db->setRendeles($termekid, $userid)) {
        
    } else {
        echo 'Sikertelen rögzítés';
    }
}



//-- INSERT INTO `rendeles` (`termekid`, `userid`) VALUES ('3', '1');
if (!$feltetel) {
    echo '<p>Valóban szeretné a(z) ' . $termek['marka'] . $termek['tipus'] . ' termékünket megrendelni? </p>';
    echo '<form method="post" action="">
    <input type="hidden" name="userid" value="' . $userid . '">
    <input type="hidden" name="termekid" value="' . $termekid . '">
    <button type="submit" class="btn btn-success" name="rendeles" value="1">Igen</button>   
    <a href="index.php" class="btn btn-danger">Mégse</a>
</form>';
} else {
    
}
        