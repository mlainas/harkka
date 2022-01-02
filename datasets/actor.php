<?php
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    // Lue jobs-parametri muuttujaan
    /* $jobs = $_GET['jobs']; */
    $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
    $sql = "SELECT  `name_`, `role_`, `profession`, `genre`
    FROM had_role INNER JOIN names_ ON had_role.name_id = names_.name_id INNER JOIN name_worked_as INNER JOIN title_genres
    LIMIT 10;";
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulosta otsikko
    $html = '<h1>Actor, role, profession and genre ' .  '</h1>';
    // Avaa ul-elementti
    $html .= '<ul>';
    // Looppaa tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['name_'] . $row['role_'] . $row['profession'] . $row['genre'] .'</li>';
        
    }
    $html .= '</ul>';
    echo $html;