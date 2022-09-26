<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "magang");

//nambah data
if(isset($_POST['addnewlap'])){
    $nama_pos = $_POST['nama_pos'];
    $jenis_pos = $_POST['jenis_pos'];
    $lokasi_pos = $_POST['lokasi_pos'];
    $proggres = $_POST['proggres'];
    
    //soal gambar
    $allowed_extension = array('png', 'jpg');
    $nama = $_FILES['file']['name']; //ngambil nama
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //ngambil ekstensi
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name']; //ngambil lok

    //penamaan file > enskripsi
    $image = md5(uniqid($nama,true) . time()).'.'. $ekstensi; //menggabungkan nama file yang dienkripsi


    //validasi
    $cek = mysqli_query($conn, "select * from laporan where nama_pos='$nama_pos'");
    $hitung = mysqli_num_rows($cek);

    if($hitung<1){
        //jika belum ada

        //proses upload gambar
        if(in_array($ekstensi, $allowed_extension) === true){
            //validasi ukuran file
            if($ukuran < 15000000){
                move_uploaded_file($file_tmp, 'image/'. $image);

                $adddata = mysqli_query($conn,"insert into laporan (nama_pos, jenis_pos, lokasi_pos, proggres, image) values('$nama_pos','$jenis_pos','$lokasi_pos','$proggres', '$image')");
                if($adddata){
                    header('location:index.php');
                } else {
                    echo 'Gagal';
                    header('location:index.php');
                }
            } else {
                //file terlalu besar
                echo '
                <script>
                alert("ukuran terlalu besar");
                window.location.href="index.php";
                </script>
                ';

            }
        } else {
            echo '
            <script>
            alert("file harus png/jpg");
            window.location.href="index.php";
            </script>
            ';
        }
    }else {
        //jika sudah ada 
        echo '
        <script>
        alert("nama barang sudah terdaftar");
        window.location.href="index.php";
        </script>
        ';
    }
};


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

//menghapus
if(isset($_POST['hapusdata'])){
    $id_pos = $_POST['id_pos']; 

    $gambar = mysqli_query($conn, "select * from laporan where id_pos='$id_pos'");
    $get = mysqli_fetch_array($gambar);
    $img = 'image/' .$get['image'];
    unlink($img);

    $hapus = mysqli_query($conn, "delete from laporan where id_pos = '$id_pos'");
    if($update){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
}
?>
