<!DOCTYPE html>
<html>
<head>
  <title>Laporan Transaksi</title>
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

  div.static {
    position: fixed;
    bottom: 0;
    right: 0;
    width: 300px;
    border: 3px solid #543535;
  }
  </style>
</head>
<body>
  <img height="80" src="<?php echo base_url()."assets/"; ?>images/abok.jpg">
  <h5>ABOK CUSTOM<br>
  Jl. Bihbul Raya No.8 Kopo	<br>
	Margahayu, Bandung, Jawa Barat 40228</h5>
<h6> (022) 5426290 </h6>

  <br>

<h1><p style="text-align: center">Laporan Transaksi</p></h1>
 <form action="<?php echo base_url('c_toko/laporantransaksi')?>" method="post">
            <select name="bulan">
            <option value="01"> Januari </option>
            <option value="02"> Februari </option>
            <option value="03"> Maret </option>
            <option value="04"> April </option>
            <option value="05"> Mei </option>
            <option value="06"> Juni </option>
            <option value="07"> Juli </option>
            <option value="08"> Agustus </option>
            <option value="09"> September </option>
            <option value="10"> Oktober </option>
            <option value="11"> November </option>
            <option value="12"> Desember </option>
            </select>

          <select name="tahun">
          <?php   
           $tahun = date('Y');
           for ($i = $tahun; $i<$tahun+5; $i++){
             echo"<option value='".$i."'> $i </option>";
           }
          ?>
          </select>
          
           <button name="proses"> - </button>
          </form>
          <nr>
          <br>
  <table id="table">
              <thead>
                 <tr>
                 <th hidden="1">No</th>
                      <th>Id Pembelian</th>
                      <th>Id Pelanggan</th>
                      <th>Nama Customer</th>
                      <th>Alamat</th>
                      <th>Provinsi</th>
                      <th>Kota</th>
                      <th>Kecamatan</th>
                      <th>Kelurahan</th>
                      <th>No Telepon</th>
                      <th>ID Produk</th>
                      <th>Nama Produk</th>
                      <th>Jumlah Pesanan</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                 </tr>
              </thead>
              <tbody>
                 <?php
                 					
									$no = 1;
									foreach ($pembelian as $data) { ?>

									<tr>
									<td hidden="1"><?php echo $no; ?></td>
                  <td><?php echo $data['id_pembelian']; ?></td>
                  <td><?php echo $data['nik']; ?></td>
                  <td><?php echo $data['nama_customer']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['provinsi']; ?></td>
                  <td><?php echo $data['kota']; ?></td>
                  <td><?php echo $data['kecamatan']; ?></td>
                  <td><?php echo $data['kelurahan']; ?></td>
                  <td><?php echo $data['no_telp']; ?></td>
                  <td><?php echo $data['id_produk']; ?></td> 
                  <td><?php echo $data['nama_barang']; ?></td>
                  <td><?php echo $data['jumlah']; ?></td>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td><?php echo $data['status']; ?></td>
								
									</tr>
									<?php $no++;?>
									<?php } ?>
              </tbody>
           </table>
<br><br>

          <center><div class="static">
            Bandung, <?php echo date('Y/m/d') ?>
            <br>
            <br>
            <br>
            <br>
            Admin
            </div>
            </center>
</body>
</html>