<?php
  // activate php sessions
  session_start();

  // delete all sessions
  session_destroy();

  // redirect to login page with sending message from url
  header('location:../index.php?pesan=logout');