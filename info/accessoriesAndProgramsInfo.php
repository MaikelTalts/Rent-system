<!-- The Modal -->
<div class="modal fade" id="accessoriesAndProgramsInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Lisävarusteiden ja ohjelmien ohjeet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div id="accessoriesAndProgramsInfoAccordion">

         <div class="card infoMargin">
           <div class="card-header bg-success">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#accessoriesAndProgramsInfoAccordion" href="#addAccessoriesAndProgramsInfo">
               Lisää lisävaruste/ohjelma
             </a>
           </div>
           <div id="addAccessoriesAndProgramsInfo" class="collapse">
             <div class="card-body">
               Aloita avaamalla <strong>”laitteet”</strong> taulun ja josta valitaan olemassa oleava laite,
               <strong> käyttäjä avaa ohjelmat ja lisävarusteet, joihin käyttäjä syöttää halutut tiedot joista pakollinen on lisävarusteen tai ohjelman nimi</strong> on pakollinen,
               jotta laitteissa näkyisi lisävarusteet ja että niiden sekä ohjelmien lisääminen olisi mahdollisimman selkeä käyttäjille ja se nopeuttaisi sekä selkeyttäisi käyttäjälle ohjelmien/lisävarusteiden lisäystä laitteiseen.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-info">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#accessoriesAndProgramsInfoAccordion" href="#editAccessoriesAndProgramsInfo">
               Muokkaa lisävaruste/ohjelma
             </a>
           </div>
           <div id="editAccessoriesAndProgramsInfo" class="collapse">
             <div class="card-body">
               Muokkaus aloitetaan siirtymällä <strong>laitteet</strong> taulukolle ja valitaan muokattava ohjelman / lisävaruste, josta <strong> painetaan muokattavaa lisävarusteen tai ohjelman</strong>.
               Lisättävät tedot listään, jotka tallennataan painamalla painiketta <strong>Tallenna</strong>.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-danger">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#accessoriesAndProgramsAccordion" href="#deleteAccessoriesAndProgramsInfo">
               Poista lisävaruste/ohjelma
             </a>
           </div>
           <div id="deleteAccessoriesAndProgramsInfo" class="collapse">
             <div class="card-body">
               Poistaminen tapahtuu menemällä <strong>laite</strong> taulukkoon ja siirtymällä laitteeseen, josta poistettavan lisävarusteen/ohjelman kohdalle, josta varsinainen poisto tapahtuma alkaa. Käyttäjän painaessa
              <strong>Poista</strong> nappia järjestelmä <strong>kysyy käyttäjältä varmistuksen lainaajan poistoon. Käyttäjän hyväksyessä poistetaan lainaaja tietokannasta.</strong>
             </div>
           </div>
         </div>

       </div>

      </div>

    </div>
  </div>
</div>
