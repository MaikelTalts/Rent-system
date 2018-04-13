<?php
/* Main page with two forms: sign up and log in */
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
    }
    else { // do nothing
        // do nothing
    }
}
?>
<div class="bg">

<!-- Kirjautumissivun main container, jonka sisällä login form. tyylitelty harmaalla taustalla -->
<div class="container login col-md-3 bg-dark text-white">

  <!-- Kirjautumissivun otsikko teksti -->
  <div class="login-header">
      <h5>Lainausjärjestelmä</h5>
      <hr style="border-color:white;"/>
  </div>
    <!-- Lomakkeen aloitus -->
    <div class="form">
        <div class="form-content">

            <div id="login">
                <form action="index.php" method="post" autocomplete="off">

                    <!-- Tekstikenttä, johon käyttäjä syöttää oman sähköpostiosoitteensa -->
                    <div class="field-wrap">
                        <label>Sähköposti</label>
                        <input type="email" class="form-control" required autocomplete="off" name="email" data-toggle="popover" data-trigger="hover" data-content="Kirjoita käyttäjätunnus"/>
                    </div>

                    <!-- Tekstikenttä, johon käyttäjä syöttää omaa sähköpostiosoitetta vastaavan salasanan -->
                    <div class="field-wrap">
                        <label>Salasana</label>
                        <input type="password" class="form-control" required autocomplete="off" name="password" data-toggle="popover" data-trigger="hover" data-content="Kirjoita salasana"/>
                    </div>
                    <br />

                    <!-- Painike, joka käynnistää käyttäjän syättämien tietojen vertailun tietokannasta löytyviin -->
                    <button type="submit" class="btn btn-primary button float-right" name="login" style="width:100%; margin-bottom:10px;"/>Kirjaudu</button>

                <!-- Päätetään lomake -->
                </form>

                          <!-- testi sessiolle -->
                    <?php
                      if(isset($_SESSION['id'])){
                        echo $_SESSION;
                      }
                      else{
                      //
                      }
                    ?>

            </div>
        </div>
   </div>

<!-- Suljetaan kirjautumissivun main container -->
</div>

</div>
<!-- Liitetään footer.php tiedosto kirjautumissivulle -->
<?php include 'footer.php'; ?>
