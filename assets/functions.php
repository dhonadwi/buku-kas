<?php
$periode = date('Ym');

function koneksi()
{
  date_default_timezone_set("Asia/Bangkok");
  return mysqli_connect('localhost', 'root', '', 'kas_rw');
}

function query($query)
{
  $con = koneksi();
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) == 1) {
    return [
      'data' => mysqli_fetch_array($result)
    ];
    exit;
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function compressImage($source, $destination, $quality)
{

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg')
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif')
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png')
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);
}

include("assets/func_rupiah.php");

function nyekrip($datanya)
{
  $simple_string = "$datanya";

  // Display the original string 
  //  echo "Original String: " . $simple_string;

  // Store the cipher method 
  $ciphering = "AES-128-CTR";

  // Use OpenSSl Encryption method 
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;

  // Non-NULL Initialization Vector for encryption 
  $encryption_iv = '1234567891011121';

  // Store the encryption key 
  $encryption_key = "odonslank";

  // Use openssl_encrypt() function to encrypt the data 
  $encryption = openssl_encrypt(
    $simple_string,
    $ciphering,
    $encryption_key,
    $options,
    $encryption_iv
  );
  return $encryption;
}

function ndecript($dekripnya)
{
  $ciphering = "AES-128-CTR";
  $decryption_iv = '1234567891011121';
  $options = 0;

  // Store the decryption key 
  $decryption_key = "odonslank";

  // Use openssl_decrypt() function to decrypt the data 
  $decryption = openssl_decrypt(
    $dekripnya,
    $ciphering,
    $decryption_key,
    $options,
    $decryption_iv
  );
  return $decryption;
};

function login($data)
{
  $username = htmlspecialchars($data['username']);
  $password = md5($data['password']);

  $user = query("SELECT * FROM dta_users where user_name='$username' AND password='$password'"); //AND password='$password'

  if ($user) {
    setcookie('user_id', nyekrip($user['data']['user_id']), time() + 3600, "/kas", "localhost", false, true);
    setcookie('rw', nyekrip($user['data']['rw']), time() + 3600, "/kas", "localhost", false, true);
    setcookie('hak_akses', nyekrip($user['data']['hak_akses']), time() + 3600, "/kas", "localhost", false, true);
    header("Location: index.php?p=home");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'User / Password yang Anda masukan salah'
    ];
  }
}

function input_transaksi($data)
{
  $con = koneksi();
  $transaksi = htmlspecialchars($data['transaksi']);
  $nominal = htmlspecialchars(str_replace(".", "", $data['nominal']));
  $keterangan = htmlspecialchars($data['keterangan']);
  $tanggal_input = date('Y-m-d H:i:s');
  $periode = date('Ym');
  $split = str_split($periode, 4);
  $tahun = $split[0];
  $bulan = $split[1];
  $rt = htmlspecialchars($data['rt']);
  $rw = htmlspecialchars($data['rw']);

  $cek = mysqli_query($con, "Select * from dta_saldo where periode_saldo ='$periode'");
  if (mysqli_num_rows($cek) >= 1) {
    $dta_saldo = true;
  } else {
    $dta_saldo = false;
  }
  if ($dta_saldo) {
    $saldo = query("Select * from dta_saldo where periode_saldo ='$periode'");
    $pemasukan = $saldo['data']['saldo_pemasukan'];
    $pengeluaran = $saldo['data']['saldo_pengeluaran'];
    $cek_pemasukan = $pemasukan + $nominal;
    $cek_pengeluaran = $pengeluaran + $nominal;


    if ($transaksi == 'pemasukan') {
      $keterangan = "Debet - $keterangan";
      $insert = mysqli_query($con, "INSERT INTO dta_trx VALUES('$periode', '$tanggal_input','$rt','$rw','$nominal','0','$keterangan')");
      $insert_saldo = mysqli_query($con, "UPDATE dta_saldo SET saldo_pemasukan='$cek_pemasukan' WHERE periode_saldo='$periode'");
    } else {
      $keterangan = "Kredit - $keterangan";
      $insert = mysqli_query($con, "INSERT INTO dta_trx VALUES('$periode', '$tanggal_input','$rt','$rw','0','$nominal','$keterangan')");
      $insert_saldo = mysqli_query($con, "UPDATE dta_saldo SET saldo_pengeluaran='$cek_pengeluaran' WHERE periode_saldo='$periode'");
    }
  } else {
    if ($transaksi == 'pemasukan') {
      $keterangan = "Debet - $keterangan";
      $insert = mysqli_query($con, "INSERT INTO dta_trx VALUES('$periode', '$tanggal_input','$rt','$rw','$nominal','0','$keterangan')");
      $insert_saldo = mysqli_query($con, "INSERT INTO dta_saldo VALUES('$periode','$nominal',0, '$bulan', '$tahun')");
    } else {
      $keterangan = "Kredit - $keterangan";
      $insert = mysqli_query($con, "INSERT INTO dta_trx VALUES('$periode', '$tanggal_input','$rt','$rw','0','$nominal','$keterangan')");
      $insert_saldo = mysqli_query($con, "INSERT INTO dta_saldo VALUES('$periode','0','$nominal','$bulan', '$tahun')");
    }
  }

  if ($insert && $insert_saldo) {
    $status = true;
  } else {
    $status = false;
  }
  return [
    "status" => $status,
  ];
}

function ganti_pass($data)
{
  $con = koneksi();
  $pass2 = htmlspecialchars($data['pass2']);
  $user_id = htmlspecialchars($data['user_id']);

  $update = mysqli_query($con, "UPDATE dta_users SET password = md5('$pass2') WHERE user_id = '$user_id' ");

  if ($update) {
    $status = true;
  } else {
    $status = false;
  }
  return [
    "status" => $status,
  ];
}
