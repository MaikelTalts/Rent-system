<!-- rentModal.php on includattu sivulla:
    /mainpage.php
-->

<div class="modal fade" id="rentModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Lainauskori</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" id="rentDetail">

        <!-- LAINATTAVIEN LAITTEIDEN LISTAUS -->
        <div class="container">
              <table id="rentBasketTable" class="searchTable" style="margin-bottom:50px;">
                  <tr class="header">
                      <th style="width:50%;">Nimi</th>
                      <th style="width:20%;">Status</th>
                      <th style="width:20%;">Kategoria</th>
                      <th style="width:10%;">Poista</th>
                  </tr>
              </table>
        </div>
        <!-- LAINATTAVIEN LAITTEIDEN LISTAUS  LOPPUU-->

        <!-- LAINAAJAN VALINTA ALKAA -->
        <div class="container" style=" margin-bottom:40px;">
            <div class="card">
                <h5 class="card-header">Lainaaja</h5>
                <div class="card-block" style="padding:20px;">
                  <div class="container" style="margin-bottom:10px;">
                      <div class="row">
                          <input type="text" id="customerSearchInput" class="form-control" size="30" onkeyup="showCustomer(this.value)" placeholder="Etsi lainaaja etunimellä">
                          <div id="livesearch" style="width:50%;">

                          </div>
                      </div>
                  </div>
                  <div class="row bottom-buffer">
                      <div class="col-md-6">
                          <label>Etunimi:</label>
                          <input type="text" class="form-control" id="rentFirstName">
                      </div>
                      <div class="col-md-6">
                          <label>Sukunimi:</label>
                          <input type="text" class="form-control" id="rentLastName">
                      </div>
                  </div>
                  <div class="row bottom-buffer">
                      <div class="col-md-6">
                          <label>Luokkatunnus</label>
                          <input type="text" class="form-control" id="rentClassID">
                      </div>
                      <div class="col-md-6">
                        <label>Sähköposti:</label>
                        <input type="text" class="form-control" id="rentEmail">
                        <p id="currentRentCustomer" style="display:none;"></p>
                      </div>
                  </div>
                  <center><button class="btn btn-success button" id="rentAddNewCustomer" style="margin-top:10px;">Luo uusi lainaaja</button></center>
              </div>
          </div>
        </div>
        <!-- LAINAAJAN VALINTA LOPPUU-->

        <!-- LAINA-AJAN VALINTA ALKAA -->

        <div class="container" style=" margin-bottom:40px;">
            <div class="card">
                <h5 class="card-header">Laina-aika</h5>
            <div class="card-block" style="padding:20px;">
                <div class="row">
                    <div class="col-md-6">
                        <label for="from">Alkaa</label>
                        <input type="text" id="from" class="form-control" name="from">
                    </div>
                    <div class="col-md-6">
                        <label for="to">Päättyy</label>
                        <input type="text" id="to" class="form-control to" name="to">
                    </div>
                  </div>
          </div>
          </div>
      </div>
        <!-- LAINA-AJAN VALINTA LOPPUU -->

        <!-- KUVAUS ALKAA -->
        <div class="container">
            <div class="card">
                <h5 class="card-header">Lainan kuvaus</h5>
                <div class="card-block" style="padding:20px;">
                    <div class="form-group">
                       <textarea class="form-control" rows="2" id="newRentDescription"></textarea>
                    </div>
                </div>
          </div>
      </div>
      <!-- KUVAUS LOPPUU -->



        <hr  style="margin-top:5%;" />
    <center><button class="btn btn-success button createRent" style="margin-top:10px;">Luo Lainaus</button></center>
        </div>

      </div>
    </div>
</div>
