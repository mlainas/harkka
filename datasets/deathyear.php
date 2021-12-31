<?php
// Muodosta tietokantayhteys
    require_once('../db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
    // Lue death_year get-parametri muuttujaan
    $death_year = $_GET['death_year'];
    $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
    // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
    $sql = "SELECT DISTINCT `name_`, `death_year` 
    FROM names_
    LIMIT 15;";
    
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulosta otsikko
    $html = '<h1>Name and death year ' .  '</h1>';
    // Avaa ul-elementti
    $html .= '<ul>';
    // Looppaa tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['name_']  .  $row['death_year'] . '</li>';
       
    }
    $html .= '</ul>';
    echo $html;