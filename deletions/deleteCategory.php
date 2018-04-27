<?php
    /*  deleteCategory.php [KÄYNNISTETÄÄN] sivulta:
        /js/main.js
    */

    //Noudetaan server.php tiedosto
    include '../server.php';

    //Tallennetaan vastaanotettu kategoriaID muuttujaan
    $categoryID = $_POST['categoryID'];

    //Valmistellaan SQL komento muuttujaan
    $query = "DELETE FROM category
              WHERE categoryID = $categoryID;";

    //Suoritetaan SQL kysely, samalla tarkistaen sen onnistumisen
    if (mysqli_query($mysqli, $query)) {
        $return_data= "Kategoria poistettu!";

    } else {
        $return_data = "Kategorian poisto epäonnistui!";
    }
    echo json_encode($return_data);
?>
