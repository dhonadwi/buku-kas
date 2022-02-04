<?php
include("assets/functions.php");
include("status.php");

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$tahun = date('Y');
$data = query("SELECT * FROM dta_saldo WHERE tahun_saldo=$tahun");
$arr = array();
$arr['info'] = "success";
$arr['num'] = count($data);
$arr['result'] = $data;

echo json_encode($arr);
