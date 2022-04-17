<!DOCTYPE html>
<html>
<head>
  <title>Laporan Data Barang</title>
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
  <h6>Jl kopo bihbul
  <br>Bandung</h6>

  <br>

<h1><p style="text-align: center">Data Barang</p></h1>
<table >
              <thead>
                 <tr>
                <th>No</th>
                <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Stok Barang</th>
                      <th>Satuan</th>
                      <th>Isi</th>
                      <th>Harga Beli</th>
                      <th>Expired</th>
                 </tr>
              </thead>
              <tbody>
                 <?php
                  $no = 1;
                  foreach ($barang as $data) { ?>

                  <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_barang']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['kategori']; ?></td>
                  <td><?php echo $data['stok']; ?></td>
                  <td><?php echo $data['satuan']; ?></td>
                  <td><?php echo $data['isi']; ?></td>
                  <td><?php echo $data['harga_beli']; ?></td>
                  <td><?php echo $data['expired']; ?></td>
                  </tr>
                  <?php $no++;?>
                  <?php } ?>
              </tbody>
           </table>

           
</body>
</html>