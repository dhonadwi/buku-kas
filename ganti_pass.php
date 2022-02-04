<?php
include("status.php");
if (!isset($_GET['p'])) {
  echo "<script>
  document.location = 'index.php?p=home'
  </script>";
}
?>
<div class="mt-5"></div>
<form class="container mb-5" method="POST">
  <div class="row">
    <div class="mb-6 col-lg-6">
      <label for="exampleInputEmail1" class="form-label">Silahkan input Password Baru</label>
      <input type="password" class="form-control form-control-lg" name="pass1" required id="pass1" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autofocus>
      <div id="emailHelp" class="form-text">Minimal 8 character, terdiri dari huruf dan angka</div>
    </div>
    <div class="mb-3 col-lg-6">
      <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
      <input type="password" class="form-control form-control-lg" name="pass2" required id="pass2" autocomplete="off">
      <input type="text" class="form-control form-control-lg" name="user_id" required id="user_id" autocomplete="off" value="<?= $user_id ?>" hidden>
    </div>
    <button id="btnSubmit" type="submit" class="btn btn-primary form-control form-control-lg" name="submit">Submit</button>
  </div>
</form>

<script>
  const pass1 = document.querySelector('#pass1');
  const pass2 = document.querySelector('#pass2');
  const btnSubmit = document.querySelector('#btnSubmit');
  btnSubmit.disabled = true;
  pass2.addEventListener('keyup', () => {
    if (pass1.value === pass2.value) {
      btnSubmit.disabled = false;
    } else {
      btnSubmit.disabled = true;
    }

  })
  pass1.addEventListener('keyup', () => {
    if (pass1.value === pass2.value) {
      btnSubmit.disabled = false;
    } else {
      btnSubmit.disabled = true;
    }

  })
</script>
<?php
if (isset($_POST['submit'])) {
  $status = ganti_pass($_POST);
  if ($status) { ?>
    <script>
      swal({
        title: "Berhasil!",
        text: "Silahkan gunakan password baru untuk Log In!",
        icon: "success",
        button: "Ok!",
        closeOnClickOutside: false,
      }).then(() => {
        document.location = 'logout.php';
      });
    </script>
  <?php } else { ?>
    <script>
      swal({
        title: "Gagal!",
        text: "Gagal merubah password baru",
        icon: "error",
        button: "Ok!",
        closeOnClickOutside: false,
      });
    </script>
<?php  }
}
?>