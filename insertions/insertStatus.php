<?php
/* insertStatus.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

//Noudetaan server.php tiedosto
include '../server.php' ;

//Vastaanotetaan lisättävän statuksen nimi
$postName = $_POST['statusName'];

//Poistetaan välilyönnit alusta ja lopusta
$name = trim($postName);

//Tarkistetaan ettei muuttujaan sijoitettu tuotenimi ole tyhjä
if(!$name == null || !$name == ""){

//Valmistellaan SQL komento muuttujaan
$query = "INSERT INTO status (status)
          VALUES ('$name');";

//Tarkistetaan, että mikäli uuden kategorian lisääminen tietokantaan onnistui, valitaan kyseisen kategoriarivin ID muuttujaan, jotta loput kyseistä kategoriaa koskevat tiedot voidaan noutaa.
if (mysqli_query($mysqli, $query)) {
  $statusID = mysqli_insert_id($mysqli);

  //Valmistellaan SQL komento muuttujaan
  $query = "SELECT * FROM status
            WHERE statusID = $statusID;";

  //Suoritetaan SLQ kysely. Samalla kyselyn tulos talletetaan muuttujaan
  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

  //Palautetaan ajaxille vastaanotetusta kyselystä nimi ja kategorian ID numero
  $return_data['id'] = $statusID;
  $return_data['status'] = $result['status'];


  echo json_encode($return_data);

  } else {
  // Do nothing
  }
}
else{
  //Do nothing
}
?>
