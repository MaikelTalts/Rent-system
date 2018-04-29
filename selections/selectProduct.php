<?php
/*  selectProduct.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

if(isset($_POST["deviceID"])) {

  include '../server.php';
  $query = "SELECT * FROM product
            WHERE productID = '".$_POST["deviceID"]."'";
  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));
  $currentDate = date("Y-m-d");
  $productID = $result['productID'];
}
?>

    <div class="form-group">
        <label>Laitteen nimi:</label>
        <input type="text" class="form-control" id="ModalProductName" value="<?php echo $result['productName'] ?>">
    </div>
    <div class="row bottom-buffer">
        <div class="col-md-6">
            <label>Sarjanumero:</label>
            <input type="text" class="form-control" id="ModalSerial" value="<?php echo $result['serialNumber'] ?>">
        </div>
        <div class="col-md-6">
            <label>Viivakoodi:</label>
            <input type="text" class="form-control" id="ModalBarcode" value="<?php echo $result['barcode'] ?>">
        </div>
    </div>
    <div class="row bottom-buffer">
        <div class="col-md-6">
            <label>Valmistaja:</label>
            <input type="text" class="form-control" id="ModalManufacturer" value="<?php echo $result['manufacturer'] ?>">
        </div>
        <div class="col-md-6">
                <label for="sel1">Kategoria:</label>
                <select class="form-control" id="ModalCategory" value="<?php echo $result['category'] ?>">
                    <!-- Ajetaan tietokannassa olevat kategoriat valinnoiksi -->
                    <?php
                    $sql = "SELECT * FROM category;";

                    $resultCategory = mysqli_query($mysqli, $sql);

                    if (mysqli_num_rows($resultCategory) > 0) {
                        //Tulostetaan jokainen tietokannasta löytyvä laite kategoria pudotusvalikon valinnaksi
                        while($row = mysqli_fetch_assoc($resultCategory)) {
                          if($row['categoryID']==$result['category']){
                            echo "<option value='" . $row['categoryID'] ."' selected>" . $row['name'] . "</option>";
                          }
                          else{
                          echo "<option value='" . $row['categoryID'] ."'>" . $row['name'] . "</option>";
                        }
                        }
                    } else {
                      //Do nothing
                    }
                    ?>
                </select>
            </div>
        </div>
    <div class="row bottom-buffer">
        <div class="col-md-6">
            <div class="form-group">
                <label for="comment">Kuvaus:</label>
                <textarea type="text" class="form-control" rows="1" id="ModalDescription"><?php echo $result['description'] ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="comment">Status:</label>
                <select class="form-control" id="ModalStatus" value="<?php echo $result['category'] ?>">
                <?php
                $sql = "SELECT * FROM status;";

                $resultStatus = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($resultStatus) > 0) {
                    //Tulostetaan jokainen tietokannasta löytyvä laite kategoria pudotusvalikon valinnaksi
                    while($row = mysqli_fetch_assoc($resultStatus)) {
                      if($row['statusID']==$result['status']){
                        ?>
                        <option value="<?php echo $row["statusID"]?>" selected><?php echo $row["status"]?></option>;
                        <?php
                      }
                      else{
                        ?>
                      <option value="<?php echo $row["statusID"]?>"><?php echo $row["status"]?></option>;
                      <?php
                      }
                    }
                  }
                ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
          <div class="card" style="margin-bottom:20px;" style="padding:0px;">
              <div class="card-header">
                  <a class="card-link" data-toggle="collapse" data-parent="#sortByAccordion" href="#modalProductAccessories">Lisävarusteet</a>
              </div>

              <div id="modalProductAccessories" class="collapse">
                  <div class="card-body" style="padding:0px;">
                      <table class="table table-bordered" style="margin-bottom:0px;">
                        <thead>
                           <tr>
                             <th width="90%">Lisävaruste</th>
                             <th width="10%"><center>Lisää</center></th>
                           </tr>
                        </thead>
                        <tbody class="modalAccessoryList">
                          <tr>
                              <td><input type="text" class="form-control" id="modalNewAccessoryInput"></td>
                              <td style="text-align:center;"><button type="button" class="btn btn-success btn-sm addNewAccessory">Lisää</button></td>
                          </tr>
                          <?php
                          $sql = "SELECT * FROM accessory";
                          $result = mysqli_query($mysqli, $sql);

                          if (mysqli_num_rows($result) > 0) {
                             //Tulostetaan jokainen tietokannasta löytyvä lisävaruste omaksi checkboxiksi

                             $query = "SELECT * FROM accessoryLine
                                       WHERE product = $productID;";
                             $aLResult = mysqli_query($mysqli, $query);


                             while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr id="trModalAccessory_<?php echo $row["accessoryID"] ?>">
                                    <td>
                                        <label><span id="modalAccessorySpan_<?php echo $row["accessoryID"] ?>"><?php echo $row["name"] ?></span></label>
                                    </td>
                                    <td>
                                      <center>
                                        <div class="checkbox accessoryCheckboxClass" id="modalAccessoryCheckbox_<?php echo $row["accessoryID"] ?>" value="<?php echo $row["name"] ?>">
                                          <input type="checkbox" value="<?php echo $row["accessoryID"] ?>" class="modalAccessoryCheckbox"
                                                    <?php
                                                    $aLResult = mysqli_query($mysqli, $query);
                                                    if (mysqli_num_rows($aLResult) > 0) {
                                                        while($line = mysqli_fetch_assoc($aLResult)) {
                                                            if($row["accessoryID"] == $line["accessory"]){
                                                              echo "checked";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    >
                                        </div>
                                      </center>
                                    </td>
                                </tr>
                                <?php
                              }
                          }

                          else {
                          echo "Tietokannasta ei löytynyt yhtään lisävarustetta.";
                          }
                          ?>
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>


        <div class="col-md-6">

          <div class="card" style="margin-bottom:20px;">
              <div class="card-header">
                  <a class="card-link" data-toggle="collapse" data-parent="#sortByAccordion" href="#modalProductPrograms">Ohjelmat</a>
              </div>

              <div id="modalProductPrograms" class="collapse">
                  <div class="card-body" style="padding:0px;">

                    <table class="table table-bordered" style="margin-bottom:0px;">
                      <thead>
                         <tr>
                           <th width="90%">Ohjelma</th>
                           <th width="10%"><center>Lisää</center></th>
                         </tr>
                      </thead>
                      <tbody class="modalProgramList">
                        <tr>
                            <td><input type="text" class="form-control" id="modalNewProgramInput"></td>
                            <td style="text-align:center;"><button type="button" class="btn btn-success btn-sm addNewProgram">Lisää</button></td>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM program";
                        $result = mysqli_query($mysqli, $sql);

                        if (mysqli_num_rows($result) > 0) {
                           //Tulostetaan jokainen tietokannasta löytyvä ohjelma omaksi checkboxiksi

                           $query = "SELECT * FROM programLine
                                     WHERE productID = $productID;";
                           $pLResult = mysqli_query($mysqli, $query);


                           while($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <tr id="trModalProgram_<?php echo $row["programID"] ?>">
                                  <td>

                                      <label><span id="modalProgramSpan_<?php echo $row["programID"] ?>"><?php echo $row["name"] ?></span></label>
                                  </td>
                                  <td>
                                    <center>
                                      <div class="checkbox programCheckboxClass" id="modalProgramCheckbox_<?php echo $row["programID"] ?>" value="<?php echo $row["name"] ?>">
                                        <input type="checkbox" value="<?php echo $row["programID"] ?>" class="modalProgramCheckbox"
                                                  <?php
                                                  $pLResult = mysqli_query($mysqli, $query);
                                                  if (mysqli_num_rows($pLResult) > 0) {
                                                      while($line = mysqli_fetch_assoc($pLResult)) {
                                                          if($row["programID"] == $line["programID"]){
                                                            echo "checked";
                                                          }
                                                      }
                                                  }
                                                  ?>
                                                  >
                                      </div>
                                    </center>
                                  </td>
                              </tr>
                              <?php
                            }
                        }

                        else {
                        echo "Tietokannasta ei löytynyt yhtään laitetta.";
                        }
                        ?>
                      </tbody>
                    </table>

                  </div>
              </div>
          </div>
        </div>
    </div>


<!-- == == == == == == == == == == == == == == == == == == LAITTEEN LAINALISTAUKSET == == == == == == == == == == == == == == == == == == -->
<!-- == == == == == == == == == == == == == == == == == == MYÖHÄSTYNEET LAINAUKSET == == == == == == == == == == == == == == == == == == -->
        <div class="row bottom-buffer">
            <div class="col-md-12">
              <div class="card" style="margin-top:10px;">
                  <div class="card-header bg-danger" role="tab" style=" border-radius:0px;">
                      <h5 class="mb-0">
                          <a class="text-white rentLink" data-toggle="collapse" href="#productLateRent">Myöhästyneet lainaukset</a>
                      </h5>
                  </div>

                  <div id="productLateRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-block bg-danger" style="padding:20px;">
                          <table id="productLateRentTable" class="searchTable" >
                              <tr class="header">
                                  <th style="width:50%;">Lainanumero</th>
                                  <th style="width:50%;">Laina-aika</th>
                              </tr>
                              <?php
                              $sql = "SELECT rent.rentID, rent.startTime, rent.stopTime, rentLine.product
                                      FROM rent
                                      INNER JOIN rentLine ON rent.rentID = rentLine.rent
                                      WHERE rent.stopTime < DATE '$currentDate' AND product = $productID AND rent.returned = 'false';";
                              $lateRent = mysqli_query($mysqli, $sql);

                              if (mysqli_num_rows($lateRent) > 0) {
                                  //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                                  while($row = mysqli_fetch_assoc($lateRent)) {
                                    ?>
                                    <tr id="productLateRentTR_<?php echo $row["rentID"]?>">
                                      <td><span class="pseudolink viewRent" id="productLateRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                      <td><span id="productLateRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime'])) . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
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
                          <a class="text-white rentLink" data-toggle="collapse" href="#productCurrentRent" aria-expanded="true">Aktiiviset lainat</a>
                      </h5>
                  </div>

                  <div id="productCurrentRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-block bg-success" style="padding:20px;">
                        <table id="productCurrentRentTable" class="searchTable">
                            <tr class="header">
                                <th style="width:50%;">Lainanumero</th>
                                <th style="width:50%;">Laina-aika</th>
                            </tr>
                            <?php
                            $currentDate = date("Y-m-d");
                            $sql = "SELECT rent.rentID, rent.startTime, rent.stopTime, rentLine.product
                                    FROM rent
                                    INNER JOIN rentLine ON rent.rentID = rentLine.rent
                                    WHERE rent.startTime <= DATE '$currentDate' AND rent.stopTime >= '$currentDate' AND product = $productID AND rent.returned = 'false'
                                    ORDER BY rent.stopTime ASC;";

                            $currentResult = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($currentResult) > 0) {
                                //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                                while($row = mysqli_fetch_assoc($currentResult)) {
                                  ?>
                                  <tr id="productCurrentRentTR_<?php echo $row["rentID"]?>">
                                    <td><span class="pseudolink viewRent" id="productCurrentRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                    <td><span id="productCurrentRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime'])) . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
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
                          <a class="text-white rentLink" data-toggle="collapse" href="#productIncomingRent" aria-expanded="true">Tulevat Lainaukset</a>
                      </h5>
                  </div>

                  <div id="productIncomingRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-block bg-info" style="padding:20px;">
                        <table id="productIncomingRentTable" class="searchTable">
                            <tr class="header">
                                <th style="width:50%;">Lainanumero</th>
                                <th style="width:50%;">Laina-aika</th>
                            </tr>
                            <?php
                            $currentDate = date("Y-m-d");
                            $sql = "SELECT rent.rentID, rent.startTime, rent.stopTime, rentLine.product
                                    FROM rent
                                    INNER JOIN rentLine ON rent.rentID = rentLine.rent
                                    WHERE rent.startTime > DATE '$currentDate' AND product = $productID
                                    ORDER BY rent.startTime ASC;";

                            $incomingResult = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($incomingResult) > 0) {
                                //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                                while($row = mysqli_fetch_assoc($incomingResult)) {
                                  ?>
                                  <tr id="productIncomingRentTR_<?php echo $row["rentID"]?>">
                                    <td><span class="pseudolink viewRent" id="productRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                    <td><span id="productIncomingRentDate_<?php echo $row["rentID"]?>"><?php echo "<strong>" . date("d/m/Y", strtotime($row['startTime'])) . "</strong>" . "  -  " . date("d/m/Y", strtotime($row['stopTime']))?></span> </td>
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
                          <a class="text-white rentLink" data-toggle="collapse" href="#productOldRent" aria-expanded="true">Vanhat Lainaukset</a>
                      </h5>
                  </div>

                  <div id="productOldRent" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-block bg-secondary" style="padding:20px;">
                        <table id="productOldRentTable" class="searchTable">
                            <tr class="header">
                                <th style="width:50%;">Lainanumero</th>
                                <th style="width:50%;">Laina-aika</th>
                            </tr>
                            <?php
                            $currentDate = date("Y-m-d");
                            $sql = "SELECT rent.rentID, rent.startTime, rent.stopTime, rentLine.product
                                    FROM rent
                                    INNER JOIN rentLine ON rent.rentID = rentLine.rent
                                    WHERE rent.stopTime <= DATE '$currentDate' AND product = $productID
                                    ORDER BY rent.stopTime DESC;";

                            $oldResult = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($oldResult) > 0) {
                                //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
                                while($row = mysqli_fetch_assoc($oldResult)) {
                                  ?>
                                  <tr id="productOldRentTR_<?php echo $row["rentID"]?>">
                                    <td><span class="pseudolink viewRent" id="productOldRentID_<?php echo $row["rentID"]?>" value="<?php echo $row["rentID"]?>"><?php echo $row['rentID'] ?></span></td>
                                    <td><span id="productOldRentDate_<?php echo $row["rentID"]?>"><?php echo date("d/m/Y", strtotime($row['startTime']))  . "  -  " . "<strong>" . date("d/m/Y", strtotime($row['stopTime'])) . "</strong>"?></span> </td>
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
    <div class="row justify-content-center">
      <button class="btn btn-danger button deleteProduct selectProductButtons" value="<?php echo $productID ?>">Poista Tuote</button>
      <button class="btn btn-info button addRentBasket selectProductButtons" value="<?php echo $productID ?>">Lisää Lainauskoriin</button>
      <button class="btn btn-primary button editDevice selectProductButtons" value="<?php echo $productID ?>">Tallenna</button>
    </div>
