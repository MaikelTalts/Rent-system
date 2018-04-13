<?php
/*  updateAdmin.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyt tekstikenttien sisällöt muuttujiin
  $adminID = $_POST["adminID"];
  $postFirstName = $_POST["firstName"];
  $postLastName = $_POST["lastName"];
  $phoneNumber = $_POST["phoneNumber"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  //Poistetaan muuttujaan noudettujen etu-ja sukunimien alusta ja lopusta välilyönnit.
  $firstName = trim($postFirstName);
  $lastName = trim($postLastName);

  //Suoritetaan tarkistus, että jos vastaanotetut muuttujat [EIVÄT] ole tyhjiä, muutetaan tiedot tietokannassa.
  if((!$firstName == null || !$firstName == "") && (!$lastName == null || !$lastName == "")){
    //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE admin
              SET firstName = '$firstName', lastName = '$lastName', phoneNumber = '$phoneNumber', email = '$email', password = '$password'
              WHERE adminID = $adminID;";
    $result = $mysqli->query($query);

    //Noudetaan päivitetyn laitteen tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
    $query = "SELECT * FROM admin
              WHERE adminID = $adminID";

    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Kirjataan ajaxille palautettavaan muuttujaan tietokannasta noudetut ajantasalla olevat tiedot.
    $return_data['firstName'] = $result['firstName'];
    $return_data['lastName'] = $result['lastName'];
    $return_data['phoneNumber'] = $result['phoneNumber'];
    $return_data['email'] = $result['email'];

    echo json_encode($return_data);
  }
  else {
    // Do nothing.
  }


 ?>
