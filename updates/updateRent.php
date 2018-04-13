<?php
/*  updateRent.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  $rentID = $_POST["rentID"];
  $postFrom = $_POST["from"];
  $postTo = $_POST["to"];
  $description = $_POST["description"];
  $currentDate = date("Y-m-d");

  $from = trim($postFrom);
  $to = trim($postTo);

  if((!$from == null || !$from == "") && (!$to == null || !$to == "")){

    $query = "UPDATE rent
              SET startTime = '$from', stopTime = '$to', description = '$description'
              WHERE rentID = $rentID;";
    $result = $mysqli->query($query);

    $query = "UPDATE rentLine
              SET startTime = '$from', stopTime = '$to'
              WHERE rent = $rentID;";
    $result = $mysqli->query($query);

    $query = "SELECT rent.rentID, rent.customer, customer.firstName, customer.lastName
              FROM rent
              INNER JOIN customer ON rent.customer = customer.customerID
              WHERE rentID = $rentID;";
    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    $return_data['firstName'] = $result['firstName'];
    $return_data['lastName'] = $result['lastName'];
    $return_data['startTime'] =  date("d/m/Y", strtotime($from));
    $return_data['stopTime'] = date("d/m/Y", strtotime($to));
    $return_data['rentID'] = $result['rentID'];

    if(($from <= $currentDate) && ($to >= $currentDate)){
      $return_data['rentAppend'] = 1;
    }
    if($from > $currentDate){
      $return_data['rentAppend'] = 2;
    }
    $return_data['success'] = "Päivitys onnistui!";
  }
  else {
    $return_data['error'] = "Päivitys epäonnistui!";
  }
echo json_encode($return_data);

 ?>
