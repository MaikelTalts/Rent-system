<?php
/*  selectAdmin.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

if(isset($_POST["adminID"])) {

  include '../server.php';
  $query = "SELECT * FROM admin
            WHERE adminID = '".$_POST["adminID"]."'";
  $result = mysqli_fetch_array(mysqli_query($mysqli, $query));
}
?>

<!-- [Lisää uusi laite] lomake alkaa -->
<div class="row bottom-buffer">
    <div class="col-md-6">
        <label>Etunimi:</label>
        <input type="text" class="form-control" id="modalAdminFirstName" value="<?php echo $result['firstName'] ?>">
    </div>
    <div class="col-md-6">
        <label>Sukunimi:</label>
        <input type="text" class="form-control" id="modalAdminLastName" value="<?php echo $result['lastName'] ?>">
    </div>
</div>
<div class="row bottom-buffer">
    <div class="col-md-6">
        <label>Puhelinnumero</label>
        <input type="text" class="form-control" id="modalAdminPhoneNumber" value="<?php echo $result['phoneNumber'] ?>">
    </div>
    <div class="col-md-6">
        <label>Sähköposti:</label>
        <input type="text" class="form-control" id="modalAdminEmail" value="<?php echo $result['email'] ?>">
    </div>
</div>
<div class="row bottom-buffer">
    <div class="col-md-6">
        <label>Salasana:</label>
        <input type="password" class="form-control" id="modalAdminPassword">
    </div>
    <div class="col-md-6">

    </div>
</div>

<hr />
<button class="btn btn-danger button float-left deleteAdmin" value="<?php echo $result['adminID'] ?>">Poista Admin</button>
<button class="btn btn-primary button float-right editAdmin" value="<?php echo $result['adminID'] ?>">Tallenna</button>
