<?php
include("status.php");
if (!isset($_GET['p'])) {
  echo "<script>
  document.location = 'index.php?p=home'
  </script>";
}
?>
<h1>Input Transaksi</h1>
<form class="container mb-5 form-group form-group-lg" method="POST">
  <div class="row">
    <div class="mb-3 col-lg-6">
      <label for="exampleInputPassword1" class="form-label">Transaksi</label>
      <select name="transaksi" id="transaksi" class="form-select form-control input-lg py-2" aria-label="Default select example" autofocus>
        <option value="pemasukan" selected>Pemasukan</option>
        <option value="pengeluaran">Pengeluaran</option>
      </select>
    </div>
    <div class="mb-3 col-lg-6">
      <label for="exampleInputPassword1" class="form-label">RT</label>
      <select name="rt" id="rt" class="form-select form-control input-lg py-2" aria-label="Default select example">
        <option value="001" selected>RT 001</option>
        <option value="002">RT 002</option>
        <option value="003">RT 003</option>
      </select>
    </div>
    <div class="mb-6 col-lg-6">
      <label for="exampleInputEmail1" class="form-label">Nominal</label>
      <input type="text" class="form-control form-control-lg" name="nominal" required id="nominal" autocomplete="off">
    </div>
    <div class="mb-3 col-lg-6">
      <label for="exampleInputPassword1" class="form-label">Keterangan</label>
      <input type="text" class="form-control form-control-lg" name="keterangan" required id="keterangan" autocomplete="off">
      <input type="text" class="form-control" name="rw" required id="rw" value="<?= $rw ?>" hidden>
    </div>
    <button type="submit" class="btn btn-primary form-control-lg" name="submit">Submit</button>
  </div>
</form>

<script>
  var tanpa_rupiah = document.getElementById('nominal');
  tanpa_rupiah.addEventListener('keyup', function(e) {
    tanpa_rupiah.value = formatRupiah(this.value);
  });
</script>
<?php
if (isset($_POST['submit'])) {
  $status = input_transaksi($_POST);

  if ($status) { ?>
    <script>
      swal({
        title: "Berhasil!",
        text: "Berhasil menyimpan Data!",
        icon: "success",
        button: "Ok!",
      });
    </script>
  <?php  } else { ?>
    <script>
      swal({
        title: "Gagal!",
        text: "Gagal Menyimpan Data",
        icon: "error",
        button: "Ok!",
      });
    </script>
<?php  }
}
?>