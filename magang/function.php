<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "magang");

//nambah data
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

//update data
if(isset($_POST['updatedata'])){
    $id_pos = $_POST['id_pos'];
    $nama_pos = $_POST['nama_pos'];
    $jenis_pos = $_POST['jenis_pos'];
    $lokasi_pos = $_POST['lokasi_pos'];
    $proggres = $_POST['proggres'];

    $update = mysqli_query($conn,"update laporan set nama_pos='$nama_pos', jenis_pos='$jenis_pos', lokasi_pos='$lokasi_pos',proggres='$proggres' where id_pos = '$id_pos'");
    if($update){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
}


?>
