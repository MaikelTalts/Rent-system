<?php session_start();

include 'server.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = $mysqli->query($query);
$user = mysqli_fetch_array(mysqli_query($mysqli, $query));
$_SESSION['userID'] = $user['adminID'];
$_SESSION['firstName'] = $user['firstName'];
$_SESSION['lastName'] = $user['lastName'];

if(!$row = $result->fetch_assoc()){ ?>
  <div class="alert alert-danger alert-dismissible fade show" style="margin:0px;">
   <button type="button" class="close" data-dismiss="alert">&times;</button>
   <center>Virheellinen käyttäjätunnus ja salasana</center>
 </div>
  <?php
}
else{
  $_SESSION['user_email'] = $row['email'];
  echo $_SESSION['user_email'];

  header("Location: mainpage.php");
}
