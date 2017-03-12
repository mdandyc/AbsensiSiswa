<?php 
session_start();

//cek apakah user sudahh login
if (isset($_SESSION['username_s'])) {
  header("location:siswa.php");

}
if (isset($_SESSION['username_p'])) {
  header("location:piket.php");

}

 ?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import matefile:///E:/Tubes/index.php#test3rialize.css-->
       <link type="text/css" rel="stylesheet" href="css/materialize.min.css" >
       <link rel="stylesheet" type="text/css" href="css/style2.css">
       <link href="css/iconmaterialize.css" rel="stylesheet">
       <link rel="shortcut icon" href="img/logo.png" />
      <title>Login</title>
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


  <nav class="nav-extended">
    <div class="nav-wrapper teal lighten-2">
      <a href="#" class="brand-logo"><img src="img/logo.png" width="60px;">Absensi Siswa</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"></i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php" class="teal lighten-2">Login</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo" class="teal lighten-2">
        <li><a href="index.php">Login</a></li>
      </ul>


      <ul class="tabs tabs-transparent">
        <li class="tab"><a class="active" href="#test1">Login Siswa</a></li>
        <li class="tab"><a href="#test2">Login Piket</a></li>
      </ul>
    </div>
  </nav>
  <div id="test1" class="col s12">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="login">
         <div class="card-panel blue-grey lighten-5 z-depth-5">
         <p class="center login-form-text">Jika Anda Siswa,Silahkan Login Sebagai Ketua Murid</p>
         <img class="gambar" src="img/logo.png">
         <form action="log.php?op=in" method="POST">
              <div class="input-field col s12">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text" class="validate" name="username_s">
              <label for="icon_prefix">Username</label>
              </div><!--end inputfield-->
              <div class="input-field col s12">
              <i class="material-icons prefix">lock</i>
              <input id="password" type="password" class="validate" name="psw">
              <label for="password">Password</label>
              </div><!--end inputfield-->
              <p>
              <input type="checkbox" name="checkbox" value="check" id="test5" />
              <label for="test5">Saya Bersedia Bertanggung Jawab</label>
              </p>
              <button class="btn waves-effect waves-light" type="submit" name="action" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}"><i class="material-icons left">done_all</i>Login
            </button><!--end button-->
        </form><!--end form-->
        </div><!--end cardpanel-->
        </div><!--end login-->  
        </div><!--end cols12-->
      </div><!--end rows-->
    </div><!--end container-->
  
  </div>
  <div id="test2" class="col s12">
    <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="login">
         <div class="card-panel blue-grey lighten-5 z-depth-5">
         <p class="center login-form-text">Jika Anda Guru,Silahkan Login Sebagai Guru Piket</p>
         <img class="gambar" src="img/logo.png">
         <form action="logpiket.php?op=in" method="POST">
              <div class="input-field col s12">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text" class="validate" name="username_p">
              <label for="icon_prefix">Username</label>
              </div><!--end inputfield-->
              <div class="input-field col s12">
              <i class="material-icons prefix">lock</i>
              <input id="password" type="password" class="validate" name="psw">
              <label for="password">Password</label>
              </div><!--end inputfield-->
              <p>
              <input type="checkbox" name="checkbox" value="check" id="test6" />
              <label for="test6">Saya Sedang Piket</label>
              </p>
              <button class="btn waves-effect waves-light" type="submit" name="action" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}"><i class="material-icons left">done_all</i>Login
            </button><!--end button-->
        </form><!--end form-->
        </div><!--end cardpanel-->
        </div><!--end login-->  
        </div><!--end cols12-->
      </div><!--end rows-->
    </div><!--end container-->
  
  </div>
        
	      
      <!--Import jQuery before materialize.js-->
   <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    </body>
  </html>
