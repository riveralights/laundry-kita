<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
  <!-- Boostrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
</head>

<body>
  <!-- check the user, is logged in or not? -->
  <?php
  session_start();
  if ($_SESSION['status'] != 'login') {
    header('location:../index.php?pesan=belum_login');
  }
  ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #A239EA;">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="bi bi-droplet-half"></i> Laundry Kita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/laundry-kita/admin/index.php' ? ' active' : ''); ?>" aria-current="page" href="index.php"><i class="bi bi-house-fill"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/laundry-kita/admin/costumer.php' ? ' active' : ''); ?>" href="costumer.php"><i class="bi bi-person-lines-fill"></i> Pelanggan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/laundry-kita/admin/transaction.php' ? ' active' : ''); ?>" href="transaction.php"><i class="bi bi-currency-dollar"></i> Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/laundry-kita/admin/report.php' ? ' active' : ''); ?>" href="report.php"><i class="bi bi-file-earmark-fill"></i> Laporan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/laundry-kita/admin/price.php' ? ' active' : ''); ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-gear-fill"></i> Pengaturan
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="price.php"><i class="bi bi-currency-exchange"></i> Ganti Harga</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-key-fill"></i> Akun
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><span class="dropdown-item"><i class="bi bi-person-check-fill"></i> Halo, <?= $_SESSION['username'] ?></span></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="change_password.php"><i class="bi bi-lock-fill"></i> Ganti Password</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="bi bi-door-open-fill"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->