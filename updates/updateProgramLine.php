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
                $return_data = 'Ohjelma poistettu';
              } else {
                $return_data = 'Ohjelman poisto epäonnistui';
              }
  }
  else{
    $query = "INSERT INTO programLine (productID, programID)
              VALUES ($productID, $programID);";

    if (mysqli_query($mysqli, $query)) {
        $return_data = 'Ohjelma lisätty';
    } else {
        $return_data = 'Ohjelman lisäys epäonnistui';
    }

  }
  echo json_encode($return_data);
 ?>
