<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "magang");

//nambah barang
if(isset($_POST['tambahdata'])){
    $nama_pos = $_POST['nama_pos'];
    $jenis_pos = $_POST['jenis_pos'];
    $lokasi_pos = $_POST['lokasi_pos'];
    $proggres = $_POST['proggres'];

    $adddata = mysqli_query($conn,"insert into laporan (nama_pos, jenis_pos, lokasi_pos, proggres) values('$nama_pos','$jenis_pos','$lokasi_pos','$proggres')");
    if($adddata){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
}

?>