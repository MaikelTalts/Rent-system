<?php
/* insertProduct.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/

include '../server.php' ; //Noudetaan server.php sivulta $mysqli muuttuja.

  $postProductName = $_POST['productName'];
  $serialNumber = $_POST['serialNumber'];
  $barcode = $_POST['barcode'];
  $manufacturer = $_POST['manufacturer'];
  $category = $_POST['category'];
  $status = $_POST['status'];
  $description = $_POST['description'];
  $chkArrayJSON = $_POST['chkArray'];
  $progArrayJSON = $_POST['progArray'];
  $chkArray = json_decode($chkArrayJSON, true);
  $progArray = json_decode($progArrayJSON, true);

  $productName = trim($postProductName);

  if(!$productName == null || !$productName == ""){

  $query = "INSERT INTO product (productName, category, serialNumber, barcode, status, manufacturer, description)
                  VALUES ('$productName', $category, '$serialNumber', '$barcode', $status, '$manufacturer', '$description');";

      //Tarkistetaan, että mikäli uuden lainattavan tuotteen lisääminen tietokantaan onnistui, valitaan kyseisen tuoterivin ID muuttujaan, jotta loput kyseistä tuotetta koskevat tiedot voidaan noutaa.
      if (mysqli_query($mysqli, $query)) {
          $productID = mysqli_insert_id($mysqli);

          $query = "SELECT product.productID, product.productName, category.name, status.status
                    FROM ((product
                    INNER JOIN category ON product.category = category.categoryID)
                    INNER JOIN status ON product.status = status.statusID)
                    WHERE productID = $productID;";

          $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

          $return_data['id'] = $productID;
          $return_data['productName'] = $result['productName'];
          $return_data['category'] = $result['name'];
          $return_data['status'] = $result['status'];

          foreach($chkArray as $array){
          $query = "INSERT INTO accessoryLine (accessory, product)
                    VALUES ($array, $productID);";
          $mysqli->query($query);
          }

          foreach($progArray as $array){
          $query = "INSERT INTO programLine (productID, programID)
                    VALUES ($productID, $array);";
          $mysqli->query($query);
          }

          echo json_encode($return_data);
      }

}
?>
