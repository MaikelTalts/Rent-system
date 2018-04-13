<?php
/*  selectRentCustomer.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

  include '../server.php';

  $customerID = $_POST['customerID'];

  $query = "SELECT * FROM customer
            WHERE customerID = $customerID;";

  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

  $returnData['firstName'] = $result['firstName'];
  $returnData['lastName'] = $result['lastName'];
  $returnData['classID'] = $result['classID'];
  $returnData['customerID'] = $result['customerID'];
  $returnData['email'] = $result['email'];

  echo json_encode($returnData);

?>
