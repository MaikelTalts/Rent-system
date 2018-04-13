<?php
/*  updateProduct.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyt tekstikenttien sisällöt muuttujiin
  $productID = $_POST["productID"];
  $postProductName = $_POST["productName"];
  $serialNumber = $_POST["serialNumber"];
  $barcode = $_POST["barcode"];
  $manufacturer = $_POST["manufacturer"];
  $category = $_POST["category"];
  $description = $_POST["description"];
  $status = $_POST["status"];

  //Poistetaan muuttujaan noudettujen etu-ja sukunimien alusta ja lopusta välilyönnit.
  $productName = trim($postProductName);

  if(!$productName == null || !$productName == ""){

  //Päivitetään vastaanotetun deviceID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
  $query = "UPDATE product
            SET productName = '$productName', category = $category, serialNumber = '$serialNumber', barcode = '$barcode', status = $status, manufacturer = '$manufacturer', description = '$description'
            WHERE productID = $productID;";
  $result = $mysqli->query($query);

  //Noudetaan päivitetyn laitteen tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
  $query = "SELECT product.productID, product.productName, category.name, status.status
            FROM ((product
            INNER JOIN category ON product.category = category.categoryID)
            INNER JOIN status ON product.status = status.statusID)
            WHERE productID = $productID";

  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

  //Kirjataan ajaxille palautettavaan muuttujaan tietokannasta noudetut ajantasalla olevat tiedot.
  $return_data['deviceName'] = $result['productName'];
  $return_data['status'] = $result['status'];
  $return_data['category'] = $result['name'];

  echo json_encode($return_data);
}
else{
  //Do nothing
}
 ?>
