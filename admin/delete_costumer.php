<?php
  // get connection
  require '../connection.php';

  // catch id from url
  $id = $_GET['id'];

  // delete data based on id
  mysqli_query($connection, "DELETE FROM pelanggan WHERE pelanggan_id='$id'");

  header('location:costumer.php?message=deleted');