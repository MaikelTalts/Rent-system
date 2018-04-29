<!-- settingsTab on includattu sivulla:
    * /mainpage.php
-->

<div class="tab-pane" id="settings" role="tabpanel">

<!-- Tuoteryhmä & Statushallinta -->
        <div class="card" style="margin-top:20px;">
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

<!-- Lisää Admin pudotuspaneeli alkaa -->
        <div id="adminAccordion">
            <div class="card" style="margin-top:10px;">
                <div class="card-header bg-success">
                  <h5 class="mb-0">
                    <a class="text-white rentLink" data-toggle="collapse" data-parent="#adminAccordion" href="#addadmin">Lisää uusi Admin</a>
                  </h5>
                </div>
                <div id="addadmin" class="collapse">
                    <div class="card-body bg-light">

                            <!-- [Lisää uusi laite] lomake alkaa -->
                            <div class="row bottom-buffer">
                                <div class="col-md-6">
                                    <label>Etunimi:</label>
                                    <input type="text" class="form-control" id="adminFirstName">
                                </div>
                                <div class="col-md-6">
                                    <label>Sukunimi:</label>
                                    <input type="text" class="form-control" id="adminLastName">
                                </div>
                            </div>
                            <div class="row bottom-buffer">
                                <div class="col-md-6">
                                    <label>Puhelinnumero</label>
                                    <input type="text" class="form-control" id="adminPhoneNumber">
                                </div>
                                <div class="col-md-6">
                                    <label>Sähköposti:</label>
                                    <input type="text" class="form-control" id="adminEmail">
                                </div>
                            </div>
                            <div class="row bottom-buffer">
                                <div class="col-md-6">
                                    <label>Salasana</label>
                                    <input type="password" class="form-control" id="adminPassword">
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>


                        <button class="btn btn-primary button" id="newAdmin"/>Tallenna</button>
                    <!-- [Lisää uusi laite] Lomake loppuu -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Lisää tuote pudotuspaneeli loppuu -->



        <input type="text" id="adminSearchInput" class="searchInput" onkeyup="adminSearch()" placeholder="Etsi lainaajaa nimellä..." title="Type in a name" style="margin-top:20px;">
        <table id="adminTable" class="searchTable" style="margin-bottom:50px;">
            <tr class="header">
                <th style="width:50%;">Nimi</th>
                <th style="width:25%;">Puhelinnumero</th>
                <th style="width:25%;">Sähköposti</th>
            </tr>
            <!-- Etsitään tietokannasta löytyvät lainaajat ja tulostetaan taulukkona -->
            <?php
            $sql = "SELECT * FROM admin
                    ORDER BY firstName ASC;";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  ?>
                     <tr id="adminTR_<?php echo $row["adminID"]?>">
                       <td> <span class="pseudolink viewAdmin" id="adminName_<?php echo $row["adminID"]?>" value="<?php echo $row["adminID"]?>"><?php echo $row["firstName"] . " " . $row["lastName"]?></span></td>
                       <td> <span id="adminPhoneNumber_<?php echo $row["adminID"]?>"><?php echo $row["phoneNumber"] ?></span> </td>
                       <td> <span id="adminEmail_<?php echo $row["adminID"]?>"><?php echo $row["email"] ?></span> </td>
                     </tr>
                <?php
                }
            } else {
              //Do nothing
              echo "Tietokannasta ei löytynyt yhtään adminia.";
            }

            //mysqli_close($mysqli);
            ?>
        </table>

</div>
