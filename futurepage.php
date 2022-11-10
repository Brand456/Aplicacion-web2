<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, password FROM registro WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    

    $user = null;
     
  if (count($results) > 0) {
      $user = $results;
  }
    
    $_SESSION['name'] = $user['name'];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a la aplicacion web</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
   body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
  </style>
  </head>
  <body class="w3-light-grey w3-content" style="max-width:1600px">
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $_SESSION['name']; ?>
      <br>Haz iniciado sesion 
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Porfavor inicie sesion o registrese</h1>

      <a href="login.php">Iniciar sesion</a> or
      <a href="signup.php">Registrar</a>
    <?php endif; ?>

   <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="images/usuario.png" style="width:45%;" class="w3-round"><br><br>

  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Menu</a> 
  </div>
  </nav>

 <!-- Overlay effect when opening sidebar on small screens -->
 <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
   
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Mi Historial medico</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <button class="w3-button w3-white"><i class="w3-margin-right"></i>Presion</button>
      <button class="w3-button w3-white w3-hide-small"><i class="w3-margin-right"></i>Glucosa</button>
      <button class="w3-button w3-white w3-hide-small"><i class="w3-margin-right"></i>Peso</button>
    </div>
    </div>
  </header>
  
  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
    <a href="peso.php"><img src="images/peso.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Peso</b></p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
    <a href="glucosa.php"><img src="images/glucosa.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Glucosa</b></p>
      </div>
    </div>
    <div class="w3-third w3-container">
    <a href="presion.php"><img src="images/presion.jpg" alt="Norway" style="width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Presion</b></p>

      </div>
    </div>
  </div>



<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>

</body>
</html>