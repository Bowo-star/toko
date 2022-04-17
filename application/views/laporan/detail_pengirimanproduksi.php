<!DOCTYPE html>
<html>
<head>
  <title>Detail Pengiriman Hasil Produksi</title>
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

<h1><p style="text-align: center">Data Pengiriman</p></h1>
  <table>
              <thead>
                 <tr>
                <th>No</th>
                <th>ID</th>
											<th  hidden="1">ID Produksi</th>
											<th>Jenis Produksi</th>
											<th>Jumlah</th>
											<th>Tgl. Produksi</th>
                     						<th>Tgl. Selesai Produksi</th>
											<th>Tgl. Pengiriman</th>
          
                 </tr>
              </thead>
              <tbody>
                 <?php
									$no = 1;
									foreach ($hasil_produksi as $data) { ?>

									<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data['id_pengiriman']; ?></td>
                 					<td  hidden="1"><?php echo $data['id_produksi']; ?></td>
                 					<td><?php echo $data['jenis_produksi']; ?></td>
									<td><?php echo $data['jumlah']; ?></td>
									<td><?php echo $data['tgl_produksi']; ?></td>
                  					<td><?php echo $data['tgl_selesai']; ?></td>
									<td><?php echo $data['tgl_pengiriman']; ?></td>						
                 
									</tr>
									<?php $no++;?>
									<?php } ?>
              </tbody>
           </table>

           
</body>
</html>