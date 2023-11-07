<h1>Megrendelés</h1>
<?php
$userid = $_SESSION['user']['userid'];
$termekid = filter_input(INPUT_GET, "termekid");
$termek = $db->getKivalasztottTermek($termekid);
if (filter_input(INPUT_POST, "rendeles", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $termekid = filter_input(INPUT_POST, "termekid", FILTER_VALIDATE_INT);
    $userid = $_SESSION['user']['userid'];
    if ($db->setRendeles($termekid, $userid)) {
        echo '<p>A rendelés megérkezett és feldolgozás alatt áll</p>';
    } else {
        echo 'Sikertelen rögzítés';
    }
}
echo '<p>Valóban szeretné a(z) ' . $termek['marka'] . $termek['tipus']. ' termékünket megrendelni? </p>';
//-- INSERT INTO `rendeles` (`termekid`, `userid`) VALUES ('3', '1');
?>
<form method="post" action="">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['userid']; ?>">
    <input type="hidden" name="termekid" value="<?php echo $termekid; ?>">
    <button type="submit" class="btn btn-success" name="rendeles" value="1">Igen</button>   
    <a href="index.php" class="btn btn-danger">Mégse</a>
</form>