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
       <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

       <style>
		.leaflet-container {
			height: 350px;
			width: 100%;
			max-width: 100%;
			max-height: 100%;
		}
	</style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"<img src="">BBWS Pemali Juana</a>
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
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Peta Lokasi Pos Hidrologi
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <head>
                                                <!-- Menyisipkan library Google Maps -->
                                                <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
                                            
                                                
                                            <body>
                                            <div id='map'></div>
                                            <script>
                                                var cities = L.layerGroup();

                                                var mSampookong = L.marker([-6.99601, 110.3984]).bindPopup('Sam Poo Kong').addTo(cities);
                                                var mTugumuda = L.marker([-6.98415, 110.40953]).bindPopup('Tugu Muda').addTo(cities);
                                                var mPrpp = L.marker([-6.9607, 110.389]).bindPopup('PRPP').addTo(cities);
                                                var mGolden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);
                                                var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
                                                var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
                                            
                                                var streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

                                                var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                    maxZoom: 19,
                                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                                });

                                                var map = L.map('map', {
                                                    center: [-6.9990,110.4233],
                                                    zoom: 10,
                                                    layers: [streets, cities]
                                                });

                                                var baseLayers = {
                                                    'OpenStreetMap': osm,
                                                    'Streets': streets
                                                };

                                                var overlays = {
                                                    'Cities': cities
                                                };

                                                var layerControl = L.control.layers(baseLayers, overlays).addTo(map);
                                                var maerakaca = L.marker([-6.9608, 110.3861]).bindPopup('Taman Maerakaca');
                                                var rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');

                                                var parks = L.layerGroup([maerakaca, rubyHill]);

                                                var satellite = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
                                                layerControl.addBaseLayer(satellite, 'Satellite');
                                                layerControl.addOverlay(parks, 'Parks');
                                            </script>  
                                            </body>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
