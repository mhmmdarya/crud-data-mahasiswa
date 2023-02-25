<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../db.php';


$hasil = DB::cariData("Muhammad");
// var_dump($hasil);

foreach ($hasil as $key => $value) {
    # code...
    echo $value['nama'] . PHP_EOL;
    echo $value['npm'] . PHP_EOL;
    echo $value['alamat'] . PHP_EOL;
}
