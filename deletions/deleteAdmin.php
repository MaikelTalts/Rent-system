<?php
    /*  deleteAdmin.php [KÄYNNISTETÄÄN] sivulta:
        /js/main.js
    */

    //Noudetaan server.php tiedosto
    include '../server.php';

      //Tallennetaan vastaanotettu adminID muuttujaan
    $adminID = $_POST['adminID'];

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM admin
              WHERE adminID = $adminID;";

    //Poistetaan Admin tietokannasta samalla tarkistaen onnistuminen.
    if (mysqli_query($mysqli, $query)) {
        $return_data = "Admin poistettu!";
    } else {
        $return_data = "Adminin poisto epäonnistui!";
    }
    echo json_encode($return_data);
?>
