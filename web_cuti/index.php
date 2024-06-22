<?php
$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : '';
$uri = explode('/', $request);

$uri0 = isset($uri[0]) ? $uri[0] : null;
$uri1 = isset($uri[1]) ? $uri[1] : null;

require_once "lib/Database.php";
require_once "model/karyawan_model.php";
require_once "model/departemen_model.php";
require_once "model/pengajuan_model.php";
require_once "model/persetujuan_model.php";
require_once "controller/karyawan.php";
require_once "controller/departemen.php";
require_once "controller/pengajuan_cuti.php";
require_once "controller/persetujuan.php";


$db = new Database();
$karyawan_model = new Karyawan_model($db);
$departemen_model = new Departemen_model($db); 
$pengajuancuti_model = new Pengajuancuti_model($db);
$persetujuan_model = new Persetujuan_model($db);
$karyawan_controller = new Karyawan($karyawan_model);
$departemen_controller = new Departemen($departemen_model);
$pengajuancuti_controller = new Pengajuan_cuti($pengajuancuti_model); 
$persetujuan_controller = new Persetujuan_cuti($persetujuan_model); 


if ($uri0 === 'karyawan') {
    if ($uri1 === 'detail') {
        $id = $_GET['id'];
        $karyawan_controller->detail($id);
    } elseif ($uri1 === 'edit') {
        $id = $_GET['id'];
        $karyawan_controller->edit($id);
    } elseif ($uri1 === 'delete') {
        $id = $_GET['id'];
        $karyawan_controller->delete($id);
    } elseif ($uri1 === 'create') {
        $karyawan_controller->create();
    } else {
        $karyawan_controller->index();
    }
} elseif ($uri0 === 'departemen') {
    if ($uri1 === 'detail') {
        $kode = $_GET['id'];
        $departemen_controller->detail($kode);
    } elseif ($uri1 === 'edit') {
        $kode = $_GET['id'];
        $departemen_controller->edit($kode);
    } elseif ($uri1 === 'delete') {
        $kode = $_GET['id'];
        $departemen_controller->delete($kode);
    } elseif ($uri1 === 'create') {
        $departemen_controller->create();
    } else {
        $departemen_controller->index();
    }
} elseif ($uri0 === 'pengajuan') {
    if ($uri1 === 'detail') {
        $id_pengajuan = $_GET['id'];
        $pengajuancuti_controller->detail($id_pengajuan);
    } elseif ($uri1 === 'kelola') {
        $id_pengajuan = $_GET['id'];
        $pengajuancuti_controller->kelola($id_pengajuan);
    } elseif ($uri1 === 'delete') {
        $id_pengajuan = $_GET['id'];
        $pengajuancuti_controller->delete($id_pengajuan);
    } elseif ($uri1 === 'create') {
        $pengajuancuti_controller->create();
    } else {
        $pengajuancuti_controller->index();
    }
} elseif ($uri0 === 'persetujuan') {
    if ($uri1 === 'detail') {
        $id = $_GET['id'];
        $persetujuan_controller->detail($id);
    } elseif ($uri1 === 'kelola') {
        $id = $_GET['id'];
        $persetujuan_controller->kelola($id);
    } elseif ($uri1 === 'delete') {
        $id = $_GET['id'];
        $persetujuan_controller->delete($id);
    } elseif ($uri1 === 'create') {
        $persetujuan_controller->create();
    } else {
        $persetujuan_controller->index();
    }
}
 {
    header("HTTP/1.1 404 Not Found");
    echo "<html><body><h1>Page not found</h1></body></html>";
}
?>
