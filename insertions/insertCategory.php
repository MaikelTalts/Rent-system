<?php
/* insertCategory.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

//Noudetaan server.php tiedosto
include '../server.php' ;

//Vastaanotetaan lisättävän kategorian nimi
$postName = $_POST['categoryName'];

//Poistetaan välilyönnit alusta ja lopusta
$name = trim($postName);

//Tarkistetaan ettei muuttujaan sijoitettu tuotenimi ole tyhjä
if(!$name == null || !$name == ""){

//Valmistellaan SQL komento muuttujaan
$query = "INSERT INTO category (name)
          VALUES ('$name');";

//Tarkistetaan, että mikäli uuden kategorian lisääminen tietokantaan onnistui, valitaan kyseisen kategoriarivin ID muuttujaan, jotta loput kyseistä kategoriaa koskevat tiedot voidaan noutaa.
if (mysqli_query($mysqli, $query)) {
  $categoryID = mysqli_insert_id($mysqli);

  //Valmistellaan SQL komento muuttujaan
  $query = "SELECT * FROM category
            WHERE categoryID = $categoryID;";

  //Suoritetaan SLQ kysely. Samalla kyselyn tulos talletetaan muuttujaan
  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

  //Palautetaan ajaxille vastaanotetusta kyselystä nimi ja kategorian ID numero
  $return_data['id'] = $categoryID;
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
