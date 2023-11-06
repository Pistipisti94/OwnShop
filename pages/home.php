<div class="row">
    <?php
    foreach ($db->osszesTermek() as $row) {
        $image = null;
        if (file_exists("./imgs/telefonok/" . $row['tipus'] . ".jpg")) {
            $image = "./imgs/telefonok/" . $row['tipus'] . ".jpg";
        } else if (file_exists("./imgs/telefonok/" . $row['tipus'] . ".jpeg")) {
            $image = "./imgs/telefonok/" . $row['tipus'] . ".jpeg";
        } else if (file_exists("./imgs/telefonok/" . $row['tipus'] . ".png")) {
            $image = "./imgs/telefonok/" . $row['tipus'] . ".png";
        } else {
            $image = "./imgs/noimage.jpg";
        }
        $card = '<div class="card" style="width: 18rem;">
                    <img src="'.$image.'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['termekfajta'] . '</h5>' .
                '<p class="card-text">Márka: ' . $row['marka'] . '</p>' .
                '<p class="card-text">Típusa: ' . $row['tipus'] . '</p>' .
                '<p class="card-text">Megjelenés: ' . $row['megjelenes'] . '</p>' .
                '<p class="card-text"> Megjegyzés: ' . $row['megjegyzes'] . '</p>' .
                '<a href="index.php?menu=home&id=' . $row['termekid'] . '" class="btn btn-primary">Kiválaszt</a>
                    </div>
                </div>
            ';
        echo $card;
    }
    if ($_SESSION['login']) {
        echo '<a href="index.php?menu=plus" class="btn btn-info">+</a>';
    }
    ?>
     
    
</div>