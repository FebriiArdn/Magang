 $adddata = mysqli_query($conn,"insert into laporan ('nama_pos', 'jenis_pos', 'latitude', 'longitude', 'lokasi_pos', 'sungai', 'sub_das', 'das', 'sistem_sungai', 'wilayah_sungai', 'jenis_alat', 'id_logger', 'id_modem', 'no_gsm', 'nama_penjaga', 'no_penjaga', 'link_data', 'link_publikasi', 'tahun_dibangun', 'jumlah_ketersediaandata', 'data_ketersediaantahun', 'dibangun', 'dikelola', 'proggres', 'image') 
                    values('$nama_pos', '$jenis_pos', '$latitude', '$longitude', '$lokasi_pos', '$sungai', '$sub_das', '$das', '$sistem_sungai', '$wilayah_sungai', '$jenis_alat', '$id_logger', '$id_modem', '$no_gsm', '$nama_penjaga', '$no_penjaga', '$link_data', '$link_publikasi', '$tahun_dibangun', '$jumlah_ketersediaandata', '$data_ketersediaantahun', '$dibangun', '$dikelola', '$proggres', '$image')");

    $nama_pos = $_POST['nama_pos'];
    $jenis_pos = $_POST['jenis_pos'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $lokasi_pos = $_POST['lokasi_pos'];
    $sungai = $_POST['sungai'];
    $sub_das = $_POST['subdas'];
    $das = $_POST['das'];
    $sistem_sungai = $_POST['sistem_sungai'];
    $wilayah_sungai = $_POST['wilayah_sungai'];
    $jenis_alat = $_POST['jenis_alat'];
    $id_logger = $_POST['id_logger'];
    $id_modem = $_POST['id_modem'];
    $nama_penjaga = $_POST['nama_penjaga'];
    $no_penjaga = $_POST['no_penjaga'];
    $link_data = $_POST['link_data'];
    $link_publikasi = $_POST['link_publikasi'];
    $tahun_dibangun = $_POST['tahun_dibangun'];
    $jumlah_ketersediaandata = $_POST['jumlah_ketersediaandata'];
    $data_ketersediaantahun = $_POST['data_ketersediaantahun'];
    $dibangun = $_POST['dibangun'];
    $dikelola = $_POST['dikelola'];
    $proggres = $_POST['proggres'];

    $update = mysqli_query($conn, "update laporan set nama_pos='$nama_pos', jenis_pos='$jenis_pos', latitude='$latitude', longitude='$longitude', lokasi_pos='$lokasi_pos', sungai='sungai', sub_das='$sub_das', das='$das', sistem_sungai='$sistem_sungai',wilayah_sungai=$wilayah_sungai,jenis_alat='$jenis_alat',id_logger='$id_logger, id_modem='$id_modem', no_gsm='$no_gsm', nama_penjaga='$nama_penjaga', no_penjaga='$no_penjaga', link_data='$link_data, link_publikasi='$link_publikasi, tahun_dibangun='$tahun_dibangun',jumlah_ketersediaandata='$jumlah_ketersediaandata', data_ketersediaantahun='$data',dibangun='$dibangun, dikelola='$dikelola', proggres='$proggres' where id_pos = '$id_pos'");

    $update = mysqli_query($conn, "update laporan set nama_pos='$nama_pos', jenis_pos='$jenis_pos', latitude='$latitude', longitude='$longitude', lokasi_pos='$lokasi_pos', sungai='sungai', sub_das='$sub_das', das='$das', sistem_sungai='$sistem_sungai',wilayah_sungai=$wilayah_sungai,jenis_alat='$jenis_alat',id_logger='$id_logger, id_modem='$id_modem', no_gsm='$no_gsm', nama_penjaga='$nama_penjaga', no_penjaga='$no_penjaga', link_data='$link_data, link_publikasi='$link_publikasi, tahun_dibangun='$tahun_dibangun',jumlah_ketersediaandata='$jumlah_ketersediaandata', data_ketersediaantahun='$data',dibangun='$dibangun, dikelola='$dikelola', proggres='$proggres', image='$image where id_pos = '$id_pos'");
