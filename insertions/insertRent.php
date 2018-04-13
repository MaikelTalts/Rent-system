<?php
/* insertRent.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

//Noudetaan server.php tiedosto
include '../server.php' ;

//Vastaanotetaan taulukkomuodossa lähetetty lista lainattavista laitteista ja puretaan php taulukkomuotoon.
$devicesArrayJSON = $_POST['devices'];
$customerID = $_POST['customerID'];
$userID = $_POST['userID'];
$devices = json_decode($devicesArrayJSON, true);

//Vastaanotetaan lainan alkamis ja päättymispäivä, sekä lainan kuvaus
$fromUs = $_POST['fromUs'];
$toUs = $_POST['toUs'];
$description = $_POST['description'];

//Luodaan muuttujaan nykyinen päivä
$currentDate = date("Y-m-d");
if(($fromUs <= $currentDate) && ($toUs >= $currentDate)){
  $return_data['rentAppend'] = 1;
}

if($fromUs > $currentDate){
  $return_data['rentAppend'] = 2;
}
$query = "INSERT INTO rent (customer, admin, startTime, stopTime, description, returned)
          VALUES ($customerID,$userID,'$fromUs', '$toUs', '$description', 'false');";

          if (mysqli_query($mysqli, $query)) {
            $return_data['rentID'] = mysqli_insert_id($mysqli);
            $rentID = $return_data['rentID'];
          }

foreach ($devices as $device){
  $query = "INSERT INTO rentLine (rent, product, startTime, stopTime)
            VALUES ($rentID, $device, '$fromUs', '$toUs');";
  $result = mysqli_query($mysqli, $query);
}

$query = "SELECT rent.rentID, rent.customer, customer.firstName, customer.lastName
          FROM rent
          INNER JOIN customer ON rent.customer = customer.customerID
          WHERE rentID = $rentID;";
$result = mysqli_fetch_array(mysqli_query($mysqli, $query));

$return_data['firstName'] = $result['firstName'];
$return_data['lastName'] = $result['lastName'];
$return_data['startTime'] =  date("d/m/Y", strtotime($fromUs));
$return_data['stopTime'] = date("d/m/Y", strtotime($toUs));
echo json_encode($return_data);
?>
