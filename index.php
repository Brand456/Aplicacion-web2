<!DOCTYPE html>
<html>
<head>
<title>Hotlobos's</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("https://merenderolasbrisas.co/wp-content/uploads/2017/10/Hamburguesa-Brisas-Hawaiana-2-9.jpg");
  min-height: 100%;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">NOSOTROS</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px">Hotlobo's<br>¡BIENVENIDO!</span>
    <p><a href="login.php" class="w3-button w3-xxlarge w3-black">Iniciar sesion</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px"> MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizza</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pasta');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Hamburguesa</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Starter');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Hotdog</div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Pizza con pepperoni</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$50</span></h1>
      <p class="w3-text-grey">Pizza clasica de pepperoni con orilla de queso</p>
      <hr>
   
      <h1><b>Pizza 4 carnes</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$60</span></h1>
      <p class="w3-text-grey">Pizza de 4 carnes, (pepperoni, jamon, salami, salchicha) </p>
      <hr>
      
      <h1><b>Pizza Suprema</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$110</span></h1>
      <p class="w3-text-grey">Pizza con 4 tipos de carne acompañado con 4 tipos de queso</p>
      <hr>
    </div>

    <div id="Pasta" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Hamburguesa clasica</b> <span class="w3-tag w3-grey w3-round">Popular</span> <span class="w3-right w3-tag w3-dark-grey w3-round">$40</span></h1>
      <p class="w3-text-grey">Hamburguesa acompañada con lechuga, jitomate, queso y cebolla</p>
      <hr>
   
      <h1><b>Hamburguesa doble</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$80</span></h1>
      <p class="w3-text-grey">Hamburguesa de doble carne</p>
      <hr>
      
      <h1><b>Hamburguesa Suprema<</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$90.</span></h1>
      <p class="w3-text-grey">Hamburguesa con triple carne y doble queso</p>
      <hr>

    </div>


    <div id="Starter" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Hotdog simple</b> <span class="w3-tag w3-grey w3-round">Seasonal</span><span class="w3-right w3-tag w3-dark-grey w3-round">$20</span></h1>
      <p class="w3-text-grey">Hotdog de tamaño normal</p>
      <hr>
   
      <h1><b>Hotdog jumbo</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$30</span></h1>
      <p class="w3-text-grey">Hotdog acompañado con papas</p>
      <hr>
      
      <h1><b>Hotdog supremo</b> <span class="w3-right w3-tag w3-dark-grey w3-round">$50</span></h1>
      <p class="w3-text-grey">Hotdog acompañado con papas y refresco</p>
      <hr>
    
    </div><br>

  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Nosotros</h1>
    <p>Somos un pequeño negocio de comida rapida que busca crecer y ayudar a la comunidad universitaria en alimentos, ofrecemos un sistema de apartado parecido a plataformas como Uber o Rappi.</p>
    <p>Nuestro establecimiento.</p>
    <img src="https://media-cdn.tripadvisor.com/media/photo-s/0f/64/62/df/pequeno-pero-sabroso.jpg" style="width:100%" class="w3-margin-top w3-margin-bottom" alt="Restaurant">
    <h1><b>Horarios</b></h1>
    
    <div class="w3-row">
      <div class="w3-col s6">
        <p>Lunes & Martes CERRADO</p>
        <p>Miercoles 8:00 am - 6:00 pm</p>
        <p>Jueves  8:00 am - 6:00 pm</p>
        <p>Viernes  8:00 am - 6:00 pm</p>
      </div>
      <div class="w3-col s6">
        <p>Sabado 8:00 am - 4:00 pm</p>
        <p>Domingo CERRADO</p>
      </div>
    </div>
    
  </div>
</div>


<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
