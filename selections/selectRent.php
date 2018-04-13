<?php
/*  selectRent.php [KÄYNNISTETÄÄN] sivulta:
    /js/main.js
*/

if(isset($_POST["rentID"])) {

  include '../server.php';
  $rentID = $_POST['rentID'];
  $query = "SELECT * FROM rent
            WHERE rentID = $rentID;";
  $currentDate = date("Y-m-d");
  $rentResult = mysqli_fetch_array(mysqli_query($mysqli, $query));
  $rentCustomer = $rentResult['customer'];
  $test = "";
}
?>

<!-- LAINATTAVIEN LAITTEIDEN LISTAUS ALKAA-->
    <div class="container" id="editRentID" value="<?php echo $rentID?>">
        <table id="modalRentBasket" class="searchTable" style="margin-bottom:20px;">
            <tr class="header">
              <?php if(($rentResult['returned']=="false") xor (($rentResult['stopTime'] < $currentDate) && ($rentResult['returned'] == "false"))){
                $test = "false"?>
                <th style="width:50%;">Tuote</th>
                <th style="width:20%;">Status</th>
                <th style="width:20%;">Kategoria</th>
                <th style="width:10%;">Poista</th>
              <?php  }
              else{
                $test = "true"?>
                <th style="width:50%;">Tuote</th>
                <th style="width:25%;">Status</th>
                <th style="width:25%;">Kategoria</th>
          <?php    }
            ?>
            </tr>
            <?php
                $query = "SELECT rentLine.product, rentLine.rent, product.productName, product.category, product.status, product.productID, category.name, status.status AS 'statusName'
                          FROM (((rentLine
                          INNER JOIN product ON rentLine.product = product.productID)
                          INNER JOIN category ON product.category = category.categoryID)
                          INNER JOIN status ON product.status = status.statusID)
                          WHERE rent = $rentID;";
                $result = mysqli_query($mysqli, $query);

                if (mysqli_num_rows($result) > 0) {
                    //Tulostetaan jokainen rentLine taulusta valitulla lainaID:llä löytynyt tuote omaksi rivikseen.
                    while($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr id="modalRentTR_<?php echo $row["productID"]?>" class="modalRentLine">
                        <td><span id="modalProductID_<?php echo $row["productID"]?>" value="<?php echo $row["productID"]?>"><?php echo $row['productName'] ?></span></td>
                        <td><span id="modalProduct_<?php echo $row["productID"]?>_status_<?php echo $row["status"]?>"><?php echo $row['statusName'] ?></span></td>
                        <td><span id="modalProduct_<?php echo $row["productID"]?>_category_<?php echo $row["category"]?>"><?php echo $row["name"]?></span> </td>
                        <?php if($test == "false"){ ?>
                        <td><button id="deleteFromRent_<?php echo $row["productID"]?>" type="button" class="btn btn-danger deleteFromRent" value="<?php echo $row["productID"]?>">Poista</button></td>
                      <?php } ?>
                      </tr>
                      <?php
                    }
                  }
            ?>
        </table>
    </div>
<!-- LAINATTAVIEN LAITTEIDEN LISTAUS  LOPPUU-->

<!-- LAINAAJAN VALINTA ALKAA -->
<?php
$query = "SELECT * FROM customer
          WHERE customerID = $rentCustomer;";
$customerResult = mysqli_fetch_array(mysqli_query($mysqli, $query));
?>

    <div class="container" style=" margin-bottom:20px;">
        <div class="card">
          <h5 class="card-header">Lainaaja</h5>
            <div class="card-block" style="padding:20px;">
              <div class="row bottom-buffer">
                  <div class="col-md-6">
                      <label id="editRentCustomerID" value="<?php echo $customerResult['customerID'] ?>">Etunimi:</label>
                      <input type="text disabled" class="form-control" id="editRentModalFirstName" value="<?php echo $customerResult['firstName'] ?>" disabled>
                  </div>
                  <div class="col-md-6">
                      <label>Sukunimi:</label>
                      <input type="text" class="form-control" id="editRentModalLastName" value="<?php echo $customerResult['lastName'] ?>" disabled>
                  </div>
              </div>
              <div class="row bottom-buffer">
                  <div class="col-md-6">
                      <label>Luokkatunnus:</label>
                      <input type="text" class="form-control" id="editRentModalPhonenumber" value="<?php echo $customerResult['classID'] ?>" disabled>
                  </div>
                  <div class="col-md-6">
                      <label>Puhelinnumero:</label>
                      <input type="text" class="form-control" id="editRentModalEmail" value="<?php echo $customerResult['phoneNumber'] ?>" disabled>
                  </div>
              </div>
            </div>
        </div>
    </div>
<!-- LAINAAJAN VALINTA LOPPUU-->

<!-- LAINA-AJAN VALINTA ALKAA -->
    <div class="container" style=" margin-bottom:20px;">
        <div class="card">
          <h5 class="card-header" >Laina-aika</h5>
              <div class="card-block" style="padding:20px;">
                  <div class="row text-center" style="justify-content: center;">
                        <div class="col-md-6 text-center">
                            <label for="from">Alkaa</label>
                            <input type="text" id="editRentModalFrom" class="form-control text-center" name="editRentFrom" value="<?php echo date('d-m-Y', strtotime($rentResult['startTime']))?>" disabled>
                        </div>
                        <div class="col-md-6 text-center">
                            <label for="to">Päättyy</label>
                            <input type="text" id="editRentModalTo" class="form-control text-center" name="editRentTo" value="<?php echo date('d-m-Y', strtotime($rentResult['stopTime']))?>" disabled>
                        </div>
                  </div>
                  <?php if($test == "false"){ ?>
                <center><button class="btn btn-primary button" id="editRentTime" style="margin-top:10px;">Muuta</button></center>
            <?php  }?>
              </div>
        </div>
    </div>
<!-- LAINA-AJAN VALINTA LOPPUU -->

<!-- KUVAUS ALKAA -->
    <div class="container">
        <div class="card">
          <h5 class="card-header">Lainan kuvaus</h5>
              <div class="card-block" style="padding:20px;">
                <div class="form-group">
                   <textarea class="form-control" rows="2" id="editRentModalComment" <?php if($test == "true") {echo " disabled ";}?> ><?php echo $rentResult['description']?></textarea>
                </div>
            </div>
        </div>
    </div>

<!-- KUVAUS LOPPUU -->
<hr  style="margin-top:5%;" />
<div class="container">
    <div class="row justify-content-center">
      <?php if(($rentResult['returned']=='false') && ($rentResult['startTime'] <= $currentDate)){  ?>
        <button class="btn btn-success button returnRent" value="<?php echo $rentID?>" style="margin:15px;">Merkitse palautetuksi</button>
      <?php
      }?>
      <?php if(($rentResult['returned']=='false') && ($rentResult['stopTime'] >= $currentDate)){  ?>
      <button class="btn btn-primary button modifyRent" value="<?php echo $rentID?>" style="margin:15px;">Muuta lainausta</button>
    <?php
      }?>
        <?php if($rentResult['startTime']>$currentDate){?>
        <button class="btn btn-warning button cancelRent" value="<?php echo $rentID?>" style="margin:15px;">Peruuta lainaus</button>
        <?php
      }?>
      <?php if($rentResult['returned']=='true'){  ?>
        <button class="btn btn-danger button deleteRent" value="<?php echo $rentID?>" style="margin:15px;">Poista lainaus</button>
      <?php
    } ?>
    </div>
</div>
