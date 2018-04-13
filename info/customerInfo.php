<!-- The Modal -->
<div class="modal fade" id="customerInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Lainaajahallinta ohjeet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div id="customerInfoAccordion">

         <div class="card infoMargin">
           <div class="card-header bg-success">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#customerInfoAccordion" href="#addcustomerInfo">
               Lisää lainaaja
             </a>
           </div>
           <div id="addcustomerInfo" class="collapse">
             <div class="card-body">
               Lainaajan lisääminen aloitetaan menemällä <strong>lainaajat</strong> tauluun ja valitsemalla ”uusi lainaaja” taulusta ja kirjaamalla lainaajan etu- ja sukunimet, jotka ovat pakollisia.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-info">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#customerInfoAccordion" href="#editCustomerInfo">
               Muokkaa lainaajaa
             </a>
           </div>
           <div id="editCustomerInfo" class="collapse">
             <div class="card-body">
              Lainaajan poisto tapahtuu menemällä <strong>lainaajat</strong> tauluun ja valitsemalla <strong>lainaaja</strong> kohta painamalla <strong>poista</strong> nappia,
              järjestelmä kysyy varmistuksen lainaajan poistamiseksi ja jos käyttäjä hyväksyy varmenteen,
              lainaaja poistetaan järjestelmästä ja samoin tietokannasta.<strong> Jos käyttäjä painaa Ei varmistuksessa, poisto keskeytetään.</strong>
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-danger">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#customerInfoAccordion" href="#deleteCustomerInfo">
               Poista lainaaja
             </a>
           </div>
           <div id="deleteCustomerInfo" class="collapse">
             <div class="card-body">
               Lainaajan muokkaus aloitetaan painamalla <strong>Lainaaja</strong> taulu ja valitsemalla lainaaja ja painamalla <strong>poista</strong> painiketta.
               poiston jälkeen käyttäjä painaa <strong>tallenna</strong>, jolloin lainaajan tiedot poistetaan tietokannasta sekä järjestelmästä.
             </div>
           </div>
         </div>

       </div>

      </div>


    </div>
  </div>
</div>
