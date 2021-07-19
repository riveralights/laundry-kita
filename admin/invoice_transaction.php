<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <!-- Boostrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <!-- Cek apakah sudah login -->
  <!-- cek apakah sudah login -->
  <?php
  session_start();
  if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
  }
  ?>


  <?php
  // koneksi database
  include '../connection.php';
  ?>
  <div class="container">
    <div class="row justify-content-center my-4">
    <div class="col-md-10">
      <?php
      // menangkap id yang dikirim melalui url
      $id = $_GET['id'];

      // megambil data pelanggan yang ber id di atas dari tabel pelanggan
      $transaksi = mysqli_query($connection, "select * from transaksi,pelanggan where transaksi_id='$id' and transaksi_pelanggan=pelanggan_id");
      while ($t = mysqli_fetch_array($transaksi)) {
      ?>
        <center>
          <h2>LAUNDRY KITA</h2>
        </center>
        <h3></h3>

        <a href="print_invoice_transaction.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary float-end"><i class="bi bi-printer-fill"></i> Cetak Invoice</a>

        <br />
        <br />


        <table class="table">
          <tr>
            <th width="20%">No. Invoice</th>
            <th>:</th>
            <td>INVOICE-<?php echo $t['transaksi_id']; ?></td>
          </tr>
          <tr>
            <th width="20%">Tgl. Laundry</th>
            <th>:</th>
            <td><?php echo $t['transaksi_tanggal']; ?></td>
          </tr>
          <tr>
            <th>Nama Pelanggan</th>
            <th>:</th>
            <td><?php echo $t['pelanggan_nama']; ?></td>
          </tr>
          <tr>
            <th>HP</th>
            <th>:</th>
            <td><?php echo $t['pelanggan_hp']; ?></td>
          </tr>
          <tr>
            <th>Alamat</th>
            <th>:</th>
            <td><?php echo $t['pelanggan_alamat']; ?></td>
          </tr>
          <tr>
            <th>Berat Cucian (Kg)</th>
            <th>:</th>
            <td><?php echo $t['transaksi_berat']; ?></td>
          </tr>
          <tr>
            <th>Tgl. Selesai</th>
            <th>:</th>
            <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
          </tr>
          <tr>
            <th>Status</th>
            <th>:</th>
            <td>
              <?php
              if ($t['transaksi_status'] == "0") {
                echo "<div class='label label-warning'>PROSES</div>";
              } else if ($t['transaksi_status'] == "1") {
                echo "<div class='label label-info'>DI CUCI</div>";
              } else if ($t['transaksi_status'] == "2") {
                echo "<div class='label label-success'>SELESAI</div>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <th>Harga</th>
            <th>:</th>
            <td><?php echo "Rp. " . number_format($t['transaksi_harga']) . " ,-"; ?></td>
          </tr>
        </table>

        <br />

        <h4 class="text-center">Daftar Cucian</h4>
        <table class="table table-bordered table-striped">
          <tr>
            <th>Jenis Pakaian</th>
            <th width="20%">Jumlah</th>
          </tr>

          <?php
          // menyimpan id transaksi ke variabel id_transaksi
          $id = $t['transaksi_id'];

          // menampilkan pakaian-pakaian dari transaksi yang ber id di atas
          $pakaian = mysqli_query($connection, "select * from pakaian where pakaian_transaksi='$id'");

          while ($p = mysqli_fetch_array($pakaian)) {
          ?>
            <tr>
              <td><?php echo $p['pakaian_jenis']; ?></td>
              <td width="5%"><?php echo $p['pakaian_jumlah']; ?></td>
            </tr>
          <?php } ?>
        </table>

        <br />
        <p>
          <center><i>" Terima kasih telah mempercayakan cucian anda pada kami ".</i></center>
        </p>

      <?php
      }
      ?>
    </div>
    </div>


  </div>

  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/jquery.js"></script>
</body>

</html>