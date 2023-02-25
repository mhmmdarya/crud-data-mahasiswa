<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../db.php';

$npm = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
var_dump($_POST);

DB::updateData($npm, $nama, $alamat);
header("Location: http://localhost:5000/page/index.php");
// DB::tambahData("Muhammad Arya Kusuma", "DKI Jakarta");
