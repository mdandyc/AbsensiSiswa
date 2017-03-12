
<?php

//koneksi ke database
include "config/koneksi.php";


//ambil data dari form
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$nis = $_POST['nis'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
$username_s = $_POST['username_s'];


$input = "INSERT INTO absen(nama,kelas,username_s,nis,tanggal,status) VALUES ('$nama','$kelas','$username_s','$nis','$tanggal','$status')";
$hasil = mysqli_query($konek, $input);

if($hasil){
	header("location:siswa.php");
}else{
	echo "GAGAL";
}
