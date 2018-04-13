<?php
/*  updateAccessory.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyn tekstikentän sisältö muuttujaan.
  $accessoryID = $_POST["accessoryID"];
  $postAccessoryNewName = $_POST["accessoryNewName"];

  //Poistetaan muuttujaan noudetun lisävarusteen nimen alusta ja lopusta välilyönnit.
  $accessoryNewName = trim($postAccessoryNewName);

  //Suoritetaan tarkistus, että jos vastaanotetut muuttujat [EIVÄT] ole tyhjiä, muutetaan tiedot tietokannassa.
  if(!$accessoryNewName == null || !$accessoryNewName == ""){
    //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE accessory
              SET name = '$accessoryNewName'
              WHERE accessoryID = $accessoryID;";
    $result = $mysqli->query($query);

    //Noudetaan päivitetyn laitteen tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
    $query = "SELECT * FROM accessory
              WHERE accessoryID = $accessoryID";

    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Kirjataan ajaxille palautettavaan muuttujaan tietokannasta noudetut ajantasalla olevat tiedot.
    $return_data['accessoryID'] = $result['accessoryID'];
    $return_data['name'] = $result['name'];

    echo json_encode($return_data);
  }
  else {
    // Do nothing.
  }


 ?>
