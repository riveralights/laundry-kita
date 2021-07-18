<?php include 'header.php' ?>

<?php 
    include '../connection.php';
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-4">Edit Transaksi Laundry</h4>
            <a href="transaction.php" class="btn btn-sm btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
          </div>

          <?php 
            // menangkap id yang dikirimkan melalui URL
            $id = $_GET['id'];

            // mengambil data pelanggan berdasarkan id di atas
            $query = mysqli_query($connection, "SELECT * FROM transaksi where transaksi_id='$id'");
            while( $transaksi = mysqli_fetch_array($query) ) {
          ?>
          <form action="update_transaction.php" method="POST">
            <input type="hidden" name="id" value="<?= $transaksi['transaksi_id'] ?>">
            <div class="mb-3">
              <label for="nama" class="form-label">Pelanggan</label>
              <select name="pelanggan" id="pelanggan" class="form-select">
                  <option selected disabled>- Pilih Pelanggan - </option>
                  <!-- Ambil data pelanggan dari database -->
                  <?php 
                    $query = mysqli_query($connection, "SELECT * FROM pelanggan");
                    while( $pelanggan = mysqli_fetch_array($query) ) {
                  ?>
                  <option <?php if($pelanggan['pelanggan_id'] == $transaksi['transaksi_pelanggan']) { echo "selected='selected'"; } ?> value="<?= $pelanggan['pelanggan_id'] ?>"><?= $pelanggan['pelanggan_nama'] ?></option>
                  <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="berat" class="form-label">Berat Cucian</label>
              <input type="number" name="berat" id="berat" class="form-control" value="<?= $transaksi['transaksi_berat'] ?>" placeholder="Berat Cucian (Kg)" required>
            </div>
            <div class="mb-3">
              <label for="tglSelesai" class="form-label">Tanggal Selesai</label>
              <input type="date" name="tgl_selesai" id="tglSelesai" value="<?= $transaksi['transaksi_tgl_selesai'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Jenis Pakaian</th>
                            <th class="text-center" width="20%">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          // menyimpan id transaksi ke variabel transaksi_id
                          $transaksi_id = $transaksi['transaksi_id'];

                          // Menampilkan pakaian dari transaksi yang berid di atas
                          $query = mysqli_query($connection, "SELECT * FROM pakaian WHERE pakaian_transaksi='$transaksi_id'");

                          while( $pakaian = mysqli_fetch_array($query) ) {
                        ?>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian" value="<?= $pakaian['pakaian_jenis'] ?>"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian" value="<?= $pakaian['pakaian_jumlah'] ?>"></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenis_pakaian[]" id="jenisPakaian"></td>
                            <td><input type="number" class="form-control" name="jumlah_pakaian[]" id="jumlahPakaian"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="alert alert-primary mb-3">
              <label for="status" class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                <option <?php if( $transaksi['transaksi_status'] == "0" ){ echo "selected='selected'"; } ?> value="0">Proses</option>
                <option <?php if( $transaksi['transaksi_status'] == "1" ){ echo "selected='selected'"; } ?> value="1">Dicuci</option>
                <option <?php if( $transaksi['transaksi_status'] == "2" ){ echo "selected='selected'"; } ?> value="2">Selesai</option>
              </select>
            </div>
            <div class="grid grid-gap-2">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>