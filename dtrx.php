<?php
include("status.php");
if (!isset($_GET['p'])) {
  echo "<script>
  document.location = 'index.php?p=home'
  </script>";
}
?>
<h1>Data Transaksi</h1>
<form class="container mb-5" method="POST">
  <div class="row">
    <div class="mb-6 col-lg-6">
      <label for="exampleInputEmail1" class="form-label">Tanggal Awal</label>
      <input type="date" class="form-control form-control-lg" name="tanggal_awal" required id="tanggal_awal">
    </div>
    <div class="mb-3 col-lg-6">
      <label for="exampleInputPassword1" class="form-label">Tanggal Akhir</label>
      <input type="date" class="form-control form-control-lg" name="tanggal_akhir" required id="tanggal_akhir">
    </div>
    <div class="mb-3 col-lg-6">
      <label for="exampleInputPassword1" class="form-label">RT</label>
      <select name="rt" id="rt" class="form-select form-control-lg" aria-label="Default select example">
        <option value="" selected></option>
        <option value="001">001</option>
        <option value="002">002</option>
        <option value="003">003</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary form-control-lg" name="cek">Submit</button>
  </div>
</form>

<table id="example" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>RT</th>
      <th>Keterangan</th>
      <th>Saldo</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($_POST['cek'])) {
      $tgl_awal = $_POST['tanggal_awal'];
      $tgl_akhir = $_POST['tanggal_akhir'];
      $rt = $_POST['rt'];
      if ($rt == "") {
        $rtmana = "Semua";
        $data_survey = query("SELECT 
*,
 sum(pemasukan) as kredit,
 sum(pengeluaran) as debet,
sum(pemasukan) - sum(pengeluaran) as saldo
FROM
dta_trx
WHERE tanggal >'$tgl_awal 00:00:00' AND tanggal < '$tgl_akhir 23:59:00'
GROUP BY periode, tanggal, rt
ORDER BY tanggal,rt asc");
      } else {
        $rtmana = $rt;
        $data_survey = query("SELECT 
  *,
  sum(pemasukan) as kredit,
  sum(pengeluaran) as debet,
  sum(pemasukan) - sum(pengeluaran) as saldo
  FROM
  dta_trx
  WHERE tanggal >'$tgl_awal 00:00:00' AND tanggal < '$tgl_akhir 23:59:00' AND rt='$rt'
  GROUP BY periode, tanggal
  ORDER BY tanggal,rt asc");
      }
      $sisa = 0;
      foreach ($data_survey as $w) {
        $periode = $w['periode'];
        $tanggal = date("d-m", strtotime($w['tanggal']));
        $rt = $w['rt'];
        $rw = $w['rw'];
        $pemasukan = $w['pemasukan'];
        $pengeluaran = $w['pengeluaran'];
        $saldo = $w['saldo'];
        $keterangan = $w['keterangan'];
        if ($saldo < 0) {
          $warna_text = 'text-danger';
        } else {
          $warna_text = 'text-success';
        }
        $sisa += $saldo;
    ?>
        <tr>
          <td><?= $tanggal ?></td>
          <td><?= $rt ?></td>
          <td><?= $keterangan ?></td>
          <td class="<?= $warna_text ?>"><?= rupiah($saldo) ?></td>
        </tr>
      <?php }; ?>
  </tbody>

  <h4>Saldo : <?php
              $awal = date("d-m-Y", strtotime($tgl_awal));
              $akhir = date("d-m-Y", strtotime($tgl_akhir));
              echo rupiah($sisa);
              echo "  RT $rtmana";
              ?></h4>
  <h5>per <?= $awal ?> s/d <?php echo "$akhir";
                          } ?></h5>


</table>

<script>
  $(document).ready(function() {
    $('#example').DataTable({
      ordering: false,
      responsive: true
    });
  });
  document.getElementById('tanggal_awal').valueAsDate = new Date();
  document.getElementById('tanggal_akhir').valueAsDate = new Date();
</script>