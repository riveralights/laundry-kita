<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page | Laundry Kita</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body class="login-background">
  <div class="row login-title mb-4">
    <div class="col">
      <div class="display-6 text-center mb-2">Laundry Kita</div>
      <p class="text-center">Silahkan login terlebih dahulu</p>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-3">
      
      <?php 
        if(isset($_GET['pesan'])) {
          if($_GET['pesan'] == 'gagal')  {
            echo "<div class='alert alert-danger text-center'><strong>Login gagal!</strong> <br> Username atau password salah!</div>";
          } else if($_GET['pesan'] == 'logout'){
            echo "<div class='alert alert-success text-center'>Anda telah logout!</div>";
          } else if($_GET['pesan'] == 'belum_login'){
            echo "<div class='alert alert-warning text-center'>Anda Harus login terlebih dahulu</div>";
          }
        }
      ?>

      <div class="card">
        <div class="card-body">
          <form action="login.php" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Jquery JS -->
  <script src="/assets/js/jquery.js"></script>
  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.js"></script>
</body>

</html>