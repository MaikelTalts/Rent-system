<?php
/*  selectCustomer.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

if(isset($_POST["customerID"])) {

  include '../server.php';
  $query = "SELECT * FROM customer
            WHERE customerID = '".$_POST["customerID"]."'";
  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));
  $currentDate = date("Y-m-d");
  $customerID = $_POST["customerID"];
}
?>

<!-- [Lisää uusi laite] lomake alkaa -->
<div class="row bottom-buffer">
    <div class="col-md-6">
        <label>Etunimi:</label>
        <input type="text" class="form-control" id="ModalFirstName" value="<?php echo $result['firstName'] ?>">
    </div>
    <div class="col-md-6">
        <label>Sukunimi:</label>
        <input type="text" class="form-control" id="ModalLastName" value="<?php echo $result['lastName'] ?>">
    </div>
</div>
<div class="row bottom-buffer">
    <div class="col-md-6">
        <label>Puhelinnumero</label>
        <input type="text" class="form-control" id="ModalPhoneNumber" value="<?php echo $result['phoneNumber'] ?>">
    </div>
    <div class="col-md-6">
        <label>Sähköposti:</label>
        <input type="text" class="form-control" id="ModalCustomerEmail" value="<?php echo $result['email'] ?>">
    </div>
</div>
<div class="row bottom-buffer">
    <div class="col-md-6">
        <label>Luokkatunnus</label>
        <input type="text" class="form-control" id="ModalClassID" value="<?php echo $result['classID'] ?>">
    </div>
    <div class="col-md-6">
    </div>
</div>

<hr />
<!-- == == == == == == == == == == == == == == == == == == LAINAAJAN LAINALISTAUKSET == == == == == == == == == == == == == == == == == == -->
<!-- == == == == == == == == == == == == == == == == == == MYÖHÄSTYNEET LAINAUKSET == == == == == == == == == == == == == == == == == == -->
    <div class="row bottom-buffer">
        <div class="col-md-12">
          <div class="card" style="margin-top:10px;">
              <div class="card-header bg-danger" role="tab" style=" border-radius:0px;">
                  <h5 class="mb-0">
                      <a class="text-white rentLink" data-toggle="collapse" href="#customerLateRent">Myöhästyneet lainaukset</a>
                  </h5>
              </div>

              <div id="customerLateRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block bg-danger" style="padding:20px;">
                      <table id="customerLateRentTable" class="searchTable" >
                          <tr class="header">
                              <th style="width:50%;">Lainanumero</th>
                              <th style="width:50%;">Laina-aika</th>
                          </tr>
                          <?php
                          $sql = "SELECT rent.rentID, rent.customer, rent.startTime, rent.stopTime, customer.firstName, customer.lastName
                                  FROM (rent
                                  INNER JOIN customer ON rent.customer = customer.customerID)
                                  WHERE stopTime < DATE '$currentDate'
                                  AND customerID = $customerID
                                  AND returned = 'false';";
                          $lateRent = mysqli_query($mysqli, $sql);

                          if (mysqli_num_rows($lateRent) > 0) {
                              //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                              while($row = mysqli_fetch_assoc($lateRent)) {
                                ?>
                                <tr id="customerLateRentTR_<?php echo $row["rentID"]?>">
                                  <td><span class="pseudolink viewRent" id="customerLateRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                  <td><span id="customerLateRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime'])) . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
                                </tr>
                                <?php
                              }
                          } else {
                            echo "<p class='text-white'>Ei myöhässä olevia lainauksia.</p>";
                          }
                          ?>
                      </table>
                  </div>
              </div>
          </div>
        </div>
    </div>

<!-- == == == == == == == == == == == == == == == == == == AKTIIVISET LAINAUKSET == == == == == == == == == == == == == == == == == == -->
    <div class="row bottom-buffer">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-success" role="tab" style=" border-radius:0px;">
                  <h5 class="mb-0">
                      <a class="text-white rentLink" data-toggle="collapse" href="#customerCurrentRent" aria-expanded="true">Aktiiviset lainat</a>
                  </h5>
              </div>

              <div id="customerCurrentRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block bg-success" style="padding:20px;">
                    <table id="customerCurrentRentTable" class="searchTable">
                        <tr class="header">
                            <th style="width:50%;">Lainanumero</th>
                            <th style="width:50%;">Laina-aika</th>
                        </tr>
                        <?php
                        $currentDate = date("Y-m-d");
                        $sql = "SELECT rent.rentID, rent.customer, rent.startTime, rent.stopTime, customer.firstName, customer.lastName
                                FROM (rent
                                INNER JOIN customer ON rent.customer = customer.customerID)
                                WHERE startTime <= DATE '$currentDate' AND stopTime >= '$currentDate' AND returned = 'false' AND customer = $customerID
                                ORDER BY stopTime ASC;";
                        $currentResult = mysqli_query($mysqli, $sql);

                        if (mysqli_num_rows($currentResult) > 0) {
                            //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                            while($row = mysqli_fetch_assoc($currentResult)) {
                              ?>
                              <tr id="customerCurrentRentTR_<?php echo $row["rentID"]?>">
                                <td><span class="pseudolink viewRent" id="customerCurrentRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                <td><span id="customerCurrentRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime'])) . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
                              </tr>
                              <?php
                            }
                        } else {
                          echo "<p class='text-white' id='currentRentParagraph'>Ei aktiivisia lainauksia.</p>";
                        }
                        ?>
                    </table>
                  </div>
              </div>
          </div>
        </div>
    </div>

<!-- == == == == == == == == == == == == == == == == == == TULEVAT LAINAUKSET == == == == == == == == == == == == == == == == == == -->
    <div class="row bottom-buffer">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-info" role="tab" style=" border-radius:0px;">
                  <h5 class="mb-0">
                      <a class="text-white rentLink" data-toggle="collapse" href="#customerIncomingRent" aria-expanded="true">Tulevat Lainaukset</a>
                  </h5>
              </div>

              <div id="customerIncomingRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block bg-info" style="padding:20px;">
                    <table id="customerIncomingRentTable" class="searchTable">
                        <tr class="header">
                            <th style="width:50%;">Lainanumero</th>
                            <th style="width:50%;">Laina-aika</th>
                        </tr>
                        <?php
                        $currentDate = date("Y-m-d");
                        $sql = "SELECT rent.rentID, rent.customer, rent.startTime, rent.stopTime, customer.firstName, customer.lastName
                                FROM (rent
                                INNER JOIN customer ON rent.customer = customer.customerID)
                                WHERE startTime > DATE '$currentDate' AND customer = $customerID
                                ORDER BY startTime ASC;";
                        $incomingResult = mysqli_query($mysqli, $sql);

                        if (mysqli_num_rows($incomingResult) > 0) {
                            //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                            while($row = mysqli_fetch_assoc($incomingResult)) {
                              ?>
                              <tr id="customerIncomingRentTR_<?php echo $row["rentID"]?>">
                                <td><span class="pseudolink viewRent" id="incomingRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                <td><span id="customerIncomingRentDate_<?php echo $row["rentID"]?>"><?php echo "<strong>" . date("d/m/Y", strtotime($row['startTime'])) . "</strong>" . "  -  " . date("d/m/Y", strtotime($row['stopTime']))?></span> </td>
                              </tr>
                              <?php
                            }
                        } else {
                          echo "<p class='text-white' id='incomingRentParagraph'>Ei tulevia lainauksia.</p>";
                        }
                        ?>
                    </table>
                  </div>
              </div>
          </div>
        </div>
    </div>

<!-- == == == == == == == == == == == == == == == == == == TULEVAT LAINAUKSET == == == == == == == == == == == == == == == == == == -->
    <div class="row bottom-buffer">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-secondary" role="tab" style=" border-radius:0px;">
                  <h5 class="mb-0">
                      <a class="text-white rentLink" data-toggle="collapse" href="#customerOldRent" aria-expanded="true">Vanhat Lainaukset</a>
                  </h5>
              </div>

              <div id="customerOldRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block bg-secondary" style="padding:20px;">
                    <table id="customerOldRentTable" class="searchTable">
                        <tr class="header">
                            <th style="width:50%;">Lainanumero</th>
                            <th style="width:50%;">Laina-aika</th>
                        </tr>
                        <?php
                        $currentDate = date("Y-m-d");
                        $sql = "SELECT rent.rentID, rent.customer, rent.startTime, rent.stopTime, customer.firstName, customer.lastName
                                FROM (rent
                                INNER JOIN customer ON rent.customer = customer.customerID)
                                WHERE stopTime <= DATE '$currentDate' AND returned = 'true' AND customer = $customerID
                                ORDER BY stopTime DESC;";
                        $oldResult = mysqli_query($mysqli, $sql);

                        if (mysqli_num_rows($oldResult) > 0) {
                            //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                            while($row = mysqli_fetch_assoc($oldResult)) {
                              ?>
                              <tr id="customerOldRentTR_<?php echo $row["rentID"]?>">
                                <td><span class="pseudolink viewRent" id="customerOldRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                <td><span id="customerOldRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime']))  . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
                              </tr>
                              <?php
                            }
                        } else {
                          echo "<p class='text-white'>Ei menneitä lainauksia.</p>";
                        }
                        ?>
                    </table>
                  </div>
              </div>
          </div>
        </div>
    </div>

<hr />
<button class="btn btn-danger button float-left deleteCustomer" value="<?php echo $result['customerID'] ?>">Poista Lainaaja</button>
<button class="btn btn-primary button float-right editCustomer" value="<?php echo $result['customerID'] ?>">Tallenna</button>
