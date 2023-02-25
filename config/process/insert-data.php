<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../db.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

DB::tambahData($nama, $alamat);

header("Location: http://localhost:5000/index.php");
