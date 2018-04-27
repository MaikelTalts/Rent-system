<?php
    /*  deleteRent_cancel.php [KÄYNNISTETÄÄN] sivulta:
        /js/main.js
    */

    //Noudetaan server.php tiedosto
    include '../server.php';

    //Tallennetaan vastaanotettu lainaID muuttujaan
    $rentID = $_POST['rentID'];

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM rentLine
              WHERE rent = $rentID;";

    //Poistetaan tietokannasta kaikki rentLine taulussa olevat rivit joissa lainaID on sama kuin vastaanotetulla.
    if (mysqli_query($mysqli, $query)) {
        //Do nothing
    } else {
        //Do nothing
    }

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM rent
              WHERE rentID = $rentID;";

    //Poistetaan laina tietokannasta samalla tarkistaen onnistuminen
    if (mysqli_query($mysqli, $query)) {
        $return_data = "Laina peruutettu!";
    } else {
        $return_data = "Lainan peruutus epäonnistui!";
    }
    echo json_encode($return_data);
?>
