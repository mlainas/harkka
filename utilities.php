<?php
    // Funktio joka luo genre-pudotusvalikon
    function createGenreDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = 'SELECT DISTINCT genre FROM title_genres;';
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="genre">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['genre'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    // Funktio joka luo region-pudotusvalikon
    function createRegionDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = "SELECT DISTINCT region FROM aliases;";
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="region">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['region'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

     // Funktio joka luo deathyear-pudotusvalikon
     function createDeathYearDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = "SELECT DISTINCT `death_year` FROM names_";
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="death_year">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['death_year'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    // Funktio joka luo jobs-pudotusvalikon
    function createJobsDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = "SELECT `name_`, `job_category`, job FROM `principals` INNER JOIN names_
        ON principals.name_id = names_.name_id
        LIMIT 15;";
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="jobs">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['jobs'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }