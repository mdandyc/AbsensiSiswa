<?php
//koneksi ke database
include "config/koneksi.php";
//ambil variabel yang dikirim dari form
//ambil data dari form
$no = $_POST['no'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];

$update = "UPDATE absen SET nis ='$nis',nama = '$nama', kelas = '$kelas',  tanggal = '$tanggal', status = '$status'
WHERE no='$no'";

$hasil = mysqli_query($konek,$update);

if($hasil){
	header("location:siswa.php");
}else{
	echo "Update data siswa gagal";
}