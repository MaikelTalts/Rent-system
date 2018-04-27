<script>

//== == == == == == == == == == == == == == == == == == == == == == == GLOBAALIT MUUTTUJAT == == == == == == == == == == == == == == == == == == == == == == == //

var days = [];
var devices = [];
var rentAppend;
var rentAppendCheck;
var spawnMoreRents = 20;
var minimumDate;
var rentCustomer;
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();

    });

//== == == == == == == == == == == == == == == == == == == == == == == LISÄÄ UUSI LISÄVARUSTE == == == == == == == == == == == == == == == == == == == == == == == //

    /*Käyttäjän klikatessa painiketta, jolla on addNewAccessory luokka [deviceTab:n sisällä], käynnistetään funktio nimeltä addNewAccessory, lähetetään mukana käyttäjän syöttämä lisävarusteen nimi sekä tarkistusluku 2
    Tarkistusluvulla tarkistetaan moneenko paikkaan lisävaruste tulostetaan [Modaali ja deviceTab]*/
    $('#productAccessories').on("click", ".addNewAccessory", function(){
      var accessoryName = $('#newAccessoryInput').val();
      $('#newAccessoryInput').val("");
      addNewAccessory(accessoryName, 1);
    });

    /*Käyttäjän klikatessa painiketta, jolla on addNewAccessory luokka [Modaalin sisällä], käynnistetään funktio nimeltä addNewAccessory, lähetetään mukana käyttäjän syöttämä lisävarusteen nimi sekä tarkistusluku 2
    Tarkistusluvulla tarkistetaan moneenko paikkaan lisävaruste tulostetaan [Modaali ja deviceTab]*/
    $('#productDetail').on("click", ".addNewAccessory", function(){
      var accessoryName = $('#modalNewAccessoryInput').val();
      $('#modalNewAccessoryInput').val("");
      addNewAccessory(accessoryName, 2);
    });

//== == == == == == == == == == == == == == == == == == == == == == == POISTA LISÄVARUSTE == == == == == == == == == == == == == == == == == == == == == == == //

  /*Käyttäjän klikatessa painiketta, jolla on accessoryDeleteClass luokka [deviceTab:n sisällä], käynnistetään funktio nimeltä deleteAccessory, ja lähetetään mukana klikatun painikkeen arvo, sekä tarkistusluku 1.
    Tarkistusluvulla tarkistetaan monestako paikasta lisävarusteen tulostus poistetaan [Modaali ja deviceTab]*/
  $('.accessoryList').on("click", ".accessoryDeleteClass", function(){
    var accessoryID = $(this).attr("value");
    deleteAccessory(accessoryID, 1);
  });

  /*Käyttäjän klikatessa painiketta, jolla on accessoryDeleteClass luokka [Modaalin sisällä], käynnistetään funktio nimeltä deleteAccessory, ja lähetetään mukana klikatun painikkeen arvo, sekä tarkistusluku 2.
    Tarkistusluvulla tarkistetaan monestako paikasta lisävarusteen tulostus poistetaan [Modaali ja deviceTab]*/
  $('#productDetail').on("click", ".modalAccessoryDeleteClass", function(){
    var accessoryID = $(this).attr("value");
    deleteAccessory(accessoryID, 2);
  });

//== == == == == == == == == == == == == == == == == == == == == == == MUOKKAA LISÄVARUSTETTA == == == == == == == == == == == == == == == == == == == == == == == //

  //Käyttäjän klikatessa painiketta jolla on accessoryEditClass luokka, käynnistetään funktio nimeltä accessoryClickEdit, ja lähetetään mukana klikatun painikkeen arvo.
  $('.accessoryList').on("click", ".accessoryEditClass", function(){
    var accessoryID = $(this).attr("value");
    accessoryClickEdit(accessoryID);
  });

  //Käyttäjän klikatessa painiketta jolla on modalAccessoryEditClass luokka, käynnistetään funktio nimeltä modalAccessoryClickEdit, ja lähetetään mukana klikatun painikkeen arvo.
  $('#productDetail').on("click", ".modalAccessoryEditClass", function(){
    var accessoryID = $(this).attr("value");
    modalAccessoryClickEdit(accessoryID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == MUUTA LISÄVARUSTETTA == == == == == == == == == == == == == == == == == == == == == == == //

  //Käyttäjän klikatessa painiketta jolla on accessoryConfirmClass luokka, käynnistetään funktio nimeltä accessoryClickConfirm, ja lähetetään mukana klikatun painikkeen arvo.
  $('.accessoryList').on("click", ".accessoryConfirmClass", function(){
    var accessoryID = $(this).attr("value");
    accessoryClickConfirm(accessoryID);
  });

  //Käyttäjän klikatessa painiketta jolla on modalAccessoryConfirmClass luokka, käynnistetään funktio nimeltä modalAccessoryClickConfirm, ja lähetetään mukana klikatun painikkeen arvo.
  $('#productDetail').on("click", ".modalAccessoryConfirmClass", function(){
    var accessoryID = $(this).attr("value");
    modalAccessoryClickConfirm(accessoryID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == PERUUTA LISÄVARUSTEEN MUUTOS == == == == == == == == == == == == == == == == == == == == == == == //

  //Käyttäjän klikatessa painiketta jolla on accessoryCancelClass luokka, käynnistetään funktio nimeltä accessoryClickCancel, ja lähetetään mukana klikatun painikkeen arvo.
  $('.accessoryList').on("click", ".accessoryCancelClass", function(){
    var accessoryID = $(this).attr("value");
    accessoryClickCancel(accessoryID);
  });

  //Käyttäjän klikatessa painiketta jolla on modalAccessoryCancelClass luokka, käynnistetään funktio nimeltä modalAccessoryClickCancel, ja lähetetään mukana klikatun painikkeen arvo.
  $('#productDetail').on("click", ".modalAccessoryCancelClass", function(){
    var accessoryID = $(this).attr("value");
    modalAccessoryClickCancel(accessoryID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == LISÄÄ UUSI OHJELMA == == == == == == == == == == == == == == == == == == == == == == == //

  /*Käyttäjän klikatessa painiketta, jolla on addNewProgram luokka [deviceTab:n sisällä], käynnistetään funktio nimeltä addNewProgram ja lähetetään mukana käyttäjän syöttämä
  ohjelman nimi ja tarkistusluku 1. Tarkistusluvulla tarkistetaan moneenko paikkaan uusi ohjelma tulostetaan [Modaali ja deviceTab]*/
  $('#productPrograms').on("click", ".addNewProgram", function(){
    var programName = $('#newProgramInput').val();
    $('#newProgramInput').val("");
    addNewProgram(programName, 1);
  });

  /*Käyttäjän klikatessa painiketta, jolla on addNewProgram luokka [Tuotemodaalissa], käynnistetään funktio nimeltä addNewProgram, ja lähetetään mukana käyttäjän syöttämä
    ohjelman nimi ja tarkistusluku 2. Tarkistusluvulla tarkistetaan moneenko paikkaan uusi ohjelma tulostetaan [Modaali ja deviceTab]*/
  $('#productDetail').on("click", ".addNewProgram", function(){
    var programName = $('#modalNewProgramInput').val();
    $('#modalNewProgramInput').val("");
    addNewProgram(programName, 2);
  });

//== == == == == == == == == == == == == == == == == == == == == == == POISTA OHJELMA == == == == == == == == == == == == == == == == == == == == == == == //

  /*Käyttäjän klikatessa painiketta, jolla on programDeleteClass luokka, käynnistetään funktio nimeltä deleteProgram, ja lähetetään mukana klikatun painikkeen arvo, sekä tarkistusluku 1.
    Tarkistusluvulla tarkistetaan monestako paikasta ohjelma poistetaan [Modaali ja deviceTab]*/
  $('.programList').on("click", ".programDeleteClass", function(){
    var programID = $(this).attr("value");
    deleteProgram(programID, 1);
  });


  /*Käyttäjän klikatessa painiketta, jolla on modalProgramDeleteClass luokka, käynnistetään funktio nimeltä deleteProgram, ja lähetetään mukana klikatun painikkeen arvo, sekä tarkistusluku 1.
    Tarkistusluvulla tarkistetaan monestako paikasta ohjelma poistetaan [Modaali ja deviceTab]*/
  $('#productDetail').on("click", ".modalProgramDeleteClass", function(){
    var programID = $(this).attr("value");
    deleteProgram(programID, 2);
  });

//== == == == == == == == == == == == == == == == == == == == == == == MUOKKAA OHJELMAA == == == == == == == == == == == == == == == == == == == == == == == //

  //Käyttäjän klikatessa painiketta jolla on programEditClass luokka, käynnistetään funktio nimeltä programClickEdit, ja lähetetään mukana klikatun painikkeen arvo.
  $('.programList').on("click", ".programEditClass", function(){
    var programID = $(this).attr("value");
    programClickEdit(programID);
  });

  //Käyttäjän klikatessa painiketta jolla on modalProgramEditClass luokka, käynnistetään funktio nimeltä modalProgramClickEdit, ja lähetetään mukana klikatun painikkeen arvo.
  $('#productDetail').on("click", ".modalProgramEditClass", function(){
    var programID = $(this).attr("value");
    modalProgramClickEdit(programID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == MUUTA OHJELMAA == == == == == == == == == == == == == == == == == == == == == == == //

  //Käyttäjän klikatessa painiketta jolla on programConfirmClass luokka, käynnistetään funktio nimeltä programClickConfirm, ja lähetetään mukana klikatun painikkeen arvo.
  $('.programList').on("click", ".programConfirmClass", function(){
    var programID = $(this).attr("value");
    programClickConfirm(programID);
  });

  //Käyttäjän klikatessa painiketta jolla on modalProgramConfirmClass luokka, käynnistetään funktio nimeltä modalProgramClickConfirm, ja lähetetään mukana klikatun painikkeen arvo.
  $('#productDetail').on("click", ".modalProgramConfirmClass", function(){
    var programID = $(this).attr("value");
    modalProgramClickConfirm(programID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == PERUUTA OHJELMAN MUUTOS == == == == == == == == == == == == == == == == == == == == == == == //
  //Käyttäjän klikatessa painiketta jolla on programCancelClass luokka, käynnistetään funktio nimeltä programClickCancel, ja lähetetään mukana klikatun painikkeen arvo.
  $('.programList').on("click", ".programCancelClass", function(){
    var programID = $(this).attr("value");
    programClickCancel(programID);
  });

  //Käyttäjän klikatessa painiketta jolla on modalProgramCancelClass luokka, käynnistetään funktio nimeltä modalProgramClickCancel, ja lähetetään mukana klikatun painikkeen arvo.
  $('#productDetail').on("click", ".modalProgramCancelClass", function(){
    var programID = $(this).attr("value");
    modalProgramClickCancel(programID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == LISÄÄ UUSI KATEGORIA == == == == == == == == == == == == == == == == == == == == == == == //
//Käyttäjän klikatessa painiketta, jolla on addNewCategory luokka käynnistetään funktio nimeltä addNewCategory ja lähetetään mukana käyttäjän syöttämä kategorian nimi.
  $('#categoryAndStatusControl').on("click", ".addNewCategory", function(){
    var categoryName = $('#newCategoryInput').val();
    addNewCategory(categoryName);
  });

//== == == == == == == == == == == == == == == == == == == == == == == POISTA KATEGORIA == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa painiketta, jolla on categoryDeleteClass luokka, käynnistetään funktio nimeltä deleteCategory, ja lähetetään mukana klikatun painikkeen arvo */
  $('.categoryList').on("click", ".categoryDeleteClass", function(){
    var categoryID = $(this).attr("value");
    deleteCategory(categoryID);
  });


//== == == == == == == == == == == == == == == == == == == == == == == MUOKKAA KATEGORIAA == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa painiketta, jolla on categoryEditClass luokka, käynnistetään funktio nimeltä categoryClickEdit, ja lähetetään mukana klikatun painikkeen arvo */
  $('.categoryList').on("click", ".categoryEditClass", function(){
    var categoryID = $(this).attr("value");
    categoryClickEdit(categoryID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == PERUUTA KATEGORIAN MUUTOS == == == == == == == == == == == == == == == == == == == == == == == //
//Käyttäjän klikatessa painiketta jolla on programCancelClass luokka, käynnistetään funktio nimeltä programClickCancel, ja lähetetään mukana klikatun painikkeen arvo.
  $('.categoryList').on("click", ".categoryCancelClass", function(){
    var categoryID = $(this).attr("value");
    categoryClickCancel(categoryID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == MUUTA KATEGORIAA == == == == == == == == == == == == == == == == == == == == == == == //
//Käyttäjän klikatessa painiketta jolla on accessoryConfirmClass luokka, käynnistetään funktio nimeltä accessoryClickConfirm, ja lähetetään mukana klikatun painikkeen arvo.
  $('.categoryList').on("click", ".categoryConfirmClass", function(){
    var categoryID = $(this).attr("value");
    categoryClickConfirm(categoryID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == LISÄÄ UUSI STATUS == == == == == == == == == == == == == == == == == == == == == == == //
//Käyttäjän klikatessa painiketta, jolla on addNewStatus luokka käynnistetään funktio nimeltä addNewCategory ja lähetetään mukana käyttäjän syöttämä statuksen nimi.
  $('#categoryAndStatusControl').on("click", ".addNewStatus", function(){
    var statusName = $('#newStatusInput').val();
    addNewStatus(statusName);
  });

//== == == == == == == == == == == == == == == == == == == == == == == POISTA STATUS == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa painiketta, jolla on statusDeleteClass luokka, käynnistetään funktio nimeltä deleteStatus, ja lähetetään mukana klikatun painikkeen arvo */
  $('#categoryAndStatusControl').on("click", ".statusDeleteClass", function(){
    var statusID = $(this).attr("value");
    deleteStatus(statusID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == MUOKKAA STATUSTA == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa painiketta, jolla on statusEditClass luokka, käynnistetään funktio nimeltä statusClickEdit, ja lähetetään mukana klikatun painikkeen arvo */
  $('.statusList').on("click", ".statusEditClass", function(){
    var statusID = $(this).attr("value");
    statusClickEdit(statusID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == PERUUTA STATUKSEN MUUTOS == == == == == == == == == == == == == == == == == == == == == == == //
//Käyttäjän klikatessa painiketta jolla on statusCancelClass luokka, käynnistetään funktio nimeltä programClickCancel, ja lähetetään mukana klikatun painikkeen arvo.
  $('.statusList').on("click", ".statusCancelClass", function(){
    var statusID = $(this).attr("value");
    statusClickCancel(statusID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == MUUTA KATEGORIAA == == == == == == == == == == == == == == == == == == == == == == == //
//Käyttäjän klikatessa painiketta jolla on statusConfirmClass luokka, käynnistetään funktio nimeltä statusClickConfirm, ja lähetetään mukana klikatun painikkeen arvo.
  $('.statusList').on("click", ".statusConfirmClass", function(){
    var statusID = $(this).attr("value");
    statusClickConfirm(statusID);
  });

//== == == == == == == == == == == == == == == == == == == == == == == LAINAUSKORIN TUOTTEIDEN TARKISTUS == == == == == == == == == == == == == == == == == == == == == == == //
//Käyttäjän klikatessa painiketta jolla on statusConfirmClass luokka, käynnistetään funktio nimeltä statusClickConfirm, ja lähetetään mukana klikatun painikkeen arvo.
$(document).on('click', '#rent', function(){
   devices = [];
  $('#rentModal').find('.deleteRentBasket').each(function () {
       devices.push($(this).val());
   });
  rentCalendarDays(devices);
});

//== == == == == == == == == == == == == == == == == == == == == == == UUDEN LAINAN LUONTI == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa .createRent luokalla varustettua painiketta, noudetaan valitut lainan alkamis ja loppumispäivät, globaalina muuttujana lainattavat laitteet, lainaaja,
sekä lainan kirjurin tiedot ja lähetetään ne createRent nimiselle funktiolle, joka suorittaa ajax kutsun tietokantaan.*/
$('.createRent').on('click', function(){
    var userID = $("#systemUserID").attr("value");
    var customerID = $('#currentRentCustomer').attr("value");
    var description = $('#newRentDescription').val();
    var fromFin = $('#from').val();
    var toFin = $('#to').val();
    var fromArr = fromFin.split('-');
    var fromUs = fromArr[2]+"-"+fromArr[1]+"-"+fromArr[0];
    var toArr = toFin.split('-');
    var toUs = toArr[2]+"-"+toArr[1]+"-"+toArr[0];
    createRent(devices, fromUs, toUs, description, customerID, userID);
});

/*Käyttäjän klikatessa myöhästyneiden lainausten listauksessa olevaa viewRent luokalla varustettua painiketta, kyseisen painikkeen rivi tallennetaan globaaliin muuttujaan.
muuttujaa tarvitaan kirjatessa myöhässä oleva laina palautetuksi.*/
$('#lateRent').on('click', '.viewRent', function(){
  var rentID = $(this).attr("value");
  rentAppend = "#lateRentTR_"+rentID;
  rentAppendCheck = 1;
});

/*Käyttäjän klikatessa myöhästyneiden lainausten listauksessa olevaa viewRent luokalla varustettua painiketta, kyseisen painikkeen rivi tallennetaan globaaliin muuttujaan.
muuttujaa tarvitaan kirjatessa myöhässä oleva laina palautetuksi.*/
$('#currentRent').on('click', '.viewRent', function(){
  var rentID = $(this).attr("value");
  rentAppend = "#currentRentTR_"+rentID;
  rentAppendCheck = 2;
});

$('#viewRentModal').on('click', '.modifyRent', function(){
  var rentID = $(this).attr("value");
  var fromFin = $('#editRentModalFrom').val();
  var toFin = $('#editRentModalTo').val();
  var fromArr = fromFin.split('-');
  var from = fromArr[2]+"-"+fromArr[1]+"-"+fromArr[0];
  var toArr = toFin.split('-');
  var to = toArr[2]+"-"+toArr[1]+"-"+toArr[0];

  var description = $('#editRentModalComment').val();
  updateRent(rentID, from, to, description);
});

$("#rentModal").on("click", ".rentCustomerSelect", function(){
  var customerID = $(this).attr("value");
  selectRentCustomer(customerID)
});


$("#rentModal").on("click", "#rentAddNewCustomer", function(){
  var firstName = $("#rentFirstName").val();
  var lastName = $("#rentLastName").val();
  var classID = $("#rentClassID").val();
  var email = $("#rentEmail").val();

  createNewCustomer(firstName, lastName, null, email, classID)
});
//== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == //
//== == == == == == == == == == == == == == == == == == == == == == == == == == AJAXIT == == == == == == == == == == == == == == == == == == == == == == == == == //
//== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == //

$('#viewRentModal').on('click', '.deleteFromRent', function(){
  var productID = $(this).attr("value");
  var rentID = $("#editRentID").attr("value");
  var lineCount = 0;

  $(".modalRentLine").each(function() {
    lineCount++
  });
  if(lineCount > 1){
    var answer = confirm('Haluatko varmasti poistaa tuotteen lainauksesta?');
    if (answer) {
      deleteProductFromRent(productID, rentID, 1)
    }
  }
  else{
    var answer = confirm('Jos poistat lainan viimeisen tuotteen, koko laina poistetaan!');
    if (answer) {
      deleteProductFromRent(productID, rentID, 2)
    }
  }
});


$('#rents').on('click', '#loadMoreOldRents', function(){
  var rowNumber = spawnMoreRents;

  $.ajax({
    type: "POST",
    url: "selections/selectMoreOldRent.php",
    data: ({rowNumber:rowNumber}),
    success:function(data){
      $('#testi123').html(data);
      spawnMoreRents = spawnMoreRents + 20;
    },
    error:function(){
    }
  });
});




// == == == == == == == == == == == == == == == == == == == == == == == == == == == LAINAN PALAUTUS == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa viewRent modaalin sisällä olevaa returnRent luokalla varustettua painiketta suoritetaan ajax kutsu uprateRent_returnRent.php nimiselle tiedostolle.
  Tiedosto muuttaa valitun lainan returned statuksen 'True', sekä palautuspäiväksi, nykyisen päivän. Palautetuiksi merkityt lainat siirretään avonaisella verkkosivulla
  Vanhat lainat listaukseen.*/
$('#viewRentModal').on('click', '.returnRent', function(){
  var rentID = $(this).attr("value");
  var answer = confirm('Merkataanko laina palautetuksi');
  var rentDatePath = "#currentRentDate_"+rentID;
  var oldRent = "oldRentTR_"+rentID;
  if (answer) {
      $.ajax({
        type: "POST",
        url: "updates/updateRent_returnRent.php",
        dataType: "json",
        data: ({rentID:rentID, rentAppendCheck:rentAppendCheck}),
        success:function(data){
          if(data.msg == 1){
          $('#viewRentModal').modal("hide");
          $('#oldRentTable tr:first').after($(rentAppend));
          $(rentAppend).attr('id', oldRent);
          }
          if(data.msg == 2){
          $('#viewRentModal').modal("hide");
          $('#oldRentTable tr:first').after($(rentAppend));
          $(rentDatePath).html(data.time);
          $(rentAppend).attr('id', oldRent);
          }
        },
        error:function(){
        }
      });
    }
});

// == == == == == == == == == == == == == == == == == == == == == == == == == == == LAINAN PERUUTTAMINEN == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa viewRent modaalin sisällä olevaa cancelRent luokalla varustettua painiketta, suoritetaan ajax kutsu deleteRent_cancel.php nimiselle tiedostolle. Tiedosto poistaa
rentLine ja rent taulusta kaikki klikatun painikkeen ID:tä vastaavat rivit */
$('#viewRentModal').on('click', '.cancelRent', function(){
  var rentID = $(this).attr("value");
  var incomingRentTR = "#incomingRentTR_"+rentID;
  var answer = confirm('Oletko varma että haluat peruuttaa tämän lainan');
  if (answer) {
    $.ajax({
      type: "POST",
      url: "deletions/deleteRent_cancel.php",
      dataType: "json",
      data: ({rentID:rentID}),
      success:function(data){
        $('#viewRentModal').modal("hide");
        $(incomingRentTR).remove();
        showSnackbar(data);
      },
      error:function(){
        showSnackbar(data);
      }
    });
  }
});

// == == == == == == == == == == == == == == == == == == == == == == == == == == == LAINAN POISTAMINEN == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa viewRent modaalin sisällä olevaa deleteRent luokalla varustettua painiketta, suoritetaan ajax kutsu deleteRent_delete.php nimiselle tiedostolle. Tiedosto poistaa
rentLine ja rent taulusta kaikki klikatun painikkeen ID:tä vastaavat rivit */
$('#viewRentModal').on('click', '.deleteRent', function(){
  var rentID = $(this).attr("value");
  var oldRentTR = "#oldRentTR_"+rentID;
  var answer = confirm('Oletko varma että haluat poistaa tämän lainan?');
  if (answer) {
    $.ajax({
      type: "POST",
      url: "deletions/deleteRent_delete.php",
      dataType: "json",
      data: ({rentID:rentID}),
      success:function(data){
        $('#viewRentModal').modal("hide");
        $(oldRentTR).remove();
        showSnackbar(data);
      },
      error:function(){
        showSnackbar(data);
      }
    });
  }
});



/*Käyttäjän klikatessa createRent luokalla varustettua painiketta, poimitaan muuttujiin käyttäjän syöttämät ja valitsemat tiedot. Ja suoritetaan ajax pyyntö insertRent.php
tiedostolle, joka luo lainauksen käyttäjän antamien tietojen mukaisesti  */
  function createRent(devices, fromUs, toUs, description, customerID, userID){
    $.ajax({
      type: "POST",
      url: "insertions/insertRent.php",
      dataType: "json",
      data: ({userID:userID, customerID:customerID, fromUs:fromUs, toUs:toUs, description:description, devices:JSON.stringify(devices)}),
      success:function(data){
      if(data.rentAppend == 1){
        $("#currentRentTable tr:first").after( " <tr id='currentRentTR_"+data.rentID+"'> \
                                                <td><span class='pseudolink viewRent' id='currentRentID_"+data.rentID+"' value='"+data.rentID+"'>"+data.rentID+"</span></td> \
                                                <td><span id='currentRent_"+data.rentID+"_customer_"+data.rentID+"'>"+data.firstName+' '+data.lastName+"</span></td> \
                                                <td><span id='currentRentDate_"+data.rentID+"'>"+data.startTime+' - '+ "<strong>"+data.stopTime+"</strong></span> </td> \
                                                </tr>" );
      if($('#currentRentParagraph')){
        $('#currentRentParagraph').remove();
      }
      var answer = confirm('Haluatko tyhjentää lainauskorin?');
      if (answer) {
        $('#rentModal').find('.productTr').each(function () {
          $('.deleteRentBasket').css("display","none");
          $('.addRentBasket').css("display","block");
            $("#deviceTable tr:first").after($(this));
         });
         $('#rentModal').modal("hide");
         $('#from').val("");
         $('#to').val("");
         $('#rentBasketLabel').text("0");
      }
      }
      if(data.rentAppend == 2){
        $("#incomingRentTable tr:first").after( " <tr id='incomingRentTR_"+data.rentID+"'> \
                                                <td><span class='pseudolink viewRent' id='incomingRentID_"+data.rentID+"' value='"+data.rentID+"'>"+data.rentID+"</span></td> \
                                                <td><span id='incomingRent_"+data.rentID+"_customer_"+data.rentID+"'>"+data.firstName+' '+data.lastName+"</span></td> \
                                                <td><span id='incomingRentDate_"+data.rentID+"'>"+ "<strong>"+data.startTime+"</strong>"+' - '+data.stopTime+"</span> </td> \
                                                </tr>" );
      if($('#incomingRentParagraph')){
        $('#incomingRentParagraph').remove();
      }
      var answer = confirm('Haluatko tyhjentää lainauskorin?');
      if (answer) {
        $('#rentModal').find('.productTr').each(function () {
          $('.deleteRentBasket').css("display","none");
          $('.addRentBasket').css("display","block");
          $("#deviceTable tr:first").after($(this));
         });
         $('#rentModal').modal("hide");
         $('#from').val("");
         $('#to').val("");
         $('#rentBasketLabel').text("0");
      }
      }
      showSnackbar("Uusi laina luotu!");
      },
      error:function(){
        showSnackbar("Lainan luominen epäonnistui!");
      }
    });
  }

/*Käyttäjän klikatessa tuotemodaalissa olevaa lisävaruste checkboxia, klikatun ckeckboxin arvo noudetaan muuttujaan, käynnistetään ajax kutsu joka lisää tai poistaa tilanteesta riippuen
  tuotteen lisävarustelinkityksen accessoryList taulusta*/
  $('#productDetail').on("click", ".modalAccessoryCheckbox", function(){
    var accessoryID = $(this).attr("value");
    var productID = $('.editDevice').attr("value");

    $.ajax({
      type: "POST",
      url: "updates/updateAccessoryLine.php",
      dataType: "json",
      data: ({accessoryID:accessoryID, productID:productID}),
      success:function(data){
        if(data.response=="Poistettu"){
          showSnackbar("Lisävaruste poistettu!");
        }
        if(data.response=="Lisätty"){
          showSnackbar("Lisävaruste lisätty!");
        }
      },
      error:function(){
        showSnackbar("Muutos epäonnistui!");
      }
    });
  });


/*Käyttäjän klikatessa tuotemodaalissa olevaa ohjelma checkboxia, klikatun ckeckboxin arvo noudetaan muuttujaan, käynnistetään ajax kutsu joka lisää tai poistaa tilanteesta riippuen
  tuotteen ohjelmalinkityksen programList taulusta*/
  $('#productDetail').on("click", ".modalProgramCheckbox", function(){
    var programID = $(this).attr("value");
    var productID = $('.editDevice').attr("value");

    $.ajax({
      type: "POST",
      url: "updates/updateProgramLine.php",
      dataType: "json",
      data: ({programID:programID, productID:productID}),
      success:function(data){
      },
      error:function(){
      }
    });
  });

// == == == == == == == == == == == == == == == == == == == == == == == == == == == LAITTEEN MUOKKAUS MODAALI == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa mitä tahansa Laitteet välilehden laitelistauksessa olevaa laitteen nimeä, käynnistetään ajaxkutsu selectProduct nimiselle tiedostolle.
  Tiedostolle lähetetään klikatun laitteen ID, ja tämä lähettää ajax palautteena modaalin, joka sisältää kaiken tiedon klikatusta laitteesta (tekstikentissä) ja pudotusvalikoissa.*/
    $('#deviceTable').on("click",".viewProduct", function(){
      var deviceValue = $(this).attr("value");

      $.ajax({
        type: "POST",
        url: "selections/selectProduct.php",
        data: {deviceID:deviceValue},
        success:function(data){
          $('#productDetail').html(data);
          $('#productModal').modal("show");
        },
        error:function(){
        }
      });
    });

// == == == == == == == == == == == == == == == == == == == == == == == == == == == LAINAAJAN MUOKKAUS MODAALI == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa mitä tahansa Lainaajat välilehden lainaajalistauksessa olevaa lainaajan nimeä, käynnistetään ajaxkutsu selectCustomer nimiselle tiedostolle.
  Tiedostolle lähetetään klikatun lainaajan ID, ja tämä lähettää ajax palautteena modaalin, joka sisältää kaiken tiedon klikatusta lainaajasta (tekstikentissä).*/
    $('#customers').on("click",".viewCustomer", function(){
      var customerID = $(this).attr("value");
      $.ajax({
        type: "POST",
        url: "selections/selectCustomer.php",
        data: {customerID:customerID},
        success:function(data){
          $('#customerDetail').html(data);
          $('#customerModal').modal("show");
        },
        error:function(){
        }
      });
    });



// == == == == == == == == == == == == == == == == == == == == == == == == == == == ADMIN MUOKKAUS MODAALI == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa mitä tahansa Admin välilehden adminlistauksessa olevaa adminin nimeä, käynnistetään ajaxkutsu selectAdmin nimiselle tiedostolle.
  Tiedostolle lähetetään klikatun adminin ID, ja tämä lähettää ajax palautteena modaalin, joka sisältää kaiken tiedon klikatusta administa (tekstikentissä).*/
    $('#adminTable').on("click",".viewAdmin", function(){
      var adminID = $(this).attr("value");

      $.ajax({
        type: "POST",
        url: "selections/selectAdmin.php",
        data: {adminID:adminID},
        success:function(data){
          $('#adminDetail').html(data);
          $('#adminModal').modal("show");
        },
        error:function(){
        }
      });
    });


// == == == == == == == == == == == == == == == == == == == == == == == == == == == LAINAN MUOKKAUS MODAALI == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa mitä tahansa lainaukset välilehden lainalistauksessa olevaa lainanumeroa, käynnistetään ajaxkutsu selectRent nimiselle tiedostolle.
  Tiedostolle lähetetään klikatun lainan ID, ja tämä lähettää ajax palautteena modaalin, joka sisältää kaiken tiedon klikatusta lainasta (tekstikentissä) ja pudotusvalikoissa.*/
    $('#rents').on("click",".viewRent", function(){
      var rentID = $(this).attr("value");
      selectRent(rentID);
    });


    $('#customerModal').on("click",".viewRent", function(){
      var rentID = $(this).attr("value");
      $('#customerModal').modal('toggle');
      selectRent(rentID);
    });

    $('#productModal').on("click",".viewRent", function(){
      var rentID = $(this).attr("value");
      $('#productModal').modal('toggle');
      selectRent(rentID);
    });
// == == == == == == == == == == == == == == == == == == == == == == == == == == == LISÄÄ UUSI LAITE == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/* Käyttäjän klikatessa newDevice ID:llä varustettua painiketta, noudetaan muuttujiin kaikki käyttäjän laitelisäyksen yhteydessä teksti- ja valintakenttiin syötetyt tiedot
   Suoritetaan ajaxkutsu insertProduct.php nimiselle tiedostolle, ja lähetetään mukana kaikki käyttäjän syöttämät tiedot. insertProduct tiedosto suorittaa SQL kyselyn, jolla
   Syötettyjen tietojen mukainen laite lisätään tietokantaan. Lisäksi onnistuneen tietokantalisäyksen lisäksi, tuote tulostetaan laitelistaukseen.*/
    $("#newDevice").on('click', function(){
      var productName = $('#productName').val();
      var serialNumber = $('#serialNumber').val();
      var barcode = $('#barcode').val();
      var manufacturer = $('#manufacturer').val();
      var category = $('#category').val();
      var status = $('#status').val();
      var description = $('#description').val();

      var chkArray = [];
      var progArray = [];
      $(".accessoryCheckbox:checked").each(function() {
            		chkArray.push($(this).val());
      });

      $(".programCheckbox:checked").each(function() {
            		progArray.push($(this).val());
      });

      if(!productName==null || !productName == ""){
      $.ajax({
        type: "POST",
        url: "insertions/insertProduct.php",
        dataType: "json",
        data: ({productName:productName, serialNumber:serialNumber, barcode:barcode, manufacturer:manufacturer, category:category, status:status, description:description, chkArray:JSON.stringify(chkArray), progArray:JSON.stringify(progArray)}),
        success:function(data){
          $('#deviceTable tr:first').after("<tr id='productTR_"+data.id+"' class='productTr' value='"+data.id+"'><td><span class='pseudolink viewProduct' id='productName_"+data.id+"' value='"+data.id+"'>"+data.productName+"</span> </td><td> <span id='productStatus_"+data.id+"'>"+data.status+"</span></td><td> <span id='productCategory_"+data.id+"'>"+data.category+"</span></td> <td>\
                                            <button id='deleteRentBasket_"+data.id+"' type='button' class='btn btn-primary deleteRentBasket'  value='"+data.id+"'>Poista</button>\
                                            <button id='addRentBasket_"+data.id+"' type='button' class='btn btn-primary addRentBasket' value='"+data.id+"'>Koriin</button> </td></tr>");
          showSnackbar("Tuotelisäys onnistui!");

        },
        error:function(){
          showSnackbar("Tuotelisäys epäonnistui!");
        }
      });
    }
    else{
      showSnackbar("Lisää tuotenimi!");
    }
    });


// == == == == == == == == == == == == == == == == == == == == == == == == == == == LISÄÄ UUSI ADMIN == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/* Käyttäjän klikatessa newAdmin ID:llä varustettua painiketta, noudetaan muuttujiin kaikki käyttäjän adminlisäyksen yhteydessä teksti- ja valintakenttiin syötetyt tiedot
   Suoritetaan ajaxkutsu insertAdmin.php nimiselle tiedostolle, ja lähetetään mukana kaikki käyttäjän syöttämät tiedot. insertAdmin tiedosto suorittaa SQL kyselyn, jolla
   Syötettyjen tietojen mukainen admin lisätään tietokantaan. Lisäksi onnistuneen adminlisäyksen lisäksi, admin tulostetaan adminlistaukseen.*/
    $("#newAdmin").on('click', function(){
      var firstName = $('#adminFirstName').val();
      var lastName = $('#adminLastName').val();
      var phoneNumber = $('#adminPhoneNumber').val();
      var email = $('#adminEmail').val();
      var password = $('#adminPassword').val();

    if((!firstName==null || !firstName == "") && (!lastName==null || !lastName == "")){
      $.ajax({
        type: "POST",
        url: "insertions/insertAdmin.php",
        dataType: "json",
        data: ({firstName:firstName, lastName:lastName, phoneNumber:phoneNumber, email:email, password:password}),
        success:function(data){
          $('#adminTable tr:first').after("<tr id='adminTR_"+data.id+"'><td><span class='pseudolink viewAdmin' id='adminName_"+data.id+"' value='"+data.id+"'>"+data.firstName + " " + data.lastName +"</span> </td><td> <span id='adminPhoneNumber_"+data.id+"'>"+data.phoneNumber+"</span></td> <td> <span id='adminEmail_"+data.id+"'>"+data.email+"</span></td></tr>");
          showSnackbar("Admin lisätty!");
        },
        error:function(){
          showSnackbar("Adminin lisäys epäonnistui!");
        }
      });
    }
    else{
    }
    });

// == == == == == == == == == == == == == == == == == == == == == == == == == == == LISÄÄ UUSI LAINAAJA == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/* Käyttäjän klikatessa newCustomer ID:llä varustettua painiketta, noudetaan muuttujiin kaikki käyttäjän lainaajalisäyksen yhteydessä teksti- ja valintakenttiin syötetyt tiedot
   Suoritetaan ajaxkutsu insertCustomer.php nimiselle tiedostolle, ja lähetetään mukana kaikki käyttäjän syöttämät tiedot. insertCustomer tiedosto suorittaa SQL kyselyn, jolla
   Syötettyjen tietojen mukainen lainaaja lisätään tietokantaan. Lisäksi onnistuneen lainaajalisäyksen lisäksi, lainaaja tulostetaan lainaajalistaukseen.*/
    $("#newCustomer").on('click', function(){
      var firstName = $('#firstName').val();
      var lastName = $('#lastName').val();
      var phoneNumber = $('#phoneNumber').val();
      var email = $('#customerEmail').val();
      var classID = $('#classID').val();

      createNewCustomer(firstName, lastName, phoneNumber, email, classID);
    });


// == == == == == == == == == == == == == == == == == == == == == == == == == == == MUOKKAA ADMINIA == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa adminmodaalin sisällä olevaa editAdmin luokalla varustettua painiketta, kaikki käyttäjän tekstikenttiin muuttamat tiedot noudetaan muuttujiin, käynnistetään
  ajax kutsu updateAdmin.php nimiselle tiedostolle, jolle lähetetään kaikki muutetut tiedot. updateAdmin.php tiedosto päivittää sille lähetetyn adminID:n mukaisen tietokantarivin
  käyttäjän syöttämien tietojen mukaisesti.*/
        $("#adminDetail").on("click", ".editAdmin", function(){
          var adminID = $(this).val();
          var trAdminName = "#adminName_"+adminID;
          var trAdminEmail = "#adminEmail_"+adminID;
          var trAdminPhoneNumber ="#adminPhoneNumber_"+adminID;
          var firstName = $('#modalAdminFirstName').val();
          var lastName = $('#modalAdminLastName').val();
          var password = $('#modalAdminPassword').val();
          var phoneNumber = $('#modalAdminPhoneNumber').val();
          var email = $('#modalAdminEmail').val();

          if((!firstName==null || !firstName == "") && (!lastName==null || !lastName == "")){
          $.ajax({
            type: "POST",
            url: "updates/updateAdmin.php",
            dataType: "json",
            data: ({adminID:adminID, firstName:firstName, lastName:lastName, phoneNumber:phoneNumber, email:email, password:password}),
            success:function(data){
              $(trAdminName).text(data.firstName + " " + data.lastName);
              $(trAdminPhoneNumber).text(data.phoneNumber);
              $(trAdminEmail).text(data.email);
              showSnackbar("Adminin muokkaus onnistui!");
            },
            error:function(){
              showSnackbar("Adminin muokkaus epäonnistui");
            }
          });
        }
        else{
          showSnackbar("Tyhjä etu- tai sukunimi kenttä");
        }
        });

// == == == == == == == == == == == == == == == == == == == == == == == == == == == MUOKKAA LAINAAJAA == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa lainaajamodaalin sisällä olevaa editCustomer luokalla varustettua painiketta, kaikki käyttäjän tekstikenttiin muuttamat tiedot noudetaan muuttujiin, käynnistetään
  ajax kutsu updateCustomer.php nimiselle tiedostolle, jolle lähetetään kaikki muutetut tiedot. updateCustomer.php tiedosto päivittää sille lähetetyn customerID:n mukaisen tietokantarivin
  käyttäjän syöttämien tietojen mukaisesti.*/
            $("#customerDetail").on("click", ".editCustomer", function(){
              var customerID = $(this).val();
              var trCustomerName = "#customerName_"+customerID;
              var trCustomerClassID = "#customerClassID_"+customerID;
              var trCustomerEmail = "#customerEmail_"+customerID;
              var firstName = $('#ModalFirstName').val();
              var lastName = $('#ModalLastName').val();
              var phoneNumber = $('#ModalPhoneNumber').val();
              var email = $('#ModalCustomerEmail').val();
              var classID = $('#ModalClassID').val();


              if((!firstName==null || !firstName == "") && (!lastName==null || !lastName == "")){
              $.ajax({
                type: "POST",
                url: "updates/updateCustomer.php",
                dataType: "json",
                data: ({customerID:customerID, firstName:firstName, lastName:lastName, phoneNumber:phoneNumber, email:email, classID:classID}),
                success:function(data){
                  $(trCustomerName).text(data.firstName + " " + data.lastName);
                  $(trCustomerClassID).text(data.classID);
                  $(trCustomerEmail).text(data.email);
                  showSnackbar("Lainaajaa muokattu!");
                },
                error:function(){
                  showSnackbar("Lainaajan muokkaus epäonnistui!");
                }
              });
            }
            else{
              showSnackbar("Tyhjä etu- tai sukunimi kenttä");
            }
            });



// == == == == == == == == == == == == == == == == == == == == == == == == == == == MUOKKAA LAITETTA == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa laitemodaalin sisällä olevaa editDevice luokalla varustettua painiketta, kaikki käyttäjän tekstikenttiin muuttamat tiedot noudetaan muuttujiin, käynnistetään
  ajax kutsu updateProduct.php nimiselle tiedostolle, jolle lähetetään kaikki muutetut tiedot. updateProduct.php tiedosto päivittää sille lähetetyn productID:n mukaisen tietokantarivin
  käyttäjän syöttämien tietojen mukaisesti.*/
    $("#productDetail").on("click", ".editDevice", function(){
      var productID = $(this).val();
      var trProductName = "#productName_"+productID;
      var trProductStatus = "#productStatus_"+productID;
      var trProductCategory = "#productCategory_"+productID;
      var productName = $('#ModalProductName').val();
      var serialNumber = $('#ModalSerial').val();
      var barcode = $('#ModalBarcode').val();
      var manufacturer = $('#ModalManufacturer').val();
      var category = $('#ModalCategory').val();
      var description = $('#ModalDescription').val();
      var status = $('#ModalStatus').val();

      if(!productName==null || !productName == ""){

      $.ajax({
        type: "POST",
        url: "updates/updateProduct.php",
        dataType: "json",
        data: ({productID:productID, productName:productName, serialNumber:serialNumber, barcode:barcode, manufacturer:manufacturer, category:category, description:description, status:status}),
        success:function(data){
          $(trProductName).text(data.deviceName);
          $(trProductStatus).text(data.status);
          $(trProductCategory).text(data.category);
          showSnackbar("Laite muokattu!");
        },
        error:function(){
          showSnackbar("Laitemuokkaus epäonnistui!");
        }
      });
    }
    else{
      showSnackbar("Laitteen nimikenttä on tyhjä!");
    }
    });


// == == == == == == == == == == == == == == == == == == == == == == == == == == == POISTA LAINAAJA == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa lainaajamodaalin sisällä olevaa deleteCustomer luokalla varustettua painiketta käynnistetään ajax kutsuna deleteCustomer.php niminen tiedosto ja lähetetään mukana
  klikatun painikkeen arvo (poistettavan lainaajan tietokanta ID). deleteCustomer suorittaa tietokantakyselyn, joka poistaa sille lähetetyn ID:n mukaisen rivin customer taulusta.*/
    $("#customerDetail").on("click", ".deleteCustomer", function(){
      var customerID = $(this).val();
      var customerTR = "#customerTR_"+customerID;
              var answer = confirm('Oletko varma että haluat poistaa tämän lainaajan?');
              if (answer) {
                  $.ajax({
                      type: "POST",
                      url: "deletions/deleteCustomer.php",
                      dataType: "json",
                      data: {customerID:customerID},
                      success:function(data){
                        $('#customerModal').modal("hide");
                        $(customerTR).remove();
                        showSnackbar("Lainaaja poistettu!");
                      },
                      error:function(){
                        showSnackbar("Lainaajan poisto epäonnistui!");
                      }
                    });
              }
              else{
              }
    });


// == == == == == == == == == == == == == == == == == == == == == == == == == == == POISTA ADMIN == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa adminmodaalin sisällä olevaa deleteAdmin luokalla varustettua painiketta käynnistetään ajax kutsuna deleteAdmin.php niminen tiedosto ja lähetetään mukana
  klikatun painikkeen arvo (poistettavan adminin tietokanta ID). deleteAdmin suorittaa tietokantakyselyn, joka poistaa sille lähetetyn ID:n mukaisen rivin admin taulusta.*/

    $("#adminDetail").on("click", ".deleteAdmin", function(){
      var adminID = $(this).val();
      var adminTR = "#adminTR_"+adminID;
              var answer = confirm('Oletko varma että haluat poistaa tämän Adminin?');
              if (answer) {
                  $.ajax({
                      type: "POST",
                      url: "deletions/deleteAdmin.php",
                      dataType: "json",
                      data: {adminID:adminID},
                      success:function(data){
                        $('#adminModal').modal("hide");
                        $(adminTR).remove();
                        showSnackbar(data);
                      },
                      error:function(){
                        showSnackbar(data);
                      }
                    });
              }
              else{
              }
    });

// == == == == == == == == == == == == == == == == == == == == == == == == == == == POISTA LAITE == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän klikatessa tuotemodaalin sisällä olevaa deleteProduct luokalla varustettua painiketta käynnistetään ajax kutsuna deleteProduct.php niminen tiedosto ja lähetetään mukana
  klikatun painikkeen arvo (poistettavan laitteen tietokanta ID). deleteProduct suorittaa tietokantakyselyn, joka poistaa sille lähetetyn ID:n mukaisen rivin product taulusta.*/
    $("#productDetail").on("click", ".deleteProduct", function(){
      var productID = $(this).val();
      var productTR = "#productTR_"+productID;
              var answer = confirm('Oletko varma että haluat poistaa tämän tuotteen?');
              if (answer) {
                  $.ajax({
                      type: "POST",
                      url: "deletions/deleteProduct.php",
                      dataType: "json",
                      data: {productID:productID},
                      success:function(data){
                        $('#productModal').modal("hide");
                        $(productTR).remove();
                        showSnackbar(data);
                      },
                      error:function(){
                        showSnackbar(data);
                      }
                    });
              }
              else{
              }
    });

// == == == == == == == == == == == == == == == == == == == == == == == == == == == PÄIVITÄ LAINAPÄIVÄT == == == == == == == == == == == == == == == == == == == == == == == == == == == //
function rentCalendarDays(devices){
    $.ajax({
        type: "POST",
        url: "selections/selectProductRentTime.php",
        dataType: "json",
        data: ({devices:JSON.stringify(devices)}),
        success:function(data){
          days = data;
        },
        error:function(){
        }
      });
}

// == == == == == == == == == == == == == == == == == == == == == == == == == == == LAINAN MUOKKAUS LAINAPÄIVÄT == == == == == == == == == == == == == == == == == == == == == == == == == == == //
function rentEditCalendarDays(devices, rentID){
    $.ajax({
        type: "POST",
        url: "selections/selectRentEditDays.php",
        dataType: "json",
        data: ({rentID: rentID, devices:JSON.stringify(devices)}),
        success:function(data){
          days = data;
        },
        error:function(){
        }
      });
}

// == == == == == == == == == == == == == == == == == == == == == == == == == == == SUODATA LAITTEET STATUKSEN MUKAAN == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän valitessa Laitteet välilehden --> lajittelu pudotuspalkin --> status pudotusvalikosta haluamansa statuksen, tuodaan valittu status input nimiseen muuttujaan ja käynnistetään filterByStatus funktio
jolle lähetetään valittu status. filterByStatus vertailee vastaanotettua statusta jokaiseen laitelistauksen riviin, ja kyseiseltä riviltä läytyvään statukseen. Jos status on eri kuin vastaanotettu, kyseinen
laiterivi piilotetaan näkyvistä. */

$("#selectStatus").on('change', function() {
    var input = $("option:selected", $(this)).text();
    if(input=="Kaikki"){
      input="";
    }
    filterByStatus(input);
});


function filterByStatus(input) {
  var filter, table, tr, td, i;
  filter = input.toUpperCase();
  table = document.getElementById("deviceTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].classList.remove("statusFilter");
      } else {
        tr[i].classList.add("statusFilter");
      }
    }
  }
}

// == == == == == == == == == == == == == == == == == == == == == == == == == == == SUODATA LAITTEET KATEGORIAN MUKAAN == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*Käyttäjän valitessa Laitteet välilehden --> lajittelu pudotuspalkin --> kategoria pudotusvalikosta haluamansa kategorian, tuodaan valittu kategoria input nimiseen muuttujaan ja käynnistetään filterByCategory funktio
jolle lähetetään valittu kategoria. filterByCategory vertailee vastaanotettua kategoriaa jokaiseen laitelistauksen riviin, ja kyseiseltä riviltä läytyvään kategoriaan. Jos kategoria on eri kuin vastaanotettu, kyseinen
laiterivi piilotetaan näkyvistä. */
$("#selectCategory").on('change', function() {
    var input = $("option:selected", $(this)).text();
    if(input=="Kaikki"){
      input="";
    }
    filterByCategory(input);
});


function filterByCategory(input) {
  var filter, table, tr, td, i;
  filter = input.toUpperCase();
  table = document.getElementById("deviceTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].classList.remove("categoryFilter");
      } else {
        tr[i].classList.add("categoryFilter");
      }
    }
  }
}

// == == == == == == == == == == == == == == == == == == == == == == == == == == == ETSI NIMELLÄ LAITE == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*deviceSearch funktio käynnistetään productTab.php sivulta, joka kerta kun käyttäjä kirjoittaa tuotehakuun jonkun kirjaimen. Hakupalkkiin kirjoitettu teksti tuodaan funktioon, ja syötettyä
tekstiä verrataan jokaiseen tuotenimi sarakkeeseen. Jos vastaanotettua tekstiä ei löydy tuotenimisarakkeesta, kyseinen rivi piilotetaan. */
function deviceSearch() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("deviceSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("deviceTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// == == == == == == == == == == == == == == == == == == == == == == == == == == == ETSI NIMELLÄ ADMIN == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*adminSearch funktio käynnistetään adminTab.php sivulta, joka kerta kun käyttäjä kirjoittaa adminhakuun jonkun kirjaimen. Hakupalkkiin kirjoitettu teksti tuodaan funktioon, ja syötettyä
tekstiä verrataan jokaiseen adminin nimisarakkeeseen. Jos vastaanotettua tekstiä ei löydy nimisarakkeesta, kyseinen rivi piilotetaan. */
function adminSearch() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("adminSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("adminTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// == == == == == == == == == == == == == == == == == == == == == == == == == == == ETSI NIMELLÄ LAINAAJA == == == == == == == == == == == == == == == == == == == == == == == == == == == //
/*customerSearch funktio käynnistetään customerTab.php sivulta, joka kerta kun käyttäjä kirjoittaa lainaajahakuun jonkun kirjaimen. Hakupalkkiin kirjoitettu teksti tuodaan funktioon, ja syötettyä
tekstiä verrataan jokaiseen lainaajan nimisarakkeeseen. Jos vastaanotettua tekstiä ei löydy nimisarakkeesta, kyseinen rivi piilotetaan. */
function customerSearch() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("customerSearchInputTab");
  filter = input.value.toUpperCase();
  table = document.getElementById("searchCustomerTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

//== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == //
//== == == == == == == == == == == == == == == == == == == == == == == == == == FUNKTIOT == == == == == == == == == == == == == == == == == == == == == == == == == //
//== == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == == //

function createNewCustomer(firstName, lastName, phoneNumber, email, classID){
  if((!firstName==null || !firstName == "") && (!lastName==null || !lastName == "")){
  $.ajax({
    type: "POST",
    url: "insertions/insertCustomer.php",
    dataType: "json",
    data: ({firstName:firstName, lastName:lastName, phoneNumber:phoneNumber, email:email, classID:classID}),
    success:function(data){
      $('#customerTable tr:first').after("<tr id='customerTR_"+data.id+"'><td><span class='pseudolink viewCustomer' id='customerName_"+data.id+"' value='"+data.id+"'>"+data.firstName + " " + data.lastName +"</span> </td><td> <span id='customerClassID_"+data.id+"'>"+data.classID+"</span></td><td> <span id='customerEmail_"+data.id+"'>"+data.email+"</span></td></tr>");
      showSnackbar("Lainaaja lisätty!");
      rentCustomer = data.id;
      $("#currentRentCustomer").attr("value", data.id);
    },
    error:function(){
      showSnackbar("Lainaajan lisäys epäonnistui!");
    }
  });
  var testi = "Moro";

}
else{
  showSnackbar("Tyhjä etu- tai sukunimi kenttä");
}
}

function selectRentCustomer(customerID){
  $.ajax({
    type: "POST",
    url: "selections/selectCustomerForRent.php",
    dataType: "json",
    data: ({customerID:customerID}),
    success:function(data){
      customerSearchInput
      $("#customerSearchInput").val("");
      $("#livesearch").html("");
      $("#rentFirstName").val(data.firstName);
      $("#rentLastName").val(data.lastName);
      $("#rentClassID").val(data.classID);
      $("#currentRentCustomer").attr("value", data.customerID);
      $("#rentEmail").val(data.email);

    },
    error:function(){
    }
  });
}

function showCustomer(name){
  if (name.length==0) {
    $("#livesearch").html("");
    $("#livesearch").css("border","0px");
  }
    if(!name==null || !name == ""){
  $.ajax({
    type: "POST",
    url: "selections/selectRentCustomer.php",
    data: {name:name},
    success:function(data){
      $("#livesearch").html(data);
      $("#livesearch").css("margin-top","10px");
    },
    error:function(){
    }
  });
}
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


/*Funktio joka käynnistetään käyttäjän klikatessa lainan muokkausmodaalissa deleteFromRent luokalla varustettua painiketta. Funktio luo polutukset visuaalisesti poistettaville
elementeille, sekä vastaanottaa tarkistusluvun, jolla tarkistetaan poistetaanko laite lainalistauksesta, vai poistetaanko myös itse laina (viimeisen poistettavan laitteen yhteydessä)*/
function deleteProductFromRent(productID, rentID, checkID){
  var modalRentTR = "#modalRentTR_"+productID;
  var incomingRentTR = "#incomingRentTR_"+rentID;
  var currentRentTR = "#currentRentTR_"+rentID;
  $.ajax({
    type: "POST",
    url: "deletions/deleteProductFromRent.php",
    dataType: "json",
    data: ({productID:productID, rentID:rentID}),
    success:function(data){
      if(checkID == 2){
        $(incomingRentTR).remove();
        $(currentRentTR).remove();
        $(modalRentTR).remove();
        $('#viewRentModal').modal("hide");
      }
      else{
        $(modalRentTR).remove();
      }
    },
    error:function(){
    }
  });
}

/*Käyttäjän klikatessa lainan muokkausmodaalissa modifyRent luokalla varustettua painiketta kaikki käyttäjän tekemät muutokset noudetaan muuttujiin ja lähetetään ajax pyyntönä
updateRent.php nimiselle tiedostolle, joka puolestaan päivittää lainan vastaanotettujen tietojen mukaisesti.*/
function updateRent(rentID, from, to, description){
  var incomingRentTR = "#incomingRentTR_"+rentID;
  var currentRentTR = "#currentRentTR_"+rentID;
  $.ajax({
    type: "POST",
    url: "updates/updateRent.php",
    dataType: "json",
    data: {rentID, from, to, description},
    success: function(data){
      var rentAppend = data.rentAppend;
      if(rentAppend == 1){
        if($(incomingRentTR).length){
          $(incomingRentTR).remove();
          $("#currentRentTable tr:first").after( " <tr id='currentRentTR_"+data.rentID+"'> \
                                                  <td><span class='pseudolink viewRent' id='currentRentID_"+data.rentID+"' value='"+data.rentID+"'>"+data.rentID+"</span></td> \
                                                  <td><span id='currentRent_"+data.rentID+"_customer_"+data.rentID+"'>"+data.firstName+' '+data.lastName+"</span></td> \
                                                  <td><span id='currentRentDate_"+data.rentID+"'>"+data.startTime+' - '+ "<strong>"+data.stopTime+"</strong></span> </td> \
                                                  </tr>" );
        }
        if($(currentRentTR).length){
          $(currentRentTR).remove();
          $("#currentRentTable tr:first").after( " <tr id='currentRentTR_"+data.rentID+"'> \
                                                  <td><span class='pseudolink viewRent' id='currentRentID_"+data.rentID+"' value='"+data.rentID+"'>"+data.rentID+"</span></td> \
                                                  <td><span id='currentRent_"+data.rentID+"_customer_"+data.rentID+"'>"+data.firstName+' '+data.lastName+"</span></td> \
                                                  <td><span id='currentRentDate_"+data.rentID+"'>"+data.startTime+' - '+ "<strong>"+data.stopTime+"</strong></span> </td> \
                                                  </tr>" );
        }
      }
      if(rentAppend == 2){
        if($(incomingRentTR).length){
          $(incomingRentTR).remove();
          $("#incomingRentTable tr:first").after( " <tr id='incomingRentTR_"+data.rentID+"'> \
                                                  <td><span class='pseudolink viewRent' id='incomingRentID_"+data.rentID+"' value='"+data.rentID+"'>"+data.rentID+"</span></td> \
                                                  <td><span id='incomingRent_"+data.rentID+"_customer_"+data.rentID+"'>"+data.firstName+' '+data.lastName+"</span></td> \
                                                  <td><span id='incomingRentDate_"+data.rentID+"'>"+ "<strong>"+data.startTime+"</strong>"+' - '+data.stopTime+"</span> </td> \
                                                  </tr>" );
        }
        if($(currentRentTR).length){
          $(currentRentTR).remove();
          $("#incomingRentTable tr:first").after( " <tr id='incomingRentTR_"+data.rentID+"'> \
                                                  <td><span class='pseudolink viewRent' id='incomingRentID_"+data.rentID+"' value='"+data.rentID+"'>"+data.rentID+"</span></td> \
                                                  <td><span id='incomingRent_"+data.rentID+"_customer_"+data.rentID+"'>"+data.firstName+' '+data.lastName+"</span></td> \
                                                  <td><span id='incomingRentDate_"+data.rentID+"'>"+ "<strong>"+data.startTime+"</strong>"+' - '+data.stopTime+"</span> </td> \
                                                  </tr>" );
        }
      }
      showSnackbar(data.success);
    },
    error:function(){
    }
  });
}

/* Käyttäjän klikatessa Lainaukset välilehdellä mitä tahansa lainan numeroa, joka on varustettu viewRent luokalla avataan lainaID:tä vastaavan lainan tiedot modaalissa käyttäjän nähtäville */
function selectRent(rentID){
$.ajax({
  type: "POST",
  url: "selections/selectRent.php",
  data: {rentID:rentID},
  success:function(data){
    $('#viewRentDetail').html(data);
    $('#viewRentModal').modal("show");
    devices = [];
      $('#viewRentModal').find('.deleteFromRent').each(function () {
           devices.push($(this).val());
       });
      rentEditCalendarDays(devices, rentID);
  },
  error:function(){
  }
});
}

/*addNewAccessory funktio käynnistetään, kun käyttäjä klikkaa addNewAccessory luokalla varustettua painiketta deviceTab.php:ssä tai deviceModal.php:ssä.
funktio ottaa vastaan sille lähetetyn lisävarusteen nimen ja tarkistusID:n, käynnistää ajax kutsun insertAccessory.php tiedostolle, jolle lähettää vastaanotetun nimen
insertAccessory.php suorittaa lisäyksen accessory tietokantatauluun, vastaanotetulla lisävarusteen nimellä. Onnistuneen ajax kutsun jälkeen lisätty lisävaruste tulostetaan
checkID:stä riippuen yhteen tai kahteen paikkaan.*/
function addNewAccessory(accessoryName, checkID){
  if(!accessoryName==null || !accessoryName == ""){
  $.ajax({
    type: "POST",
    url: "insertions/insertAccessory.php",
    dataType: "json",
    data: ({accessoryName:accessoryName}),
    success:function(data){
      showSnackbar("Lisävaruste lisätty!");
      $('.accessoryList').append("<tr id='trAccessory_"+data.id+"'>\
                                        <td>\
                                          <input type='text' class='form-control accessoryInputClass' id='accessoryInput_"+data.id+"'>\
                                            <div class='checkbox accessoryCheckboxClass' id='accessoryCheckbox_"+data.id+"'>\
                                              <label><input type='checkbox' value='"+data.id+"' class='accessoryCheckbox'>  <span id='accessorySpan_"+data.id+"'>"+data.name+"</span></label>\
                                            </div>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-success btn-sm accessoryConfirmClass' id='accessoryConfirm_"+data.id+"' value='"+data.id+"'>Tallenna</button>\
                                            <button type='button' class='btn btn-primary btn-sm accessoryEditClass' value='"+data.id+"'>Muokkaa</button>\
                                          </center>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-sm btn-danger accessoryDeleteClass' id='accessoryDelete_"+data.id+"' value='"+data.id+"'>Poista</button>\
                                            <button type='button' class='btn btn-sm btn-primary accessoryCancelClass' id='accessoryCancel_"+data.id+"' value='"+data.id+"'>Peruuta</button>\
                                          </center>\
                                        </td>\
                                    </tr>"
                                  );
      if(checkID==2){
      $('.modalAccessoryList').append("<tr id='trModalAccessory_"+data.id+"'>\
                                        <td>\
                                          <input type='text' class='form-control accessoryInputClass' id='modalAccessoryInput_"+data.id+"'>\
                                            <div class='checkbox accessoryCheckboxClass' id='modalAccessoryCheckbox_"+data.id+"'>\
                                              <label><input type='checkbox' value='"+data.id+"' class='modalAccessoryCheckbox'>  <span id='modalAccessorySpan_"+data.id+"'>"+data.name+"</span></label>\
                                            </div>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-success btn-sm modalAccessoryConfirmClass' id='modalAccessoryConfirm_"+data.id+"' value='"+data.id+"'>Tallenna</button>\
                                            <button type='button' class='btn btn-primary btn-sm modalAccessoryEditClass' value='"+data.id+"'>Muokkaa</button>\
                                          </center>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-sm btn-danger modalAccessoryDeleteClass' id='modalAccessoryDelete_"+data.id+"' value='"+data.id+"'>Poista</button>\
                                            <button type='button' class='btn btn-sm btn-primary modalAccessoryCancelClass' id='modalAccessoryCancel_"+data.id+"' value='"+data.id+"'>Peruuta</button>\
                                          </center>\
                                        </td>\
                                    </tr>"
                                  );
    }
    },
    error:function(){
    }
  });
}
else{
  showSnackbar("Lisävarusteen nimikenttä on tyhjä");
}
}


/*addNewProgram funktio käynnistetään, kun käyttäjä klikkaa addNewProgram luokalla varustettua painiketta deviceTab.php:ssä tai deviceModal.php:ssä.
funktio ottaa vastaan sille lähetetyn ohjelman nimen ja tarkistusID:n, käynnistää ajax kutsun insertProgram.php tiedostolle, jolle lähettää vastaanotetun nimen
insertProgram.php suorittaa lisäyksen program tietokantatauluun, vastaanotetulla ohjelman nimellä. Onnistuneen ajax kutsun jälkeen lisätty ohjelma tulostetaan
checkID:stä riippuen yhteen tai kahteen paikkaan.*/
function addNewProgram(programName, checkID){
  if(!programName==null || !programName == ""){
  $.ajax({
    type: "POST",
    url: "insertions/insertProgram.php",
    dataType: "json",
    data: ({programName:programName}),
    success:function(data){
      showSnackbar("Ohjelma lisätty!");
      $('.programList').append("<tr id='trProgram_"+data.id+"'>\
                                        <td>\
                                          <input type='text' class='form-control programInputClass' id='programInput_"+data.id+"'>\
                                            <div class='checkbox programCheckboxClass' id='programCheckbox_"+data.id+"'>\
                                              <label><input type='checkbox' value='"+data.id+"' class='programCheckbox'>  <span id='programSpan_"+data.id+"'>"+data.name+"</span></label>\
                                            </div>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-success btn-sm programConfirmClass' id='programConfirm_"+data.id+"' value='"+data.id+"'>Tallenna</button>\
                                            <button type='button' class='btn btn-primary btn-sm programEditClass' value='"+data.id+"'>Muokkaa</button>\
                                          </center>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-sm btn-danger programDeleteClass' id='programDelete_"+data.id+"' value='"+data.id+"'>Poista</button>\
                                            <button type='button' class='btn btn-sm btn-primary programCancelClass' id='programCancel_"+data.id+"' value='"+data.id+"'>Peruuta</button>\
                                          </center>\
                                        </td>\
                                    </tr>"
                                  );
      if(checkID==2){
      $('.modalProgramList').append("<tr id='trModalProgram_"+data.id+"'>\
                                        <td>\
                                          <input type='text' class='form-control modalProgramInputClass' id='modalProgramInput_"+data.id+"'>\
                                            <div class='checkbox programCheckboxClass' id='modalProgramCheckbox_"+data.id+"'>\
                                              <label><input type='checkbox' value='"+data.id+"' class='modalProgramCheckbox'>  <span id='modalProgramSpan_"+data.id+"'>"+data.name+"</span></label>\
                                            </div>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-success btn-sm modalProgramConfirmClass' id='modalProgramConfirm_"+data.id+"' value='"+data.id+"'>Tallenna</button>\
                                            <button type='button' class='btn btn-primary btn-sm modalProgramEditClass' value='"+data.id+"'>Muokkaa</button>\
                                          </center>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-sm btn-danger modalProgramDeleteClass' id='modalProgramDelete_"+data.id+"' value='"+data.id+"'>Poista</button>\
                                            <button type='button' class='btn btn-sm btn-primary modalProgramCancelClass' id='modalProgramCancel_"+data.id+"' value='"+data.id+"'>Peruuta</button>\
                                          </center>\
                                        </td>\
                                    </tr>"
                                  );

    }
    },
    error:function(){
    }
  });
}
else{
  showSnackbar("Ohjelman nimikenttä on tyhjä");
}
}

/*addNewCategory funktio käynnistetään, kun käyttäjä klikkaa addNewCategory luokalla varustettua painiketta deviceTab.php:ssä.
funktio ottaa vastaan sille lähetetyn ohjelman nimen, käynnistää ajax kutsun insertCategory.php tiedostolle jolle lähettää vastaanotetun nimen
insertCategory.php suorittaa lisäyksen category tietokantatauluun, vastaanotetulla kategorian nimellä. Onnistuneen ajax kutsun jälkeen lisätty ohjelma tulostetaan
kahteen paikkaan*/
function addNewCategory(categoryName){
  if(!categoryName==null || !categoryName == ""){
  $.ajax({
    type: "POST",
    url: "insertions/insertCategory.php",
    dataType: "json",
    data: ({categoryName:categoryName}),
    success:function(data){
      $('#newCategoryInput').val("");
      showSnackbar("Kategorian lisäys onnistui");
      $('.categoryList').append("<tr id='trCategory_"+data.id+"'>\
                                        <td>\
                                          <input type='text' class='form-control categoryInputClass' id='categoryInput_"+data.id+"'>\
                                              <span id='categorySpan_"+data.id+"'>"+data.name+"</span>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-success btn-sm categoryConfirmClass' id='categoryConfirm_"+data.id+"' value='"+data.id+"'>Tallenna</button>\
                                            <button type='button' class='btn btn-primary btn-sm categoryEditClass' value='"+data.id+"'>Muokkaa</button>\
                                          </center>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-sm btn-danger categoryDeleteClass' id='categoryDelete_"+data.id+"' value='"+data.id+"'>Poista</button>\
                                            <button type='button' class='btn btn-sm btn-primary categoryCancelClass' id='categoryCancel_"+data.id+"' value='"+data.id+"'>Peruuta</button>\
                                          </center>\
                                        </td>\
                                    </tr>"
                                  );
                                  $('#category').append("<option value='"+data.id+"' id='newProductCategory_"+data.id+"'>"+data.name+"</option>");
                                  $('#selectCategory').append("<option value='"+data.id+"' id='filterByCategory_"+data.id+"'>"+data.name+"</option>");
    },
    error:function(){
    }
  });
}
else{
  showSnackbar("Kategorian nimikenttä on tyhjä");
}
}

/*addNewStatus funktio käynnistetään, kun käyttäjä klikkaa addNewStatus luokalla varustettua painiketta deviceTab.php:ssä.
funktio ottaa vastaan sille lähetetyn statuksen nimen, käynnistää ajax kutsun insertStatus.php tiedostolle jolle lähettää vastaanotetun nimen
insertStatus.php suorittaa lisäyksen status tietokantatauluun, vastaanotetulla statuksen nimellä. Onnistuneen ajax kutsun jälkeen lisätty status tulostetaan
kahteen paikkaan*/
function addNewStatus(statusName){
  if(!statusName==null || !statusName == ""){
  $.ajax({
    type: "POST",
    url: "insertions/insertStatus.php",
    dataType: "json",
    data: ({statusName:statusName}),
    success:function(data){
      $('#newStatusInput').val("");
      showSnackbar("Statuksen lisäys onnistui");
      $('.statusList').append("<tr id='trStatus_"+data.id+"'>\
                                        <td>\
                                          <input type='text' class='form-control statusInputClass' id='statusInput_"+data.id+"'>\
                                              <span id='statusSpan_"+data.id+"'>"+data.status+"</span>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-success btn-sm statusConfirmClass' id='statusConfirm_"+data.id+"' value='"+data.id+"'>Tallenna</button>\
                                            <button type='button' class='btn btn-primary btn-sm statusEditClass' value='"+data.id+"'>Muokkaa</button>\
                                          </center>\
                                        </td>\
                                        <td>\
                                          <center>\
                                            <button type='button' class='btn btn-sm btn-danger statusDeleteClass' id='statusDelete_"+data.id+"' value='"+data.id+"'>Poista</button>\
                                            <button type='button' class='btn btn-sm btn-primary statusCancelClass' id='statusCancel_"+data.id+"' value='"+data.id+"'>Peruuta</button>\
                                          </center>\
                                        </td>\
                                    </tr>"
                                  );
                                  $('#status').append("<option value='"+data.id+"' id='newProductStatus_"+data.id+"'>"+data.status+"</option>");
                                  $('#selectStatus').append("<option value='"+data.id+"' id='filterByStatus_"+data.id+"'>"+data.status+"</option>");
    },
    error:function(){
    }
  });
}
else{
  showSnackbar("Statuksen nimikenttä on tyhjä");
}
}


/*deleteAccessory funktio käynnistetään kun käyttäjä klikkaa accessoryDeleteClass luokalla varustettua painiketta. Funktio vastaanottaa klikatun painikkeen ID:n
  (lisävarusteen tietokantaID, sekä tarkistusID:n. Funktio käynnistää ajax kutsun deleteAccessory.php:n ja lähettää sille poistettavan lisävarusteen ID:n. deleteAccessory.php
  suorittaa tietokantapoiston, ja onnistuneen tietokantapoiston seurauksena lisävaruste poistetaan tarkistusID:stä riippuen yhdestä tai kahdesta paikasta näkyvistä)*/
function deleteAccessory(accessoryID, checkID){
  var trAccessory = "#trAccessory_"+accessoryID;
  var trModalAccessory  = "#trModalAccessory_"+accessoryID;
  var answer = confirm('Oletko varma että haluat poistaa tämän lisävarusteen kokonaan?');
  if (answer) {
      $.ajax({
          type: "POST",
          url: "deletions/deleteAccessory.php",
          dataType: "json",
          data: {accessoryID:accessoryID},
          success:function(data){
            $(trAccessory).remove();
            showSnackbar(data);
            if(checkID==2){
              $(trModalAccessory).remove();
            }
            else{
              //Do nothing
            }
          },
          error:function(){
            showSnackbar(data);
          }
        });
  }
  else{
  }
}

/*deleteProgram funktio käynnistetään kun käyttäjä klikkaa programDeleteClass luokalla varustettua painiketta. Funktio vastaanottaa klikatun painikkeen ID:n
  (ohjelman tietokantaID, sekä tarkistusID:n. Funktio käynnistää ajax kutsun deleteProgram.php:n ja lähettää sille poistettavan ohjelman ID:n. deleteProgram.php
  suorittaa tietokantapoiston, ja onnistuneen tietokantapoiston seurauksena ohjelma poistetaan tarkistusID:stä riippuen yhdestä tai kahdesta paikasta näkyvistä)*/
function deleteProgram(programID, checkID){
  var trProgram = "#trProgram_"+programID;
  var trModalProgram  = "#trModalProgram_"+programID;
  var answer = confirm('Oletko varma että haluat poistaa tämän ohjelman kokonaan?');
  if (answer) {
      $.ajax({
          type: "POST",
          url: "deletions/deleteProgram.php",
          dataType: "json",
          data: {programID:programID},
          success:function(data){
            $(trProgram).remove();
            showSnackbar(data);
            if(checkID==2){
              $(trModalProgram).remove();
            }
            else{
              //Do nothing
            }
          },
          error:function(){
            showSnackbar(data);
          }
        });

  }
  else{
  }
}

/*accessoryClickEdit funktio käynnistetään käyttäjän klikatessa accessoryEditClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn lisävarusteen ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä accessoryHiddenMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function accessoryClickEdit(accessoryID){
  var accessoryCheckbox = "#accessoryCheckbox_"+accessoryID;
  var accessorySpan = "#accessorySpan_"+accessoryID;
  var accessoryInput = "#accessoryInput_"+accessoryID;
  var accessoryName = $(accessorySpan).text();
  var accessoryConfirm = "#accessoryConfirm_"+accessoryID;
  var accessoryCancel = "#accessoryCancel_"+accessoryID;
  var accessoryEditClass = ".accessoryEditClass";
  var accessoryDeleteClass = ".accessoryDeleteClass";

  hiddenMode(accessoryEditClass, accessoryDeleteClass, accessoryCheckbox, accessoryInput, accessoryName, accessoryConfirm, accessoryCancel);
}

/*programClickEdit funktio käynnistetään käyttäjän klikatessa programEditClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä hiddenMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function programClickEdit(programID){
  var programCheckbox = "#programCheckbox_"+programID;
  var programSpan = "#programSpan_"+programID;
  var programInput = "#programInput_"+programID;
  var programName = $(programSpan).text();
  var programConfirm = "#programConfirm_"+programID;
  var programCancel = "#programCancel_"+programID;
  var programEditClass = ".programEditClass";
  var programDeleteClass = ".programDeleteClass";

  hiddenMode(programEditClass, programDeleteClass, programCheckbox, programInput, programName, programConfirm, programCancel);
}

/*programClickCancel funktio käynnistetään käyttäjän klikatessa programCancelClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä originalMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function programClickCancel(programID){
  var programInput = "#programInput_"+programID;
  var programConfirm = "#programConfirm_"+programID;
  var programCheckbox = "#programCheckbox_"+programID;
  var programCancel = "#programCancel_"+programID;
  var programEditClass = ".programEditClass";
  var programDeleteClass = ".programDeleteClass";

  originalMode(programEditClass, programDeleteClass, programInput, programConfirm, programCheckbox, programCancel);
}

/*programClickCancel funktio käynnistetään käyttäjän klikatessa programCancelClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä originalMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function categoryClickCancel(categoryID){
  var categorySpan = "#categorySpan_"+categoryID;
  var categoryInput = "#categoryInput_"+categoryID;
  var categoryConfirm = "#categoryConfirm_"+categoryID;
  var categoryCancel = "#categoryCancel_"+categoryID;
  var categoryEditClass = ".categoryEditClass";
  var categoryDeleteClass = ".categoryDeleteClass";

  originalMode(categoryEditClass, categoryDeleteClass, categoryInput, categoryConfirm, categoryCancel, categorySpan);
}

/*statusClickCancel funktio käynnistetään käyttäjän klikatessa programCancelClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä programOriginalMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function statusClickCancel(statusID){
  var statusSpan = "#statusSpan_"+statusID;
  var statusInput = "#statusInput_"+statusID;
  var statusConfirm = "#statusConfirm_"+statusID;
  var statusCancel = "#statusCancel_"+statusID;
  var statusEditClass = ".statusEditClass";
  var statusDeleteClass = ".statusDeleteClass";

  originalMode2(statusEditClass, statusDeleteClass, statusInput, statusConfirm, statusCancel, statusSpan);
}

/*modalAccessoryClickEdit funktio käynnistetään käyttäjän klikatessa modalAccessoryEditClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn lisävarusteen ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä accessoryHiddenMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function modalAccessoryClickEdit(accessoryID){
  var modalAccessoryCheckbox = "#modalAccessoryCheckbox_"+accessoryID;
  var modalAccessorySpan = "#modalAccessorySpan_"+accessoryID;
  var modalAccessoryInput = "#modalAccessoryInput_"+accessoryID;
  var accessoryName = $(modalAccessorySpan).text();
  var modalAccessoryConfirm = "#modalAccessoryConfirm_"+accessoryID;
  var modalAccessoryCancel = "#modalAccessoryCancel_"+accessoryID;
  var modalAccessoryEditClass = ".modalAccessoryEditClass";
  var modalAccessoryDeleteClass = ".modalAccessoryDeleteClass";

  hiddenMode(modalAccessoryEditClass, modalAccessoryDeleteClass, modalAccessoryCheckbox, modalAccessoryInput, accessoryName, modalAccessoryConfirm, modalAccessoryCancel);
}

/*modalProgramClickEdit funktio käynnistetään käyttäjän klikatessa modalProgramEditClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä hiddenMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function modalProgramClickEdit(programID){
  var modalProgramCheckbox = "#modalProgramCheckbox_"+programID;
  var modalProgramSpan = "#modalProgramSpan_"+programID;
  var modalProgramInput = "#modalProgramInput_"+programID;
  var programName = $(modalProgramSpan).text();
  var modalProgramConfirm = "#modalProgramConfirm_"+programID;
  var modalProgramCancel = "#modalProgramCancel_"+programID;
  var modalProgramEditClass = ".modalProgramEditClass";
  var modalProgramDeleteClass = ".modalProgramDeleteClass";

  hiddenMode(modalProgramEditClass, modalProgramDeleteClass, modalProgramCheckbox, modalProgramInput, programName, modalProgramConfirm, modalProgramCancel);
}

/*accessoryClickCancel funktio käynnistetään käyttäjän klikatessa accessoryCancelClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn lisävarusteen ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä originalMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function accessoryClickCancel(accessoryID){
  var accessoryInput = "#accessoryInput_"+accessoryID;
  var accessoryConfirm = "#accessoryConfirm_"+accessoryID;
  var accessoryCheckbox = "#accessoryCheckbox_"+accessoryID;
  var accessoryCancel = "#accessoryCancel_"+accessoryID;
  var accessoryEditClass = ".accessoryEditClass";
  var accessoryDeleteClass = ".accessoryDeleteClass";

  originalMode(accessoryEditClass, accessoryDeleteClass, accessoryInput, accessoryConfirm, accessoryCheckbox, accessoryCancel);
}

/*modalAccessoryClickCancel funktio käynnistetään käyttäjän klikatessa modalAccessoryCancelClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn lisävarusteen ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä originalMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function modalAccessoryClickCancel(accessoryID){
  var modalAccessoryInput = "#modalAccessoryInput_"+accessoryID;
  var modalAccessoryConfirm = "#modalAccessoryConfirm_"+accessoryID;
  var modalAccessoryCheckbox = "#modalAccessoryCheckbox_"+accessoryID;
  var modalAccessoryCancel = "#modalAccessoryCancel_"+accessoryID;
  var modalAccessoryEditClass = ".modalAccessoryEditClass";
  var modalAccessoryDeleteClass = ".modalAccessoryDeleteClass";

  originalMode(modalAccessoryEditClass, modalAccessoryDeleteClass, modalAccessoryInput, modalAccessoryConfirm, modalAccessoryCheckbox, modalAccessoryCancel);
}

/*modalProgramClickCancel funktio käynnistetään käyttäjän klikatessa modalProgramCancelClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä originalMode ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function modalProgramClickCancel(programID){
  var modalProgramInput = "#modalProgramInput_"+programID;
  var modalProgramConfirm = "#modalProgramConfirm_"+programID;
  var modalProgramCheckbox = "#modalProgramCheckbox_"+programID;
  var modalProgramCancel = "#modalProgramCancel_"+programID;
  var modalProgramEditClass = ".modalProgramEditClass";
  var modalProgramDeleteClass = ".modalProgramDeleteClass";

  originalMode(modalProgramEditClass, modalProgramDeleteClass, modalProgramInput, modalProgramConfirm, modalProgramCheckbox, modalProgramCancel);
}

/*categoryClickEdit funktio käynnistetään käyttäjän klikatessa categoryEditClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn kategorian ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä hiddenMode2 ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function categoryClickEdit(categoryID){
  var categorySpan = "#categorySpan_"+categoryID;
  var categoryInput = "#categoryInput_"+categoryID;
  var categoryName = $(categorySpan).text();
  var categoryConfirm = "#categoryConfirm_"+categoryID;
  var categoryCancel = "#categoryCancel_"+categoryID;
  var categoryEditClass = ".categoryEditClass";
  var categoryDeleteClass = ".categoryDeleteClass";

  hiddenMode2(categoryEditClass, categoryDeleteClass, categoryInput, categoryName, categoryConfirm, categoryCancel, categorySpan);
}

/*statusClickEdit funktio käynnistetään käyttäjän klikatessa statusEditClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn status ID:n
  suorittaa ID polutuksia, sekä luokkapolutuksia, käynnistää toisen funktion nimeltä hiddenMode2 ja lähettää mukana kaikki luomansa id ja luokkapolut.*/
function statusClickEdit(statusID){
  var statusSpan = "#statusSpan_"+statusID;
  var statusInput = "#statusInput_"+statusID;
  var statusName = $(statusSpan).text();
  var statusConfirm = "#statusConfirm_"+statusID;
  var statusCancel = "#statusCancel_"+statusID;
  var statusEditClass = ".statusEditClass";
  var statusDeleteClass = ".statusDeleteClass";

  hiddenMode2(statusEditClass, statusDeleteClass, statusInput, statusName, statusConfirm, statusCancel, statusSpan);
}

/*accessoryClickConfirm funktio käynnistetään käyttäjän klikatessa accessoryConfirmClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn lisävarusteen ID:n
  suorittaa ID polutuksia, luokkapolutuksia, noutaa klikatun painikkeen kanssa samalla rivillä olevasta tekstikentästä käyttäjän muuttaman lisävarusteen nimen, käynnistää ajax kutsun
  updateAccessory.php tiedostolle ja lähettää mukana lisävarusteen ID:n sekä muutetun nimen. updateAccessory päivittää accessory tietokantataulussa vastaanotetun ID:n lisävarusteen
  nimen lähetetyn mukaiseksi. Onnistunut ajax kutsu muuttaa lisävaruste pudotuspaneelissa näkyvän lisävarusteen nimen.*/
function accessoryClickConfirm(accessoryID){
  var accessoryInput = "#accessoryInput_"+accessoryID;
  var accessorySpan = "#accessorySpan_"+accessoryID;
  var accessoryNewName = $(accessoryInput).val();
  var accessoryConfirm = "#accessoryConfirm_"+accessoryID;
  var accessoryCheckbox = "#accessoryCheckbox_"+accessoryID;
  var accessoryCancel = "#accessoryCancel_"+accessoryID;
  var accessoryEditClass = ".accessoryEditClass";
  var accessoryDeleteClass = ".accessoryDeleteClass";
  if(!accessoryNewName==null || !accessoryNewName == ""){
  $.ajax({
    type: "POST",
    url: "updates/updateAccessory.php",
    dataType: "json",
    data: ({accessoryID:accessoryID, accessoryNewName:accessoryNewName}),
    success:function(data){
      $(accessorySpan).text(data.name);
      showSnackbar("Lisävarustetta muokattu!");
    },
    error:function(){
    }
  });
  }
  originalMode(accessoryEditClass, accessoryDeleteClass, accessoryInput, accessoryConfirm, accessoryCheckbox, accessoryCancel);
}

/*modalAccessoryClickConfirm funktio käynnistetään käyttäjän klikatessa modalAccessoryConfirmClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn lisävarusteen ID:n
  suorittaa ID polutuksia, luokkapolutuksia, noutaa klikatun painikkeen kanssa samalla rivillä olevasta tekstikentästä käyttäjän muuttaman lisävarusteen nimen, käynnistää ajax kutsun
  updateAccessory.php tiedostolle ja lähettää mukana lisävarusteen ID:n sekä muutetun nimen. updateAccessory päivittää accessory tietokantataulussa vastaanotetun ID:n lisävarusteen
  nimen lähetetyn mukaiseksi. Onnistunut ajax kutsu muuttaa lisävaruste pudotuspaneelissa näkyvän lisävarusteen nimen.*/
function modalAccessoryClickConfirm(accessoryID){
  var modalAccessoryInput = "#modalAccessoryInput_"+accessoryID;
  var accessorySpan = "#accessorySpan_"+accessoryID;
  var modalAccessorySpan = "#modalAccessorySpan_"+accessoryID;
  var accessoryNewName = $(modalAccessoryInput).val();
  var modalAccessoryConfirm = "#modalAccessoryConfirm_"+accessoryID;
  var modalAccessoryCheckbox = "#modalAccessoryCheckbox_"+accessoryID;
  var modalAccessoryCancel = "#modalAccessoryCancel_"+accessoryID;
  var modalAccessoryEditClass = ".modalAccessoryEditClass";
  var modalAccessoryDeleteClass = ".modalAccessoryDeleteClass";
  if(!accessoryNewName==null || !accessoryNewName == ""){
  $.ajax({
    type: "POST",
    url: "updates/updateAccessory.php",
    dataType: "json",
    data: ({accessoryID:accessoryID, accessoryNewName:accessoryNewName}),
    success:function(data){
      $(accessorySpan).text(data.name);
      $(modalAccessorySpan).text(data.name);
      showSnackbar("Lisävarustetta muokattu!");
    },
    error:function(){
    }
  });
  }
  originalMode(modalAccessoryEditClass, modalAccessoryDeleteClass, modalAccessoryInput, modalAccessoryConfirm, modalAccessoryCheckbox, modalAccessoryCancel);
}

/*modalProgramClickConfirm funktio käynnistetään käyttäjän klikatessa modalProgramConfirmClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, luokkapolutuksia, noutaa klikatun painikkeen kanssa samalla rivillä olevasta tekstikentästä käyttäjän muuttaman ohjelman nimen, käynnistää ajax kutsun
  updateProgram.php tiedostolle ja lähettää mukana ohjelman ID:n sekä muutetun nimen. updateProgram päivittää program tietokantataulussa vastaanotetun ID:n ohjelman
  nimen lähetetyn mukaiseksi. Onnistunut ajax kutsu muuttaa ohjelma pudotuspaneelissa näkyvän ohjelman nimen.*/
function modalProgramClickConfirm(programID){
  var modalProgramInput = "#modalProgramInput_"+programID;
  var programSpan = "#programSpan_"+programID;
  var modalProgramSpan = "#modalProgramSpan_"+programID;
  var programNewName = $(modalProgramInput).val();
  var modalProgramConfirm = "#modalProgramConfirm_"+programID;
  var modalProgramCheckbox = "#modalProgramCheckbox_"+programID;
  var modalProgramCancel = "#modalProgramCancel_"+programID;
  var modalProgramEditClass = ".modalProgramEditClass";
  var modalProgramDeleteClass = ".modalProgramDeleteClass";
  if(!programNewName==null || !programNewName == ""){
  $.ajax({
    type: "POST",
    url: "updates/updateProgram.php",
    dataType: "json",
    data: ({programID:programID, programNewName:programNewName}),
    success:function(data){
      $(programSpan).text(data.name);
      $(modalProgramSpan).text(data.name);
      showSnackbar("Ohjelman muokkaus onnistui!");
    },
    error:function(){
    }
  });
  }
  originalMode(modalProgramEditClass, modalProgramDeleteClass, modalProgramInput, modalProgramConfirm, modalProgramCheckbox, modalProgramCancel);
}

/*programClickConfirm funktio käynnistetään käyttäjän klikatessa programConfirmClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn ohjelman ID:n
  suorittaa ID polutuksia, luokkapolutuksia, noutaa klikatun painikkeen kanssa samalla rivillä olevasta tekstikentästä käyttäjän muuttaman ohjelman nimen, käynnistää ajax kutsun
  updateProgram.php tiedostolle ja lähettää mukana ohjelman ID:n sekä muutetun nimen. updateProgram päivittää program tietokantataulussa vastaanotetun ID:n ohjelman
  nimen lähetetyn mukaiseksi. Onnistunut ajax kutsu muuttaa ohjelma pudotuspaneelissa näkyvän ohjelman nimen.*/
function programClickConfirm(programID){
  var programInput = "#programInput_"+programID;
  var programSpan = "#programSpan_"+programID;
  var programNewName = $(programInput).val();
  var programConfirm = "#programConfirm_"+programID;
  var programCheckbox = "#programCheckbox_"+programID;
  var programCancel = "#programCancel_"+programID;
  var programEditClass = ".programEditClass";
  var programDeleteClass = ".programDeleteClass";
  if(!programNewName==null || !programNewName == ""){
  $.ajax({
    type: "POST",
    url: "updates/updateProgram.php",
    dataType: "json",
    data: ({programID:programID, programNewName:programNewName}),
    success:function(data){
      $(programSpan).text(data.name);
      showSnackbar("Ohjelman muokkaus onnistui!");
    },
    error:function(){
    }
  });
  }
  originalMode(programEditClass, programDeleteClass, programInput, programConfirm, programCheckbox, programCancel);
}

/*categoryClickConfirm funktio käynnistetään käyttäjän klikatessa categoryConfirmClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn lisävarusteen ID:n
  suorittaa ID polutuksia, luokkapolutuksia, noutaa klikatun painikkeen kanssa samalla rivillä olevasta tekstikentästä käyttäjän muuttaman kategorian nimen, käynnistää ajax kutsun
  updateCategory.php tiedostolle ja lähettää mukana kategorian ID:n sekä muutetun nimen. updateCategory päivittää category tietokantataulussa vastaanotetun ID:n kategorian
  nimen lähetetyn mukaiseksi. Onnistunut ajax kutsu muuttaa Tuoteryhmä- ja Statushallinta pudotuspaneelissa ja pudotusvalikoissa näkyvän kategorian nimen.*/
function categoryClickConfirm(categoryID){
  var newProductCategory = "#newProductCategory_"+categoryID;
  var filterByCategory ="#filterByCategory_"+categoryID;
  var categoryInput = "#categoryInput_"+categoryID;
  var categorySpan = "#categorySpan_"+categoryID;
  var categoryNewName = $(categoryInput).val();
  var categoryConfirm = "#categoryConfirm_"+categoryID;
  var categoryCancel = "#categoryCancel_"+categoryID;
  var categoryEditClass = ".categoryEditClass";
  var categoryDeleteClass = ".categoryDeleteClass";
  if(!categoryNewName==null || !categoryNewName == ""){
  $.ajax({
    type: "POST",
    url: "updates/updateCategory.php",
    dataType: "json",
    data: ({categoryID:categoryID, categoryNewName:categoryNewName}),
    success:function(data){
      $(categorySpan).text(data.name);
      $(newProductCategory).text(data.name);
      $(filterByCategory).text(data.name);
      showSnackbar("Kategorian muokkaus onnistui!");
    },
    error:function(){
    }
  });
  }
  originalMode2(categoryEditClass, categoryDeleteClass, categoryInput, categoryConfirm, categoryCancel, categorySpan);
}

/*statusClickConfirm funktio käynnistetään käyttäjän klikatessa statusConfirmClass luokalla varustettua painiketta, funktio vastaanottaa sille lähetetyn status ID:n
  suorittaa ID polutuksia, luokkapolutuksia, noutaa klikatun painikkeen kanssa samalla rivillä olevasta tekstikentästä käyttäjän muuttaman status nimen, käynnistää ajax kutsun
  updateStatus.php tiedostolle ja lähettää mukana status ID:n sekä muutetun nimen. updateStatus päivittää status tietokantataulussa vastaanotetun ID:n statuksen
  nimen lähetetyn mukaiseksi. Onnistunut ajax kutsu muuttaa Tuoteryhmä- ja Statushallinta pudotuspaneelissa ja pudotusvalikoissa näkyvän statuksen nimen.*/
function statusClickConfirm(statusID){
  var newProductStatus = "#newProductStatus_"+statusID;
  var filterByStatus ="#filterByStatus_"+statusID;
  var statusInput = "#statusInput_"+statusID;
  var statusSpan = "#statusSpan_"+statusID;
  var statusNewName = $(statusInput).val();
  var statusConfirm = "#statusConfirm_"+statusID;
  var statusCancel = "#statusCancel_"+statusID;
  var statusEditClass = ".statusEditClass";
  var statusDeleteClass = ".statusDeleteClass";
  if(!statusNewName==null || !statusNewName == ""){
  $.ajax({
    type: "POST",
    url: "updates/updateStatus.php",
    dataType: "json",
    data: ({statusID:statusID, statusNewName:statusNewName}),
    success:function(data){
      $(statusSpan).text(data.status);
      $(newProductStatus).text(data.status);
      $(filterByStatus).text(data.status);
      showSnackbar("Statuksen muokkaus onnistui!");
    },
    error:function(){
    }
  });
  }
  statusOriginalMode(statusEditClass, statusDeleteClass, statusInput, statusConfirm, statusCancel, statusSpan);
}


function hiddenMode(editClass, deleteClass, checkbox, input, name, confirm, cancel){
  $(editClass).css("display", "none");
  $(deleteClass).css("display", "none");
  $(checkbox).css("display", "none");
  $(input).css("display", "block");
  $(input).val(name);
  $(confirm).css("display", "block");
  $(cancel).css("display", "block");
}

function hiddenMode2(editClass, deleteClass, input, name, confirm, cancel, span){
  $(editClass).css("display", "none");
  $(span).css("display", "none");
  $(deleteClass).css("display", "none");
  $(input).css("display", "block");
  $(input).val(name);
  $(confirm).css("display", "block");
  $(cancel).css("display", "block");
}

function originalMode(editClass, deleteClass, input, confirm, checkbox, cancel){
  $(deleteClass).css("display", "block");
  $(editClass).css("display", "block");
  $(input).css("display", "none");
  $(confirm).css("display", "none");
  $(checkbox).css("display", "block");
  $(cancel).css("display", "none");
}

function originalMode2(editClass, deleteClass, input, confirm, cancel, span){
  $(span).css("display", "block");
  $(deleteClass).css("display", "block");
  $(editClass).css("display", "block");
  $(input).css("display", "none");
  $(confirm).css("display", "none");
  $(cancel).css("display", "none");
}

/*deleteCategory funktio käynnistetään kun käyttäjä klikkaa categoryDeleteClass luokalla varustettua painiketta. Funktio vastaanottaa klikatun painikkeen ID:n
  (kategorian tietokantaID. Funktio käynnistää ajax kutsun deleteCategory.php:n ja lähettää sille poistettavan kategorian ID:n. deleteCategory.php
  suorittaa tietokantapoiston, ja onnistuneen tietokantapoiston seurauksena kategoria poistetaan*/
function deleteCategory(categoryID){
  var trCategory = "#trCategory_"+categoryID;
  var newProductCategory ="#newProductCategory_"+categoryID;
  var filterByCategory ="#filterByCategory_"+categoryID;
  var answer = confirm('Oletko varma että haluat poistaa tämän kategorian kokonaan?');
  if (answer) {
      $.ajax({
          type: "POST",
          url: "deletions/deleteCategory.php",
          dataType: "json",
          data: {categoryID:categoryID},
          success:function(data){
            $(trCategory).remove();
            $(newProductCategory).remove();
            $(filterByCategory).remove();
            showSnackbar(data);
          },
          error:function(){
            showSnackbar(data);
          }
        });
  }
  else{
  }
}

/*deleteStatus funktio käynnistetään kun käyttäjä klikkaa statusDeleteClass luokalla varustettua painiketta. Funktio vastaanottaa klikatun painikkeen ID:n
  (statuksen tietokantaID. Funktio käynnistää ajax kutsun deleteStatus.php:n ja lähettää sille poistettavan kategorian ID:n. deleteStatus.php
  suorittaa tietokantapoiston, ja onnistuneen tietokantapoiston seurauksena status poistetaan*/
function deleteStatus(statusID){
  var trCategory = "#trStatus_"+statusID;
  var newProductStatus ="#newProductStatus_"+statusID;
  var filterByStatus ="#filterByStatus_"+statusID;
  var answer = confirm('Oletko varma että haluat poistaa tämän statuksen kokonaan?');
  if (answer) {
      $.ajax({
          type: "POST",
          url: "deletions/deleteStatus.php",
          dataType: "json",
          data: {statusID:statusID},
          success:function(data){
            $(trCategory).remove();
            $(newProductStatus).remove();
            $(filterByStatus).remove();
            showSnackbar(data);
          },
          error:function(){
            showSnackbar(data);
          }
        });
  }
  else{
  }
}

/*showSnackbar funktio käynnistetään pääasiassa jokaisen käyttäjän tekemän lisäyksen, muokkauksen tai poiston yhteydessä ilmoittamaan käyttäjälle onnistuiko tehty muutos
  muutosteksti noudetaan globaaleista muuttujista.*/
function showSnackbar(ilmoitus){
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  $("#snackbar").text(ilmoitus);

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}



// Tuote siirtyy pääsivun taulusta lainauskori modaliin. Modaalissa "poista" nappi tulee näkyviin ja "koriin" nappi piilotetaan. //
$("#deviceTable").on("click", ".addRentBasket", function(){
var productID = $(this).attr("value");
var addRentBasket = "#addRentBasket_"+productID;
var deleteRentBasket = "#deleteRentBasket_"+productID;
var trPolku = "#productTR_"+productID;
var trElement = $(trPolku);
$("#rentBasketTable").append(trElement);
$(addRentBasket).css("display","none");
$(deleteRentBasket).css("display","block");
showSnackbar("Tuote lisätty lainauskoriin");

$('#rentBasketLabel').html(parseInt($('#rentBasketLabel').html())+1);
});

$("#productModal").on("click", ".addRentBasket", function(){
var productID = $(this).attr("value");
var addRentBasket = "#addRentBasket_"+productID;
var deleteRentBasket = "#deleteRentBasket_"+productID;
var trPolku = "#productTR_"+productID;
var trElement = $(trPolku);
$("#rentBasketTable").append(trElement);
$('#productModal').modal('toggle');
$(addRentBasket).css("display","none");
$(deleteRentBasket).css("display","block");
showSnackbar("Tuote lisätty lainauskoriin");

$('#rentBasketLabel').html(parseInt($('#rentBasketLabel').html())+1);
});

// Lainauskorista tuotteen poistaminen. Poiston jälkeen tuote ilmestyy takaisin pääsivun tauluun. //
$("#rentModal").on("click", ".deleteRentBasket", function(){
var productID = $(this).attr("value");
var addRentBasket = "#addRentBasket_"+productID;
var deleteRentBasket = "#deleteRentBasket_"+productID;
var trPolku = "#productTR_"+productID;
var trElement = $(trPolku);
$("#deviceTable tr:first").after(trElement);
$(addRentBasket).css("display","block");
$(deleteRentBasket).css("display","none");

$('#rentBasketLabel').html(parseInt($('#rentBasketLabel').html())-1);
 devices = [];
$('#rentModal').find('.deleteRentBasket').each(function () {
     devices.push($(this).val());
 });
rentCalendarDays(devices);
});


var dateFormat = "dd-mm-yy";
from = $( "#from" ).datepicker({
                      beforeShowDay: function(date){
                      var paiva = date.getDate() + "";
                      var month = date.getMonth() + 1 + "";
                      var year = date.getFullYear();
                      if(paiva.length == 1){
                        paiva = "0" + paiva;
                      };
                      if(month.length == 1){
                        month = "0" + month;
                      };
                      var kaikki = paiva+ "-" + month + "-" + year;
                      var fullDate = year + "-" + month + "-" + paiva;
                      if (days.indexOf(fullDate)== -1){
                        return[true, "", ""];
                      }
                      else{
                        return[false, "event", "Tooltip text"];}
                      },
                      dayNamesShort: ['Su','Ma','Ti','Ke','To','Pe','La'],
                      dayNamesMin: ['Su','Ma','Ti','Ke','To','Pe','La'],
                      monthNames: ['Tammikuu','Helmikuu','Maaliskuu','Huhtikuu','Toukokuu','Kesäkuu','Heinäkuu','Elokuu','Syyskuu','Lokakuu','Marraskuu','Joulukuu'],
                      monthNamesShort: ['Tammi','Helmi','Maalis','Huhti','Touko','Kesä','Heinä','Elo','Syys','Loka','Marras','Joulu'],
                      firstDay: 1,
                      minDate: 0,
                      dateFormat: 'dd-mm-yy',
                      defaultDate: 0,
                      changeMonth: true,
                      numberOfMonths: 1
                    }).on( "change", function() {
                      to.datepicker( "option", "minDate", getDate( this ) );
                    }),
to = $( "#to" ).datepicker({
                  beforeShowDay: function(date){
                  var paiva = date.getDate() + "";
                  var month = date.getMonth() + 1 + "";
                  var year = date.getFullYear();
                  if(paiva.length == 1){
                    paiva = "0" + paiva;
                  };
                  if(month.length == 1){
                    month = "0" + month;
                  };
                  var kaikki = paiva+ "-" + month + "-" + year;
                  var fullDate = year + "-" + month + "-" + paiva;
                  if (days.indexOf(fullDate)== -1){
                    return[true, "", ""];
                  }
                  else{
                    return[false, "event", "Tooltip text"];}
                  },
                  dayNamesShort: ['Su','Ma','Ti','Ke','To','Pe','La'],
                  dayNamesMin: ['Su','Ma','Ti','Ke','To','Pe','La'],
                  monthNames: ['Tammikuu','Helmikuu','Maaliskuu','Huhtikuu','Toukokuu','Kesäkuu','Heinäkuu','Elokuu','Syyskuu','Lokakuu','Marraskuu','Joulukuu'],
                  monthNamesShort: ['Tammi','Helmi','Maalis','Huhti','Touko','Kesä','Heinä','Elo','Syys','Loka','Marras','Joulu'],
                  firstDay: 1,
                  minDate: 0,
                  dateFormat: 'dd-mm-yy',
                  defaultDate: 0,
                  changeMonth: true,
                  numberOfMonths: 1
                });

function getDate( element ) {
var date;
try {
  date = $.datepicker.parseDate( dateFormat, element.value );
} catch( error ) {
  date = null;
}

return date;
}




$(document).on('click',"#editRentTime", function(){
  $( "#editRentTime" ).fadeOut( "slow", function() {
  // Animaatio
  });
  $('#editRentModalFrom').prop("disabled", false);
  $('#editRentModalTo').prop("disabled", false);
  from = $( "#editRentModalFrom" ).datepicker({
                        beforeShowDay: function(date){
                        var paiva = date.getDate() + "";
                        var month = date.getMonth() + 1 + "";
                        var year = date.getFullYear();
                        if(paiva.length == 1){
                          paiva = "0" + paiva;
                        };
                        if(month.length == 1){
                          month = "0" + month;
                        };
                        var kaikki = paiva+ "-" + month + "-" + year;
                        var fullDate = year + "-" + month + "-" + paiva;
                        if (days.indexOf(fullDate)== -1){
                          return[true, "", ""];
                        }
                        else{
                          return[false, "event", "Tooltip text"];}
                        },
                        dayNamesShort: ['Su','Ma','Ti','Ke','To','Pe','La'],
                        dayNamesMin: ['Su','Ma','Ti','Ke','To','Pe','La'],
                        monthNames: ['Tammikuu','Helmikuu','Maaliskuu','Huhtikuu','Toukokuu','Kesäkuu','Heinäkuu','Elokuu','Syyskuu','Lokakuu','Marraskuu','Joulukuu'],
                        monthNamesShort: ['Tammi','Helmi','Maalis','Huhti','Touko','Kesä','Heinä','Elo','Syys','Loka','Marras','Joulu'],
                        firstDay: 1,
                        minDate: 0,
                        dateFormat: 'dd-mm-yy',
                        defaultDate: 0,
                        changeMonth: true,
                        numberOfMonths: 1
                      }).on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                      }),
  to = $( "#editRentModalTo" ).datepicker({
                    beforeShowDay: function(date){
                    var paiva = date.getDate() + "";
                    var month = date.getMonth() + 1 + "";
                    var year = date.getFullYear();
                    if(paiva.length == 1){
                      paiva = "0" + paiva;
                    };
                    if(month.length == 1){
                      month = "0" + month;
                    };
                    var kaikki = paiva+ "-" + month + "-" + year;
                    var fullDate = year + "-" + month + "-" + paiva;
                    if (days.indexOf(fullDate)== -1){
                      return[true, "", ""];
                    }
                    else{
                      return[false, "event", "Tooltip text"];}
                    },
                    dayNamesShort: ['Su','Ma','Ti','Ke','To','Pe','La'],
                    dayNamesMin: ['Su','Ma','Ti','Ke','To','Pe','La'],
                    monthNames: ['Tammikuu','Helmikuu','Maaliskuu','Huhtikuu','Toukokuu','Kesäkuu','Heinäkuu','Elokuu','Syyskuu','Lokakuu','Marraskuu','Joulukuu'],
                    monthNamesShort: ['Tammi','Helmi','Maalis','Huhti','Touko','Kesä','Heinä','Elo','Syys','Loka','Marras','Joulu'],
                    firstDay: 1,
                    minDate: 0,
                    dateFormat: 'dd-mm-yy',
                    defaultDate: 0,
                    changeMonth: true,
                    numberOfMonths: 1
                  });

  function getDate( element ) {
  var date;
  try {
    date = $.datepicker.parseDate( dateFormat, element.value );
  } catch( error ) {
    date = null;
  }

  return date;
  }

});


</script>
