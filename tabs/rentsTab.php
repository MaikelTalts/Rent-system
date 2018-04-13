<!-- rentsTab on includattu sivulla:
    * /mainpage.php
-->
<div id="showMoreRents" value="2" style="display:none;"></div>
<div class="tab-pane" id="rents" role="tabpanel">

<!-- Myöhässä olevat lainaukset -->
    <div class="card" style="margin-top:20px;">
        <div class="card-header bg-danger" role="tab" id="headingOne" style=" border-radius:0px;">
            <h5 class="mb-0">
                <a class="text-white rentLink" data-toggle="collapse" href="#lateRent" aria-expanded="true">Myöhästyneet lainaukset</a>
            </h5>
        </div>

        <div id="lateRent" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block bg-danger" style="padding:20px;">
                <table id="lateRentTable" class="searchTable" >
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
                            WHERE stopTime < DATE '$currentDate'
                            AND returned = 'false';";
                    $result = mysqli_query($mysqli, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                        while($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <tr id="lateRentTR_<?php echo $row["rentID"]?>">
                            <td><span class="pseudolink viewRent" id="lateRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                            <td><span id="lateRent_<?php echo $row["rentID"]?>_customer_<?php echo $row["customer"]?>"><?php echo $row['firstName'] . " " . $row['lastName'] ?></span></td>
                            <td><span id="lateRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime'])) . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
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

<!-- Nykyiset lainaukset -->
    <div class="card" style="margin-top:10px;">
        <div class="card-header bg-success" role="tab" style=" border-radius:0px;">
            <h5 class="mb-0">
                <a class="text-white rentLink" data-toggle="collapse" href="#currentRent" aria-expanded="true">Aktiiviset lainat</a>
            </h5>
        </div>

        <div id="currentRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block bg-success" style="padding:20px;">
              <table id="currentRentTable" class="searchTable">
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
                          WHERE startTime <= DATE '$currentDate' AND stopTime >= '$currentDate' AND returned = 'false'
                          ORDER BY stopTime ASC;";
                  $result = mysqli_query($mysqli, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                      while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr id="currentRentTR_<?php echo $row["rentID"]?>">
                          <td><span class="pseudolink viewRent" id="currentRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                          <td><span id="currentRent_<?php echo $row["rentID"]?>_customer_<?php echo $row["customer"]?>"><?php echo $row['firstName'] . " " . $row['lastName'] ?></span></td>
                          <td><span id="currentRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime'])) . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
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

<!-- Tulevat lainaukset -->
    <div class="card" style="margin-top:10px;">
        <div class="card-header bg-info" role="tab" style=" border-radius:0px;">
            <h5 class="mb-0">
                <a class="text-white rentLink" data-toggle="collapse" href="#incomingRent" aria-expanded="true">Tulevat Lainaukset</a>
            </h5>
        </div>

        <div id="incomingRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block bg-info" style="padding:20px;">
              <table id="incomingRentTable" class="searchTable">
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
                          WHERE startTime > DATE '$currentDate'
                          ORDER BY startTime ASC;";
                  $result = mysqli_query($mysqli, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                      while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr id="incomingRentTR_<?php echo $row["rentID"]?>">
                          <td><span class="pseudolink viewRent" id="incomingRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                          <td><span id="incomingRent_<?php echo $row["rentID"]?>_customer_<?php echo $row["customer"]?>"><?php echo $row['firstName'] . " " . $row['lastName'] ?></span></td>
                          <td><span id="incomingRentDate_<?php echo $row["rentID"]?>"><?php echo "<strong>" . date("d/m/Y", strtotime($row['startTime'])) . "</strong>" . "  -  " . date("d/m/Y", strtotime($row['stopTime']))?></span> </td>
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

<!-- Menneet lainaukset -->
    <div class="card" style="margin-top:10px; margin-bottom:40px;">
        <div class="card-header bg-secondary" role="tab" style=" border-radius:0px;">
            <h5 class="mb-0">
                <a class="text-white rentLink" data-toggle="collapse" href="#oldRent" aria-expanded="true">Vanhat Lainaukset</a>
            </h5>
        </div>

        <div id="oldRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block bg-secondary" id="testi123" style="padding:20px;">
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
                          LIMIT 10;";
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
              <button class="btn btn-success button " id="loadMoreOldRents" value="2" style="margin-top:25px;">Näytä Lisää</button>
              </div>
            </div>
        </div>
    </div>

</div>
