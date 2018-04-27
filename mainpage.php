<?php
session_start();
// Tarkistetaan löytyykö aktiivinen sessio muuttuja
if(!isset($_SESSION['user_email'])){
    //Jos ei ohjataan kirjautumissivulle
    header('Location: index.php');
    exit;
}
// Lisätään sivuston rakenteeseen, tarvittaessa kutsuttavat modaalit
include 'header.php';
include 'modals/deviceModal.php';
include 'modals/customerModal.php';
include 'modals/rentModal.php';
include 'modals/adminModal.php';
include 'modals/viewRentModal.php';

//InfoModaalit

include 'info/productInfo.php';
include 'info/customerInfo.php';
include 'info/adminInfo.php';
include 'info/accessoriesAndProgramsInfo.php';
include 'info/categoryInfo.php';
include 'info/rentInfo.php';
?>

<!-- Info navigaatio -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <span class="pseudolink_2" data-toggle="modal" data-target="#productInfo">Laitehallinta</span>
  <span class="pseudolink_2" data-toggle="modal" data-target="#customerInfo">Lainajahallinta</span>
  <span class="pseudolink_2" data-toggle="modal" data-target="#adminInfo">Adminhallinta</span>
  <span class="pseudolink_2" data-toggle="modal" data-target="#accessoriesAndProgramsInfo">Lisävarusteet ja Ohjelmat</span>
  <span class="pseudolink_2" data-toggle="modal" data-target="#categoryInfo">Kategoriahallinta</span>
  <span class="pseudolink_2" data-toggle="modal" data-target="#rentInfo">Lainaushallinta</span>
</div>
<!-- Info navigaatio päättyy -->

<!-- The actual snackbar -->
<div id="snackbar"></div>


<nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-center fixed-top">
  <div class="container">
    <a href="#" class="navbar-brand d-flex w-50 mr-auto"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item">
                <button type="button" data-toggle="modal" data-target="#rentModal" class="btn btn-primary" id="rent">Lainauskori <span id="rentBasketLabel" class="badge badge-light">0</span></button>
                <button type="button" style="margin-left:10px;" class="btn btn-primary" onclick="openNav()">&#9776;</button>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a href="logout.php" class="btn btn-danger float-center" id="logout">Kirjaudu Ulos</a>
            </li>
        </ul>
    </div>
    <div>
</nav>

<!-- Maincontainer alku -->
<div class="container" id="background" style="padding-top:10px; margin-top:80px;">
    <!-- Header jumbotron -->

    <!-- Navigaatio tabien alku -->
    <div class="row align-items-start">
        <div class="col-lg-12">
            <ul class="nav nav-tabs nav-justified">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#product" role="tab">Laitteet</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#customers" role="tab">Lainaajat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#rents" role="tab">Lainaukset</a>
              </li>
              <?php if($_SESSION['user_email']=='testi@passu.com'){?>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#admin" role="tab">Admin</a>
              </li>
              <?php
            }?>
            </ul>
        </div>
      </div>

      <!-- tab cojtent ja lainauskori rivin alku -->
      <div class="row align-items-start">

              <!-- tab alku -->
              <div class="col-lg-12">
                  <!-- Tabien sisältö -->
                  <div class="tab-content">
                    <!-- Laitteet välilehden sisältö -->
                    <?php include 'tabs/productTab.php'?>
                    <!-- Admin välilehden sisältö -->
                    <?php include 'tabs/adminTab.php' ?>
                    <!-- Lainaajat välilehden sisältö -->
                    <?php include 'tabs/customerTab.php'?>
                    <!-- Lainat välilehden sisältö -->
                    <?php include 'tabs/rentsTab.php' ?>
                  </div>
              </div>
      </div>
      <!-- tab cojtent ja lainauskori rivin loppu -->
      </div>

<!-- Maincontainer loppu -->

<!-- Liitetään footer.php tiedosto pääsivulle-->
<?php include 'footer.php'; ?>
