<?php include 'header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Daftar Pelanggan</div>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-end">
            <a href="" class="btn btn-primary mb-3"><i class="bi bi-person-plus-fill"></i> Tambah Data</a>
          </div>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Telepon</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                // get connection from DB
                include '../connection.php';

                // query data from pelanggan table
                $query = mysqli_query($connection, "SELECT * FROM pelanggan");
                $no = 1;
                while($pelanggan = mysqli_fetch_array($query)) { ?>       
                  <tr>      
                    <td><?= $no++ ?></td>
                    <td><?= $pelanggan['pelanggan_nama'] ?></td>
                    <td><?= $pelanggan['pelanggan_hp'] ?></td>
                    <td><?= $pelanggan['pelanggan_alamat'] ?></td>
                    <td class="text-center">
                      <a href="pelanggan.edit.php?id=<?= $pelanggan['pelanggan_id'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i> Edit</a>
                      <a href="pelanggan.hapus.php?id=<?= $pelanggan['pelanggan_id'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> Hapus</a>
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

<?php include 'footer.php' ?>