<?php
    /*  deleteProgram.php [KÄYNNISTETÄÄN] sivulta:
        /js/main.js
    */

    //Noudetaan server.php tiedosto
    include '../server.php';

    //Tallennetaan vastaanotettu ohjelmaID muuttujaan
    $programID = $_POST['programID'];

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM program
              WHERE programID = $programID;";

    //Suoritetaan SQL kysely, samalla tarkistaen sen onnistumisen
    if (mysqli_query($mysqli, $query)) {
        $return_data = "Ohjelma poistettu!";
    } else {
        $return_data = "Ohjelman poisto epäonnistui";
    }
    echo json_encode($return_data);
?>
