<?php include 'header.php' ?>
<?php include '../connection.php' ?>

<div class="my-4">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert alert-success text-center"><strong>Selamat datang</strong> di Laundry Kita</div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card shadow p-4">
          <h1 class="mb-4">Dashboard</h1>
          <div class="row">
            <div class="col-md-3">
              <div class="card text-white mb-3" style="background-color: #125D98;">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                  <h1><i class="bi bi-people-fill"></i></h1>
                  Jumlah Pelanggan
                  </div>
                  <div>
                    <h2>
                      <?php 
                        $query = mysqli_query($connection, "SELECT * FROM pelanggan");
                        echo mysqli_num_rows($query);                      
                      ?>
                    </h2>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-white mb-3" style="background-color: #FB9300;">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                  <h1><i class="bi bi-arrow-repeat"></i></h1>
                  Cucian Diproses
                  </div>
                  <div>
                    <h2>
                      <?php 
                        $query = mysqli_query($connection, "SELECT * FROM transaksi where transaksi_status='1'");
                        echo mysqli_num_rows($query);                      
                      ?>
                    </h2>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-white mb-3" style="background-color: #39A6A3;">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                  <h1><i class="bi bi-check-lg"></i></h1>
                  Cucian siap diambil
                  </div>
                  <div>
                    <h2>
                      <?php 
                        $query = mysqli_query($connection, "SELECT * FROM transaksi where transaksi_status='2'");
                        echo mysqli_num_rows($query);                      
                      ?>
                    </h2>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-white" style="background-color: #21094E;">
                <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                  <h1><i class="bi bi-receipt-cutoff"></i></h1>
                  Total Transaksi
                  </div>
                  <div>
                    <h2>
                      <?php 
                        $query = mysqli_query($connection, "SELECT * FROM transaksi");
                        echo mysqli_num_rows($query);                      
                      ?>
                    </h2>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card mt-5">
          <div class="card-header">
            <h4 class="card-title">Transaksi Terakhir</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="text-center" width=1%>No</th>
                    <th class="text-center">Invoice</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Pelanggan</th>
                    <th class="text-center">Berat (Kg)</th>
                    <th class="text-center">Tanggal Selesai</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $query = mysqli_query($connection, "SELECT * FROM pelanggan, transaksi where transaksi_pelanggan=pelanggan_id ORDER BY transaksi_id DESC LIMIT 7");
                    $no = 1;
                    while( $data = mysqli_fetch_array($query) ) {
                  ?>
                  <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td class="text-center">INVOICE-<?= $data['transaksi_id'] ?></td>
                      <td class="text-center"><?= $data['transaksi_tanggal'] ?></td>
                      <td><?= $data['pelanggan_nama'] ?></td>
                      <td class="text-center"><?= $data['transaksi_berat'] ?></td>
                      <td class="text-center"><?= $data['transaksi_tgl_selesai'] ?></td>
                      <td class="text-center"><?= "Rp. " . number_format($data['transaksi_harga']) . ",-" ?></td>
                      <td class="text-center">
                      <?php
                        if ($data['transaksi_status'] == '0') {
                          echo "<span class='badge bg-warning'>Proses</span>";
                        } else if ($data['transaksi_status'] == '1') {
                          echo "<span class='badge bg-primary'>Dicuci</span>";
                        } else if ($data['transaksi_status'] == '2') {
                          echo "<span class='badge bg-success'>Selesai</span>";
                        }

                    ?>
                      </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>