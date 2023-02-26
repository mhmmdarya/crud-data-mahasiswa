<?php
require_once __DIR__ . '/../vendor/autoload.php';
class DB
{
    public static function getData()
    {
        try {
            $config = Dotenv\Dotenv::createArrayBacked(__DIR__ . '/..')->load();
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $conn = new PDO("mysql:host={$config['SERVER_NAME']};dbname={$config['DB_NAME']}", $config['DB_USERNAME'], $config['DB_PASS'], $options);
            $query = $conn->prepare("SELECT npm, nama, alamat FROM mahasiswa");
            $query->execute();
            $result = $query->fetchAll();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public static function getDataByID($id)
    {
        try {
            $config = Dotenv\Dotenv::createArrayBacked(__DIR__ . '/..')->load();
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $conn = new PDO("mysql:host={$config['SERVER_NAME']};dbname={$config['DB_NAME']}", $config['DB_USERNAME'], $config['DB_PASS'], $options);
            $query = $conn->prepare("SELECT npm, nama, alamat FROM mahasiswa WHERE npm={$id}");
            $query->execute();
            $result = $query->fetch();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public static function tambahData($nama, $alamat)
    {
        try {
            $config = Dotenv\Dotenv::createArrayBacked(__DIR__ . '/..')->load();
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $connection = new PDO("mysql:host={$config['SERVER_NAME']};dbname={$config['DB_NAME']}", $config['DB_USERNAME'], $config['DB_PASS'], $options);
            $tanggal = date("Y-m-d");
            $sql = "INSERT INTO mahasiswa(nama, alamat, tgl_input) VALUES (\"{$nama}\", \"{$alamat}\", \"{$tanggal}\")";
            $connection->exec($sql);
            $connection = null;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function hapusData($id)
    {
        try {
            $config = Dotenv\Dotenv::createArrayBacked(__DIR__ . '/..')->load();
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $connection = new PDO("mysql:host={$config['SERVER_NAME']};dbname={$config['DB_NAME']}", $config['DB_USERNAME'], $config['DB_PASS'], $options);
            $sql = "DELETE FROM mahasiswa WHERE npm={$id}";
            $connection->exec($sql);
            $connection = null;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function updateData($npm, $nama, $alamat)
    {
        try {
            $config = Dotenv\Dotenv::createArrayBacked(__DIR__ . '/..')->load();
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $connection = new PDO("mysql:host={$config['SERVER_NAME']};dbname={$config['DB_NAME']}", $config['DB_USERNAME'], $config['DB_PASS'], $options);
            $sql = "update mahasiswa set nama=\"{$nama}\", alamat=\"{$alamat}\" where npm={$npm}";
            $connection->exec($sql);
            $connection = null;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function cariData($nama)
    {
        try {
            $config = Dotenv\Dotenv::createArrayBacked(__DIR__ . '/..')->load();
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $conn = new PDO("mysql:host={$config['SERVER_NAME']};dbname={$config['DB_NAME']}", $config['DB_USERNAME'], $config['DB_PASS'], $options);
            $query = $conn->prepare("SELECT * FROM `mahasiswa` WHERE `nama` LIKE '%{$nama}%' OR `npm` LIKE '%{$nama}%'");
            $query->execute();
            $result = $query->fetchAll();
            $conn = null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public static function countData()
    {
        try {
            //code...
            $config = Dotenv\Dotenv::createArrayBacked(__DIR__ . '/..')->load();
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $conn = new PDO("mysql:host={$config['SERVER_NAME']};dbname={$config['DB_NAME']}", $config['DB_USERNAME'], $config['DB_PASS'], $options);
            $query = $conn->prepare("select count(*) from mahasiswa;");
            $query->execute();
            $hasil = $query->fetch();
            // var_dump($query->fetch());
            $conn = null;
        } catch (PDOException $err) {
            //throw $th;
            echo $err->getMessage();
        }
        return $hasil;
    }
}
