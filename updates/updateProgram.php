<?php
/*  updateProgram.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyn tekstikentän sisältö muuttujaan.
  $programID = $_POST["programID"];
  $postProgramNewName = $_POST["programNewName"];

  //Poistetaan muuttujaan noudetun lisävarusteen nimen alusta ja lopusta välilyönnit.
  $programNewName = trim($postProgramNewName);

  //Suoritetaan tarkistus, että jos vastaanotetut muuttujat [EIVÄT] ole tyhjiä, muutetaan tiedot tietokannassa.
  if(!$programNewName == null || !$programNewName == ""){
    //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE program
              SET name = '$programNewName'
              WHERE programID = $programID;";
    $result = $mysqli->query($query);

    //Noudetaan päivitetyn laitteen tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
    $query = "SELECT * FROM program
              WHERE programID = $programID";

    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Kirjataan ajaxille palautettavaan muuttujaan tietokannasta noudetut ajantasalla olevat tiedot.
    $return_data['programID'] = $result['programID'];
    $return_data['name'] = $result['name'];

    echo json_encode($return_data);
  }
  else {
    // Do nothing.
  }


 ?>
