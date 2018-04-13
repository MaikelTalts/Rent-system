<?php

include '../server.php';

  $accessoryID = $_POST['accessoryID'];
  $productID = $_POST['productID'];

  $query = "SELECT *
            FROM accessoryLine
            WHERE accessory = $accessoryID AND product = $productID;";
  $result = mysqli_query($mysqli, $query);

  if(mysqli_num_rows($result) >0 ){
    $query = "DELETE FROM accessoryLine
              WHERE accessory = $accessoryID AND product = $productID;";

              if (mysqli_query($mysqli, $query)) {
                $return_data['response'] = 'Poistettu';
              } else {
                $return_data['response'] = 'Poisto epäonnistui';
              }
  }
  else{
    $query = "INSERT INTO accessoryLine (accessory, product)
              VALUES ($accessoryID, $productID);";

    if (mysqli_query($mysqli, $query)) {
        $return_data['response'] = 'Lisätty';
    } else {
        $return_data['response'] = 'Lisäys epäonnistui';
    }

  }
  echo json_encode($return_data);
 ?>
