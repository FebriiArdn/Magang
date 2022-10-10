<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "magang");

//nambah data
if(isset($_POST['addnewlap'])){
    $nama_pos = $_POST['nama_pos'];
    $jenis_pos = $_POST['jenis_pos'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $lokasi_pos = $_POST['lokasi_pos'];
    $sungai = $_POST['sungai'];
    $sub_das = $_POST['sub_das'];
    $das = $_POST['das'];
    $sistem_sungai = $_POST['sistem_sungai'];
    $wilayah_sungai = $_POST['wilayah_sungai'];
    $jenis_alat = $_POST['jenis_alat'];
    $id_logger = $_POST['id_logger'];
    $id_modem = $_POST['id_modem'];
    $no_gsm = $_POST['no_gsm'];
    $proggres = $_POST['proggres'];
    $nama_penjaga = $_POST['nama_penjaga'];
    $no_penjaga = $_POST['no_penjaga'];
    $link_data = $_POST['link_data'];
    $link_publikasi = $_POST['link_publikasi'];
    $tahun_dibangun = $_POST['tahun_dibangun'];
    $jumlah_ketersediaandata = $_POST['jumlah_ketersediaandata'];
    $data_ketersediaantahun = $_POST['data_ketersediaantahun'];
    $dibangun = $_POST['dibangun'];
    $dikelola = $_POST['dikelola'];

    
    
    //soal gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');
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

        //proses upload gambar
        if(in_array($ekstensi, $allowed_extension) === true){
            //validasi ukuran file
            if($ukuran < 15000000){
                move_uploaded_file($file_tmp, 'image/'. $image);
                $adddata = mysqli_query($conn,"insert into laporan (nama_pos, jenis_pos, latitude, longitude, lokasi_pos, sungai , sub_das, das, sistem_sungai, wilayah_sungai, jenis_alat, id_logger, id_modem, no_gsm, proggres, nama_penjaga, no_penjaga, link_data, link_publikasi, tahun_dibangun, jumlah_ketersediaandata, data_ketersediaantahun, dibangun, dikelola, image) 
                values('$nama_pos','$jenis_pos', '$latitude', '$longitude', '$lokasi_pos', '$sungai', '$sub_das', '$das', '$sistem_sungai', '$wilayah_sungai', '$jenis_alat', '$id_logger', '$id_modem', '$no_gsm', '$proggres', '$nama_penjaga', '$no_penjaga', '$link_data', '$link_publikasi', '$tahun_dibangun', '$jumlah_ketersediaandata', '$data_ketersediaantahun', '$dibangun', '$dikelola', '$image')");
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
            alert("file harus png/jpg/jpeg");
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
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $lokasi_pos = $_POST['lokasi_pos'];
    $sungai = $_POST['sungai'];
    $sub_das = $_POST['sub_das'];
    $das = $_POST['das'];
    $sistem_sungai = $_POST['sistem_sungai'];
    $wilayah_sungai = $_POST['wilayah_sungai'];
    $jenis_alat = $_POST['jenis_alat'];
    $id_logger = $_POST['id_logger'];
    $id_modem = $_POST['id_modem'];
    $no_gsm = $_POST['no_gsm'];
    $proggres = $_POST['proggres'];
    $nama_penjaga = $_POST['nama_penjaga'];
    $no_penjaga = $_POST['no_penjaga'];
    $link_data = $_POST['link_data'];
    $link_publikasi = $_POST['link_publikasi'];
    $tahun_dibangun = $_POST['tahun_dibangun'];
    $jumlah_ketersediaandata = $_POST['jumlah_ketersediaandata'];
    $data_ketersediaantahun = $_POST['data_ketersediaantahun'];
    $dibangun = $_POST['dibangun'];
    $dikelola = $_POST['dikelola'];

    //soal gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['file']['name']; //ngambil nama
    $dot = explode('.', $nama);
    $ekstensi = strtolower(end($dot)); //ngambil ekstensi
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name']; //ngambil lok

    //penamaan file > enskripsi
    $image = md5(uniqid($nama,true) . time()).'.'. $ekstensi; //menggabungkan nama file yang dienkripsi
    $gambar = mysqli_query($conn, "select * from laporan where id_pos='$id_pos'");
    $get = mysqli_fetch_array($gambar);
    $img = 'image/' .$get['image'];

    

    if($ukuran==0){
        //jika tidak ingin upload
        $update = mysqli_query($conn,"update laporan set nama_pos='$nama_pos', jenis_pos='$jenis_pos', latitude='$latitude', longitude='$longitude', lokasi_pos='$lokasi_pos', sungai='$sungai', sub_das='$sub_das', das='$das', sistem_sungai='$sistem_sungai', wilayah_sungai='$wilayah_sungai', jenis_alat='$jenis_alat', id_logger='$id_logger', id_modem='$id_modem', no_gsm='$no_gsm', proggres='$proggres', nama_penjaga='$nama_penjaga', no_penjaga='$no_penjaga', link_data='$link_data', link_publikasi='$link_publikasi', tahun_dibangun='$tahun_dibangun', jumlah_ketersediaandata='$jumlah_ketersediaandata', data_ketersediaantahun='$data_ketersediaantahun', dibangun='$dibangun', dikelola='$dikelola' where id_pos = '$id_pos'");
        if($update){
            header('location:index.php');
        } else {
            echo 'Gagal';
            header('location:index.php');
        }
    } else {
        //jika ingin
        move_uploaded_file($file_tmp, 'image/'. $image);
        $update = mysqli_query($conn,"update laporan set nama_pos='$nama_pos', jenis_pos='$jenis_pos', latitude='$latitude', longitude='$longitude', lokasi_pos='$lokasi_pos', sungai='$sungai', sub_das='$sub_das', das='$das', sistem_sungai='$sistem_sungai', wilayah_sungai='$wilayah_sungai', jenis_alat='$jenis_alat', id_logger='$id_logger', id_modem='$id_modem', no_gsm='$no_gsm', proggres='$proggres', nama_penjaga='$nama_penjaga', no_penjaga='$no_penjaga', link_data='$link_data', link_publikasi='$link_publikasi', tahun_dibangun='$tahun_dibangun', jumlah_ketersediaandata='$jumlah_ketersediaandata', data_ketersediaantahun='$data_ketersediaantahun', dibangun='$dibangun', dikelola='$dikelola', image='$image' where id_pos = '$id_pos'");
        if($update){
            unlink($img);
        } else {
            echo 'Gagal';
            header('location:index.php');
        }
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
