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
      $return_data['msg'] = 'Poisto onnistui 1';
      $return_data['msg2'] = 'Poisto onnistui 2';
      echo json_encode($return_data);
    } else {
        $return_data['msg'] = 'Poisto epäonnistui';
        $return_data['msg2'] = 'Poisto epäonnistui2.';
    }

?>
