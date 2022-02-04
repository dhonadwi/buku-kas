<?php
$user_id = ndecript($_COOKIE['user_id']);
$hak_akses = ndecript($_COOKIE['hak_akses']);
$rw = ndecript($_COOKIE['rw']);
$date = date('Y-m-d H:i:s');
$data_user = query("SELECT * FROM dta_users where user_id='$user_id'");
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/kas">
      <h4>Home</h4>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Master
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="index.php?p=inptrx">
                <h5>Input Transaksi
              </a></h5>
            </li>
            <li><a class="dropdown-item" href="index.php?p=dtrx">
                <h5>Data Transaksi
              </a></h5>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="index.php?p=ganti_pass">
                <h5>Ganti Password
              </a></h5>
            </li>
            <li><a class="dropdown-item" href="logout.php">
                <h5>Logout
              </a></h5>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>