<?php 
  // Menghubungkan dengan koneksi
  include '../connection.php';

  // menangkap data yang dikirim dari form
  $id = $_POST['id'];
  $pelanggan = $_POST['pelanggan'];
  $berat = $_POST['berat'];
  $tgl_selesai = $_POST['tgl_selesai'];
  $status = $_POST['status'];

  // mengambil data harga per kilo
  $query = mysqli_query($connection, "SELECT harga_per_kilo FROM harga");
  $price = mysqli_fetch_assoc($query);

  // Menghitung harga laundry (harga per kg x  berat cucian)
  $newPrice = $berat * $price['harga_per_kilo'];

  // update data transaksi
  mysqli_query($connection, "UPDATE transaksi SET transaksi_pelanggan='$pelanggan', transaksi_harga='$newPrice', transaksi_berat='$berat', transaksi_tgl_selesai='$tgl_selesai', transaksi_status='$status' WHERE transaksi_id='$id'"); 

  // menangkap data form input array (jenis pakaian dan jumlah pakaian)
  $jenis_pakaian = $_POST['jenis_pakaian'];
  $jumlah_pakaian = $_POST['jumlah_pakaian'];

  // menghapus semua pakaian dalam transaksi ini
  mysqli_query($connection, "DELETE FROM pakaian WHERE pakaian_transaksi='$id'");

  // Input ulang data cucian
  // input data cucian berdasarkan id transaki (invoice) ke table pakaian
  for( $i = 0; $i < count($jenis_pakaian); $i++ ) {
    if( $jenis_pakaian[$i] != "" ) {
        mysqli_query($connection, "INSERT INTO pakaian VALUES(null, '$id', '$jenis_pakaian[$i]', '$jumlah_pakaian[$i]')");
    }
}

header('location: transaction.php?message=updated');