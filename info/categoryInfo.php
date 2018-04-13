<!-- The Modal -->
<div class="modal fade" id="categoryInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Kategorianhallinan ohjeet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div id="categoryInfoAccordion">

         <div class="card infoMargin">
           <div class="card-header bg-success">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#categoryAndStatusInfoAccordion" href="#addCategoryInfo">
               Lisää kategoria
             </a>
           </div>
           <div id="addCategoryInfo" class="collapse">
             <div class="card-body">
               Aloita avaamalla <strong>"kategoria"</strong> taulu ja josta valitaan <strong>”lisää"</strong>,
               käyttäjä näkee kaikki kategorian nimen johon syötetään lisättävän kategorian nimi, joista <strong>Kategorian nimi</strong> on pakollinen.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-info">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#categoryInfoAccordion" href="#editCategoryInfo">
               Muokkaa kategoriaa
             </a>
           </div>
           <div id="editCategoryInfo" class="collapse">
             <div class="card-body">
               Muokkaus aloitetaan siirtymällä <strong>laite</strong> taulukolle ja valitaan <strong>kategoria</strong>, josta <strong> painetaan muokkaa nappia</strong>.
               jotka tallennataan painamalla painiketta <strong>Tallenna</strong>.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-danger">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#categoryInfoAccordion" href="#deleteCategoryInfo">
               Poista kategoria
             </a>
           </div>
           <div id="deleteCategoryInfo" class="collapse">
             <div class="card-body">
               Poistaminen tapahtuu menemällä <strong>laite</strong> taulukkoon ja siirtymällä poistettavaan kategoriaan josta varsinainen poisto tapahtuu käyttäjän painaessa
               <strong>Poista</strong> nappia järjestelmä <strong>kysyy käyttäjältä varmistuksen lainaajan poistoon. Käyttäjän hyväksyessä poistetaan kategoria tietokannasta ja samalla olemassa olevista laitteista.</strong>
             </div>
           </div>
         </div>

       </div>

      </div>

    </div>
  </div>
</div>
