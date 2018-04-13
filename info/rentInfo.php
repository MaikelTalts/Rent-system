<!-- The Modal -->
<div class="modal fade" id="rentInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Lainahallinta ohjeet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div id="rentInfoAccordion">

         <div class="card infoMargin">
           <div class="card-header bg-success">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#rentInfoAccordion" href="#addRentInfo">
               Lisää uusi lainaus
             </a>
           </div>
           <div id="addRentInfo" class="collapse">
             <div class="card-body">
               Lainattavat laitteet: Siirry Laitteet välilehdelle ja klikkaa haluamiesi tuotteiden rivillä [Koriin] painiketta, valitsemasi tuote lisätään lainauskoriin.
               Laina-aika: Valitse lainalle alkamis ja loppumispäivä, Alkamis ja loppumispäivän välissä ei saa olla harmaiksi merkattuja päiviä.
               Kuvaus: Kirjoita kuvauskenttään syy lainalle ja halutessasi muita lainan kannalta tarpeellisia tietoja.
               Klikkaa lopuksi [Luo Lainaus] painiketta, jolloin laina luodaan ja tulostetaan Lainaukset välilehdelle.

             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-info">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#rentInfoAccordion" href="#editRentInfo">
               Muokkaa lainausta
             </a>
           </div>
           <div id="editRentInfo" class="collapse">
             <div class="card-body">
               Tähän väliin tietoa laitteen lainan muokkaamisesta
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-danger">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#rentInfoAccordion" href="#deleteRentInfo">
               Poista Laite
             </a>
           </div>
           <div id="deleteRentInfo" class="collapse">
             <div class="card-body">
               Tähän väliin tietoa lainauksen poistamiesta
             </div>
           </div>
         </div>

       </div>

      </div>


    </div>
  </div>
</div>
