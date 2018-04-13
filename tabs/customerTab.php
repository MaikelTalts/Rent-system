<!-- customerTab on includattu sivulla:
    * /mainpage.php
-->

<div class="tab-pane" id="customers" role="tabpanel">

  <!-- Lisää tuote pudotuspaneeli alkaa -->
  <div id="CustomerAccordion">
      <div class="card" style="margin-top:20px;">
          <div class="card-header bg-success" style=" border-radius:0px;">
            <h5 class="mb-0">
              <a class="text-white rentLink" data-toggle="collapse" data-parent="#CustomerAccordion" href="#addCustomer">Lisää uusi lainaaja</a>
            </h5>
          </div>
          <div id="addCustomer" class="collapse">
              <div class="card-body bg-light">

                      <!-- [Lisää uusi laite] lomake alkaa -->
                      <div class="row bottom-buffer">
                          <div class="col-md-6">
                              <label>Etunimi:</label>
                              <input type="text" class="form-control" id="firstName">
                          </div>
                          <div class="col-md-6">
                              <label>Sukunimi:</label>
                              <input type="text" class="form-control" id="lastName">
                          </div>
                      </div>
                      <div class="row bottom-buffer">
                          <div class="col-md-6">
                              <label>Puhelinnumero</label>
                              <input type="text" class="form-control" id="phoneNumber">
                          </div>
                          <div class="col-md-6">
                              <label>Sähköposti:</label>
                              <input type="text" class="form-control" id="customerEmail">
                          </div>
                      </div>
                      <div class="row bottom-buffer">
                          <div class="col-md-6">
                              <label>Luokkatunnus</label>
                              <input type="text" class="form-control" id="classID">
                          </div>
                          <div class="col-md-6">

                          </div>
                      </div>


                  <button class="btn btn-primary button" id="newCustomer"/>Tallenna</button>
              <!-- [Lisää uusi laite] Lomake loppuu -->

              </div>
          </div>
      </div>
  </div>
  <!-- Lisää tuote pudotuspaneeli loppuu -->



  <input type="text" id="customerSearchInputTab" class="searchInput" onkeyup="customerSearch()" placeholder="Etsi lainaajaa nimellä..." title="Type in a name" style="margin-top:20px;">
  <table id="searchCustomerTable" class="searchTable" style="margin-bottom:50px;">
      <tr class="header">
          <th style="width:50%;">Nimi</th>
          <th style="width:25%;">Luokkatunnus</th>
          <th style="width:25%;">Lainatilanne</th>
      </tr>
      <!-- Etsitään tietokannasta löytyvät lainaajat ja tulostetaan taulukkona -->
      <?php
      $sql = "SELECT * FROM customer
              ORDER BY firstName ASC;";
      $result = mysqli_query($mysqli, $sql);

      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            ?>
               <tr id="customerTR_<?php echo $row["customerID"]?>">
                 <td> <span class="pseudolink viewCustomer" id="customerName_<?php echo $row["customerID"]?>" value="<?php echo $row["customerID"]?>"><?php echo $row["firstName"] . " " . $row["lastName"]?></span></td>
                 <td> <span id="customerClassID_<?php echo $row["customerID"]?>"><?php echo $row["classID"] ?></span></td>
                 <td> <span id="customerEmail_<?php echo $row["customerID"]?>"><?php echo $row["email"] ?></span> </td>
               </tr>
          <?php
          }
      } else {
        //Do nothing
        echo "Tietokannasta ei löytynyt yhtään lainaajaa.";
      }

      //mysqli_close($mysqli);
      ?>
  </table>

</div>
