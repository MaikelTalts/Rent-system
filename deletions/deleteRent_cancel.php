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
      $return_data['msg'] = 'Poisto onnistui 1';
      $return_data['msg2'] = 'Poisto onnistui 2';
      echo json_encode($return_data);
    } else {
        $return_data['msg'] = 'Poisto epäonnistui';
        $return_data['msg2'] = 'Poisto epäonnistui2.';
    }

?>
