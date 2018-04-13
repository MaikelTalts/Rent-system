<?php
/*  selectProductRentTime.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

  include '../server.php';
  $productsJSON = $_POST['devices'];
  $products = json_decode($productsJSON, true);
  $rentDays = array();
  $currentDate = date("Y-m-d");

foreach ($products as $product){
  $query = "SELECT * FROM rentLine
          WHERE product = $product;";
  $result = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $startTime = $row['startTime'];
        $stopTime = $row['stopTime'];
        for($i=$startTime;$i<=$stopTime;$i= date('Y-m-d', strtotime($i . ' +1 day'))){
          array_push($rentDays,$i);
        }
      }
  }
}
  echo json_encode($rentDays);
?>
