<?php 
session_start();

//cek apakah user sudahh login
if (!isset($_SESSION['username_p'])) {
  header ("location:index.php");

}

 ?>
<!DOCTYPE html>
  <html>
    <head>
    <title>Guru Piket</title>
      <!--Import matefile:///E:/Tubes/index.php#test3rialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css" >
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link href="css/iconmaterialize.css" rel="stylesheet">
      <link rel="shortcut icon" href="img/logo.png" />

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
    <nav class="nav-extended teal lighten-2">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo"><img class="logo" src="img/piket.png"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i></a>
        <ul id="nav-mobile" class="right">
        <li>Hello, <?php echo $_SESSION['username_p']; ?></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
        <li><a href="index.php">Absensi Siswa</a></li>
        </ul>
        
        <ul class="tabs tabs-transparent">
        <li class="tab"><a class="active" href="#test1">List Absen</a></li>
        <li class="tab"><a href="#test2">List Siswa</a></li>
        </ul><!--end tabs-->
    </div><!--end navwrapper-->
  </nav><!--end nav-->
  <div class="card-panel teal lighten-5 z-depth-5">
   <div id="test1" class="col s12">
  <form action="piket.php" method="GET">
    <div class="container">
    <div class="row">
      <div class="col s12">
          <div class="input-field col s12">
          <div class="search">
          <div class="row">
            <div class="col 6">
            <i class="material-icons prefix">search</i>
            <input id="icon_prefix" type="text" class="validate" name="s">
            <label for="icon_prefix">Search</label>
            </div>
            <div class="col s4">
            <input type="submit" class="btn" value="cari" name="cari">
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
  </form><!--end form-->

    <?php
      $batas    = 5;
      $halaman  = @$_GET['halaman'];
      if (empty($halaman)) {
        $posisi   = 0;
        $halaman  = 1;
      }else{
        $posisi   =($halaman - 1)*$batas;
      }
      //koneksi ke database
      include "config/koneksi.php";
      //query menampilkan data
      if (isset($_GET['cari'])) {
       $q        = $_GET['s'];
       $tampil   = "SELECT * FROM  absen WHERE nama LIKE '%$q%' OR kelas LIKE '%$q%' ORDER BY tanggal DESC LIMIT $posisi,$batas";
      }else{
        $tampil   = "SELECT * FROM  absen ORDER BY tanggal DESC LIMIT $posisi,$batas";
      }
              
              
        $hasil    = mysqli_query($konek,$tampil);
        $jmlhasil = mysqli_num_rows($hasil);
              
    ?>
    <div class="container">
    <div class="row">
      <div class="col s12">
        <table class="striped centered bordered responsive-table teal lighten-4">
        <tr>
          <td>Nama</td>
          <td>Kelas</td>
          <td>Pelapor</td>
          <td>NIS</td>
          <td>Tanggal</td>
          <td>Keterangan</td>
        </tr>
 <?php
if ($jmlhasil<1) {
  echo "<tr>";
  echo "<td colspan='5' style='text-align:center;'>No Result!</td>";
  echo "</tr>";
}else{

//penomoran
  $no=$posisi+ 1;
//tampil nama, email dan pesan
while($data=mysqli_fetch_array($hasil)){
  echo "<tr>";
  echo "<td> $data[nama] </td> ";
  echo "<td> $data[kelas]</td> ";
  echo "<td> $data[username_s]</td>";
  echo "<td>$data[nis]</td> ";
  echo "<td>$data[tanggal]</td> ";
  echo "<td>$data[status]</td> ";
  echo "</tr>";
  $no++;
  } 
}


?>

      </table>

 <?php 
//untuk pagging
$tampil2 = "SELECT * FROM absen";
$hasil2 = mysqli_query($konek,$tampil2);
$jmldata= mysqli_num_rows($hasil2);
$jmlhalaman = ceil($jmldata/$batas);

echo "JUMLAH DATA : $jmldata <br>";
echo "<ul class=pagination style=margin:auto;width:230px;>
       <li class=disabled><a href=#><i class=material-icons>chevron_left</i></a></li>";

for ($i=1; $i <=$jmlhalaman ; $i++) { 

  if ($i != $halaman) {

    echo "
    
    <li class=waves-effect><a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a></li>
    ";

  }else{
    echo "
     <li class=active><a href=# class=halaman>$i</a></li>
    
    ";

  }

  
}

 ?> 
 
  <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
        </div>
      </div>
      </div> 
      </div>
      <div id="test2" class="col s12">
  <form action="piket.php" method="GET">
    <div class="container">
    <div class="row">
      <div class="col s12">
          <div class="input-field col s12">
          <div class="search">
          <div class="row">
            <div class="col 6">
            <i class="material-icons prefix">search</i>
            <input id="icon_prefix" type="text" class="validate" name="s">
            <label for="icon_prefix">Search</label>
            </div>
            <div class="col s4">
            <input type="submit" class="btn" value="cari" name="cari">
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
  </form><!--end form-->

    <?php
      $batas    = 5;
      $halaman  = @$_GET['halaman'];
      if (empty($halaman)) {
        $posisi   = 0;
        $halaman  = 1;
      }else{
        $posisi   =($halaman - 1)*$batas;
      }
      //koneksi ke database
      include "config/koneksi.php";
      //query menampilkan data
      if (isset($_GET['cari'])) {
       $q        = $_GET['s'];
       $tampil   = "SELECT * FROM siswa WHERE username_s LIKE '%$q%' OR kelas LIKE '%$q%' OR nama LIKE '%$q%' ORDER BY kelas DESC LIMIT $posisi,$batas";
      }else{
        $tampil   = "SELECT * FROM siswa ORDER BY kelas DESC LIMIT $posisi,$batas";
      }
              
              
        $hasil    = mysqli_query($konek,$tampil);
        $jmlhasil = mysqli_num_rows($hasil);
              
    ?>
    <div class="container">
    <div class="row">
      <div class="col s12">
        <table class="striped centered bordered responsive-table teal lighten-4">
        <tr>
          <td>Nama</td>
          <td>Kelas</td>
          <td>Username</td>
        </tr>
 <?php
if ($jmlhasil<1) {
  echo "<tr>";
  echo "<td colspan='5' style='text-align:center;'>No Result!</td>";
  echo "</tr>";
}else{

//penomoran
  $no=$posisi+ 1;
//tampil nama, email dan pesan
while($data=mysqli_fetch_array($hasil)){
  echo "<tr>";
  echo "<td> $data[nama] </td> ";
  echo "<td> $data[kelas]</td> ";
  echo "<td> $data[username_s]</td>";
  echo "</tr>";
  $no++;
  } 
}


?>

      </table>

 <?php 
//untuk pagging
$tampil2 = "SELECT * FROM siswa";
$hasil2 = mysqli_query($konek,$tampil2);
$jmldata= mysqli_num_rows($hasil2);
$jmlhalaman = ceil($jmldata/$batas);

echo "JUMLAH DATA : $jmldata <br>";
echo "<ul class=pagination style=margin:auto;width:230px;>
       <li class=disabled><a href=#><i class=material-icons>chevron_left</i></a></li>";

for ($i=1; $i <=$jmlhalaman ; $i++) { 

  if ($i != $halaman) {

    echo "
    
    <li class=waves-effect><a href=$_SERVER[PHP_SELF]?halaman=$i> $i </a></li>
    ";

  }else{
    echo "
     <li class=active><a href=# class=halaman>$i</a></li>
    
    ";

  }

  
}

 ?> 
 
  <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
        </div>
      </div>
      </div> 
      </div>
    </div>
  </div>
  </div>
  </div>
    </div>

  </div>
  </div>
  </div>
   
    <div class="fixed-action-btn vertikal">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">reorder</i>
    </a>
    <ul>
      <li><a href="logpiket.php?op=out" class="btn-floating red darken-1"><i class="material-icons">power_settings_new</i></a></li>
    </ul>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
   
        <footer class="page-footer teal lighten-2">
          <div class="footer-copyright teal lighten-2">
            <div class="container">
            © 2016 Copyright XI RPL 2
            </div>
          </div>
        </footer><!--end footer-->        
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/plugins.min.js"></script>
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    </body>
  </html>