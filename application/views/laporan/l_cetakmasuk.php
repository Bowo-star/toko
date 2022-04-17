<!DOCTYPE html>
<html>
<head>
  <title>Laporan Data Barang Keluar</title>
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
  <img height="80" src="<?php echo base_url()."assets/"; ?>images/logo.jpg">
  <h6>Komp. Graha Puspa Jl. Sersan Bajuri KM 4.5 Cihideng Lembang
  <br>Cihideng Lembang</h6>

  <br>

<p style="text-align: center">Data Barang Keluar</p>
 <table>
              <thead>
                 <tr>
                <th hidden="1">No</th>
                <th hidden="1">ID</th>
                      <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                      <th>Nama</th>
                      <th>Divisi</th>
                      <th>ID Barang</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Peruntukan</th>
                      <th>Keterangan</th>
                 </tr>
              </thead>
              <tbody>
                 <?php
                  $no = 1;
                  foreach ($barang_masuk_rutin as $data) { ?>

                  <tr>
                  <td hidden="1"><?php echo $no; ?></td>
                  <td hidden="1"><?php echo $data['id_masuk']; ?></td>
                  <td><?php echo $data['tanggal_kembali']; ?></td>
                  <td><?php echo $data['tanggal_pinjam']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['divisi']; ?></td>
                  <td><?php echo $data['id_barang']; ?></td>
                  <td><?php echo $data['nama_barang']; ?></td>
                  <td><?php echo $data['kategori_barang']; ?></td>
                  <td><?php echo $data['jumlah']; ?></td>
                  <td><?php echo $data['satuan']; ?></td>
                  <td><?php echo $data['peruntukan']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
              
                  <?php $no++;?>
                  <?php } ?>
              </tbody>
           </table>
</body>
</html>