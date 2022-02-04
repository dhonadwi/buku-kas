<?php
include('assets/functions.php');

setcookie('user_id', '', time() - 3600, "/kas", "$nama_domain", false, true);
setcookie('rw', '', time() - 3600, "/kas", "$nama_domain", false, true);
setcookie('hak_akses', '', time() - 3600, "/kas", "$nama_domain", false, true);
echo "<script>
  document.location = '/kas'
  </script>";
exit;
