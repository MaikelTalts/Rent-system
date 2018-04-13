<?php
/*  updateRent_returnRent.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyn tekstikentän sisältö muuttujaan.
  $rentID = $_POST["rentID"];
  $rentAppendCheck = $_POST["rentAppendCheck"];
  $currentDate = date("Y-m-d");

  if($rentAppendCheck == 1){
    //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE rent
              SET returned = 'true'
              WHERE rentID = $rentID;";

  if (mysqli_query($mysqli, $query)) {
      $return_data['msg'] = $rentAppendCheck;
  } else {
      $return_data['msg'] = 'Poisto epäonnistui';
  }

}
  if($rentAppendCheck == 2){
    //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE rent
              SET returned = 'true', stopTime = '$currentDate'
              WHERE rentID = $rentID;";

  if (mysqli_query($mysqli, $query)) {

    //Noudetaan päivitetyn laitteen tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
    $query = "SELECT * FROM rent
              WHERE rentID = $rentID";

    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));



    $return_data['msg'] = $rentAppendCheck;
    $return_data['time'] = date("d/m/Y", strtotime($result['startTime'])) . "  -  " . "<strong>" . date("d/m/Y", strtotime($currentDate)) . "</strong>";

  } else {
      $return_data['msg'] = 'Poisto epäonnistui';
  }
  }

  echo json_encode($return_data);
 ?>
