<?php
    /*  deleteProduct.php [KÄYNNISTETÄÄN] sivulta:
        /js/main.js
    */

    //Noudetaan server.php tiedosto
    include '../server.php';

    //Tallennetaan vastaanotettu tuoteID muuttujaan
    $productID = $_POST['productID'];

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM accessoryLine
              WHERE product = $productID;";

    //Poistetaan tietokannasta kaikki accessoryLine taulussa olevat rivit joissa poistettavan tuotteen ID esiintyy viiteavaimena.
    if (mysqli_query($mysqli, $query)) {
        //Do nothing
    } else {
        //Do nothing
    }

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM product
              WHERE productID = $productID;";

    //Poistetaan tuote tietokannasta samalla tarkistaen onnistuminen
    if (mysqli_query($mysqli, $query)) {
      $return_data['msg'] = 'Poisto onnistui 1';
      $return_data['msg2'] = 'Poisto onnistui 2';
      echo json_encode($return_data);
    } else {
        $return_data['msg'] = 'Poisto epäonnistui';
        $return_data['msg2'] = 'Poisto epäonnistui2.';
    }

?>
