<?php
require_once 'Mahasiswa.php';
require_once 'functions.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $mhs = new Mahasiswa();
    $mhs->delete($id);
}
redirect('index.php');
