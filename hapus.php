<?php

$nis = $_GET['no'];

include "config/koneksi.php";

$hapus= "DELETE FROM absen WHERE no = '$nis'";

$hasil=mysqli_query($konek,$hapus);

if($hasil){
	header("location:siswa.php");
}else{
	echo "gagal";
}




?>