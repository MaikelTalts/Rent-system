<?php
/* insertCustomer.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

//Noudetaan server.php tiedosto
include '../server.php' ;

//Vastaanotetaan lisättävän lisävarusteen nimi
$postName = $_POST['accessoryName'];

//Poistetaan välilyönnit alusta ja lopusta
$name = trim($postName);

//Tarkistetaan ettei muuttujaan sijoitettu tuotenimi ole tyhjä
if(!$name == null || !$name == ""){

//Valmistellaan SQL komento muuttujaan
$query = "INSERT INTO accessory (name)
          VALUES ('$name');";

//Tarkistetaan, että mikäli uuden lainattavan lisävarusteen lisääminen tietokantaan onnistui, valitaan kyseisen tuoterivin ID muuttujaan, jotta loput kyseistä lisävarustetta koskevat tiedot voidaan noutaa.
if (mysqli_query($mysqli, $query)) {
  $accessoryID = mysqli_insert_id($mysqli);

  //Valmistellaan SQL komento muuttujaan
  $query = "SELECT * FROM accessory
            WHERE accessoryID = $accessoryID;";

  //Suoritetaan SLQ kysely. Samalla kyselyn tulos talletetaan muuttujaan
  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

  //Palautetaan ajaxille vastaanotetusta kyselystä nimi ja lisävarusteen numero
  $return_data['id'] = $accessoryID;
  $return_data['name'] = $result['name'];


  echo json_encode($return_data);

  } else {
  // Do nothing
  }
}
else{
  //Do nothing
}
?>
