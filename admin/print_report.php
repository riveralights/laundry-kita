<?php include 'header.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h3 class="text-center my-3">Print Laporan</h3>
      <?php
        $start = $_GET['start'];
        $end = $_GET['end'];
      
      ?>
      <div class="card mt-4">
        <div class="card-body">
          <div class="mb-3">Data Laporan Laundry Periode <b><?= $start ?></b> sampai <b><?= $end ?></b></div>
          <table class="table table bordered table-striped mt-4">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Berat</th>
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
                <td><?= $transaksi['transaksi_berat'] ?> Kg</td>
                <td><?= $transaksi['transaksi_tgl_selesai'] ?></td>
                <td><?= "Rp. " . number_format($transaksi['transaksi_harga']) . ",-" ?></td>
                <td>
                <?php
                    if ($transaksi['transaksi_status'] == '0') {
                      echo "Proses";
                    } else if ($transaksi['transaksi_status'] == '1') {
                      echo "Dicuci";
                    } else if ($transaksi['transaksi_status'] == '2') {
                      echo "Selesai";
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

<script>
  window.print();
</script>
<?php include 'footer.php' ?>