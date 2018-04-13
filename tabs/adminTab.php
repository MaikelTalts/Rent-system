<!-- adminTab on includattu sivulla:
    * /mainpage.php
-->

<div class="tab-pane" id="admin" role="tabpanel">

  <!-- Lisää tuote pudotuspaneeli alkaa -->
  <div id="adminAccordion">
      <div class="card" style="margin-top:20px;">
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
