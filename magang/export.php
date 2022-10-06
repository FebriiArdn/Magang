<?php
require 'function.php';
require 'cek.php';
?>

<html>
<head>
  <title>Stock Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Stock Bahan</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
					
					<table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Pos </th>
                                                <th>Jenis Pos </th>
                                                <th>Latitude </th>
                                                <th>Longitude </th>
                                                <th>Lokasi Pos </th>
                                                <th>Nama Sungai </th>
                                                <th>Sub Das </th>
                                                <th>Das </th>
                                                <th>Sistem Sungai </th>
                                                <th>Wilayah Sungai </th>
                                                <th>Jenis Alat </th>
                                                <th>Id Logger </th>
                                                <th>Id Modem </th>
                                                <th>No. Gsm </th>
                                                <th>Nama Penjaga </th>
                                                <th>No Penjaga </th>
                                                <th>Link Data </th>
                                                <th>Link Publikasi </th>
                                                <th>Tahun Dibangun </th>
                                                <th>Jumlah Data </th>
                                                <th>Data Ketersediaan </th>
                                                <th>Dibangun </th>
                                                <th>Dikelola </th>
                                                <th>Progress </th>
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
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $nama_pos ?></td>
                                                <td><?php echo $jenis_pos ?></td>
                                                <td><?php echo $latitude ?></td>
                                                <td><?php echo $longitude ?></td>
                                                <td><?php echo $lokasi_pos ?></td>
                                                <td><?php echo $sungai ?></td>
                                                <td><?php echo $sub_das ?></td>
                                                <td><?php echo $das ?></td>
                                                <td><?php echo $sistem_sungai ?></td>
                                                <td><?php echo $wilayah_sungai ?></td>
                                                <td><?php echo $jenis_alat ?></td>
                                                <td><?php echo $id_logger ?></td>
                                                <td><?php echo $id_modem ?></td>
                                                <td><?php echo $no_gsm ?></td>
                                                <td><?php echo $nama_penjaga ?></td>
                                                <td><?php echo $no_penjaga ?></td>
                                                <td><?php echo $link_data ?></td>
                                                <td><?php echo $link_publikasi ?></td>
                                                <td><?php echo $tahun_dibangun ?></td>
                                                <td><?php echo $jumlah_ketersediaandata ?></td>
                                                <td><?php echo $data_ketersediaantahun ?></td>
                                                <td><?php echo $dibangun ?></td>
                                                <td><?php echo $dikelola ?></td>
                                                <td><?php echo $proggres ?></td>
                                            <?php
                                            };
                                            ?>

                                        </tbody>
                                    </table>
<a href="index.php" class="btn btn-info">Kembali</a>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>

</html>
