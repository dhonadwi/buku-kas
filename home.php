<?php
if (!isset($_GET['p'])) {
  echo "<script>
  document.location = 'index.php?p=home'
  </script>";
}
include('status.php');
$tahun = date('Y')
?>


<center>
  <h4 class="mt-3">Saldo Tahun <?= $tahun ?></h4>
</center>
<div class="row mt-5">
  <div class="col-xl-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-5">
  <div class="col-xl-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pengeluaran</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChartPengeluaran"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <script src="assets/js/home.js"></script> -->
<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>