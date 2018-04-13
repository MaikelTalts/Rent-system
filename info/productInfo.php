<!-- The Modal -->
<div class="modal fade" id="productInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Laitehallinta ohjeet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div id="ProductInfoAccordion">

         <div class="card infoMargin">
           <div class="card-header bg-success">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#productControlAccordion" href="#addProductInfo">
               Lisää laite
             </a>
           </div>
           <div id="addProductInfo" class="collapse">
             <div class="card-body">
               <ul style="margin:0px; padding:15px;">
                 <li>Avaa <b>Laitteet</b> välilehti ja klikkaa <b>Lisää uusi laite</b> paneelia.</li>
                 <li>Syötä vähintään laitteen nimi ja klikkaa <b>Tallenna</b> painiketta.</li>
                 <li>Lisäämäsi ilmestyy laitelistaukseen.</li>
               </ul>
               <h5>Huom!</h5>
               Jotta laitteista olisi mahdollisimman paljon tietoa käyttäjille ja järjestelmän käyttö olisi nopeampaa ja selkeämpää, on toivottavaa että jokaiseen tuotetta koskevaan
               kenttään syötettäisiin tietoa.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-info">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#productControlAccordion" href="#editProductInfo">
               Muokkaa laitetta
             </a>
           </div>
           <div id="editProductInfo" class="collapse">
             <div class="card-body">
               <ul style="margin:0px; padding:15px;">
                 <li>Avaa <b>Laitteet</b> välilehti ja klikkaa laitelistauksessa haluamasi laitteen nimeä.</b></li>
                 <li>Muuta tai päivitä laitetietoja avautuvassa modaalissa</li>
                 <li>Kun olet muuttanut laitetiedot klikkaa <b>Tallenna painiketta</b></li>
                 <li>Tekemäsi muutokset päivittyvät välittömästi laitelistaukseen</li>
               </ul>
               <h5>Huom!</h5>
               Tallentaessasi laitemuokkauksen tulee vähintään laitteen nimen sisältää tekstiä.
             </div>
           </div>
         </div>

         <div class="card infoMargin">
           <div class="card-header bg-danger">
             <a class="text-white rentLink" data-toggle="collapse" data-parent="#productControlAccordion" href="#deleteProductInfo">
               Poista laite
             </a>
           </div>
           <div id="deleteProductInfo" class="collapse">
             <div class="card-body">
               <ul style="margin:0px; padding:15px;">
                 <li>Avaa <b>Laitteet</b> välilehti ja klikkaa laitelistauksessa laitteen nimeä, jonka haluat poistaa</li>
                 <li>Avautuvassa modaalissa klikkaa <b>Poista tuote</b> painiketta.</li>
                 <li>Hyväksy poistovarmistus</li>
                 <li>Laite poistetaan järjestelmästä ja laitelistauksesta</li>
               </ul>
               <h5>Huom!</h5>
               Järjestelmä estää laitteen poiston, jos sille on luotu lainauksia. Poista laitteen lainaukset, ennen varsinaista laitteenpoistoa.
             </div>
           </div>
         </div>

       </div>

      </div>


    </div>
  </div>
</div>
