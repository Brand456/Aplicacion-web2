<?php


require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['fecha'])) {
  $sql = "INSERT INTO registro (email, password, name,  fecha) VALUES (:email, :password, :name,  :fecha)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':name', $_POST['name']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':fecha', $_POST['fecha']);

  if ($stmt->execute()) {
    $message = 'Se creo un nuevo usuario';
  } else {
    $message = 'Lo siento hubo un problema';
  }
}
?>



<!doctype html>
<html lang="en">

<head>
  <title>Registrarse</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>

  <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

  <main>
    <!-- Section: Design Block -->
  <section class="">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">
        <div class="row gx-lg-5 align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              Los lobbos <br />
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
              Restaurante sin fines de lucro lo unico lucro es lo que comes en nuestro establecimiento. 
            </p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form action="signup.php" method="POST">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="name" type="text" id="form3Example1" class="form-control" />
                        <label class="form-label" for="form3Example1">Ingresa tu nombre</label>
                      </div>
                    </div>
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input name="email" type="text" id="form3Example3" class="form-control" />
                    <label class="form-label" for="form3Example3">Correo</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input  name="password" type="password" id="form3Example4" class="form-control" />
                    <label class="form-label" for="form3Example4">contraseña</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input  name="confirm_password"   type="password" id="form3Example4" class="form-control" />
                    <label class="form-label" for="form3Example4">confirma contraseña</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input  name="fecha"   type="text" id="form3Example4" class="form-control" />
                    <label class="form-label" for="form3Example4">Fecha del registro</label>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Registrarse 
                  </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->

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