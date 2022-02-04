<?php
include("assets/functions.php");

?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Buku Kas">
  <meta name="author" content="Dhona Dwi">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Buku Kas</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">
  <link rel="icon" href="assets/icon.png" type="image/png" sizes="16x16">
  <link rel="manifest" href="manifest.json">

  <!-- Sb Admin 2 -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- data table css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="assets/styles.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
</head>

<body class="d-flex flex-column h-100">
  <script src="assets/functions.js"></script>
  <header>
    <?php
    if (isset($_COOKIE['user_id'])) {
      include("assets/menu.php");
    }
    ?>
  </header>

  <main class="flex-shrink-0">
    <div class="container">
      <?php
      if (isset($_GET['p'])) {
        if (strlen($_GET['p']) == 0) {
          $p = "login";
        } else {
          $p = $_GET['p'];
        }
      } else {
        $p = "home";
      }

      if (file_exists($p . ".php")) {
        include($p . ".php");
      } else {
        echo "<h1>404.</h1><br><h3>Halaman Tidak Ditemukan!</h3>";
      }
      ?>
  </main>

  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">Dhona Dwi &copy; 2022</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>