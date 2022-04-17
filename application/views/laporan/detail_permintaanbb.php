<!DOCTYPE html>
<html>
<head>
  <title>Detail Permintaan Bahan Baku</title>
  <style>
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 3px;
      vertical-align: top;
  }
  </style>
</head>
<body>
  <img height="80" src="<?php echo base_url()."assets/"; ?>images/abn.jpg">
  <h5>PT. ABN Medical Indonesia <br>
  Jl. Bihbul Raya No.8 Kopo	<br>
	Margahayu, Bandung, Jawa Barat 40228
</h5>
<h6> (022) 5426290 </h6>

  <br>

<h1><p style="text-align: center">Data Permintaan Bahan Baku</p></h1>
 <table>
              <thead>
                 <tr>
                <th>No</th>
                <th>ID</th>
											<th hidden="1">ID Produksi</th>
											<th>Jenis Produksi</th>
											<th>Nama Bahan Baku</th>
											<th>Jumlah</th>
											<th>Tgl. Permintaan</th>
                  
                 </tr>
              </thead>
              <tbody>
                 <?php
									$no = 1;
									foreach ($permintaan_bb as $data) { ?>

									<tr>
									<td><?php echo $no; ?></td>
                 					<td><?php echo $data['id_permintaan']; ?></td>
									<td hidden="1"><?php echo $data['id_produksi']; ?></td>
									<td><?php echo $data['jenis_produksi']; ?></td>
									<td><?php echo $data['nama_bb']; ?></td>
									<td><?php echo $data['jumlah']; ?></td>
									<td><?php echo $data['tgl_permintaan']; ?></td>
									
								
           
             
           
									</tr>
									<?php $no++;?>
									<?php } ?>
              </tbody>
           </table>

           
</body>
</html>