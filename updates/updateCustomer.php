<?php
/*  updateCustomer.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyt tekstikenttien sisällöt muuttujiin
  $customerID = $_POST["customerID"];
  $postFirstName = $_POST["firstName"];
  $postLastName = $_POST["lastName"];
  $phoneNumber = $_POST["phoneNumber"];
  $email = $_POST["email"];
  $classID = $_POST["classID"];

  //Poistetaan muuttujaan noudettujen etu-ja sukunimien alusta ja lopusta välilyönnit.
  $firstName = trim($postFirstName);
  $lastName = trim($postLastName);

  //Suoritetaan tarkistus, että jos vastaanotetut muuttujat [EIVÄT] ole tyhjiä, muutetaan tiedot tietokannassa.
  if((!$firstName == null || !$firstName == "") && (!$lastName == null || !$lastName == "")){
    //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE customer
              SET firstName = '$firstName', lastName = '$lastName', phoneNumber = '$phoneNumber', email = '$email', classID = '$classID'
              WHERE customerID = $customerID;";
    $result = $mysqli->query($query);

    //Noudetaan päivitetyn laitteen tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
    $query = "SELECT * FROM customer
              WHERE customerID = $customerID";

    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Kirjataan ajaxille palautettavaan muuttujaan tietokannasta noudetut ajantasalla olevat tiedot.
    $return_data['firstName'] = $result['firstName'];
    $return_data['lastName'] = $result['lastName'];
    $return_data['phoneNumber'] = $result['phoneNumber'];
    $return_data['email'] = $result['email'];
    $return_data['classID'] = $result['classID'];

    echo json_encode($return_data);
  }
  else {
    // Do nothing.
  }


 ?>
