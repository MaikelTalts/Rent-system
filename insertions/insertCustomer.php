<?php
/* insertCustomer.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

  include '../server.php' ; //Noudetaan server.php sivulta $mysqli muuttuja.

  $postFirstName = $_POST['firstName'];
  $postLastName = $_POST['lastName'];
  $phoneNumber = $_POST['phoneNumber'];
  $email = $_POST['email'];
  $classID = $_POST['classID'];

  //Poistetaan etu- ja sukunimen alusta ja lopusta välilyönnit
  $firstName = trim($postFirstName);
  $lastName = trim($postLastName);

  //Suoritetaan tarkistus, etteivät etunimen ja sukunimen sisältävät muuttujat ole tyhjiä edellisen trim muokkauksen jälkeen.
  if((!$firstName == null || !$firstName == "") && (!$lastName == null || !$lastName == "")){

  //Valmistellaan uuden lainaajan lisäävä SQL komento muuttujaan
  $query = "INSERT INTO customer (firstName, lastName, phoneNumber, email, classID)
            VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$classID');";

  //Tarkistetaan, että mikäli uuden lainaajan lisääminen tietokantaan onnistui, valitaan kyseisen lainaajan ID muuttujaan, jotta loput kyseistä adminia koskevat tiedot voidaan noutaa.
  if (mysqli_query($mysqli, $query)) {
    $customerID = mysqli_insert_id($mysqli);

    //Valmistellaan juuri lisätyn lainaajan noutava SQL kysely muuttujaan
    $query = "SELECT * FROM customer
              WHERE customerID = $customerID;";

    //Suoritetaan SQL kysely
    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Palautetaan ajaxille vastaanotetusta kyselystä tietoja.
    $return_data['id'] = $customerID;
    $return_data['firstName'] = $result['firstName'];
    $return_data['lastName'] = $result['lastName'];
    $return_data['phoneNumber'] = $result['phoneNumber'];
    $return_data['email'] = $result['email'];
    $return_data['classID'] = $result['classID'];

    echo json_encode($return_data);

  } else {
  // Do nothing
  }
}
else{
  //Do nothing
}
?>
