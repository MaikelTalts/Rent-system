<?php
/*  updateProgramLine.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

//Noudetaan server.php tiedosto
include '../server.php';

  $programID = $_POST['programID'];
  $productID = $_POST['productID'];

  $query = "SELECT *
            FROM programLine
            WHERE productID = $productID AND programID = $programID;";
  $result = mysqli_query($mysqli, $query);

  if(mysqli_num_rows($result) >0 ){
    $query = "DELETE FROM programLine
              WHERE productID = $productID AND programID = $programID;";

              if (mysqli_query($mysqli, $query)) {
                $return_data['response'] = 'Poistettu';
              } else {
                $return_data['response'] = 'Poisto epäonnistui';
              }
  }
  else{
    $query = "INSERT INTO programLine (productID, programID)
              VALUES ($productID, $programID);";

    if (mysqli_query($mysqli, $query)) {
        $return_data['response'] = 'Lisätty';
    } else {
        $return_data['response'] = 'Lisäys epäonnistui';
    }

  }
  echo json_encode($return_data);
 ?>
