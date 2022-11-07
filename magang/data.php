<?php
require 'function.php';

//ambil total pos
$get1 = mysqli_query($conn, "select * from laporan");
$count1 = mysqli_num_rows($get1); //menghitung seluruh kolom

//pos duga air
$get2 = mysqli_query($conn, "select * from laporan where jenis_pos='Pos Duga Air'");
$count2 = mysqli_num_rows($get2); //menghitung seluruh kolom

//pos curah hujan
$get3 = mysqli_query($conn, "select * from laporan where jenis_pos='Pos Curah Hujan'");
$count3 = mysqli_num_rows($get3); //menghitung seluruh kolom

//pos klimatologi
$get4 = mysqli_query($conn, "select * from laporan where jenis_pos='Pos Klimatologi'");
$count4 = mysqli_num_rows($get4); //menghitung seluruh kolom
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
            p.jarak{
            line-height: 35px;        
            }
            .zoomable{
                width: 100px;
            }
            .zoomable:hover{
                transform: scale(2);
                transiton: 0.3s ease;
            }
        </style>
    <title>Hidrologi</title>
</head>

<body>
    <!---->
    <!--Header-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">HIDROLOGI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data.php">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Publikasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Data Pos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Pos Curah hujan</a></li>
                            <li><a class="dropdown-item" href="#">Pos Duga Air</a></li>
                            <li><a class="dropdown-item" href="#">Pos Klimatologi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Hero-->
    <section id="home" class="bg-cover hero-section" style="background-image: url(image/#bumi.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card-header bg-success text-white mb-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <i class="fa fa-list fa-4x"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="display-7"><?=$count1;?></h3>
                                            <h6>Total Seluruh Pos</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card-header bg-info text-white mb-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <i class="fa fa-water fa-4x"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="display-7"><?=$count2;?></h3>
                                            <h6>Pos Duga Air</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card-header bg-secondary text-white mb-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <i class="fa fa-tint fa-4x"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="display-7"><?=$count3;?></h3>
                                            <h6>Pos Curah Hujan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card-header bg-warning text-white mb-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <i class="fa fa-cloud fa-4x"></i>
                                        </div>
                                        <div class="col">
                                            <h3 class="display-7"><?=$count4;?></h3>
                                            <h6>Pos Klimatologi</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Pos</th>
                                                    <th>Jenis Pos</th>
                                                    <th>Lokasi Pos</th>
                                                    <th>Photos</th>
                                                    <th>Change</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $ambilsemuadata = mysqli_query($conn,"select * from laporan");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambilsemuadata)){
                                                    $nama_pos = $data['nama_pos'];
                                                    $jenis_pos = $data['jenis_pos'];
                                                    $latitude = $data['latitude'];
                                                    $longitude = $data['longitude'];
                                                    $lokasi_pos = $data['lokasi_pos'];
                                                    $sungai = $data['sungai'];
                                                    $sub_das = $data['sub_das'];
                                                    $das = $data['das'];
                                                    $sistem_sungai = $data['sistem_sungai'];
                                                    $wilayah_sungai = $data['wilayah_sungai'];
                                                    $jenis_alat = $data['jenis_alat'];
                                                    $id_logger = $data['id_logger'];
                                                    $id_modem = $data['id_modem'];
                                                    $no_gsm = $data['no_gsm'];
                                                    $proggres = $data['proggres'];
                                                    $nama_penjaga = $data['nama_penjaga'];
                                                    $no_penjaga = $data['no_penjaga'];
                                                    $link_data = $data['link_data'];
                                                    $link_publikasi = $data['link_publikasi'];
                                                    $tahun_dibangun = $data['tahun_dibangun'];
                                                    $jumlah_ketersediaandata = $data['jumlah_ketersediaandata'];
                                                    $data_ketersediaantahun = $data['data_ketersediaantahun'];
                                                    $dibangun = $data['dibangun'];
                                                    $dikelola = $data['dikelola'];
                                                    $img = $data['image'];
                                                    $id_pos = $data['id_pos'];
                                                
                                                    
                                                    //cek ada gambar atau tidak
                                                    $gambar = $data['image']; //ambil gambar
                                                    if($gambar==null){
                                                        //jika tidak ada gambar
                                                        $img = 'No Photo';
                                                    } else {
                                                        //jika ada gambar
                                                        $img = '<img src="image/'. $gambar.'" class="zoomable">';
                                                    }}
                                                ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$nama_pos;?></td>
                                                    <td><?=$jenis_pos;?></td>
                                                    <td><?=$lokasi_pos;?></td>
                                                    <td><?=$img;?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail<?=$id_pos;?>">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>

                                            <div class="card mb-4">
                                                    <!-- Detail Modal -->
                                                    <div class="modal fade" id="detail<?=$id_pos;?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                        
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Detail</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <center>
                                                                    <img src="image/<?php echo $data['image'] ?>" width="120px" height="160px" />
                                                                </center>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        Nama Pos <br />
                                                                        Jenis Pos <br>
                                                                        Latitude <br>
                                                                        Longitude <br>
                                                                        Lokasi Pos <br>
                                                                        Nama Sungai <br>
                                                                        Sub Das <br>
                                                                        Das <br>
                                                                        Sistem Sungai <br>
                                                                        Wilayah Sungai <br>
                                                                        Jenis Alat <br>
                                                                        Id Logger <br>
                                                                        Id Modem <br>
                                                                        No. Gsm <br>
                                                                        Nama Penjaga <br>
                                                                        No Penjaga <br>
                                                                        Link Data <br>
                                                                        Link Publikasi <br>
                                                                        Tahun Dibangun <br>
                                                                        Jumlah Data <br>
                                                                        Data Ketersediaan <br>
                                                                        Dibangun <br>
                                                                        Dikelola <br>
                                                                        Progress <br>
                                                                    </div> 
                                                                    <div class="col-sm-8">
                                                                        : <?php echo $data['nama_pos'] ?><br>
                                                                        : <?php echo $data['jenis_pos'] ?><br>
                                                                        : <?php echo $data['latitude'] ?><br>
                                                                        : <?php echo $data['longitude'] ?><br>
                                                                        : <?php echo $data['lokasi_pos'] ?><br>
                                                                        : <?php echo $data['sungai'] ?><br>
                                                                        : <?php echo $data['sub_das'] ?><br>
                                                                        : <?php echo $data['das'] ?><br>
                                                                        : <?php echo $data['sistem_sungai'] ?><br>
                                                                        : <?php echo $data['wilayah_sungai'] ?><br>
                                                                        : <?php echo $data['jenis_alat'] ?><br>
                                                                        : <?php echo $data['id_logger'] ?><br>
                                                                        : <?php echo $data['id_modem'] ?><br>
                                                                        : <?php echo $data['no_gsm'] ?><br>
                                                                        : <?php echo $data['nama_penjaga'] ?><br>
                                                                        : <?php echo $data['no_penjaga'] ?><br>
                                                                        : <?php echo $data['link_data'] ?><br>
                                                                        : <?php echo $data['link_publikasi'] ?><br>
                                                                        : <?php echo $data['tahun_dibangun'] ?><br>
                                                                        : <?php echo $data['jumlah_ketersediaandata'] ?><br>
                                                                        : <?php echo $data['data_ketersediaantahun'] ?><br>
                                                                        : <?php echo $data['dibangun'] ?><br>
                                                                        : <?php echo $data['dikelola'] ?><br>
                                                                        : <?php echo $data['proggres'] ?><br>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                    </div>
            </div>
        </div>
    </section>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="login.php">Admin</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
