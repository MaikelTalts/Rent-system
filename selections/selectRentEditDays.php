<?php
/*  selectRentEditDays.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

//Noudetaan server.php
  include '../server.php';
  $productsJSON = $_POST['devices'];
  $rentID = $_POST['rentID'];
  $products = json_decode($productsJSON, true);
  $currentRentDays = array();
  $allRentDays = array();
  $currentDate = date("Y-m-d");

//Luodaan kysely, nykyisen lainan lainapäiville.
  $query = "SELECT * FROM rentLine
            WHERE rent = $rentID;";

//Kysellään nykyisen lainan lainapäivät ja viedään ne php taulukkoon
  $result = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $startTime = $row['startTime'];
        $stopTime = $row['stopTime'];
        for($i=$startTime;$i<=$stopTime;$i= date('Y-m-d', strtotime($i . ' +1 day'))){
          array_push($currentRentDays,$i);
        }
      }
  }
//Luodaan kysely jokaisesta taulukossa olevasta laitteesta, jotta saadaan kalenterista poistettavat päivät.
foreach ($products as $product){
  $query = "SELECT * FROM rentLine
          WHERE product = $product;";
  $result = mysqli_query($mysqli, $query);

//Vedään kaikki vastaanotetut päivät taulukkoon
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $startTime = $row['startTime'];
        $stopTime = $row['stopTime'];
        for($i=$startTime;$i<=$stopTime;$i= date('Y-m-d', strtotime($i . ' +1 day'))){
          array_push($allRentDays,$i);
        }
      }
  }
}

//POistetaan taulukosta nykyisen lainan päivät, jotta käyttäjä voi tehdä tarkempia muutoksia
$rentDays = array_diff($allRentDays, $currentRentDays);
$rentDays = array_values($rentDays);

//Palautetaan päivät jotka tulee estää valinnoista
  echo json_encode($rentDays);
?>
