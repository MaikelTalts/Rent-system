<?php
/*  updateStatus.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyn tekstikentän sisältö muuttujaan.
  $statusID = $_POST["statusID"];
  $postStatusNewName = $_POST["statusNewName"];

  //Poistetaan muuttujaan noudetun lisävarusteen nimen alusta ja lopusta välilyönnit.
  $statusNewName = trim($postStatusNewName);

  //Suoritetaan tarkistus, että jos vastaanotetut muuttujat [EIVÄT] ole tyhjiä, muutetaan tiedot tietokannassa.
  if(!$statusNewName == null || !$statusNewName == ""){
    //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE status
              SET status = '$statusNewName'
              WHERE statusID = $statusID;";
    $result = $mysqli->query($query);

    //Noudetaan päivitetyn laitteen tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
    $query = "SELECT * FROM status
              WHERE statusID = $statusID";

    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Kirjataan ajaxille palautettavaan muuttujaan tietokannasta noudetut ajantasalla olevat tiedot.
    $return_data['statusID'] = $result['statusID'];
    $return_data['status'] = $result['status'];

    echo json_encode($return_data);
  }
  else {
    // Do nothing.
  }


 ?>
