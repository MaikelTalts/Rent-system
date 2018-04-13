<?php
/*  selectRentCustomer.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

  include '../server.php';

  $postName = $_POST['name'];
  $name = trim($postName);



  if(!$name == null || !$name == ""){
  $query = "SELECT * FROM customer
            WHERE firstName LIKE '%$name%';";
  $result = mysqli_query($mysqli, $query);

  if (mysqli_num_rows($result) > 0) {
      //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
    ?>  <table class="searchTable" style="width:100%; display: table; padding:0px">
          <tr class="header" style="padding:0px;">
              <th style="width:50%; padding:0px;">Etunimi</th>
              <th style="width:50%; padding:0px;">Luokkatunnus</th>
          </tr>
          <tbody>
    <?php
      while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td style="padding:0px;"><span value="<?php echo $row["customerID"]?>" class="pseudolink rentCustomerSelect"><?php echo $row['firstName']. " " . $row['lastName']?></span></td>
          <td style="padding:0px;"><?php echo $row['classID'] ?></td>
        </tr>
        <?php
      }
    ?>  </tbody>
</table> <?php
  } else {
    //
  }
}



?>
