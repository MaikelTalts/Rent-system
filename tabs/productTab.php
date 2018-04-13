<!-- devicesTab on includattu sivulla:
    * /mainpage.php
-->

<div class="tab-pane active" id="product" role="tabpanel">

      <!-- Lisää tuote pudotuspaneeli alkaa -->
      <div id="accordion">
          <div class="card" style="margin-top:20px;">
              <div class="card-header bg-success">
                <h5 class="mb-0">
                  <a class="text-white rentLink" data-toggle="collapse" data-parent="#accordion" href="#addProduct">Lisää uusi laite</a>
                </h5>
              </div>
              <div id="addProduct" class="collapse">
                  <div class="card-body bg-light">

                    <!-- [Lisää uusi laite] lomake alkaa -->
                          <div class="form-group">
                              <label>Laitteen nimi:</label>
                              <input type="text" class="form-control" id="productName" name="productName">
                          </div>
                          <div class="row bottom-buffer">
                              <div class="col-md-6">
                                  <label>Sarjanumero:</label>
                                  <input type="text" class="form-control" id="serialNumber" name="serial">
                              </div>
                              <div class="col-md-6">
                                  <label>Viivakoodi:</label>
                                  <input type="text" class="form-control" id="barcode" name="barcode">
                              </div>
                          </div>
                          <div class="row bottom-buffer">
                              <div class="col-md-6">
                                  <label>Valmistaja:</label>
                                  <input type="text" class="form-control" id="manufacturer" name="manufacturer">
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="sel1">Kategoria:</label>
                                      <select class="form-control" id="category" name="category">
                                          <!-- Ajetaan tietokannassa olevat kategoriat valinnoiksi -->
                                          <?php
                                          $sql = "SELECT * FROM category;";
                                          $result = mysqli_query($mysqli, $sql);

                                          if (mysqli_num_rows($result) > 0) {
                                              //Tulostetaan jokainen tietokannasta löytyvä laite kategoria pudotusvalikon valinnaksi
                                              while($row = mysqli_fetch_assoc($result)) {
                                                  echo "<option value=" . $row['categoryID'] . " id='newProductCategory_".$row['categoryID']."'>" . $row["name"] . "</option>";}
                                          } else {
                                            //Do nothing
                                          }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="sel1">Status:</label>
                                      <select class="form-control" id="status" name="status">
                                          <!-- Ajetaan tietokannassa olevat statukset valinnoiksi -->
                                          <?php
                                          $sql = "SELECT * FROM status;";
                                          $result = mysqli_query($mysqli, $sql);

                                          if (mysqli_num_rows($result) > 0) {
                                              //Tulostetaan jokainen tietokannasta löytyvä laitestatus pudotusvalikon valinnaksi
                                              while($row = mysqli_fetch_assoc($result)) {
                                                  echo "<option value=" . $row['statusID'] . " id='newProductStatus_".$row['statusID']."'>" . $row["status"] . "</option>";}
                                          } else {
                                            //Do nothing
                                          }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label for="comment">Kuvaus:</label>
                                      <textarea type="text" class="form-control" rows="1" id="description" name="description"></textarea>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-6">
                                <div class="card" style="margin-bottom:20px;" style="padding:0px;">
                                    <div class="card-header bg-success">
                                        <a class="text-white rentLink" data-toggle="collapse" data-parent="#sortByAccordion" href="#productAccessories">Lisävarusteet</a>
                                    </div>

                                    <div id="productAccessories" class="collapse">
                                        <div class="card-body" style="padding:0px;">
                                            <table class="table table-bordered" style="margin-bottom:0px;">
                                              <thead>
                                                 <tr>
                                                   <th>Lisävaruste</th>
                                                   <th><center>Muokkaa</center></th>
                                                   <th><center>Poista</center></th>
                                                 </tr>
                                              </thead>
                                              <tbody class="accessoryList">
                                                <tr>
                                                    <td><input type="text" class="form-control" id="newAccessoryInput"></td>
                                                    <td style="text-align:center;"><button type="button" class="btn btn-success btn-sm addNewAccessory">Lisää</button></td>
                                                    <td></td>
                                                </tr>
                                                <?php
                                                $sql = "SELECT * FROM accessory";
                                                $result = mysqli_query($mysqli, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                   //Tulostetaan jokainen tietokannasta löytyvä lisävaruste omaksi checkboxiksi
                                                   while($row = mysqli_fetch_assoc($result)) {
                                                      ?>
                                                      <tr id="trAccessory_<?php echo $row["accessoryID"] ?>">
                                                          <td>
                                                            <input type="text" class="form-control accessoryInputClass" id="accessoryInput_<?php echo $row["accessoryID"] ?>">
                                                              <div class="checkbox accessoryCheckboxClass" id="accessoryCheckbox_<?php echo $row["accessoryID"] ?>">
                                                                <label><input type="checkbox" value="<?php echo $row["accessoryID"] ?>" class="accessoryCheckbox">  <span id="accessorySpan_<?php echo $row["accessoryID"] ?>"><?php echo $row["name"] ?></span></label>
                                                              </div>
                                                          </td>
                                                          <td>
                                                            <center>
                                                              <button type="button" class="btn btn-success btn-sm accessoryConfirmClass" id="accessoryConfirm_<?php echo $row["accessoryID"] ?>" value="<?php echo $row["accessoryID"] ?>">Tallenna</button>
                                                              <button type="button" class="btn btn-primary btn-sm accessoryEditClass" value="<?php echo $row["accessoryID"] ?>">Muokkaa</button>
                                                            </center>
                                                          </td>
                                                          <td>
                                                            <center>
                                                              <button type="button" class="btn btn-sm btn-danger accessoryDeleteClass" id="accessoryDelete_<?php echo $row["accessoryID"] ?>" value="<?php echo $row["accessoryID"] ?>">Poista</button>
                                                              <button type="button" class="btn btn-sm btn-primary accessoryCancelClass" id="accessoryCancel_<?php echo $row["accessoryID"] ?>" value="<?php echo $row["accessoryID"] ?>">Peruuta</button>
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

                              <div class="col-md-6">
                                  <div class="card" style="margin-bottom:20px;">
                                      <div class="card-header bg-success">
                                          <a class="text-white rentLink" data-toggle="collapse" data-parent="#sortByAccordion" href="#productPrograms">Ohjelmat</a>
                                      </div>

                                      <div id="productPrograms" class="collapse">
                                          <div class="card-body" style="padding:0px;">
                                            <table class="table table-bordered" style="margin-bottom:0px;">
                                              <thead>
                                                 <tr>
                                                   <th>Ohjelma</th>
                                                   <th><center>Muokkaa</center></th>
                                                   <th><center>Poista</center></th>
                                                 </tr>
                                              </thead>
                                              <tbody class="programList">
                                                <tr>
                                                    <td><input type="text" class="form-control" id="newProgramInput"></td>
                                                    <td style="text-align:center;"><button type="button" class="btn btn-success btn-sm addNewProgram">Lisää</button></td>
                                                    <td></td>
                                                </tr>
                                                <?php
                                                $sql = "SELECT * FROM program";
                                                $result = mysqli_query($mysqli, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                   //Tulostetaan jokainen tietokannasta löytyvä lisävaruste omaksi checkboxiksi
                                                   while($row = mysqli_fetch_assoc($result)) {
                                                      ?>
                                                      <tr id="trProgram_<?php echo $row["programID"] ?>">
                                                          <td>
                                                            <input type="text" class="form-control programInputClass" id="programInput_<?php echo $row["programID"] ?>">
                                                              <div class="checkbox programCheckboxClass" id="programCheckbox_<?php echo $row["programID"] ?>">
                                                                <label><input type="checkbox" value="<?php echo $row["programID"] ?>" class="programCheckbox">  <span id="programSpan_<?php echo $row["programID"] ?>"><?php echo $row["name"] ?></span></label>
                                                              </div>
                                                          </td>
                                                          <td>
                                                            <center>
                                                              <button type="button" class="btn btn-success btn-sm programConfirmClass" id="programConfirm_<?php echo $row["programID"] ?>" value="<?php echo $row["programID"] ?>">Tallenna</button>
                                                              <button type="button" class="btn btn-primary btn-sm programEditClass" value="<?php echo $row["programID"] ?>">Muokkaa</button>
                                                            </center>
                                                          </td>
                                                          <td>
                                                            <center>
                                                              <button type="button" class="btn btn-sm btn-danger programDeleteClass" id="programDelete_<?php echo $row["programID"] ?>" value="<?php echo $row["programID"] ?>">Poista</button>
                                                              <button type="button" class="btn btn-sm btn-primary programCancelClass" id="programCancel_<?php echo $row["programID"] ?>" value="<?php echo $row["programID"] ?>">Peruuta</button>
                                                            </center>
                                                          </td>
                                                      </tr>
                                                      <?php
                                                    }
                                                }

                                                else {
                                                echo "Tietokannasta ei löytynyt yhtään ohjelmaa.";
                                                }
                                                ?>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                  </div>

                              </div>
                          </div>
                      <button class="btn btn-primary button" id="newDevice"/>Tallenna</button>
                  <!-- [Lisää uusi laite] Lomake loppuu -->

                  </div>
              </div>
          </div>
      </div>
<!-- Lisää tuote pudotuspaneeli loppuu -->


<!-- Tuoteryhmä & Statushallinta -->
      <div class="card" style="margin-top:10px;">
          <div class="card-header bg-info">
            <h5 class="mb-0">
              <a class="text-white rentLink" data-toggle="collapse" data-parent="#sortByAccordion" href="#categoryAndStatusControl">Kategoria- ja Statushallinta</a>
            </h5>
          </div>

          <div id="categoryAndStatusControl" class="collapse">
              <div class="card-body bg-light">
                  <div class="row">
                      <div class="col-md-6">
                        <table class="table table-bordered" style="margin-bottom:0px; background-color:white;">
                          <thead>
                             <tr>
                               <th>Kategoria</th>
                               <th><center>Muokkaa</center></th>
                               <th><center>Poista</center></th>
                             </tr>
                          </thead>
                          <tbody class="categoryList">
                            <tr>
                                <td><input type="text" class="form-control" id="newCategoryInput"></td>
                                <td style="text-align:center;"><button type="button" class="btn btn-success btn-sm addNewCategory">Lisää</button></td>
                                <td></td>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM category";
                            $result = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($result) > 0) {
                               //Tulostetaan jokainen tietokannasta löytyvä kategoria omalle riville.
                               while($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <tr id="trCategory_<?php echo $row["categoryID"] ?>">
                                      <td>
                                        <input type="text" class="form-control categoryInputClass" id="categoryInput_<?php echo $row["categoryID"] ?>">
                                          <span id="categorySpan_<?php echo $row["categoryID"] ?>"><?php echo $row["name"] ?></span>
                                      </td>
                                      <td>
                                        <center>
                                          <button type="button" class="btn btn-success btn-sm categoryConfirmClass" id="categoryConfirm_<?php echo $row["categoryID"] ?>" value="<?php echo $row["categoryID"] ?>">Tallenna</button>
                                          <button type="button" class="btn btn-primary btn-sm categoryEditClass" value="<?php echo $row["categoryID"] ?>">Muokkaa</button>
                                        </center>
                                      </td>
                                      <td>
                                        <center>
                                          <button type="button" class="btn btn-sm btn-danger categoryDeleteClass" id="categoryDelete_<?php echo $row["categoryID"] ?>" value="<?php echo $row["categoryID"] ?>">Poista</button>
                                          <button type="button" class="btn btn-sm btn-primary categoryCancelClass" id="categoryCancel_<?php echo $row["categoryID"] ?>" value="<?php echo $row["categoryID"] ?>">Peruuta</button>
                                        </center>
                                      </td>
                                  </tr>
                                  <?php
                                }
                            }

                            else {
                            echo "Tietokannasta ei löytynyt yhtään kategorioita.";
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" style="margin-bottom:0px; background-color:white;">
                          <thead>
                             <tr>
                               <th>Status</th>
                               <th><center>Muokkaa</center></th>
                               <th><center>Poista</center></th>
                             </tr>
                          </thead>
                          <tbody class="statusList">
                            <tr>
                                <td><input type="text" class="form-control" id="newStatusInput"></td>
                                <td style="text-align:center;"><button type="button" class="btn btn-success btn-sm addNewStatus">Lisää</button></td>
                                <td></td>
                            </tr>
                            <?php
                            $sql = "SELECT * FROM status";
                            $result = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($result) > 0) {
                               //Tulostetaan jokainen tietokannasta löytyvä kategoria omalle riville.
                               while($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <tr id="trStatus_<?php echo $row["statusID"] ?>">
                                      <td>
                                        <input type="text" class="form-control statusInputClass" id="statusInput_<?php echo $row["statusID"] ?>">
                                            <span id="statusSpan_<?php echo $row["statusID"] ?>"><?php echo $row["status"] ?></span>
                                      </td>
                                      <td>
                                        <center>
                                          <button type="button" class="btn btn-success btn-sm statusConfirmClass" id="statusConfirm_<?php echo $row["statusID"] ?>" value="<?php echo $row["statusID"] ?>">Tallenna</button>
                                          <button type="button" class="btn btn-primary btn-sm statusEditClass" value="<?php echo $row["statusID"] ?>">Muokkaa</button>
                                        </center>
                                      </td>
                                      <td>
                                        <center>
                                          <button type="button" class="btn btn-sm btn-danger statusDeleteClass" id="statusDelete_<?php echo $row["statusID"] ?>" value="<?php echo $row["statusID"] ?>">Poista</button>
                                          <button type="button" class="btn btn-sm btn-primary statusCancelClass" id="statusCancel_<?php echo $row["statusID"] ?>" value="<?php echo $row["statusID"] ?>">Peruuta</button>
                                        </center>
                                      </td>
                                  </tr>
                                  <?php
                                }
                            }

                            else {
                            echo "Tietokannasta ei löytynyt yhtään kategorioita.";
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>

<!-- Lajittelu pudotuspaneeli alkaa -->
      <div class="card" style="margin-top:10px;">
          <div class="card-header bg-secondary">
            <h5 class="mb-0">
              <a class="text-white rentLink" data-toggle="collapse" data-parent="#sortByAccordion" href="#sortBy">Lajittelu</a>
            </h5>
          </div>

          <div id="sortBy" class="collapse">
              <div class="card-body bg-light">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="sel1">Kategoria:</label>
                              <select class="form-control" id="selectCategory">
                                <option>Kaikki</option>
                                 <?php
                                  $sql = "SELECT * FROM category";
                                  $result = mysqli_query($mysqli, $sql);

                                  if (mysqli_num_rows($result) > 0) {
                                      //Tulostetaan jokainen tietokannasta löytyvä laite kategoria pudotusvalikon valinnaksi
                                      while($row = mysqli_fetch_assoc($result)) {
                                          echo "<option value=" . $row['categoryID'] . " id='filterByCategory_".$row['categoryID']."'>" . $row["name"] . "</option>"; }
                                  } else {
                                    echo "Tietokannasta ei löytynyt yhtään kategoriaa.";
                                  }
                                 ?>
                            </select>
                            </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="sel1">Status:</label>
                              <select class="form-control" id="selectStatus">
                                <option>Kaikki</option>
                                 <?php
                                  $sql="SELECT * FROM status";
                                  $result = mysqli_query($mysqli, $sql);

                                  if(mysqli_num_rows($result) > 0) {
                                    //Tulostetaan jokainen tietokannasta löytyvä status pudotusvalikon valinnaksi
                                    while($row = mysqli_fetch_assoc($result)) {
                                      echo "<option value=" . $row['statusID'] . " id='filterByStatus_" . $row['statusID']."'>" . $row['status'] . "</option>";}
                                  } else{
                                    echo "Tietokanansta ei löytynyt yhtään statusta.";
                                  }
                                  ?>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<!-- Lajittelu pudotuspaneeli loppuu -->


<!-- LAINATTAVIEN LAITTEIDEN LISTAUS -->
      <input type="text" id="deviceSearchInput" class="searchInput" onkeyup="deviceSearch()" placeholder="Etsi laitetta nimellä..." title="Type in a name" style="margin-top:20px;">
      <table id="deviceTable" class="searchTable" style="margin-bottom:50px;">
          <tr class="header">
              <th style="width:50%;">Nimi</th>
              <th style="width:20%;">Status</th>
              <th style="width:20%;">Kategoria</th>
              <th style="width:10%;">Koriin</th>
          </tr>
          <!-- Etsitään tietokannasta löytyvät laitteet ja tulostetaan taulukkona -->
          <?php
          $sql = "SELECT product.productID, product.productName, category.name, status.status
                  FROM ((product
                  INNER JOIN category ON product.category = category.categoryID)
                  INNER JOIN status ON product.status = status.statusID)
                  ORDER BY productName ASC;";
          $result = mysqli_query($mysqli, $sql);

          if (mysqli_num_rows($result) > 0) {
              //Tulostetaan jokainen tietokannasta löytyvä laite omana rivinä taulukkoon.
              while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr id="productTR_<?php echo $row["productID"]?>" class="productTr" value="<?php echo $row["productID"]?>">
                  <td> <span class="pseudolink viewProduct" id="productName_<?php echo $row["productID"]?>" value="<?php echo $row["productID"]?>"> <?php echo $row["productName"] ?></span> </td>
                  <td> <span id="productStatus_<?php echo $row["productID"]?>"><?php echo $row["status"] ?></span></td>
                  <td> <span id="productCategory_<?php echo $row["productID"]?>"><?php echo $row["name"] ?></span></td>
                  <td>
                    <button id="deleteRentBasket_<?php echo $row["productID"]?>" type="button" class="btn btn-danger deleteRentBasket" value="<?php echo $row["productID"]?>">Poista</button>
                    <button id="addRentBasket_<?php echo $row["productID"]?>" type="button" class="btn btn-primary addRentBasket" value="<?php echo $row["productID"]?>">Koriin</button>
                  </td>
                </tr>
                <?php
              }
          } else {
            echo "Tietokannasta ei löytynyt yhtään laitetta.";
          }
          ?>
      </table>
<!-- LAINATTAVIEN LAITTEIDEN LISTAUS  LOPPUU-->
</div>
