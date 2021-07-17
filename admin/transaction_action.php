<?php

    // menghubungkan ke database
    include '../connection.php';

    // Menangkap data dari form
    $pelanggan = $_POST['pelanggan'];
    $berat = $_POST['berat'];
    $tgl_selesai = $_POST['tgl_selesai'];

    $tgl_hari_ini = date('Y-m-d');
    $status = 0;

    // mengambil data harga per kilo dari database
    $query = mysqli_query($connection, 'SELECT harga_per_kilo from harga');
    $price = mysqli_fetch_assoc($query);

    // Menghitung harga laundry (harga per kilo x berat cucian)
    $totalPrice = $berat * $price['harga_per_kilo'];

    // Input data ke tabel transaksi
    mysqli_query($connection, "INSERT INTO transaksi VALUES(null, '$tgl_hari_ini', '$pelanggan', '$totalPrice', '$berat', '$tgl_selesai', '$status')");

    // // menyimpan id dari data yang di simpan pada query insert data sebelumnya
    $last_id = mysqli_insert_id($connection);
    
    // // menangkap data form input array (jenis pakaian dan jumlah pakaian)
    $jenis_pakaian = $_POST['jenis_pakaian'];
    $jumlah_pakaian = $_POST['jumlah_pakaian'];

    // // input data cucian berdasarkan id transaki (invoice) ke table pakaian
    for( $i = 0; $i < count($jenis_pakaian); $i++ ) {
        if( $jenis_pakaian[$i] != "" ) {
            mysqli_query($connection, "INSERT INTO pakaian VALUES(null, '$last_id', '$jenis_pakaian[$i]', '$jumlah_pakaian[$i]')");
        }
    }

    header('location: transaction.php?message=success');
    