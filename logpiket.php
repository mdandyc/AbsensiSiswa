<?php
session_start();

include "config/koneksi.php";

$userid=$_POST['username_p'];
$psw = $_POST['psw'];
$op = $_GET['op'];



if ($op=="in") {

$tampil = "SELECT * FROM piket WHERE username_p ='$userid' AND password = '$psw'";

$cek= mysqli_query($konek,$tampil);

if (mysqli_num_rows($cek)==1) {
	//jika berhasil isi data di cek

	$c = mysqli_fetch_array($cek);
	$_SESSION['username_p'] = $c['username_p'];
	$_SESSION['level'] = $c['level'];

	if ($c['level']=="piket") {
		header("location:piket.php");
	}
}else{
	header("location:faillogin.php");
}


}else if($op=="out"){

	unset($_SESSION['username_p']);
	unset($_SESSION['level']);
	header("location:index.php");


}





 ?>