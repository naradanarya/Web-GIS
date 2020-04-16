<?php 

// PROTEKSI

    $this->simple_login->cek_login();

// GABUNGKAN SEMUA BAGIAN LAYOUT MENJADI 1

require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');