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

    //Tarkistetaan onko lainarivejä enemmän kuin yksi
    if (mysqli_num_rows($result) > 1) {
      $query = "DELETE FROM rentLine
                WHERE product = $productID AND rent = $rentID;";

      if (mysqli_query($mysqli, $query)) {
          $return_data = "Tuote poistettu lainasta";
      } else {
          $return_data = "Tuotteen poisto epäonnistui";
      }
    }
    // Jos lainarivejä on vain yksi poistetaan lainarivi, sekä koko laina
     else{
      $query = "DELETE FROM rentLine
                WHERE product = $productID AND rent = $rentID;";

      if (mysqli_query($mysqli, $query)) {
        $return_data = "Tuote poistettu lainasta";
        $query = "DELETE FROM rent
                  WHERE rentID = $rentID;";
        if (mysqli_query($mysqli, $query)) {
            $return_data = "Laina poistettu";
        } else{
            $return_data = "Lainan poisto epäonnistui";
        }
      } else{
          $return_data = "Tuotteen poisto epäonnistui";
      }
    }

 echo json_encode($return_data);

?>
