<?php include 'header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-4">Tambah Pelanggan Baru</h4>
          <form action="add_costumer_action.php" method="POST">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama pelanggan</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama pelanggan">
            </div>
            <div class="mb-3">
              <label for="hp" class="form-label">Nomor Telepon</label>
              <input type="number" name="hp" id="hp" class="form-control" placeholder="Contoh: 081312503xxx">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat Pelanggan</label>
              <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Tuliskan alamat lengkap..."></textarea>
            </div>
            <div class="grid grid-gap-2">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>