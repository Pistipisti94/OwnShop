<?php

class Database {

    private $db = null;
    public $error = false;

    public function __construct($host, $username, $pass, $db) {
        try {
            $this->db = new mysqli($host, $username, $pass, $db);
            $this->db->set_charset("utf8");
        } catch (Exception $exc) {
            $this->error = true;
            echo '<p>Az adatbázis nem elérhető!</p>';
            exit();
        }
    }

    public function login($name, $pass) {
        //-- jelezzük a végrehajtandó SQL parancsot
        $stmt = $this->db->prepare('SELECT * FROM users WHERE users.username LIKE ?;');
        //-- elküldjük a végrehajtáshoz szükséges adatokat
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            //-- sikeres végrehajtás után lekérjük az adatokat
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($pass == $row['password']) {
                //-- felhasználónév és jelszó helyes
                $_SESSION['user'] = $row;
                $_SESSION['login'] = true;
            } else {
                $_SESSION['username'] = '';
                $_SESSION['login'] = false;
            }
            // Free result set
            $result->free_result();
            header("Location:index.php");
        }
        return false;
    }

    public function register($username, $password, $emailcim, $teljes_nev, $igazolvanyszam) {
        //$password = password_hash($pass, PASSWORD_ARGON2I);
        $stmt = $this->db->prepare("INSERT INTO `users` (`userid`, `username`, `password`, `email`, `teljesnev`, `igazolvanyszam`) VALUES (NULL,?,?,?,?,?)");
        $stmt->bind_param("sssss", $username, $password, $emailcim, $teljes_nev, $igazolvanyszam);
        try {
            if ($stmt->execute()) {
                //echo $stmt->affected_rows();
                header("Location:index.php");
                //header("Location: index.php");
            } else {
                $_SESSION['login'] = false;
                echo '<p>Rögzítés sikertelen!</p>';
            }
        } catch (Exception $exc) {
            $this->error = true;
        }
    }

    public function osszesTermek() {
        $result = $this->db->query("SELECT * FROM `termekek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getKivalasztottTermek($id) {
        $result = $this->db->query("SELECT * FROM `termekek` WHERE termekid=" . $id);
        return $result->fetch_assoc();
    }

    public function setKivalasztottTermek($termekfajta, $marka, $tipus, $megjelenes, $beerkezes, $megjegyzes, $termekid) {
        $stmt = $this->db->prepare("UPDATE `termekek` SET `termekfajta`= ?,`marka`= ?,`tipus`= ?,`megjelenes`= ?,`beerkezes`= ?,`megjegyzes`= ? WHERE termekid= ?");
        $stmt->bind_param('ssssssi', $termekfajta, $marka, $tipus, $megjelenes, $beerkezes, $megjegyzes, $termekid);
        return $stmt->execute();
    }

    public function getMarkak() {
        $result = $this->db->query("SELECT DISTINCT `marka` FROM `termekek`;");
        return $result->fetch_all();
    }

    public function getTipus() {
        $result = $this->db->query("SELECT DISTINCT `tipus` FROM `termekek`;");
        return $result->fetch_all();
    }

    public function setRendeles($termekid, $userid) {
        $stmt = $this->db->prepare("INSERT INTO `rendeles` (`termekid`, `userid`) VALUES (?,? );");
        $stmt->bind_param("ii", $termekid, $userid);
        return $stmt->execute();
    }

    public function setFeltoltes($termekfajta, $marka, $tipus, $megjelenes, $beerkezes, $megjegyzes) {
        $stmt = $this->db->prepare("Insert into `termekek`(`termekfajta`, `marka`, `tipus`, `megjelenes`, `beerkezes`, `megjegyzes`) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bind_param('ssssss', $termekfajta, $marka, $tipus, $megjelenes, $beerkezes, $megjegyzes);
        $request = $stmt->execute();
        if ($request) {
            return true;
        } else {
            return false;
        }
    }

    public function getFeltoltes($id) {
        $result = $this->db->query("SELECT * FROM `termekek` WHERE termekid=" . $id);
        return $result->fetch_assoc();
    }

    public function setTermekTorles($termekid) {
        $stmt = $this->db->prepare("DELETE FROM `termekek` WHERE `termekek`.`termekid` = ?;");
        $stmt->bind_param('i', $termekid);
        $request = $stmt->execute();
        if ($request) {
            return true;
        } else {
            return false;
        }
    }

    public function getTermekTorles($id) {
        $result = $this->db->query("SELECT * FROM `termekek` WHERE termekid=" . $id);
        return $result->fetch_assoc();
    }

    public function rendelesAlatt($id) {
        $result = $this->db->query("SELECT * FROM termekek NATURAL JOIN rendeles WHERE termekek.termekid = " . $id);
        return $result->fetch_assoc();
    }
}
