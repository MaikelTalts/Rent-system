<?php
/* insertAdmin.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

//Noudetaan server.php tiedosto
include '../server.php' ;

//Noudetaan ajaxin kautta lähetetyt tiedot muuttujiin.
$postFirstName = $_POST['firstName'];
$postLastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password = $_POST['password'];

//Poistetaan etu- ja sukunimen alusta ja lopusta välilyönnit
$firstName = trim($postFirstName);
$lastName = trim($postLastName);

  //Suoritetaan tarkistus, etteivät etunimen ja sukunimen sisältävät muuttujat ole tyhjiä edellisen trim muokkauksen jälkeen.
  if((!$firstName == null || !$firstName == "") && (!$lastName == null || !$lastName == "")){

  //Valmistellaan uuden adminin lisäävä SQL komento muuttujaan
  $query = "INSERT INTO admin (firstName, lastName, phoneNumber, email, password)
            VALUES ('$firstName', '$lastName', '$phoneNumber', '$email', '$password');";

  //Tarkistetaan, että mikäli uuden admintilin lisääminen tietokantaan onnistui, valitaan kyseisen adminin ID muuttujaan, jotta loput kyseistä adminia koskevat tiedot voidaan noutaa.
  if (mysqli_query($mysqli, $query)) {
    $adminID = mysqli_insert_id($mysqli);

    //Valmistellaan SQL komento muuttujaan
    $query = "SELECT * FROM admin
              WHERE adminID = $adminID;";

    //Suoritetaan SLQ kysely. Samalla kyselyn tulos talletetaan muuttujaan
    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Palautetaan ajaxille vastaanotetusta kyselystä tietoja.
    $return_data['id'] = $adminID;
    $return_data['firstName'] = $result['firstName'];
    $return_data['lastName'] = $result['lastName'];
    $return_data['phoneNumber'] = $result['phoneNumber'];
    $return_data['email'] = $result['email'];
    $return_data['password'] = $result['password'];

    echo json_encode($return_data);

  } else {
  // Do nothing
  }
}
else{
  //Do nothing
}
?>
