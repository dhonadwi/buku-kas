<?php
if (!isset($_COOKIE['user_id'])) {
  echo "<script>
  document.location = 'index.php?p=login'
  </script>";
  exit;
}
