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
       <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
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
                        <h1 class="mt-4">Dashboard</h1> <br>
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
                                                <!-- Menyisipkan library Open Street Maps -->
                                                <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
                                            
                                                
                                            <body>
                                            <div id='map'></div>
                                            <script>
                                                
                                                const cities = L.layerGroup();

						var mPlumbon = L.marker([-6.981845396401108, 110.2944645040562]).bindPopup('Bd.Plumbon').addTo(cities);
                                                var mBringin = L.marker([-6.983144271541725, 110.31687954528044]).bindPopup('Bringin').addTo(cities);
                                                var mSilandak = L.marker([-6.998566045148725, 110.36547588454175]).bindPopup('Silandak').addTo(cities);
                                                var mUngaran = L.marker([-7.144689790980952, 110.40416716066032]).bindPopup('Ungaran').addTo(cities);
                                                var mWdJatibarang = L.marker([-7.034820442014707, 110.34732400222644]).bindPopup('Wd.Jatibarang').addTo(cities);
                                                var mPemaliJuana = L.marker([-7.009726940887558, 110.46755139194816]).bindPopup('Pemali Juana').addTo(cities);
                                                var mPucangGading = L.marker([-7.040307437608448, 110.48428950088874]).bindPopup('Pucang Gading').addTo(cities);
                                                var mBanyumeneng = L.marker([-7.090557940205263, 110.49984209812533]).bindPopup('Banyumeneng').addTo(cities);
                                                var mKopeng = L.marker([-7.397616814457408, 110.42177292032487]).bindPopup('Kopeng').addTo(cities);
                                                var mBanyubiru = L.marker([-7.300970623291211, 110.39976910437257]).bindPopup('Banyubiru').addTo(cities);
                                                var mTarukan = L.marker([-7.228863755744998, 110.34990245363416]).bindPopup('Tarukan').addTo(cities);
                                                var mTuntangRawaPening = L.marker([-7.261115692705575, 110.45261470714048]).bindPopup('Tuntang-RawaPening').addTo(cities);
                                                var mTunjungan = L.marker([-6.9229560443770435, 111.36988329673032]).bindPopup('Tunjungan').addTo(cities);
                                                var mTodanan = L.marker([-6.938521332518588, 111.17758963265302]).bindPopup('Todanan').addTo(cities);
                                                var mWdSimo = L.marker([-7.200931407304544, 111.09815346932328]).bindPopup('Wd.Simo').addTo(cities);
                                                var mSusukan = L.marker([-7.411362068764063, 110.58695218819675]).bindPopup('Susukan').addTo(cities);
                                                var mWonosegoro = L.marker([-7.312002613575339, 110.66014361833743]).bindPopup('Wonosegoro').addTo(cities);
                                                var mKunti = L.marker([-7.344881217083583, 110.77860127864601]).bindPopup('Kunti').addTo(cities);
                                                var mMojoagung = L.marker([-7.091149411194825, 110.7811920282149]).bindPopup('Mojoagung').addTo(cities);
                                                var mJatisari = L.marker([-6.736243161914436, 110.77029878456872]).bindPopup('Jatisari').addTo(cities);
                                                var mPrawoto = L.marker([-6.958793143418104, 110.82949128106719]).bindPopup('Prawoto').addTo(cities);
                                                var mTanjungmojo = L.marker([-6.782450711797557, 110.91704541990609]).bindPopup('Tanjungmojo').addTo(cities);
                                                var mWdcacaban = L.marker([-7.005761618357287, 109.18616461493988]).bindPopup('Wd.Cacabam').addTo(cities);
                                                var mBlado = L.marker([-7.069653274951568, 109.83403708190373]).bindPopup('Blado').addTo(cities);
                                                var mKuta = L.marker([-7.019364120960248, 109.36451130679703]).bindPopup('Kuta').addTo(cities);
                                                var mBangsri = L.marker([-6.529652126851028, 110.75263836189943]).bindPopup('Bangsri').addTo(cities);
                                                var mPakis = L.marker([-6.9551515699028545, 111.03952109039945]).bindPopup('Pakis').addTo(cities);
                                                var mNgawen = L.marker([-7.032457147525159, 111.33189465762186]).bindPopup('Ngawen').addTo(cities);
                                                var mBdGalapan = L.marker([-7.109187301254056, 110.68952502587429]).bindPopup('Bd.Galapan').addTo(cities);
                                                var mSayung = L.marker([-6.942312469428683, 110.5072027901078]).bindPopup('Sayung').addTo(cities);
                                                var mRahtawu = L.marker([-6.655431341850756, 110.86332108074353]).bindPopup('Rahtawu').addTo(cities);
                                                var mBdKalijajar = L.marker([-6.905882348723691, 110.64888077770425]).bindPopup('Bd.Kalijajar').addTo(cities);
                                                var mBdDumpil = L.marker([-7.0755768001648045, 111.19799606729632]).bindPopup('Bd.Dumpil').addTo(cities);
                                                var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
                                                var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

                                                var streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

                                                var map = L.map('map', {
                                                    center: [-6.9973, 110.4243],
                                                    zoom: 10,
                                                    layers: [streets, cities]
                                                });

                                                
                                                var baseLayers = {
                                                    'Streets': streets,
                                                };

                                                var overlays = {
                                                    'Cities': cities
                                                };


                                                var layerControl = L.control.layers(baseLayers, overlays).addTo(map);

                                                var parks = L.layerGroup([]);
                                                var halo = L.layerGroup([]);
                                                var tambah = L.layerGroup([]);


                                                var satellite = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
                                                layerControl.addBaseLayer(satellite, 'Satellite');

                                                layerControl.addOverlay(parks, 'Parks');
                                                layerControl.addOverlay(halo, 'Halo');
                                                layerControl.addOverlay(tambah, 'Tambahajg');
                                                

                                            </script>  
                                            </body>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
