<?php include 'header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <h4>Laporan</h4>
          <form action="report.php" method="GET">
            <table class="table table-striped table-bordered mt-4">
              <thead>
                <tr>
                  <th class="text-center">Tanggal Awal</th>
                  <th class="text-center">Tanggal Akhir</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="date" name="start" id="start" class="form-control"></td>
                  <td><input type="date" name="end" id="start" class="form-control"></td>
                </tr>
              </tbody>
            </table>
            <button type="submit" class="btn btn-primary"><i class="bi bi-funnel-fill"></i> Filter Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-10">
      <?php 
        if(isset($_GET['start']) && isset($_GET['end'])) {
          $start = $_GET['start'];
          $end = $_GET['end'];
      ?>
      <div class="card mt-4">
        <div class="card-body">
          <div class="mb-3">Data Laporan Laundry Periode <b><?= $start ?></b> sampai <b><?= $end ?></b></div>
          <a href="print_report.php?start=<?= $start ?>&end=<?= $end ?>" class="btn btn-primary btn-sm"><i class="bi bi-printer-fill"></i> Cetak</a>
          <table class="table table bordered table-striped mt-4">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Berat (kg)</th>
                <th>Tgl. Selesai</th>
                <th>Harga</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                // connect ke database
                include '../connection.php';

                // mengambil data pelanggan dari databse
                $query = mysqli_query($connection, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan=pelanggan_id AND date(transaksi_tanggal) > '$start' AND date(transaksi_tanggal) < '$end' ORDER BY transaksi_id DESC");
                $no = 1;
                while($transaksi = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>INVOICE-<?= $transaksi['transaksi_id'] ?></td>
                <td><?= $transaksi['transaksi_tanggal'] ?></td>
                <td><?= $transaksi['pelanggan_nama'] ?></td>
                <td><?= $transaksi['transaksi_berat'] ?></td>
                <td><?= $transaksi['transaksi_tgl_selesai'] ?></td>
                <td><?= $transaksi['transaksi_harga'] ?></td>
                <td>
                <?php
                    if ($transaksi['transaksi_status'] == '0') {
                      echo "<span class='badge bg-warning'>Proses</span>";
                    } else if ($transaksi['transaksi_status'] == '1') {
                      echo "<span class='badge bg-primary'>Dicuci</span>";
                    } else if ($transaksi['transaksi_status'] == '2') {
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
      <?php } ?>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>