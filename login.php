<?php
if (!isset($_GET['p'])) {
  echo "<script>
  document.location = 'index.php?p=login'
  </script>";
}
if (isset($_COOKIE['user_id'])) {
  echo "<script>
  document.location = 'index.php?p=home'
  </script>";
  exit;
}
if (isset($_POST['login'])) {
  $login = login($_POST);
}
?>

<?php
if (isset($login['error'])) : ?>
  <script>
    swal({
      title: "Gagal!",
      text: "User / Password Anda salah",
      icon: "error",
      button: "Ok!",
    });
  </script>
<?php endif; ?>
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="assets/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
              <center>
                <h4 class="mb-4">Buku KAS RW 007 BAROS</h4>
              </center>
            </div>
            <form method="POST">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" autofocus class="form-control form-control-lg" autocomplete="off" name="username">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input id="inputPassword" type="password" class="form-control form-control-lg" name="password" autocomplete="off">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="showPass">
                <label class="form-check-label" for="exampleCheck1">Show Password</label>
              </div>
              <div class="mb-6 col-lg-12">
                <button type="submit" class="btn btn-primary form-control form-control-lg" name="login">Submit</button>
              </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<script>
  const showPass = document.querySelector("#showPass");
  const inputPass = document.querySelector("#inputPassword");
  showPass.addEventListener("click", () => {
    if (showPass.checked) {
      inputPass.type = "text";
    } else {
      inputPass.type = "password";
    }
  });
</script>