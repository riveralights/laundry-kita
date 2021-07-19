<?php 
// menghubungkan koneksi
include '../connection.php';

// menangkap data id yang dikirim dari url
$id = $_GET['id'];

// menghapus transaksi
mysqli_query($connection,"delete from transaksi where transaksi_id='$id'");

// menghapus data pakaian dalam transaksi ini
mysqli_query($connection,"delete from pakaian where pakaian_transaksi='$id'");

// alihkan halaman ke halaman transaksi
header("location:transaction.php?message=deleted");
?>