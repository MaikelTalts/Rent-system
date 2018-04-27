<?php
    /*  deleteCustomer.php [KÄYNNISTETÄÄN] sivulta:
        /js/main.js
    */

    //Noudetaan server.php tiedosto
    include '../server.php';

      //Tallennetaan vastaanotettu asiakasID muuttujaan
    $customerID = $_POST['customerID'];

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM customer
              WHERE customerID = $customerID;";

    //Poistetaan asiakas / lainaaja tietokannasta samalla tarkistaen onnistuminen.
    if (mysqli_query($mysqli, $query)) {
      $return_data = "Lainaaja poistettu!";

    } else {
        $return_data = "Lainaajan poisto epäonnistui!";
    }
    echo json_encode($return_data);
?>
