<?php
require 'function.php';
require 'cek.php';

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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">BBWS Pemali Juana</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main Menu</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Insert Data
                            </a>
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
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
                                            <h3 class="display-5"><?=$count1;?></h3>
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
                                            <h3 class="display-5"><?=$count2;?></h3>
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
                                            <h3 class="display-5"><?=$count3;?></h3>
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
                                            <h3 class="display-5"><?=$count4;?></h3>
                                            <h6>Pos Klimatologi</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                    Tambah Data
                                </button>
                                <a href="export.php" class="btn btn-info">Export Data</a>
                            </div>
                            <div class="card-body">
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
                                                }
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$nama_pos;?></td>
                                                <td><?=$jenis_pos;?></td>
                                                <td><?=$lokasi_pos;?></td>
                                                <td><?=$img;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$id_pos;?>">
                                                        Edit
                                                    </button>
                                                    <input type="hidden" name="idposdihapus" value="<?=$id_pos;?>">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$id_pos;?>">
                                                        Delete
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail<?=$id_pos;?>">
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit<?=$id_pos;?>">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                    Nama Pos <input type="text" name="nama_pos" value="<?=$nama_pos;?>" class="form-control" required>
                                                    <label for="jenis_pos">Jenis Pos</label>
                                                                <select name="jenis_pos" value="<?=$data['jenis_pos']?>"<?=$data['jenis_pos']?> class="form-control" required>
                                                                    <option value="Pos Duga Air">Pos Duga Air</option>
                                                                    <option value="Pos Curah Hujan">Pos Curah Hujan</option>
                                                                    <option value="Pos Klimatologi">Pos Klimatologi</option>
                                                                </select>
                                                    Latitude <input type="text" name="latitude" value="<?=$latitude;?>" class="form-control" required>
                                                    Longitude <input type="text" name="longitude" value="<?=$longitude;?>" class="form-control" required>
                                                    Lokasi Pos <input type="text" name="lokasi_pos" value="<?=$lokasi_pos;?>" class="form-control" required>
                                                    Sungai <input type="text" name="sungai" value="<?=$sungai;?>" class="form-control" required>
                                                    Sub Das <input type="text" name="sub_das" value="<?=$sub_das;?>" class="form-control" required>
                                                    Das <input type="text" name="das" value="<?=$das;?>" class="form-control" required>
                                                    Sistem Sungai <input type="text" name="sistem_sungai" value="<?=$sistem_sungai;?>" class="form-control" required>
                                                    Wilayah Sungai<input type="text" name="wilayah_sungai" value="<?=$wilayah_sungai;?>" class="form-control" required>
                                                    Jenis Alat<input type="text" name="jenis_alat" value="<?=$jenis_alat;?>" class="form-control" required>
                                                    ID Logger<input type="text" name="id_logger" value="<?=$id_logger;?>" class="form-control" required>
                                                    ID Modem<input type="text" name="id_modem" value="<?=$id_modem;?>" class="form-control" required>                
                                                    Proggres <input type="text" name="proggres" value="<?=$proggres;?>" class="form-control"required>
                                                    Nama Penjaga <input type="text" name="nama_penjaga" value="<?=$nama_penjaga;?>" class="form-control" required>
                                                    No Penjaga <input type="text" name="no_penjaga" value="<?=$no_penjaga;?>" class="form-control" required>
                                                    Link Data <input type="text" name="link_data" value="<?=$link_data;?>" class="form-control" required>
                                                    Link Publikasi<input type="text" name="link_publikasi" value="<?=$link_publikasi;?>" class="form-control" required>
                                                    Tahun Dibangun <input type="text" name="tahun_dibangun" value="<?=$tahun_dibangun;?>" class="form-control" required>
                                                    Jumlah Ketersediaan Data<input type="text" name="jumlah_ketersediaandata" value="<?=$jumlah_ketersediaandata;?>" class="form-control" required>
                                                    Data Ketersediaan Tahun<input type="text" name="data_ketersediaantahun" value="<?=$data_ketersediaantahun;?>" class="form-control" required>
                                                    Dibangun<input type="text" name="dibangun" value="<?=$dikelola;?>" class="form-control" required>
                                                    Dikelola<input type="text" name="dikelola" value="<?=$dikelola;?>" class="form-control" required>
                                                    Manage Foto <input type="file" name="file" class="form-control">
                                                    <img src="image/<?php echo $data['image'] ?>" width="120px" height="160px" />
                                                    <br>
                                                    <input type="hidden" name="id_pos" value="<?=$id_pos;?>">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="updatedata">Update</button>

                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?=$id_pos;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus data</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post" >
                                                    <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data Pos <?=$nama_pos;?>?
                                                    <input type="hidden" name="id_pos" value="<?=$id_pos;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit"  class="btn btn-danger" name="hapusdata">Hapus</button> 
                                                    
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>

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

                                            <?php
                                            };
                                            ?>
                                            <!-- Tambah Data Modal -->
                                            <div class="modal fade" id="myModal">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Tambah Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                                                            
                                                        <!-- Modal body -->
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <p class="jarak">
                                                                Nama Pos<input type='text' name='nama_pos' placeholder="Nama Pos" class="form-control" required>
                                                                <label for="jenis_pos">Jenis Pos</label>
                                                                <select name="jenis_pos" class="form-control" required>
                                                                    <option value="" disabled selected>Pilih Jenis Pos</option>
                                                                    <option value="Pos Duga Air">Pos Duga Air</option>
                                                                    <option value="Pos Curah Hujan">Pos Curah Hujan</option>
                                                                    <option value="Pos Klimatologi">Pos Klimatologi</option>
                                                                </select>
                                                                Latitude<input type='text' name='latitude' placeholder="Latitude" class="form-control" required>
                                                                Longitude<input type='text' name='longitude' placeholder="Longitude" class="form-control" required>
                                                                Lokasi Pos<input type='text' name='lokasi_pos' placeholder="Lokasi Pos" class="form-control" required>
                                                                Sungai<input type='text' name='sungai' placeholder="Sungai" class="form-control" required>
                                                                Sub Das<input type='text' name='sub_das' placeholder="Sub Das" class="form-control" required>
                                                                Das<input type='text' name='das' placeholder="Das" class="form-control" required>
                                                                Sistem Sungai<input type='text' name='sistem_sungai' placeholder="sistem sungai" class="form-control" required>
                                                                Wilayah Sungai<input type='text' name='wilayah_sungai' placeholder="wilayah sungai" class="form-control" required>
                                                                Jenis Alat<input type='text' name='jenis_alat' placeholder="Jenis Alat" class="form-control" required>
                                                                Id Logger<input type='text' name='id_logger' placeholder="Id Logger" class="form-control" required>
                                                                Id Modem<input type='text' name='id_modem' placeholder="Id Modem" class="form-control" required>
                                                                No Gsm<input type='text' name='no_gsm' placeholder="No Gsm" class="form-control" required>
                                                                Progress<input type='text' name='proggres' placeholder="Proggres" class="form-control" required>
                                                                Nama Penjaga<input type='text' name='nama_penjaga' placeholder="Nama penjaga" class="form-control" required>
                                                                No Penjaga<input type='text' name='no_penjaga' placeholder="no penjaga" class="form-control" required>
                                                                Link Data<input type='text' name='link_data' placeholder="Link Data" class="form-control" required>
                                                                Link Publikasi<input type='text' name='link_publikasi' placeholder="Link Publikasi" class="form-control" required>
                                                                Tahun Dibangun<input type='text' name='tahun_dibangun' placeholder="Tahun Dibangun" class="form-control" required>
                                                                Jumlah Ketersediaan Data<input type='text' name='jumlah_ketersediaandata' placeholder="jumlah ketersediaandata" class="form-control" required>
                                                                Data Ketersediaan<input type='text' name='data_ketersediaantahun' placeholder="data ketersediaan tahun" class="form-control" required>
                                                                Dibangun<input type='text' name='dibangun' placeholder="dibangun" class="form-control" required>
                                                                Dikelola<input type='text' name='dikelola' placeholder="dikelola" class="form-control" required>
                                                                Gambar Pos <input type='file' name='file' class="form-control" required>
                                                                <br>
                                                                <button type="submit" class="btn btn-primary" name="addnewlap">Submit</button> 
                                                                </p>
                                                            </div>
                                                        </form>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
