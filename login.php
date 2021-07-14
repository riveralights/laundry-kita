<?php
  // activated sessions php
  session_start();

  // made connection with database
  include 'connection.php';

  // catch data from login form
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // select data from admin who have same username and password
  $query = mysqli_query($connection, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

  // count the data that found on database
  $count = mysqli_num_rows($query);

  // check username and password. if founded, redirect to admin
  if ($count > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    header("location:admin/index.php");
  } else {
    header("location:index.php?pesan=gagal");
  }