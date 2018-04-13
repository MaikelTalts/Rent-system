<!-- The Modal -->
<div class="modal fade" id="adminInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Adminhallinta ohjeet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div id="adminInfoAccordion">

         <div class="card infoMargin">
           <div class="card-header bg-success">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#adminInfoAccordion" href="#addAdminInfo">
               Lisää uusi admin
             </a>
           </div>
           <div id="addAdminInfo" class="collapse">
             <div class="card-body">
               Aloita avaamalla <strong>"admin"</strong> taulu ja josta valitaan <strong>”lisää uusi admin”</strong>,
               käyttäjä näkee kaikki kohdat joihin tietoa syötetään, joista <strong>"adminin  Etunimi, sukunimi, sähköposti ja salasana ovat pakollisia
               "</strong> ovat pakollisia lisäämisen onnistumiseksi.

               NOTE: <strong>Adminia voi muokata vain ADMIN tunnuksilla.</strong>
             </div></strong>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-info">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#adminInfoAccordion" href="#editAdminInfo">
               Muokkaa adminia
             </a>
           </div>
           <div id="editAdminInfo" class="collapse">
             <div class="card-body">
               Muokkaus aloitetaan siirtymällä <strong>admin</strong> taulukolle ja valitaan muokattava admin, josta <strong> painetaan muokttavaa adminia</strong>.
               Lisättävät tedot listään, jotka tallennataan painamalla painiketta <strong>Tallenna</strong>.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-danger">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#adminInfoAccordion" href="#deleteAdminInfo">
               Poista admin
             </a>
           </div>
           <div id="deleteAdminInfo" class="collapse">
             <div class="card-body">
               Poistaminen tapahtuu menemällä <strong>Admin</strong> taulukkoon ja siirtymällä poistettavaan adminin josta varsinainen poisto tapahtuu käyttäjän painaessa
              <strong>Poista</strong> nappia järjestelmä <strong>kysyy käyttäjältä varmistuksen lainaajan poistoon. Käyttäjän hyväksyessä poistetaan lainaaja tietokannasta.</strong>
             </div>
           </div>
         </div>

       </div>

      </div>


    </div>
  </div>
</div>
