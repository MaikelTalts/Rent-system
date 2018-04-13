<?php
/* insertProgram.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

//Noudetaan server.php sivulta $mysqli muuttuja.
include '../server.php' ;

$postName = $_POST['programName'];

$name = trim($postName);

//Suoritetaan tarkistus, että jos vastaanotetut muuttujat [EIVÄT] ole tyhjiä, muutetaan tiedot tietokannassa.
if(!$name == null || !$name == ""){

$query = "INSERT INTO program (name)
          VALUES ('$name');";

//Tarkistetaan, että mikäli uuden ohjelman lisääminen tietokantaan onnistui, valitaan kyseisen tuoterivin ID muuttujaan, jotta loput kyseistä tuotetta koskevat tiedot voidaan noutaa.
if (mysqli_query($mysqli, $query)) {
  $programID = mysqli_insert_id($mysqli);

  $query = "SELECT * FROM program
            WHERE programID = $programID;";

  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

  $return_data['id'] = $programID;
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
