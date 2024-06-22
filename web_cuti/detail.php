<?php
require_once "model/karyawan_model.php";
$karyawan = read($_GET['Id']);

require "view/karyawan/detail.php"

require_once "model/departemen_model.php";
$departemen = read($_GET['kode']);

require "view/departemen/detail.php"

require_once "model/pengajuan_model.php";
$departemen = read($_GET['id_pengajuan']);

require "view/pengajuan_cuti/pengajuan_cuti.php"

require_once "model/persetujuan_model.php";
$persetujuan = read($_GET['id']);

require "view/persetujuan/persetujuan.php"

?>