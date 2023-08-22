<?php //error_reporting(0);
session_start();
include"config/config.php";?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Babang Kurir</title>

    <link rel="shortcut icon" href="img/BabangKurir.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" >

            <div class="col-xl-10 col-lg-12 col-md-9" >

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0" >
                       
                        <div class="row" style="background-image:url('img/login.png') ; height: 570px;" style=" height: 1000px; background-color:blue;" >
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"> </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <br>
                                        <br><br>
                                        <h1 style="color:red;">Login</h1>
                                    </div>

                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="username" aria-describedby="emailHelp"
                                                placeholder="Enter Username/ No BB ..." required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Enter Password ..." required="">
                                        </div>
                                      
                                       
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="login">
                                            
                                        </a>
                                        <hr>
                                        
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php 

if (isset($_POST['login'])){
    //error_reporting(0);
    $username = $_POST['username'];
  $password = $_POST['password'];

   $log =  $koneksi->query( "SELECT * FROM driver WHERE nobb='$username' AND password='$password'");
    $data = mysqli_fetch_array($log); 
if(mysqli_num_rows($log) == 1){
    session_start();
    $_SESSION['id'] = $data['id_driver'];
    $_SESSION['nama'] = $data['nama_driver'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['nobb'] = $data['nobb'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['level'] = 'Driver';
    echo "<script>alert('Login berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=beranda.php'></script>";

  }else{
    $log =  $koneksi->query( "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_array($log);

  if(mysqli_num_rows($log) == 1){
    session_start();
    $_SESSION['id'] = $data['id_admin'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    $_SESSION['level'] = 'Admin';
    echo "<script>alert('Login berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=beranda.php'></script>";

  }else{
    echo "<script>alert('Login gagal, coba ulangi kembali.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'></script>";
  } 
  } 

   
 
  
  

  


}

?>