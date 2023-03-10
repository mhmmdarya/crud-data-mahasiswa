<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../config/db.php';

$namaKampus = $config['APP_NAME'];
$data = DB::getDataByID($_GET['id']);
$nama = $data['nama'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!-- NAVBAR -->

    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class=" container-fluid">
            <a class="navbar-brand" href="#"><?= $namaKampus ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Data Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
                Update Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="/../config/process/update-data.php" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Mahasiswa</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= $data['alamat'] ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?= $data['npm'] ?>">
                    <a href="index.php" class="btn btn-danger">Kembali</a>
                    <input type="submit" class="btn btn-success" value="Update Data">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>