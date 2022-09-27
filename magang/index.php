<?php
require 'function.php';
require 'cek.php';
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
                            <a class="nav-link" href="example.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Example
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
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Nama Pos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jenis Pos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Progress</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Link</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
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
                                                <th>Proggress</th>
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
                                                $lokasi_pos = $data['lokasi_pos'];
                                                $proggres = $data['proggres'];
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
                                                <td><?=$proggres;?></td>
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
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                    Nama Pos
                                                    <input type="text" name="nama_pos" value="<?=$nama_pos;?>" class="form-control" required>
                                                    <br>
                                                    Jenis Pos
                                                    <input type="text" name="jenis_pos" value="<?=$jenis_pos;?>" class="form-control" required>
                                                    <br>Lokasi
                                                    <input type="text" name="lokasi_pos" value="<?=$lokasi_pos;?>" class="form-control" required>
                                                    <br>Proggres
                                                    <input type="text" name="proggres" value="<?=$proggres;?>" class="form-control"required>
                                                    <br>Manage Foto
                                                    <input type="file" name="file" class="form-control">
                                                    <br>
                                                    <input type="hidden" name="id_pos" value="<?=$id_pos;?>">                                                
                                                    <img src="image/<?php echo $data['image'] ?>" width="120px" height="160px" />
                                                    <br>
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
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Detail</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    Nama Pos
                                                    <input type="text" name="nama_pos" value="<?=$nama_pos;?>" class="form-control" required>
                                                    <br>
                                                    Jenis Pos
                                                    <input type="text" name="jenis_pos" value="<?=$jenis_pos;?>" class="form-control" required>
                                                    <br>
                                                    Lokasi
                                                    <input type="text" name="lokasi_pos" value="<?=$lokasi_pos;?>" class="form-control" required>
                                                    <br>
                                                    Proggres
                                                    <input type="text" name="proggres" value="<?=$proggres;?>" class="form-control" required>
                                                    <br>
                                                    <input type="hidden" name="id_pos" value="<?=$id_pos;?>">
                                                    </div>
                                                    </form>

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
        <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="32" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
                <path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"></path>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
            </svg>
            <h4 class="modal-title"> Tambah Data Pos</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <input type='text' name='nama_pos' placeholder="Nama Pos" class="form-control" required>
            <br>
            <input type='text' name='jenis_pos' placeholder="Jenis Pos" class="form-control" required>
            <br>
            <input type='text' name='lokasi_pos' placeholder="Lokasi Pos" class="form-control" required>
            <br>
            <input type='text' name='proggres' placeholder="Proggres" class="form-control" required>
            <br>
            <input type='file' name='file' class="form-control">
            <br>
            <button type="submit" class="btn btn-primary" name="addnewlap">Submit</button> 
            </div>
            </form>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
    </div>
</html>
