<?php
session_start();

include "config/koneksi.php";

$userid=$_POST['username_s'];
$psw = $_POST['psw'];
$op = $_GET['op'];



if ($op=="in") {

$tampil = "SELECT * FROM siswa WHERE username_s ='$userid' AND password = '$psw'";

$cek= mysqli_query($konek,$tampil);

if (mysqli_num_rows($cek)==1) {
	//jika berhasil isi data di cek

	$c = mysqli_fetch_array($cek);
	$_SESSION['username_s'] = $c['username_s'];
	$_SESSION['level'] = $c['level'];
	if($c['level']=="km"){

		header("location:siswa.php");

	}
}else{
	header("location:faillogin.php");
}


}else if($op=="out"){

	unset($_SESSION['username_s']);
	unset($_SESSION['level']);
	header("location:index.php");


}





 ?>