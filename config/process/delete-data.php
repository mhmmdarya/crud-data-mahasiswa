<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../db.php';
$key = $_POST['id'];
DB::hapusData($key);
header("Location: http://localhost:5000/page/index.php");
