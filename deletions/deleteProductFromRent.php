<?php
    /*  deleteProductFromRent.php [KÄYNNISTETÄÄN] sivulta:
        /js/main.js
    */

    //Noudetaan server.php tiedosto
    include '../server.php';

      //Tallennetaan vastaanotettu asiakasID muuttujaan
    $productID = $_POST['productID'];
    $rentID = $_POST['rentID'];

    $query = "SELECT * FROM rentLine
              WHERE rent = $rentID;";

    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {

      if (mysqli_num_rows($result) > 1) {
        //Valmistellaan SQL komento muuttujaan
        $query = "DELETE FROM rentLine
                  WHERE product = $productID AND rent = $rentID;";

        //Poistetaan asiakas / lainaaja tietokannasta samalla tarkistaen onnistuminen.
        if (mysqli_query($mysqli, $query)) {
          $return_data['msg'] = 'Poisto onnistui 1';
          $return_data['msg2'] = 'Poisto onnistui 2';
        } else {
            $return_data['msg'] = 'Poisto epäonnistui';
            $return_data['msg2'] = 'Poisto epäonnistui2.';
        }
      }
      if (mysqli_num_rows($result) == 1) {
        //Valmistellaan SQL komento muuttujaan
        $query = "DELETE FROM rentLine
                  WHERE product = $productID AND rent = $rentID;";

        //Poistetaan asiakas / lainaaja tietokannasta samalla tarkistaen onnistuminen.
        if (mysqli_query($mysqli, $query)) {

          $query = "DELETE FROM rent
                    WHERE rentID = $rentID;";

          if (mysqli_query($mysqli, $query)) {
              $return_data['msg'] = 'Poisto onnistui 1';
              $return_data['msg2'] = 'Poisto onnistui 2';
          } else {
              $return_data['msg'] = 'Poisto epäonnistui';
              $return_data['msg2'] = 'Poisto epäonnistui2.';
          }

        } else {
            $return_data['msg'] = 'Poisto epäonnistui';
            $return_data['msg2'] = 'Poisto epäonnistui2.';
        }
      }
    }
    else{
      $return_data['msg'] = 'Poisto epäonnistui';
      $return_data['msg2'] = 'Poisto epäonnistui2.';
    }

 echo json_encode($return_data);

?>
