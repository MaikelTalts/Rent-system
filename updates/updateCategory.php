<?php
/*  updateCategory.php [KÄYNNISTETÄÄN] sivulta:
    * js/main.js
*/
  include '../server.php';

  //Noudetaan ajaxilla lähetetyn tekstikentän sisältö muuttujaan.
  $categoryID = $_POST["categoryID"];
  $postCategoryNewName = $_POST["categoryNewName"];

  //Poistetaan muuttujaan noudetun kategorian nimen alusta ja lopusta välilyönnit.
  $categoryNewName = trim($postCategoryNewName);

  //Suoritetaan tarkistus, että jos vastaanotetut muuttujat [EIVÄT] ole tyhjiä, muutetaan tiedot tietokannassa.
  if(!$categoryNewName == null || !$categoryNewName == ""){
    //Päivitetään vastaanotetun categoryID:n mukainen laite tietokannassa vastaanotetuilla tiedoilla.
    $query = "UPDATE category
              SET name = '$categoryNewName'
              WHERE categoryID = $categoryID;";
    $result = $mysqli->query($query);

    //Noudetaan päivitetyn kategorian tiedot tietokannasta, jotta ajax palautteena lähetetään oikein päivitettävät tiedot.
    $query = "SELECT * FROM category
              WHERE categoryID = $categoryID";

    $result = mysqli_fetch_array(mysqli_query($mysqli, $query));

    //Kirjataan ajaxille palautettavaan muuttujaan tietokannasta noudetut ajantasalla olevat tiedot.
    $return_data['categoryID'] = $result['categoryID'];
    $return_data['name'] = $result['name'];

    echo json_encode($return_data);
  }
  else {
    // Do nothing.
  }


 ?>
