<!DOCTYPE html>
<html lang="en">
  <?php session_start();?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <title>Modulverwaltung | FST</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">ModVe</a>
      <div class="collapse navbar-collapse" id="navBarSupportedContetn">
        <ul class="navbar-nav me-auto mb-2 mb-lg 0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Schüler
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./schulAnz.php">Anzeigen</a></li>
              <li><a class="dropdown-item" href="./schulBea.php">Bearbeiten</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Lehrer
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./lehAnz.php">Anzeigen</a></li>
              <li><a class="dropdown-item" href="./lehBea.php">Bearbeiten</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Module
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./modAnz.php">Anzeigen</a></li>
              <li><a class="dropdown-item" href="./modBea.php">Bearbeiten</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Modulzuordnung
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="./modZuAnz.php">Anzeigen</a></li>
              <li><a class="dropdown-item" href="./modZuBea.php">Bearbeiten</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" action="login.php" method="post">
          <?php
          if(isset($_SESSION['data'])){
            echo '<button class="btn btn-dark" type="submit">Logout</button>';
          }
          else{
            echo '<button class="btn btn-dark" type="submit">Login</button>';
          }
          ?>
        </form>
      </div>
    </div>

  </nav>
</body>

</html>