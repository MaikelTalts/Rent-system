<?php
/*  selectMoreOldRent.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

  include '../server.php';
  $limit = $_POST['rowNumber'];
  $currentDate = date("Y-m-d");
  ?>
  <table id="oldRentTable" class="searchTable">
      <tr class="header">
          <th style="width:33%;">Lainanumero</th>
          <th style="width:33%;">Lainaaja</th>
          <th style="width:34%;">Laina-aika</th>
      </tr>
      <?php
      $currentDate = date("Y-m-d");
      $sql = "SELECT rent.rentID, rent.customer, rent.startTime, rent.stopTime, customer.firstName, customer.lastName
              FROM (rent
              INNER JOIN customer ON rent.customer = customer.customerID)
              WHERE stopTime <= DATE '$currentDate' AND returned = 'true'
              ORDER BY stopTime DESC
              LIMIT $limit;";
      $result = mysqli_query($mysqli, $sql);

      if (mysqli_num_rows($result) > 0) {
          //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
          while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr id="oldRentTR_<?php echo $row["rentID"]?>">
              <td><span class="pseudolink viewRent" id="oldRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
              <td><span id="oldRent_<?php echo $row["rentID"]?>_customer_<?php echo $row["customer"]?>"><?php echo $row['firstName'] . " " . $row['lastName'] ?></span></td>
              <td><span id="oldRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime']))  . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
            </tr>
            <?php
          }
      } else {
        echo "<p class='text-white'>Ei menneitä lainauksia.</p>";
      }
      ?>
  </table>
  <div class="row justify-content-center">
  <button class="btn btn-success button " id="loadMoreOldRents" style="margin-top:25px;">Näytä Lisää</button>
  </div>
