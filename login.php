<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: futurepage.php');
}
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, email, password FROM registro WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location:  futurepage.php");
  } else {
    $message = 'lo siento la contraseña no coincide';
  }
}

?>



<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

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
  <header class="bgimg w3-display-container w3-grayscale-min" id="hola">
    <!-- place navbar here -->
  </header>
  <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <main>
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card text-black ls-tight" style="border-radius: 1rem;" >
              <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">
                <form action="login.php" method="POST">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-black-50 mb-5">Porfavor de ingresar correo y contraseña</p>
                  <div class="form-outline form-black mb-4">
                    <input name="email"  type="email" id="typeEmailX" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX">Correo</label>
                  </div>
                  <div class="form-outline form-black mb-4">
                    <input name="password"  type="password" id="typePasswordX" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX">Contraseña</label>
                  </div>
                  <button class="btn btn-outline btn-lg px-5 btn-primary"  href="signup.php" type="submit">Iniciar sesion </button>
                  <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-black"><i class="bi bi-facebook btn btn-link"></i></a>
                    <a href="#!" class="text-black"><i class="bi bi-twitter btn btn-link"></i></a>
                    <a href="#!" class="text-black"><i class="bi bi-google btn btn-link"></i></a>
                    <a href="#!" class="text-black"><i class="bi bi-instagram btn btn-link"></i></a>
                  </div>
                 </div>
                 <div>
                  <p class="mb-0">Don't have an account? <a href="signup.php" class=" fw-bold btn-primary">Sign Up</a>
                  </p>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>