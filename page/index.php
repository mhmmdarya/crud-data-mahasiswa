<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../config/db.php';

$namaKampus = $config['APP_NAME'];
$jml = DB::countData();
$data = $_GET == null ? DB::getData() : DB::cariData($_GET['cari']);
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
                <div class="float-end" style="margin-left: 62%;">
                    <form class="d-flex" role="search" action="index.php" method="get">
                        <input class="form-control text-dark me-2" type="search" placeholder="Cari data" aria-label="Search" name="cari">
                        <button class="btn btn-success" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <div class="container">
        <!-- TABEL -->

        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
                Data Mahasiswa
                <span class="btn btn-success float-end btn-sm">Jumlah Data : <?= $jml['count(*)'] ?></span>
                <a href="/page/tambah-data.php" class="btn btn-primary me-2 btn-sm float-end">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= $value['npm'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['alamat'] ?></td>
                                <td>
                                    <form action="/config/process/delete-data.php" method="post">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            Hapus
                                        </button>
                                        <a href="update-data.php?id=<?= $value['npm'] ?>" class="btn btn-primary">Update</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-5" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Data yang dipilih akan dihapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-danger" value="Hapus Data">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $value['npm'] ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TABEL -->


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>